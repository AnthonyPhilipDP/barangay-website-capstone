@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>{{$achievement->title}}</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li><a href="/achievements">Achievements</a></li>
              <li>{{$achievement->title}}</li>
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
                    <img src="{{asset('images/' . $achievement->image_path)}}" alt="">
                  </div>

                </div>
              </div>
            </div>
  
            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3>Achievement information</h3>
                <ul>
                  <li><strong>Title</strong>: {{$achievement->title}}</li>
                  <li><strong>Subject</strong>: {{$achievement->subject}}</li>
                  <li><strong>Posted on</strong>: {{ $achievement->created_at->format('F') }} {{ $achievement->created_at->format('j') }}, {{ $achievement->created_at->format('Y') }}</li>  
                </ul>
              </div>
              <div class="portfolio-description">
                <h2>More details</h2>
                <p>
                    {!!$achievement->body!!}
                </p>
              </div>
              <div class="text-center">
              @if( Auth::guest() == false )
                @if( Auth::user()->admin != 1 )
                @elseif( Auth::user()->admin == 1 )
                <a href="/achievements/{{$achievement->id}}/edit">
                    <button type="button" class="btn btn-primary">Edit</button>
                </a>
                <br><br>
                    {!!Form::open(['action' => ['App\Http\Controllers\PostsControllers\AchievementsController@destroy', $achievement->id], 'method' => 'POST'])!!}
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