@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Projects</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li>Projects</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
            @if( Auth::guest() || Auth::user()->admin == 0)
            <div class="row mb-2 text-center">
                @if (count($project) > 0)
                    @foreach ($project as $project1)
                        <div class="col-md-12">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <strong class="d-inline-block mb-2 text-primary h3">{{$project1->title}}</strong>
                                        <a href="projects/{{$project1->id}}">
                                            <img src="{{asset('images/' . $project1->image_path)}}" alt="image" class="d-block w-50" style="height:100%; margin-left:25%">
                                        </a>
                                        <p class="card-text mb-auto">{!!$project1->subject!!}</p>
                                    <div class="mb-1 text-muted">{{ $project1->created_at->format('F') }} {{ $project1->created_at->format('j') }}, {{ $project1->created_at->format('Y') }}</div>
                                        <a href="projects/{{$project1->id}}" class="stretched-link">Continue reading</a>
                                </div>
                            </div>
                        </div>     
                    @endforeach
                @else
                    <p>No projects yet!</p>
                @endif
            </div>    
            @else
            <button type="button" class="btn btn-primary" style="float: right"><a href="/projects/create" style="color:white">Post a project</a></button>
            
            <br><br><br>
            <div class="row mb-2 text-center">
                @if (count($project) > 0)
                    @foreach ($project as $project1)
                        <div class="col-md-12">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <strong class="d-inline-block mb-2 text-primary h3">{{$project1->title}}</strong>
                                        <a href="projects/{{$project1->id}}">
                                            <img src="{{asset('images/' . $project1->image_path)}}" alt="image" class="d-block w-50" style="height:100%; margin-left:25%">
                                        </a>
                                        <p class="card-text mb-auto">{!!$project1->subject!!}</p>
                                    <div class="mb-1 text-muted">{{ $project1->created_at->format('F') }} {{ $project1->created_at->format('j') }}, {{ $project1->created_at->format('Y') }}</div>
                                        <a href="projects/{{$project1->id}}" class="stretched-link">Continue reading</a>
                                </div>
                            </div>
                        </div>     
                    @endforeach
                @else
                    <p>No projects yet!</p>
                @endif
            </div>    
            @endif
            <div class="pagination justify-content-center">
                {{ $project->links()}}
            </div>
        </div>
      </section>
@endsection