@extends('layouts.main')

@section('container')
    <section class="aduan-page">
        <div class="container">
            <div class="aduan-page-head text-center">
                <h1 class="section-title-blue">Form Aduan Insiden Siber</h1>
                <p class="aduan-page-copy">Sampaikan laporan insiden dengan data yang lengkap agar tim admin dapat melakukan tindak lanjut lebih cepat.</p>
            </div>

            <div class="row g-4 align-items-start">
                <div class="col-lg-4">
                    <div class="aduan-info-card">
                        <h2>Informasi & Panduan</h2>
                        <p>Formulir ini digunakan untuk pengaduan insiden siber. Pastikan data pelapor, lampiran NDA, dan lampiran PoC sudah benar sebelum dikirim.</p>

                        <h3>Yang perlu disiapkan</h3>
                        <ul class="aduan-info-list">
                            <li>Data identitas pelapor dan instansi.</li>
                            <li>Lampiran NDA dalam PDF maksimal 5MB.</li>
                            <li>Lampiran PoC dalam PDF maksimal 5MB.</li>
                            <li>Deskripsi insiden yang jelas dan ringkas.</li>
                        </ul>

                        <div class="aduan-note-box">
                            <strong>Catatan</strong>
                            <p>Nomor tiket otomatis dibuat setelah formulir berhasil dikirim dan juga dikirim ke email pelapor.</p>
                        </div>

                        <div class="aduan-security-box">
                            <strong>Keamanan Data</strong>
                            <p>Data laporan hanya digunakan untuk kebutuhan penanganan insiden dan pemantauan status aduan.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="aduan-form-card">
                        <h2>Lengkapi Formulir Laporan</h2>
                        <form action="{{ route('lapor.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" maxlength="16" required>
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="no_hp" class="form-label">No HP</label>
                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                                    @error('no_hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="instansi" class="form-label">Instansi</label>
                                    <input type="text" class="form-control @error('instansi') is-invalid @enderror" id="instansi" name="instansi" value="{{ old('instansi') }}" required>
                                    @error('instansi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($kategoriOptions as $kategori)
                                            <option value="{{ $kategori }}" {{ old('kategori') === $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="upload_nda" class="form-label">Upload NDA (PDF, maks. 5MB)</label>
                                    <div class="custom-file-upload @error('upload_nda') is-invalid @enderror">
                                        <input type="file" class="custom-file-upload-input" id="upload_nda" name="upload_nda" accept="application/pdf" required>
                                        <label for="upload_nda" class="custom-file-upload-label">
                                            <span class="custom-file-upload-button">Pilih File</span>
                                            <span class="custom-file-upload-name" data-default-text="Tidak ada file yang dipilih">Tidak ada file yang dipilih</span>
                                        </label>
                                    </div>
                                    @error('upload_nda')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="upload_poc" class="form-label">Upload PoC (PDF, maks. 5MB)</label>
                                    <div class="custom-file-upload @error('upload_poc') is-invalid @enderror">
                                        <input type="file" class="custom-file-upload-input" id="upload_poc" name="upload_poc" accept="application/pdf" required>
                                        <label for="upload_poc" class="custom-file-upload-label">
                                            <span class="custom-file-upload-button">Pilih File</span>
                                            <span class="custom-file-upload-name" data-default-text="Tidak ada file yang dipilih">Tidak ada file yang dipilih</span>
                                        </label>
                                    </div>
                                    @error('upload_poc')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="6" required>{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn aduan-submit-btn">Kirim Laporan Aduan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (session()->has('success'))
        <div class="aduan-popup-overlay" id="aduanSuccessPopup">
            <div class="aduan-popup-card" role="dialog" aria-modal="true" aria-labelledby="aduan-popup-title">
                <button type="button" class="aduan-popup-close" id="aduanPopupClose" aria-label="Tutup notifikasi">&times;</button>
                <span class="aduan-popup-kicker">Laporan Berhasil</span>
                <h2 id="aduan-popup-title">Aduan berhasil dikirim</h2>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <script nonce="{{ csp_nonce() }}">
        document.querySelectorAll('.custom-file-upload-input').forEach(function (input) {
            input.addEventListener('change', function () {
                var fileNameHolder = this.closest('.custom-file-upload').querySelector('.custom-file-upload-name');
                var defaultText = fileNameHolder.getAttribute('data-default-text') || 'Tidak ada file yang dipilih';

                fileNameHolder.textContent = this.files.length ? this.files[0].name : defaultText;
            });
        });

        (function () {
            var popup = document.getElementById('aduanSuccessPopup');
            var closeButton = document.getElementById('aduanPopupClose');

            if (!popup) {
                return;
            }

            function closePopup() {
                popup.style.display = 'none';
            }

            if (closeButton) {
                closeButton.addEventListener('click', closePopup);
            }

            popup.addEventListener('click', function (event) {
                if (event.target === popup) {
                    closePopup();
                }
            });
        })();
    </script>
@endsection
