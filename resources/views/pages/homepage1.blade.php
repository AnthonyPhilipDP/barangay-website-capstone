@extends('layouts.app')

@section('content')
    <!-- ======= Testimonials Section ======= -->
  <section id="testimonials">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <div class="jumbotron">
        {{-- <h2>Barangay Updates</h2> --}}
        {{-- <p>News, events, projects, achievements, and announcements in our barangay are posted here at our official website to keep the residents updated.</p> --}}
            @if(is_null($latestpost))
                <div class="alert alert-warning mt-5">
                    <strong>Sorry!</strong> No post yet.
                </div>                                      
            @else
              <div class="testimonial-item">
                {{-- <p>
                  {{ $news->subject }}
                </p> --}}
                <h3>{{ $latestpost->title }}</h3>
                <p>{{ $latestpost->subject }}</p>
                <img src="{{asset('images/' . $latestpost->image_path)}}" class="jumbotron-img" alt="">
                <br><br>
                {{-- <h4>{{ $latestpost->created_at->format('F') }} {{ $latestpost->created_at->format('j') }}, {{ $latestpost->created_at->format('Y') }}</h4> --}}
                <br>
              </div>
            @endif
        </div>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
          @if (count($post) > 0)
            @foreach ($post as $post1)
              <div class="swiper-slide">
                @if(is_null($post1))
                  <div class="alert alert-warning mt-5">
                      <strong>Sorry!</strong> No post yet.
                  </div>                                      
                @else
                  <div class="testimonial-item">
                    <img src="{{asset('images/' . $post1->image_path)}}" class="testimonial-img" alt="">
                    <h3>{{ $post1->title }}</h3>
                    <p>{{ $post1->subject }}</p>
                    {{-- <h4>{{ $post1->created_at }}</h4> --}}
                  </div>
                @endif
              </div>
            @endforeach
            @else
              No post yet, latest post will be posted here.
          @endif
        </div><!-- End testimonial item -->
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->
  {{-- <!-- ======= hero Section ======= -->
  <section id="hero">

    <div class="hero-content" data-aos="fade-up">
      <div>
        @if( Auth::guest() )
          <a href="/login" class="btn-get-started scrollto">Login</a>
          <a href="/register" class="btn-projects scrollto">Register</a>
        @endif
      </div>
    </div>

    <div class="hero-slider swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide img-fluid" style="background-image: url('assets/img/banner.png');"></div>
        <div class="swiper-slide img-fluid" style="background-image: url('assets/img/banner1.png');"></div>
      </div>
    </div>
    
  </section><!-- End Hero Section --> --}}
  <!-- ======= About Section ======= -->
  <section id="about">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-6 about-img">
          {{-- <img src="assets/img/punta-logo.png" alt=""> --}}
        </div>

        <div class="col-lg-6 content">
          <h2>Barangay Punta Uno</h2>
          <h3>Punta I is a barangay in the municipality of Tanza, in the province of Cavite. Its population as determined by the 2020 Census was 20,403. This represented 6.54% of the total population of Tanza</h3>
          <ul>
            <li><i class="bi bi-check-circle"></i> A Barangay that helps each other to raise the standard of living towards prosperity and
              continue to promote the peace and tranquility of the entire community.</li>
            <li><i class="bi bi-check-circle"></i> Godly and humane service and office, with full heart
              struggle and trust in the strength of community unity in all times of need.</li>
            <li><i class="bi bi-check-circle"></i> Have equal opportunity to obtain basic needs through a good governance. 
              Guide the people to be educated in economic programs to lift them out of poverty.</li>
          </ul>
        </div>
      </div>
    </div>
  </section><!-- End About Section -->

  <div class="text-center">
    <img src="{{asset('assets/img/orgchart.jpg')}}" alt="image" style="width: 1000px; height: auto;" class="img-fluid"><br>
  </div>

  <!-- ======= Services Section ======= -->
  <section id="services">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Services</h2>
        <p>Barangay Punta Uno offers free services exclusively for the barangay residents.</p>
      </div>

      <div class="row gy-4">

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="box">
            <div class="icon"><i class="bi bi-briefcase"></i></div>
            <h4 class="title">Promote your Business</h4>
            <p class="description">Business owners around Barangay Punta Uno can promote their businesses in our website.</p>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <div class="box">
            <div class="icon"><i class="bi bi-building"></i></i></div>
            <h4 class="title">Promote your Establishment</h4>
            <p class="description">Establishment owners around Barangay Punta Uno can promote their establishments in our website.</p>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
          <div class="box">
            <div class="icon"><i class="bi bi-card-text"></i></i></div>
            <h4 class="title">Request Documents</h4>
            <p class="description">Residents of the barangay can request documents they need such as Barangay Clearance, Residency, Indigency, and Business Clearance.</p>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
          <div class="box">
            <div class="icon"><i class="bi bi-exclamation-circle"></i></i></div>
            <h4 class="title">File a complaint</h4>
            <p class="description">Let your voice be heard even if you are away at the barangay office especially when you have complaints.</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Services Section -->

  <!--copied here-->

  <!-- ======= Call To Action Section ======= -->
  <section id="call-to-action">
    <div class="container" data-aos="zoom-out">
      <div class="row">
        <div class="col-lg-9 text-center text-lg-start">
          <h3 class="cta-title">Do you have a complaint?</h3>
          <p class="cta-text">Voice your complaint, click file a complaint button to discuss it to the barangay, we will review it, notify you by email, and take action accordingly.</p>
        </div>
        <div class="col-lg-3 cta-btn-container text-center">
          <a class="cta-btn align-middle" href="/complaints/create">File a Complaint</a>
        </div>
      </div>
    </div>
  </section><!-- End Call To Action Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Contact Us</h2>
        <p>Barangay Punta Uno are open for all inquiries in business hours.</p>
      </div>

      <div class="row contact-info">

        <div class="col-md-4">
          <div class="contact-address">
            <i class="bi bi-geo-alt"></i>
            <h3>Address</h3>
            <address>Tanza, Cavite</address>
          </div>
        </div>

        <div class="col-md-4">
          <div class="contact-phone">
            <i class="bi bi-phone"></i>
            <h3>Contact Number</h3>
            <p><a href="tel:+155895548855">+63 916 667 4675</a></p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="contact-email">
            <i class="bi bi-envelope"></i>
            <h3>Email</h3>
            <p><a href="mailto:info@example.com">barangay.puntauno@gmail.com</a></p>
          </div>
        </div>

      </div>
    </div>

    <div class="container mb-4">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.2972862531333!2d120.85774581525853!3d14.352199586962401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33962b1aefc826c9%3A0xf756b3973887e30c!2sBarangay%20Hall%20Punta%20I!5e0!3m2!1sen!2sph!4v1670901608666!5m2!1sen!2sph" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

    </div>
  </section><!-- End Contact Section -->
@endsection
