
    <!-- Hero Section -->
    <div class="hero vh-100 d-flex justify-content-center align-items-center" id="home">
        <div class="container">
            <div class="row align-items-center hero-content">
                <div class="col-lg-6 my-auto text-start">
                    @foreach ($profils->take(1) as $profil)
                        <h1 class="display-4 text-white">{{ $profil->name }}</h1>
                        <article class="text-white my-3 hero-copy">{{ Illuminate\Support\Str::limit(strip_tags($profil->content), 310) }}</article>
                        <div class="hero-actions">
                            <a href="/profil" class="btn btn-outline-light">Profil Kami</a>
                            <a href="/lapor" class="btn btn-outline-light">Laporkan Insiden</a>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-6 my-auto">
                    <div class="hero-visual">
                        <div class="hero-visual-stage">
                            <span class="hero-scan-line"></span>
                            <span class="hero-ring hero-ring-one"></span>
                            <span class="hero-ring hero-ring-two"></span>
                            <span class="hero-ring hero-ring-three"></span>
                            <span class="hero-orbit-node hero-node-top"></span>
                            <span class="hero-orbit-node hero-node-right"></span>
                            <span class="hero-orbit-node hero-node-bottom"></span>
                            <span class="hero-orbit-node hero-node-left"></span>
                            @if (!empty($dashboardIcons) && $dashboardIcons->count())
                                <img src="{{ asset('storage/' . $dashboardIcons->first()->image) }}" alt="Icon Dasbor" class="hero-visual-image">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

