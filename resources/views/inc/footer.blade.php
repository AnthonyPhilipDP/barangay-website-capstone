<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="container">
    <footer class="pt-5">
      <div class="row">
        <div class="col-6 col-md-2 mb-3">
          <h5><strong>Links</strong></h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="{{ url('/index#about')}}" class="nav-link p-0 text-muted">About</a></li>
            <li class="nav-item mb-2"><a href="{{ url('/index#services')}}" class="nav-link p-0 text-muted">Services</a></li>
            <li class="nav-item mb-2"><a href="{{ url('/index#testimonials')}}" class="nav-link p-0 text-muted">Brgy. Updates</a></li>
            <li class="nav-item mb-2"><a href="{{ url('/index#contact')}}" class="nav-link p-0 text-muted">Contact us</a></li>
          </ul>
        </div>
  
        <div class="col-6 col-md-2 mb-3">
          <h5><strong>Brgy. Updates</strong></h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="{{ url('/news')}}" class="nav-link p-0 text-muted">News and Events</a></li>
            {{-- <li class="nav-item mb-2"><a href="{{ url('/events')}}" class="nav-link p-0 text-muted">Events</a></li> --}}
            <li class="nav-item mb-2"><a href="{{ url('/projects')}}" class="nav-link p-0 text-muted">Projects</a></li>
            <li class="nav-item mb-2"><a href="{{ url('/achievements')}}" class="nav-link p-0 text-muted">Achievements</a></li>
            <li class="nav-item mb-2"><a href="{{ url('/announcements')}}" class="nav-link p-0 text-muted">Announcements</a></li>
          </ul>
        </div>
  
        <div class="col-6 col-md-2 mb-3">
          <h5>&emsp;</h5>
          <ul class="nav flex-column">
              {{-- Nothing --}}
          </ul>
        </div>

        <div class="col-6 col-md-2 mb-3">
        </div>

        <div class="col-6 col-md-2 mb-3">
          <ul class="nav flex-column">
            <li class="nav-item mb-2">
              <div class="col md-3">
                <a href="https://www.facebook.com/barangay.puntauno" class="d-flex align-items-center mb-3 link-dark text-decoration-none" target="_blank" rel="noopener noreferrer">
                  <img width="100" height="100" src={{ URL::asset('assets/img/punta-logo.png') }} alt="Barangay Punta Uno">
                </a>
              </div>
            </li>
            <li class="nav-item mb-2">
              <div class="col md-3">
                <a href="https://www.gov.ph/" class="d-flex align-items-center mb-3 link-dark text-decoration-none" target="_blank" rel="noopener noreferrer">
                  <img width="100" height="100" src={{ URL::asset('assets/img/govph.png') }} alt="National Government Portal">
                </a>
              </div>
            </li>
          </ul>
        </div>

        <div class="col-6 col-md-2 mb-3">
          <ul class="nav flex-column">
            <li class="nav-item mb-2">
              <div class="col md-3">
                <a href="https://www.foi.gov.ph/" class="d-flex align-items-center mb-3 link-dark text-decoration-none" target="_blank" rel="noopener noreferrer">
                  <img width="100" height="100" src={{ URL::asset('assets/img/foi.png') }} alt="Freedom of Information">
                </a>
              </div>
            </li>
            <li class="nav-item mb-2">
              <div class="col md-3">
                <a href="https://cvsu.edu.ph/" class="d-flex align-items-center mb-3 link-dark text-decoration-none" target="_blank" rel="noopener noreferrer">
                  <img width="100" height="100" src={{ URL::asset('assets/img/cvsulogo.png') }} alt="Cavite State University">
                </a>
              </div>
            </li>
          </ul>
        </div>

        <p>&copy; 2022 <strong>Barangay Punta Uno</strong> & <strong>Cavite State University</strong> | Cavite, Philippines
        </p>

      </div>
    </footer>
  </div>
  <hr>
  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong>Reveal</strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!--
      All the links in the footer should remain intact.
      You can delete the links only if you purchased the pro version.
      Licensing information: https://bootstrapmade.com/license/
      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Reveal
    -->
      Designed by <a href="https://bootstrapmade.com/" target="_blank" rel="noopener noreferrer">BootstrapMade</a>
    </div>
  </div>
</footer><!-- End Footer -->
  