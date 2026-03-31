@extends('layouts.main')

@section('container')
    <div class="container-fluid profile-section profile-wide px-4 px-xl-5" style="margin-top:120px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach ($profils->take(1) as $profil)
                    <div class="profile-shell">
                        <div class="profile-header text-center mx-auto">
                            <h1 class="section-title-blue mt-4 mb-3">PROFIL KAMI</h1>
                            <p class="profile-intro mb-0">Tim Tanggap Insiden Siber Kota Pagar Alam atau disingkat Kukarkab TTIS merupakan Tim Tanggap Insiden resmi Kabupaten Kutai Kartanegara yang dibentuk untuk menangani, mengoordinasikan, serta memberikan layanan respons insiden dan pemulihan sistem akibat serangan atau ancaman siber.</p>
                        </div>

                        <div class="row align-items-start g-4 mt-0">
                            <div class="col-lg-7">
                                <div class="profile-visual-wrap">
                                    @if (!empty($profileIcons) && $profileIcons->count())
                                        <img src="{{ Storage::url($profileIcons->first()->image) }}" alt="Icon Profile" class="profile-visual-image">
                                    @else
                                        <img src="/img/cyber-security-illustration.png" alt="Cyber Security Team" class="profile-visual-image">
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="profile-content-wrap">
                                    <h2 class="profile-title">Visi & Misi</h2>

                                    <div class="profile-point-card mb-3">
                                        <h3>Visi</h3>
                                        <p class="mb-0">Visi Pagar Alam CSIRT adalah terwujudnya penyelenggaraan sistem eletronik yang baik memenuhi kaidah kerahasiaan, integritas, ketersediaan, keautentikan, otorisasi dan kenirsangkalan melalui penyelenggaraan keamanan siber yang handal dalam penanggulangan dan pemulihan insiden siber di lingkungan Pemerintah Kota Pagar Alam.</p>
                                    </div>

                                    <div class="profile-point-card">
                                        <h3>Misi</h3>
                                        <ul class="profile-mission-list">
                                            <li>Membangun pusat pencatatan, pelaporan, penanggulangan dan pemulihan insiden siber di lingkungan Pemerintah Kota Pagar Alam.</li>
                                            <li>Menyelenggarakan penanggulangan dan pemulihan insiden siber melalui kegiatan mendeteksi, menganalisis, mitigasi, pemulihan dan melakukan upaya pencegahan terhadap insiden siber.</li>
                                            <li>Membangun skema kerja dalam penanggulangan dan pemulihan dengan melakukan koordinasi dan kerja sama dalam rangka mencegah dan/atau mengurangi dampak dari Insiden Siber pada konstituen.</li>
                                            <li>Membangun kapasitas sumber daya keamanan siber pada sektor Pemerintah Kota Pagar Alam</li>
                                            <li>Meningkatkan kesadaran pentingnya keamanan informasi bagi sumber daya manusia di lingkungan Pemerintah Kota Pagar Alam</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> 
@endsection
