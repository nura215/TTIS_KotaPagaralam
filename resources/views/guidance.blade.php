@extends('layouts.main')

@section('container')
    <!-- Service Section -->
    <div class="container guidance-section" style="margin-top:8rem">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12">
                <div class="guidance-header mb-5 text-center mx-auto">

                    <h1 class="guidance-jdl mb-3 section-title-blue">Panduan Penangan Insiden Siber</h1>
                    <p class="guidance-intro mb-0">Kumpulan panduan yang dapat diunduh untuk membantu proses penanganan insiden siber secara cepat, terstruktur, dan aman.</p>
                </div>

                <article class="my-4 fs-6">
                    <div class="row g-4">
                        @foreach ($guidances as $key => $guidance)
                            <div class="col-md-6 col-xl-4">
                                <a href="{{ 'storage/' . $guidance->path }}" target="_blank" class="guidance-card text-decoration-none">
                                    <div class="guidance-card-top">
                                        <span class="guidance-index">{{ $guidances->firstItem() + $key }}</span>
                                        <span class="guidance-size">{{ number_format(round($guidance->size / 1024, 2),2,",",".") }} Kb</span>
                                    </div>
                                    <h3 class="guidance-card-title">{{ $guidance->name }}</h3>
                                    <p class="guidance-card-copy">Klik untuk membuka atau mengunduh file panduan ini.</p>
                                    <span class="guidance-card-link">Lihat Panduan</span>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="guidance-footer mt-4">

                        <div class="pagination pagination-sm">
                            {{ $guidances->links() }}
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div> 
    <!-- End Service Section -->
@endsection
