@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>{{$establishment->title}}</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li><a href="/establishments">Establishments</a></li>
              <li>{{$establishment->title}}</li>
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
                    <img src="{{asset('images/' . $establishment->image_path)}}" alt="">
                  </div>

                </div>
              </div>
            </div>
  
            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3>Establishment information</h3>
                <ul>
                  <li><strong>Title</strong>: {{$establishment->title}}</li>
                  <li><strong>Subject</strong>: {{$establishment->subject}}</li>
                  @if( is_null($establishment->link) )
                  @else
                  <li><strong>Link</strong>: 
                    <a href="{{$establishment->link}}" target="_blank" rel="noopener noreferrer">{{$establishment->link}}</a>
                  </li>
                  @endif
                  <li><strong>Posted on</strong>: {{ $establishment->created_at->format('F') }} {{ $establishment->created_at->format('j') }}, {{ $establishment->created_at->format('Y') }}</li>  
                </ul>
              </div>
              <div class="portfolio-description">
                <h2>More details</h2>
                <p>
                    {!!$establishment->body!!}
                </p>
              </div>
              <div class="text-center">
              @if( Auth::guest() == false )
                @if( Auth::user()->admin != 1 )
                  @elseif( Auth::user()->admin == 1 )
                    <a href="/establishments/{{$establishment->id}}/edit">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    <br><br>
                    {!!Form::open(['action' => ['App\Http\Controllers\PostsControllers\EstablishmentsController@destroy', $establishment->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class'=>'btn btn-warning'])}}
                    {!! Form::close() !!}
                    <br>
                    {!! Form::open(['action' => ['App\Http\Controllers\PostsControllers\EstablishmentsController@pending', $establishment->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    {{-- Title --}}
                    {{Form::hidden('title', $establishment->title, ['class' => 'form-control'])}}
                    {{-- Body --}}
                    {{Form::hidden('body', $establishment->body, ['class' => 'form-control'])}}
                    {{-- Subject --}}
                    {{Form::hidden('subject', $establishment->subject, ['class' => 'form-control'])}}
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