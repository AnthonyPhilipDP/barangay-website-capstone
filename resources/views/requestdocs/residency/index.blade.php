@extends('layouts.app')

@section('content')
    

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Barangay Certificate of Residency</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li>Certificate of Residency</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
            You can apply and get the Barangay Certificate of Residency in our barangay website. 
            This document certifies that you are a good resident in the barangay and have a good moral character. 
            It also signifies that you do not have any negative record and this is necessary in any official transactions.
            <br><br>
            Certificate of Residency is one the Philippine government issued identification documents needed for 
            many important business, job, or personal transactions. You might need it for the following reasons:
            <br>
            <li>When you apply a job/employment.</li>
            <li>When you apply or open a bank account.</li>
            <li>Opening a business establishment.</li>
            <li>Other business or financial transactions such as lending, loan or financing.</li>
            <li>Certify that you are living or residing in a certain barangay.</li>
            <li>and any other important transactions...</li>
            <hr>
            <ul>
                <i>MUST READ BEFORE REQUESTING A DOCUMENT:</i>
                <li>Make sure all of the informations you enter is correct.</li>
                {{-- <li>You cannot request the same document until the document is expired.</li> --}}
                <li>Always check your <a href="/myrequests">request/s</a> if it is claimable at our barangay.</li>
                <li>All of your requested documents go to <a href="/myrequests">My request/s</a> of your account.</li>
            </ul>
            <hr>
            <div class="text-center">
                <a href="/residency/create">
                    <button class="btn btn-primary" style="color:white">Request a Certificate of Residency</button>
                </a>
            </div>
        </div>
    </section>
@endsection