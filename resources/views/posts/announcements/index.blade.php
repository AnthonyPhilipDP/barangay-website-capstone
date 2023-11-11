@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Announcements</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li>Announcements</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
            @if( Auth::guest() || Auth::user()->admin == 0)
            <div class="row mb-2 text-center">
                @if (count($announcement) > 0)
                    @foreach ($announcement as $announcements)
                        <div class="col-md-12">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <strong class="d-inline-block mb-2 text-primary h3">{{$announcements->title}}</strong>
                                        <a href="announcements/{{$announcements->id}}">
                                            <img src="{{asset('images/' . $announcements->image_path)}}" alt="image" class="d-block w-50" style="height:100%; margin-left:25%">
                                        </a>
                                        <p class="card-text mb-auto">{!!$announcements->subject!!}</p>
                                    <div class="mb-1 text-muted">{{ $announcements->created_at->format('F') }} {{ $announcements->created_at->format('j') }}, {{ $announcements->created_at->format('Y') }}</div>
                                        <a href="announcements/{{$announcements->id}}" class="stretched-link">Continue reading</a>
                                </div>
                            </div>
                        </div>     
                    @endforeach
                @else
                    <p>No announcements yet!</p>
                @endif
            </div>    
            @else
            <button type="button" class="btn btn-primary" style="float: right"><a href="/announcements/create" style="color:white">Post an announcement</a></button>
            
            <br><br><br>
            <div class="row mb-2 text-center">
                @if (count($announcement) > 0)
                    @foreach ($announcement as $announcements)
                        <div class="col-md-12">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <strong class="d-inline-block mb-2 text-primary h3">{{$announcements->title}}</strong>
                                        <a href="announcements/{{$announcements->id}}">
                                            <img src="{{asset('images/' . $announcements->image_path)}}" alt="image" class="d-block w-50" style="height:100%; margin-left:25%">
                                        </a>
                                        <p class="card-text mb-auto">{!!$announcements->subject!!}</p>
                                    <div class="mb-1 text-muted">{{ $announcements->created_at->format('F') }} {{ $announcements->created_at->format('j') }}, {{ $announcements->created_at->format('Y') }}</div>
                                        <a href="announcements/{{$announcements->id}}" class="stretched-link">Continue reading</a>
                                </div>
                            </div>
                        </div>     
                    @endforeach
                @else
                    <p>No announcements yet!</p>
                @endif
            </div>    
            @endif
            <div class="pagination justify-content-center">
                {{ $announcement->links()}}
            </div>
        </div>
      </section>
@endsection