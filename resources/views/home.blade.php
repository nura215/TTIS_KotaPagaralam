@extends('layouts.main')

@section('container')
    <section id="lacak-aduan" class="ticket-tracker-section">
        <div class="container">
            <div class="tracker-shell">
                <div class="row align-items-center g-4">
                    <div class="col-lg-6">
                        <span class="tracker-kicker">Aduan Siber</span>
                        <h1 class="tracker-title section-title-blue">Lacak Tiket Aduan Siber</h1>
                        <p class="tracker-copy">Masukkan nomor tiket untuk melihat status penanganan laporan insiden Anda.</p>
                        <form action="{{ route('lacak.store') }}" method="post" class="tracker-form">
                            @csrf
                            <input type="text" name="kode_tiket" class="form-control tracker-input @error('kode_tiket') is-invalid @enderror" placeholder="Contoh: TTIS-AB12CD34" value="{{ old('kode_tiket', $trackingCode) }}" maxlength="13">
                            <button type="submit" class="btn tracker-btn">Lacak</button>
                        </form>
                        @error('kode_tiket')
                            <div class="alert alert-danger tracker-alert" role="alert">{{ $message }}</div>
                        @enderror
                        @if ($trackingMessage)
                            <div class="alert alert-warning tracker-alert" role="alert">{{ $trackingMessage }}</div>
                        @endif
                        <div class="tracker-actions">
                            <a href="/lapor" class="btn tracker-link-btn">Buat Aduan Baru</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tracker-result-card">
                            @if ($trackingResult)
                                <div class="tracker-result-head">
                                    <span class="tracker-result-label">Status Tiket</span>
                                    <span class="tracker-status-badge tracker-status-{{ $trackingResult->status }}">{{ ucfirst($trackingResult->status) }}</span>
                                </div>
                                <div class="tracker-result-grid">
                                    <div>
                                        <span class="tracker-field-label">Nama</span>
                                        <p>{{ $trackingResult->nama }}</p>
                                    </div>
                                    <div>
                                        <span class="tracker-field-label">Instansi</span>
                                        <p>{{ $trackingResult->instansi }}</p>
                                    </div>
                                    <div>
                                        <span class="tracker-field-label">Kategori</span>
                                        <p>{{ $trackingResult->kategori }}</p>
                                    </div>
                                    <div>
                                        <span class="tracker-field-label">Keterangan Admin</span>
                                        <p>{{ $trackingResult->keterangan_admin ?: 'Belum ada keterangan tambahan.' }}</p>
                                    </div>
                                </div>
                            @else
                                <span class="tracker-result-label">Tracking Aduan</span>
                                <h3 class="tracker-result-title">Status aduan akan tampil di sini</h3>
                                <p class="tracker-result-copy">Setelah nomor tiket dimasukkan, sistem akan menampilkan nama pelapor, instansi, kategori, status, dan keterangan admin.</p>
                                <ul class="tracker-result-list">
                                    <li>Format tiket: <code>TTIS-XXXXXXXX</code></li>
                                    <li>Status: pending, diproses, selesai</li>
                                    <li>Gunakan tiket yang dikirim ke email pelapor</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-8 mx-auto text-center">
                    <h1 class="section-title-blue">Latest Post</h1>
                </div>
            </div>
        
        @if ($posts->count())
            <div class="container">
                <div class="row">
                    @foreach ($posts->take(6) as $post)
                        <div class="col-lg-4 col-sm-6 my-4">
                            <div class="card-effect article-card">
                                <div class="article-card-media">
                                    <span class="article-card-category"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></span>
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}">
                                </div>

                                <div class="card-body article-card-body">
                                <h5 class="card-title article-card-title"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h5>
                                <p class="article-card-meta">
                                    <small>
                                    By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> at <span>{{ date('F d, Y', strtotime($post->created_at)) }}</span>
                                    </small>
                                </p>
                                <p class="card-text article-card-text">{{ $post->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn article-card-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        @else
            <p class="text-center fs-4">No Post Found</p>
        @endif
        
        </div>
    </section>
    <!-- End Blog Section -->

    @if ($trackingResult || $trackingMessage || $errors->has('kode_tiket'))
        <script nonce="{{ csp_nonce() }}">
            window.addEventListener('load', function () {
                var trackerSection = document.getElementById('lacak-aduan');

                if (trackerSection) {
                    trackerSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        </script>
    @endif
@endsection
