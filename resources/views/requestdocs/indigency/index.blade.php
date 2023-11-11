@extends('layouts.app')

@section('content')
    

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Barangay Certification (Indigency)</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li>Barangay Certification</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
            You can apply and get the Certification (Indigency) in our barangay website. 
            Certificate of Indigency is issued to less fortunate resident who desires to avail assistance such as Scholarship, 
            Medical Services, Free Legal Aid from Public Attorney's Office (PAO) and other purposes.
            <br><br>
            A Certificate of Indigency is a document that are sometimes required 
            by the Philippine government or a private institution as proof of an individual's financial situation.
            <br><hr>
            <ul>
                <i>MUST READ BEFORE REQUESTING A DOCUMENT:</i>
                <li>Make sure all of the informations you enter is correct.</li>
                <li>Always check your <a href="/myrequests">request/s</a> if it is claimable at our barangay.</li>
                <li>All of your requested documents go to <a href="/myrequests">My request/s</a> of your account.</li>
            </ul>
            <hr>
            <div class="text-center">
                <a href="/indigency/create" style="color:white">
                    <button type="button" class="btn btn-primary">Request Certification (Indigency)</button>
                </a>
            </div>
        </div>
    </section>
@endsection