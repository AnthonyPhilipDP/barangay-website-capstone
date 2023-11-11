@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>My Documents Request/s</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li>Document Request/s</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
            @if (count($latest) > 0)
                @foreach ($latest as $clearance1)
                    <div class="card p-3 mt-3 mb-3">
                        <h3>{{ $clearance1->docuname }}</h3>
                        <small>Requested on {{ $clearance1->created_at }}</small>
                        {{-- <small><strong>Barangay Clearance</strong> requested on {{ $clearance1->created_at->format('j') }} of {{ $clearance1->created_at->format('F') }}, {{ $clearance1->created_at->format('Y') }}.</small> --}}
                        <small>Status: <strong>
                        @if( $clearance1->done == 'true')
                            Document has been claimed.
                        @elseif( $clearance1->notified == 'false')
                            Pending, please wait your notification in your email.
                        @else
                            Your document is ready and waiting to be pick up at the barangay.
                        @endif
                        </strong></small>
                    </div>
                @endforeach
                @else
                You have no document request.
            @endif
{{-- 
            @if (count($indigency) > 0)
                @foreach ($indigency as $certification)
                    <div class="card p-3 mt-3 mb-3">
                        <h3>Barangay Certification (Indigency)</h3>
                        <small><strong>Barangay Certification (Indigency)</strong> requested on {{ $certification->created_at->format('j') }} of {{ $certification->created_at->format('F') }}, {{ $certification->created_at->format('Y') }}.</small>
                        <small>Status: <strong>
                        @if( $certification->done == 'true')
                            Document has been claimed.
                        @elseif( $certification->notified == 'false')
                            Pending, please wait your notification in your email.
                        @else
                            Your document is ready and waiting to be pick up at the barangay.
                        @endif
                            </strong></small>
                    </div>
                @endforeach
            @endif

            @if (count($businessclearance) > 0)
                @foreach ($businessclearance as $businessclearances1)
                    <div class="card p-3 mt-3 mb-3">
                        <h3>Barangay Business Clearance</h3>
                        <small><strong>Barangay Business Clearance</strong> requested on {{ $businessclearances1->created_at->format('j') }} of {{ $businessclearances1->created_at->format('F') }}, {{ $businessclearances1->created_at->format('Y') }}.</small>
                        <small>Status: <strong>
                        @if( $businessclearances1->done == 'true')
                            Document has been claimed.
                        @elseif( $businessclearances1->notified == 'false')
                            Pending, please wait your notification in your email.
                        @else
                            Your document is ready and waiting to be pick up at the barangay.
                        @endif
                            </strong></small>
                    </div>
                @endforeach
            @endif

            @if (count($residency) > 0)
                @foreach ($residency as $residency1)
                    <div class="card p-3 mt-3 mb-3">
                        <h3>Barangay Residency</h3>
                        <small><strong>Barangay Residency</strong> requested on {{ $residency1->created_at->format('j') }} of {{ $residency1->created_at->format('F') }}, {{ $residency1->created_at->format('Y') }}.</small>
                        <small>Status: <strong>
                            @if( $residency1->done == 'true')
                            Document has been claimed.
                        @elseif( $residency1->notified == 'false')
                            Pending, please wait your notification in your email.
                        @else
                            Your document is ready and waiting to be pick up at the barangay.
                        @endif
                            </strong></small>
                    </div>
                @endforeach
            @endif --}}

            {{-- <div class="text-center">
                @if (count($clearance) > 0 || count($indigency) > 0 || count($businessclearance) > 0 || count($residency) > 0)
                @else
                    You have no document requests.
                @endif
            </div> --}}

      </section>
@endsection
