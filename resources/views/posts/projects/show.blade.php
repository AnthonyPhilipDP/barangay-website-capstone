@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>{{$project->title}}</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li><a href="/projects">Projects</a></li>
              <li>{{$project->title}}</li>
            </ol>
          </div>
  
        </div>
      </section><!-- Breadcrumbs Section -->
  
      <!-- ======= Portfolio Details Section ======= -->
      <section id="portfolio-details" class="portfolio-details">
        <div class="container">
  
          <div class="row gy-4">
  
            <div class="col-lg-8">
              <div class="portfolio-details-slider swiper">
                <div class="swiper-wrapper align-items-center">
  
                  <div class="swiper">
                    <img src="{{asset('images/' . $project->image_path)}}" alt="">
                  </div>

                </div>
              </div>
            </div>
  
            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3>Project information</h3>
                <ul>
                  <li><strong>Title</strong>: {{$project->title}}</li>
                  <li><strong>Subject</strong>: {{$project->subject}}</li>
                  <li><strong>Posted on</strong>: {{ $project->created_at->format('F') }} {{ $project->created_at->format('j') }}, {{ $project->created_at->format('Y') }}</li>  
                </ul>
              </div>
              <div class="portfolio-description">
                <h2>More details</h2>
                <p>
                    {!!$project->body!!}
                </p>
              </div>
              <div class="text-center">
              @if( Auth::guest() == false )
                @if( Auth::user()->admin != 1 )
                @elseif( Auth::user()->admin == 1 )
                <a href="/projects/{{$project->id}}/edit">
                    <button type="button" class="btn btn-primary">Edit</button>
                </a>
                <br><br>
                    {!!Form::open(['action' => ['App\Http\Controllers\PostsControllers\ProjectsController@destroy', $project->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
                    @endif
                @elseif( Auth::guest() )
                @endif
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Portfolio Details Section -->
@endsection