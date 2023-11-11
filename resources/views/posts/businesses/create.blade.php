@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Promote a business</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li><a href="/businesses">Businesses</a></li>
              <li>Promote a business</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
        {!! Form::open(['action' => 'App\Http\Controllers\PostsControllers\BusinessController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                <h4>{{Form::label('title', 'Business Title')}}</h4>
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Business Title'])}}
            </div>
            <br>
            <input
                type='file'
                accept=".jpg, .PNG, .png, .JPG, .jpeg, .webp, .bmp"
                class=""
                name="image">
            <br><br>
            <div class="form-group">
                <h4>{{Form::label('subject', 'Business Subject')}}</h4>
                {{Form::text('subject', '', ['class' => 'form-control', 'placeholder' => 'Type your business subject here. e.g. Siomai Rice'])}}
                <br>
                <h4>{{Form::label('body', 'Business Description')}}</h4>
                {{Form::textarea('body', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Type your business description here.'])}}
            </div>
            <br>
            <div class="form-group">
              <h4>{{Form::label('link', 'Business Website/Social Media Links')}} <small style="font-size: 18px">(Optional)</small></h4>
              {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'If you have business link, you can put it here for promotion.'])}}
            </div>
            <br>
            {{-- Pending --}}
            {{Form::hidden('pending', 'true', ['class' => 'form-control'])}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
        </div>
      </section>
@endsection