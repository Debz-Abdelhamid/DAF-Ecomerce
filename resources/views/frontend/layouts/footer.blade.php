<!--============================
        FOOTER PART START
    ==============================-->

<style>
  #a {
    text-decoration: none;
    transition-duration: 0.5s;
  }

  #a:hover {
    text-decoration: underline;
  }
</style>

<style>
  #cart {
    transition: 0.5s;
  }

  #cart:hover {
    scale: 1.1;

  }
</style>






<!-- Footer -->
<footer style="background-color: #ffffff;" class="text-center mt-5 text-lg-start rounded ">


  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start ">
      <!-- Grid row -->
      <div class="row">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase text-white  fw-bold mb-4">
          <a class="wsus__header_logo" href="{{ route('home') }}">
                        <img src="{{asset('frontend/images/DAF.svg')}}" alt="logo" class="img-fluid  relative ">
                    </a>
          </h6>
          <p class="text-blak ">
            plateforme e-commerce avec financement islamique digital en ligne
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-3  col-xl-3 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase text-blak  fw-bold mb-4">
            Sections
          </h6>
          <p class="text-white fw-bold ">
            <a href="#!" class="fw-bold text-blak" id="a">@lang('navbar.home')</a>
          </p>

          <p class="text-white fw-bold ">
            <a href="#!" class="fw-bold text-blak" id="a">@lang('navbar.flash_sale')</a>
          </p>

          <p class="text-white fw-bold ">
            <a href="#!" class="fw-bold text-blak" id="a">@lang('navbar.track_order')</a>
          </p>

          <p class="text-white fw-bold ">
            <a href="#!" class="fw-bold text-blak" id="a">@lang('navbar.about')</a>
          </p>

          <p class="text-white fw-bold ">
            <a href="#!" class="fw-bold text-blak" id="a">@lang('login.login')</a>
          </p>
        </div>
        <!-- Grid column -->



        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto  mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold  text-blak mb-4">Contact</h6>
          <p class="text-blak "><i class="fas fa-home text-blak  me-3"></i> Annaba, Algérie</p>
          <p class="text-blak ">
            <i class="fas fa-envelope me-3"></i>
            {{ $settings->contact_email }}
          </p>
          <p class="text-blak "><i class="fas fa-phone-alt text-blak  me-2"></i> {{ $settings->contact_phone }} </p>
          <!-- Les réseaux sociaux -->
          
          <!--

          <div class="container-fluid">
            <div class="row mt-3 d-flex justify-content-start">
              <article class="col-sm-12">
                <a
                  href="https://www.facebook.com/" target="_blank"
                  data-mdb-ripple-init
                  class="btn text-white btn-floating m-1"
                  style="background-color: #3b5998;"
                  href="#!"
                  role="button"><i class="fab fa-facebook-f"></i>
                </a>

                <a
                  target="_blank"
                  data-mdb-ripple-init
                  class="btn text-white btn-floating m-1"
                  style="background-color: #E1306C;"
                  href="#!"
                  role="button"><i class="fab fa-instagram"></i>
                </a>
              
              
                <a
                  target="_blank"
                  data-mdb-ripple-init
                  class="btn text-white btn-floating m-1"
                  style="background-color: #25D366;"
                  href="#!"
                  role="button"><i class="fab fa-whatsapp"></i>
                </a>
                </article>

  
            </div>

          </div>

          -->

        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
<br>
  <!-- Copyright -->
  <div class="text-center p-2 rounded" style="background-color: #b5002b;">
    <small class="text-white text-sm"> DAF - Tous droits réservés © 2025</small>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

<!--============================
        FOOTER PART END
    ==============================-->