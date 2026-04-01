<?php

namespace App\Http\Controllers;

use App\Mail\AduanKeAdmin;
use App\Mail\AduanKeUser;
use App\Models\Aduan;
use App\Models\Category;
use App\Models\File;
use App\Models\Footer;
use App\Models\Guidance;
use App\Models\ImageProperty;
use App\Models\Key;
use App\Models\Post;
use App\Models\Profil;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AduanController extends Controller
{
    private const ADMIN_EMAIL = 'pagaralam_csirt@pagaralamkota.go.id';

    public function home()
    {
        return view('home', array_merge($this->publicViewData(), [
            'trackingResult' => session('trackingResult'),
            'trackingCode' => session('trackingCode'),
            'trackingMessage' => session('trackingMessage'),
        ]));
    }

    public function create()
    {
        return view('aduan.create', array_merge($this->publicViewData(false), [
            'kategoriOptions' => Aduan::KATEGORI_OPTIONS,
        ]));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nik' => 'required|digits:16',
            'no_hp' => 'required|string|max:30',
            'instansi' => 'required|string|max:255',
            'kategori' => 'required|in:' . implode(',', Aduan::KATEGORI_OPTIONS),
            'deskripsi' => 'required|string',
            'upload_nda' => 'required|file|mimes:pdf|max:5120',
            'upload_poc' => 'required|file|mimes:pdf|max:5120',
        ]);

        $aduan = Aduan::create([
            'kode_tiket' => $this->generateKodeTiket(),
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'nik' => $validatedData['nik'],
            'no_hp' => $validatedData['no_hp'],
            'instansi' => $validatedData['instansi'],
            'kategori' => $validatedData['kategori'],
            'deskripsi' => $validatedData['deskripsi'],
            'file_nda' => $request->file('upload_nda')->store('aduan/nda', 'public'),
            'file_poc' => $request->file('upload_poc')->store('aduan/poc', 'public'),
            'status' => Aduan::STATUS_PENDING,
        ]);

        Mail::to(self::ADMIN_EMAIL)->send(new AduanKeAdmin($aduan));
        Mail::to($aduan->email)->send(new AduanKeUser($aduan));

        return redirect()->route('lapor.create')
            ->with('success', 'Aduan berhasil dikirim. Nomor tiket Anda: ' . $aduan->kode_tiket)
            ->with('kode_tiket', $aduan->kode_tiket);
    }

    public function lacakForm()
    {
        return view('home', array_merge($this->publicViewData(), [
            'trackingResult' => null,
            'trackingCode' => old('kode_tiket'),
            'trackingMessage' => null,
        ]));
    }

    public function lacak(Request $request)
    {
        $validatedData = $request->validate([
            'kode_tiket' => 'required|string|regex:/^TTIS-[A-Z0-9]{8}$/',
        ], [
            'kode_tiket.regex' => 'Format kode tiket harus TTIS-XXXXXXXX.',
        ]);

        $aduan = Aduan::where('kode_tiket', strtoupper($validatedData['kode_tiket']))->first();

        if (!$aduan) {
            return redirect()->to(route('home') . '#lacak-aduan')
                ->with('trackingCode', strtoupper($validatedData['kode_tiket']))
                ->with('trackingMessage', 'Kode tiket tidak ditemukan.');
        }

        return redirect()->to(route('home') . '#lacak-aduan')
            ->with('trackingCode', $aduan->kode_tiket)
            ->with('trackingResult', $aduan);
    }

    public function adminIndex()
    {
        return view('dashboard.aduan.index', array_merge($this->dashboardViewData(), [
            'aduanList' => Aduan::latest()->paginate(15),
        ]));
    }

    public function adminShow($id)
    {
        return view('dashboard.aduan.show', array_merge($this->dashboardViewData(), [
            'aduan' => Aduan::findOrFail($id),
            'statusOptions' => Aduan::STATUS_OPTIONS,
        ]));
    }

    public function adminUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:' . implode(',', Aduan::STATUS_OPTIONS),
            'keterangan_admin' => 'nullable|string',
        ]);

        Aduan::where('id', $id)->update($validatedData);

        return redirect()->route('admin.aduan.show', $id)->with('success', 'Status aduan berhasil diperbarui.');
    }

    private function generateKodeTiket()
    {
        do {
            $kodeTiket = 'TTIS-' . Str::upper(Str::random(8));
        } while (Aduan::where('kode_tiket', $kodeTiket)->exists());

        return $kodeTiket;
    }

    private function publicViewData($includeHero = true)
    {
        return [
            'includeHero' => $includeHero,
            'footers' => Footer::latest()->get(),
            'profils' => Profil::latest()->get(),
            'categories' => Category::all(),
            'posts' => Post::where('published', true)->latest()->get(),
            'files' => File::latest()->get(),
            'keys' => Key::latest()->get(),
            'services' => Service::latest()->get(),
            'guidances' => Guidance::latest()->get(),
            'propertiez' => ImageProperty::where('property', 'Banner')->latest()->get(),
            'properties' => ImageProperty::where('property', 'Logo')->latest()->get(),
            'dashboardIcons' => ImageProperty::where('property', 'Icon Dasbor')->latest()->get(),
        ];
    }

    private function dashboardViewData()
    {
        return [
            'properties' => ImageProperty::where('property', 'Logo')->latest()->get(),
            'profils' => Profil::latest()->get(),
        ];
    }
}
