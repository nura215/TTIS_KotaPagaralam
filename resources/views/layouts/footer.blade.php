    <!-- Footer Section -->
    <footer class="sticky-footer" id="contact">
        <div class="footer-top">
          <div class="container-fluid px-4">
            <div class="row gy-3 d-flex justify-content-between">
              <div class="col-md-3">
                <h4 class="footer-title">Article Category</h4>
                @foreach ($categories as $category)
                    <a href="/posts?category={{ $category->slug }}" class="d-block footer-link">{{ $category->name }}</a>
                @endforeach
              </div>
              <div class="col-md-3">
                <h4 class="footer-title">Latest Article</h4>
                  @foreach ($posts->take(4) as $post)
                    <a href="/posts/{{ $post->slug }}" class="d-block footer-link">{{ $post->title }}</a>   
                  @endforeach              
              </div>
              <div class="col-md-3 ms-auto">
                <h4 class="footer-title">Contact</h4>
                @foreach ($footers->take(1) as $footer)
                  <ul class="list-unstyled footer-text">
                    <li>{{ $footer->address }}</li>
                    <li>Email : {{ $footer->email }}</li>
                    <li>Telephone : {{ $footer->telephone }}</li>
                    @foreach ($keys->take(1) as $key)
                      <li>PGP key dapat diunduh <a href="{{'storage/' .  $key->path }}" class="footer-link"> disini</a> </li>
                    @endforeach
                  </ul>
                @endforeach
              </div>
              <div class="col-md-3 map">
                @foreach ($footers->take(1) as $footer)
                    <div class="map-card">
                      {!! $footer->maps !!}
                    </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom py-3">
          <div class="container">
            <div class="row">
              <div class="text-center">
                <small>
                  Copyright &copy; 2026 <span class="footer-brand mx-2"> TTIS Kota Pagar Alam .</span>
                  All Rights Reserved
                </small>
              </div>
            </div>
            </div>
          </div>
        </div>
    </footer>
    <!-- End Footer Section -->


    


