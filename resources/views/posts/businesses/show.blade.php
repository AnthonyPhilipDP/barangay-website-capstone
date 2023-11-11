@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>{{$business->title}}</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li><a href="/businesses">Businesses</a></li>
              <li>{{$business->title}}</li>
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
                    <img src="{{asset('images/' . $business->image_path)}}" alt="">
                  </div>

                </div>
              </div>
            </div>
  
            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3>Business information</h3>
                <ul>
                  <li><strong>Title</strong>: {{$business->title}}</li>
                  <li><strong>Subject</strong>: {{$business->subject}}</li>
                  @if( is_null($business->link) )
                  @else
                  <li><strong>Link</strong>: 
                    <a href="{{$business->link}}" target="_blank" rel="noopener noreferrer">{{$business->link}}</a>
                  </li>
                  @endif
                  <li><strong>Posted on</strong>: {{ $business->created_at->format('F') }} {{ $business->created_at->format('j') }}, {{ $business->created_at->format('Y') }}</li>  
                </ul>
              </div>
              <div class="portfolio-description">
                <h2>More details</h2>
                <p>
                    {!!$business->body!!}
                </p>
              </div>
              <div class="text-center">
              @if( Auth::guest() == false )
                @if( Auth::user()->admin != 1 )
                  @elseif( Auth::user()->admin == 1 )
                    <a href="/businesses/{{$business->id}}/edit">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    <br><br>
                    {!!Form::open(['action' => ['App\Http\Controllers\PostsControllers\BusinessController@destroy', $business->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class'=>'btn btn-warning'])}}
                    {!! Form::close() !!}
                    <br>
                    {!! Form::open(['action' => ['App\Http\Controllers\PostsControllers\BusinessController@pending', $business->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    {{-- Title --}}
                    {{Form::hidden('title', $business->title, ['class' => 'form-control'])}}
                    {{-- Body --}}
                    {{Form::hidden('body', $business->body, ['class' => 'form-control'])}}
                    {{-- Subject --}}
                    {{Form::hidden('subject', $business->subject, ['class' => 'form-control'])}}
                    @if(Auth::user()->admin == 1)
                      {{Form::hidden('_method', 'PATCH')}}
                      {{Form::submit('Approved this promotion', ['class'=>'btn btn-success'])}}
                      {!! Form::close() !!}
                    @endif
                  @endif
                @elseif( Auth::guest() )
              @endif
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Portfolio Details Section -->
@endsection