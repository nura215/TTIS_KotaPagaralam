@extends('layouts.main')

@section('container')
    <!-- Contact Section -->
    <div class="container contact-section" style="margin-top:8rem">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12">
                @foreach ($keys->take(1) as $key)
                    @foreach ($footers->take(1) as $footer)
                        <div class="contact-shell">
                            <div class="contact-header text-center mx-auto">
                                <h1 class="mb-3 section-title-blue">Hubungi Kami</h1>
                                <p class="contact-intro mb-0">Tim {{ $footer->name }} siap membantu kebutuhan informasi, komunikasi insiden, dan koordinasi tindak lanjut secara aman dan terstruktur.</p>
                            </div>

                            <div class="row g-4 align-items-stretch mt-1">
                                <div class="col-lg-5">
                                    <div class="contact-info-card">
                                        <div class="contact-info-block">
                                            <span class="contact-label">Lokasi</span>
                                            <h2 class="contact-subtitle">{{ $footer->name }}</h2>
                                            <p class="contact-text">{{ $footer->address }}</p>
                                        </div>

                                        <div class="contact-info-grid">
                                            <div class="contact-mini-card">
                                                <span class="contact-label">Email</span>
                                                <p class="contact-text mb-0">{{ $footer->email }}</p>
                                            </div>

                                            <div class="contact-mini-card">
                                                <span class="contact-label">Telephone</span>
                                                <p class="contact-text mb-0">{{ $footer->telephone }}</p>
                                            </div>

                                            <div class="contact-mini-card">
                                                <span class="contact-label">PGP Key</span>
                                                <p class="contact-text mb-1"></p>
                                                <a href="{{ asset('storage/' . $key->path) }}" class="contact-link">Unduh PGP Key</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7">
                                    <div class="contact-map-card">
                                        <div class="contact-map-frame map">
                                            {!! $footer->maps !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div> 
    <!-- End Contact Section -->
@endsection
