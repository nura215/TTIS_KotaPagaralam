@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Aduan Siber</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-10" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-12 mb-5">
        <table class="table table-striped table-sm align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Tiket</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($aduanList as $aduan)
                    <tr>
                        <td>{{ $aduanList->firstItem() + $loop->index }}</td>
                        <td>{{ $aduan->kode_tiket }}</td>
                        <td>{{ $aduan->nama }}</td>
                        <td>{{ $aduan->kategori }}</td>
                        <td>
                            <span class="badge bg-{{ $aduan->status === 'selesai' ? 'success' : ($aduan->status === 'diproses' ? 'warning text-dark' : 'secondary') }}">
                                {{ ucfirst($aduan->status) }}
                            </span>
                        </td>
                        <td>{{ $aduan->created_at->timezone(config('app.timezone'))->format('d M Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.aduan.show', $aduan->id) }}" class="badge bg-info text-decoration-none">
                                <span data-feather="eye"></span>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Belum ada aduan yang masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $aduanList->links('pagination::bootstrap-4') }}
@endsection
