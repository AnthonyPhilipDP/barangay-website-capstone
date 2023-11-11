@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>My Promotion/s</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li>Promotions</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
            @if (count($business) > 0)
                @foreach ($business as $business1)
                    <div class="card p-3 mt-3 mb-3">
                        <h3><a href="businesses/{{$business1->id}}">Business Promotion</a></h3>
                        <small><strong>Business promotion</strong> requested on day {{ $business1->created_at->format('j') }} of {{ $business1->created_at->format('F') }}, {{ $business1->created_at->format('Y') }}.</small>
                        <small>Status: <strong>
                        @if( $business1->pending == 'true')
                            Pending, waiting for barangays' approval.
                        @else
                            Currently promoting in the website
                        @endif
                        </strong></small>
                    </div>
                @endforeach
            @endif

            @if (count($establishment) > 0)
                @foreach ($establishment as $establishment1)
                    <div class="card p-3 mt-3 mb-3">
                        <h3><a href="establishments/{{$establishment1->id}}">Establishment Promotion</a></h3>
                        <small><strong>Establishment promotion</strong> requested on day {{ $establishment1->created_at->format('j') }} of {{ $establishment1->created_at->format('F') }}, {{ $establishment1->created_at->format('Y') }}.</small>
                        <small>Status: <strong>
                            @if( $establishment1->pending == 'true')
                                Pending, waiting for barangays' approval.
                            @else
                            Currently promoting in the website
                            @endif
                        </strong></small>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="text-center">
            @if (count($establishment) > 0 || count($business) > 0)
            @else
                You have no Business and Establishment promotions requests.
            @endif
        </div>
        
      </section>
@endsection
