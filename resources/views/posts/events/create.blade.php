@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Post an event</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li><a href="/events">Events</a></li>
              <li>Post an event</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
        {!! Form::open(['action' => 'App\Http\Controllers\PostsControllers\EventsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <input
                type='file'
                accept=".jpg, .PNG, .png, .JPG, .jpeg, .webp, .bmp"
                class=""
                name="image">
            <div class="form-group">
                {{Form::label('subject', 'Subject')}}
                {{Form::text('subject', '', ['class' => 'form-control', 'placeholder' => 'Subject'])}}
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div> 
            <br>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
        </div>
      </section>
@endsection