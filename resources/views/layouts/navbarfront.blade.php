<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="{{ route('sitio.principal') }}"><span>Inter</span>Sof</a></h1>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ route('sitio.principal') }}">Inicio</a></li>

          <li class="drop-down"><a href="#">Acerca de</a>
            <ul>
              <li><a href="{{ route('about') }}">About Us</a></li>
              <li><a href="{{ route('team') }}">Team</a></li>
              <li><a href="{{ route('testimonial') }}">Testimonials</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
            </ul>
          </li>

          <li><a href="{{ route('services') }}">Servicios</a></li>
          <li><a href="{{ route('portafolio') }}">Portfolio</a></li>
          <!--<li><a href="pricing.html">Pricing</a></li>-->
          <li><a href="{{ route('blog') }}">Blog</a></li>
          <li><a href="{{ route('contact') }}">Contacto</a></li>
          <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
          <li><a href="{{ route('register') }}">Registrar</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <!--<a href="#" class="instagram"><i class="icofont-instagram"></i></a>-->
        <!--<a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>-->
      </div>

    </div>
  </header><!-- End Header -->
