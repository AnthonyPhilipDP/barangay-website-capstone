@extends('layouts.app')

@section('content')
    

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Business Clearance</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li>Business Clearance</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
    You can apply and get the Business Clearance in our barangay website. 
    Barangay Business Clearance is one of the permits or documents required when 
    registering a new business in the Philippines.
    <br><br>
    This certificate is also needed when renewing your expired Mayor's Permit or Business License, 
    changing a new business location, and changing a new business commercial name.
    <br><hr>
    <ul>
        <i>MUST READ BEFORE REQUESTING A DOCUMENT:</i>
        <li>Make sure all of the informations you enter is correct.</li>
        <li>Always check your <a href="/myrequests">request/s</a> if it is claimable at our barangay.</li>
        <li>All of your requested documents go to <a href="/myrequests">My request/s</a> of your account.</li>
    </ul>
    <hr>
        <div class="text-center">
            <a href="/businessclearance/create" style="color:white">
                <button type="button" class="btn btn-primary">Request Business Clearance</button>
            </a>
        </div>
    </div>
    </section>
@endsection