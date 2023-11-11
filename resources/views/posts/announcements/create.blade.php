@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Post an announcement</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li><a href="/announcements">Announcements</a></li>
              <li>Post an announcement</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
        {!! Form::open(['action' => 'App\Http\Controllers\PostsControllers\AnnouncementsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group mb-2">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <input
                type='file'
                id="files"
                class="hidden"
                accept=".jpg, .PNG, .png, .JPG, .jpeg, .webp, .bmp"
                name="image"><br>
                <label for="files" style="color:dimgray">Accepting maximum image size is:
                  <br> 1920 x 1080 in pixels or
                  <br> 6.4 x 3.6 in inches
                  <br> Landscape
                  <br> Go to <a href="https://imageresizer.com/" target="_blank">Image Resizer</a> to resize your image.
                </label>
            <div class="form-group mt-2">
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