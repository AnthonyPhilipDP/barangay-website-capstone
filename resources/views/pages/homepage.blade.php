@extends('layouts.app')

@section('content')
<style>
    img {
        width: 100%;
        height: 450px;
    }
</style>
    <div class="row">
        <div class="container col-xxl-8 py-4">
            <div class="row flex-lg-row-reverse align-items-center">
                <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{asset('images/essentials/Punta_logo.png')}}" alt="image" class="d-block mx-lg-auto img-fluid" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Welcome to Barangay Punta Uno Website!</h1>
                <i class="lead">The official website of barangay <strong>Punta Uno</strong>, 
                    login to experience the offered online services of our barangay.
                    Register an account for free if you don't have an account.
                </i>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="/login">
                    <button type="button" class="btn btn-outline-primary btn-lg px-4 me-md-2" style="border-color:green; color: green;">Login</button>
                    </a>
                    <a href="/login">
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4" style="border-color:purple; color: purple;">Register</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center mt-4 mb-4">
        <div class="col-lg-4">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm bg-light h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h2 class="fw-normal fw-bold">Mission</h2>
                    <i>Isang Barangay na nagtutulong-tulong na mai-angat ang antas ng pamumuhay tungo sa kaunlaran at 
                    patuloy na itaguyod ang kapayapaan at katahimikan ng buong pamayanan.</i>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm bg-light h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h2 class="fw-normal fw-bold">Vision</h2>
                    <i>Maka-diyos at maka-taong paglilingkod at panunungkulan, na buo ang loob sa 
                        pakikibaka at nagtitiwala sa lakas ng pagkakaisa ng pamayanan sa lahat ng oras ng pangangailangan.</i>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm bg-light h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h2 class="fw-normal fw-bold">Goals</h2>
                    <i>Isang Barangay na nagtutulong-tulong na mai-angat ang antas ng pamumuhay 
                        tungo sa kaunlaran at patuloy na itaguyod ang kapayapaan at katahimikan ng buong pamayanan.</i>
                </div>
            </div>
        </div>
    </div>
    <br>
    {{-- Posts --}}
    {{-- Achievements --}}
    {{-- <div class="row mb-2 text-center">
        @if($news != null)
            <div class="col-md-12" style="color: white">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm bg-light h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary h3">Latest Achievement of the barangay</strong>
                            <a href="news/{{$news->id}}">
                                <img src="{{asset('images/' . $news->image_path)}}" alt="image" class="d-block w-50" style="height:100%; margin-left:25%">
                            </a>
                            <p class="card-text mb-auto">{!!$news->subject!!}</p>
                            <a href="news/{{$news->id}}" class="stretched-link">Continue reading</a>
                        <div class="mb-1 text-muted">{{ $news->created_at->format('F') }} {{ $news->created_at->format('j') }}, {{ $news->created_at->format('Y') }}</div>
                    </div>
                </div>
            </div>
        @else
        <div class="col-md-4">
            Nothing.
        </div>
        @endif
    </div> --}}
    {{-- News --}}
    <div class="row mb-2 text-center">
        @if($news != null)
            <div class="col-md-8">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm bg-light h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary h3">{{$news->title}}</strong>
                            <a href="news/{{$news->id}}">
                                <img src="{{asset('images/' . $news->image_path)}}" alt="image" class="d-block w-100">
                            </a>
                            <p class="card-text mb-auto">{!!$news->subject!!}</p>
                            <a href="news/{{$news->id}}" class="stretched-link">Continue reading</a>
                        <div class="mb-1 text-muted">{{ $news->created_at->format('F') }} {{ $news->created_at->format('j') }}, {{ $news->created_at->format('Y') }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        @else
        <div class="col-md-4">
            Nothing.
        </div>
        @endif
    </div>
    {{-- Announcements --}}
    <div class="row mb-2 text-center">
        @if($announcement != null)
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm bg-light h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary h3">{{$announcement->title}}</strong>
                            <a href="announcements/{{$announcement->id}}">
                                <img src="{{asset('images/' . $announcement->image_path)}}" alt="image" class="d-block w-100">
                            </a>
                            <p class="card-text mb-auto">{!!$announcement->subject!!}</p>
                            <a href="announcements/{{$announcement->id}}" class="stretched-link">Continue reading</a>
                        <div class="mb-1 text-muted">{{ $announcement->created_at->format('F') }} {{ $announcement->created_at->format('j') }}, {{ $announcement->created_at->format('Y') }}</div>
                    </div>
                </div>
            </div>    
        @else
        <div class="col-md-4">
            Nothing.
        </div>
        @endif
    </div>
    {{-- Events --}}
    <div class="row mb-2 text-center">
        @if($event != null)
            <div class="col-md-8">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm bg-light h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary h3">{{$event->title}}</strong>
                            <a href="events/{{$event->id}}">
                                <img src="{{asset('images/' . $event->image_path)}}" alt="image" class="d-block w-100">
                            </a>
                            <p class="card-text mb-auto">{!!$event->subject!!}</p>
                            <a href="events/{{$event->id}}" class="stretched-link">Continue reading</a>
                        <div class="mb-1 text-muted">{{ $event->created_at->format('F') }} {{ $event->created_at->format('j') }}, {{ $event->created_at->format('Y') }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        @else
        <div class="col-md-4">
            Nothing.
        </div>
        @endif
    </div>
    {{-- Projects --}}
    <div class="row mb-2 text-center">
        @if($project != null)
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm bg-light h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary h3">{{$project->title}}</strong>
                            <a href="projects/{{$project->id}}">
                                <img src="{{asset('images/' . $project->image_path)}}" alt="image" class="d-block w-100">
                            </a>
                            <p class="card-text mb-auto">{!!$event->subject!!}</p>
                            <a href="projects/{{$project->id}}" class="stretched-link">Continue reading</a>
                        <div class="mb-1 text-muted">{{ $project->created_at->format('F') }} {{ $project->created_at->format('j') }}, {{ $project->created_at->format('Y') }}</div>
                    </div>
                </div>
            </div>
        @else
        <div class="col-md-4">
            Nothing.
        </div>
        @endif
    </div>
@endsection