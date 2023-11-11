@extends('layouts.app')

@section('content')
    

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Barangay Clearance</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li>Barangay Clearance</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
            You can apply and get the Barangay Clearance. 
            Barangay Clearance is one of the easiest documents you can get as a valid proof of your identity.
            It is a valid supporting document that can be used for several situations.
            <br><br>
            Certificate of Residency is one the Philippine government issued identification documents needed for 
            many important business, job, or personal transactions. You might need it for the following reasons:
            <br>
            <li>When you apply a job/employment.</li>
            <li>When you apply for a business permit.</li>
            <li>Opening a bank account.</li>
            <li>and any other important transactions...</li>
            <hr>
            <ul>
                <i>MUST READ BEFORE REQUESTING A DOCUMENT:</i>
                <li>Make sure all of the informations you enter is correct.</li>
                <li>Always check your <a href="/myrequests">request/s</a> if it is claimable at our barangay.</li>
                <li>All of your requested documents go to <a href="/myrequests">My request/s</a> of your account.</li>
            </ul>
            <hr>
            <div class="text-center">
                <button type="button" class="btn btn-primary"><a href="/clearance/create" style="color:white">Request Barangay Clearance</a></button>
            </div>
        </div>
    </section>
@endsection