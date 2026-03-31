<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 'pending';
    public const STATUS_DIPROSES = 'diproses';
    public const STATUS_SELESAI = 'selesai';

    public const STATUS_OPTIONS = [
        self::STATUS_PENDING,
        self::STATUS_DIPROSES,
        self::STATUS_SELESAI,
    ];

    public const KATEGORI_OPTIONS = [
        'Malware / Ransomware',
        'Phishing / Social Engineering',
        'DDoS (Distributed Denial of Service)',
        'Defacement Website',
        'Unauthorized Access (Akses Tidak Sah)',
        'Data Breach / Kebocoran Data',
        'Spam / Hoaks',
        'Penipuan Online',
        'Lainnya',
    ];

    protected $table = 'aduan';

    protected $fillable = [
        'kode_tiket',
        'nama',
        'email',
        'nik',
        'no_hp',
        'instansi',
        'kategori',
        'deskripsi',
        'file_nda',
        'file_poc',
        'status',
        'keterangan_admin',
    ];
}
