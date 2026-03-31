@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Aduan {{ $aduan->kode_tiket }}</h1>
        <a href="{{ route('admin.aduan.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-10" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4 mb-5">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">Informasi Aduan</div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Kode Tiket</label>
                            <input type="text" class="form-control" value="{{ $aduan->kode_tiket }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" value="{{ ucfirst($aduan->status) }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Laporan</label>
                            <input type="text" class="form-control" value="{{ $aduan->created_at->timezone(config('app.timezone'))->format('d M Y H:i') }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" value="{{ $aduan->nama }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" value="{{ $aduan->email }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control" value="{{ $aduan->nik }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No HP</label>
                            <input type="text" class="form-control" value="{{ $aduan->no_hp }}" readonly>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Instansi</label>
                            <input type="text" class="form-control" value="{{ $aduan->instansi }}" readonly>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Kategori</label>
                            <input type="text" class="form-control" value="{{ $aduan->kategori }}" readonly>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" rows="6" readonly>{{ $aduan->deskripsi }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ Storage::url($aduan->file_nda) }}" target="_blank" class="btn btn-outline-primary w-100">Lihat File NDA</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ Storage::url($aduan->file_poc) }}" target="_blank" class="btn btn-outline-primary w-100">Lihat File PoC</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">Update Status Aduan</div>
                <div class="card-body">
                    <form action="{{ route('admin.aduan.update', $aduan->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                @foreach ($statusOptions as $status)
                                    <option value="{{ $status }}" {{ old('status', $aduan->status) === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_admin" class="form-label">Keterangan Admin</label>
                            <textarea name="keterangan_admin" id="keterangan_admin" rows="8" class="form-control @error('keterangan_admin') is-invalid @enderror">{{ old('keterangan_admin', $aduan->keterangan_admin) }}</textarea>
                            @error('keterangan_admin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
