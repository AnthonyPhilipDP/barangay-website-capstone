<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">barangay.puntauno@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+63 916 667 4675</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://www.facebook.com/barangay.puntauno" class="facebook" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
        {{-- <a href="#" class="twitter" target="_blank" rel="noopener noreferrer"><i class="bi bi-twitter"></i></a> --}}
        {{-- <a href="#" class="instagram" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a> --}}
        {{-- <a href="#" class="linkedin" target="_blank" rel="noopener noreferrer"><i class="bi bi-linkedin"></i></i></a> --}}
      </div>
    </div>
  </section><!-- End Top Bar-->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div id="logo">
        
        <h1><a href="/"><img src={{ URL::asset('assets/img/punta-logo.png') }} alt="" width="50" height="50"> Punta<span>Uno</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ url('/index')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/index#about')}}">About</a></li>
          <li class="dropdown"><a href="{{ url('/index#services')}}"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/complaints">Complaints</a></li>
              <li class="dropdown"><a href="#"><span>Promotions</span> <i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="/businesses">Businesses</a></li>
              <li><a href="/establishments">Establishments</a></li>
              <li class="dropdown"><a href="#"><span>Promote my</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="/businesses/create">Business</a></li>
                  <li><a href="/establishments/create">Establishment</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Request Document</span> <i class="bi bi-chevron-right"></i></a>
            <ul>
                <li><a href="/residency">Certificate of Residency</a></li>
                <li><a href="/indigency">Barangay Certification</a></li>
                <li><a href="/clearance">Barangay Clearance</a></li>
                <li><a href="/businessclearance">Business Clearance</a></li>
            </ul>
          </li>
            </ul>
          </li>
          <li class="dropdown"><a><span>Brgy. Updates</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="/news">News and Events</a></li>
                <!--<li><a href="/events">Events</a></li>-->
                <li><a href="/projects">Projects</a></li>
                <li><a href="/achievements">Achievements</a></li>
                <li><a href="/announcements">Announcements</a></li>
            </ul>
          </li>
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
            <li class="dropdown"><a style="text-transform: capitalize"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  @if(Auth::user()->admin == 0)
                  <li><a href="/home" style="text-align: right">Account</a></li>
                  <li><a href="/myrequests" style="text-align: right">My request/s</a></li>
                  <li><a href="/mypromotions" style="text-align: right">My promotion/s</a></li>
                  <li><a href="/change-password" style="text-align: right">Change password</a></li>
                  @elseif(Auth::user()->admin == 1)
                  @endif
                  @if(Auth::user()->admin == 1)
                    <li><a href="/home" style="text-align: right">Dashboard</a></li>
                    <li><a href="/requests" style="text-align: right">Document Requests</a></li>
                    <li><a href="/complaints" style="text-align: right">Complaint report logs</a></li>
                    <li class="dropdown"><a href="#"><span>Promotions</span> <i class="bi bi-chevron-right"></i></a> <!-- .dropdownleft -->
                      <ul>
                        <li><a href="/businesspromotions" style="text-align: right">Business Promotions</a></li>
                        <li><a href="/establishmentpromotions" style="text-align: right">Establishment Promotions</a></li>
                      </ul>
                    </li>
                  @endif
                  <li><a style="text-align: right" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}&nbsp;
                        <i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i>
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
              </li>
            @endguest   
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header><!-- End Header -->