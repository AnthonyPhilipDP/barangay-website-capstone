@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Events</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li>Events</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
            @if( Auth::guest() || Auth::user()->admin == 0)
            <div class="row mb-2 text-center">
                @if (count($event) > 0)
                    @foreach ($event as $event1)
                        <div class="col-md-12">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <strong class="d-inline-block mb-2 text-primary h3">{{$event1->title}}</strong>
                                        <a href="events/{{$event1->id}}">
                                            <img src="{{asset('images/' . $event1->image_path)}}" alt="image" class="d-block w-50" style="height:100%; margin-left:25%">
                                        </a>
                                        <p class="card-text mb-auto">{!!$event1->subject!!}</p>
                                    <div class="mb-1 text-muted">{{ $event1->created_at->format('F') }} {{ $event1->created_at->format('j') }}, {{ $event1->created_at->format('Y') }}</div>
                                        <a href="events/{{$event1->id}}" class="stretched-link">Continue reading</a>
                                </div>
                            </div>
                        </div>     
                    @endforeach
                @else
                    <p>No events yet!</p>
                @endif
            </div>    
            @else
            <button type="button" class="btn btn-primary" style="float: right"><a href="/events/create" style="color:white">Post an event</a></button>
            
            <br><br><br>
            <div class="row mb-2 text-center">
                @if (count($event) > 0)
                    @foreach ($event as $event1)
                        <div class="col-md-12">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <strong class="d-inline-block mb-2 text-primary h3">{{$event1->title}}</strong>
                                        <a href="events/{{$event1->id}}">
                                            <img src="{{asset('images/' . $event1->image_path)}}" alt="image" class="d-block w-50" style="height:100%; margin-left:25%">
                                        </a>
                                        <p class="card-text mb-auto">{!!$event1->subject!!}</p>
                                    <div class="mb-1 text-muted">{{ $event1->created_at->format('F') }} {{ $event1->created_at->format('j') }}, {{ $event1->created_at->format('Y') }}</div>
                                        <a href="events/{{$event1->id}}" class="stretched-link">Continue reading</a>
                                </div>
                            </div>
                        </div>     
                    @endforeach
                @else
                    <p>No events yet!</p>
                @endif
            </div>    
            @endif
            <div class="pagination justify-content-center">
                {{ $event->links()}}
            </div>
        </div>
      </section>
@endsection