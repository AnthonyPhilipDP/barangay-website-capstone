@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Promote an establishment</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li><a href="/establishments">Establishments</a></li>
              <li>Promote an establishment</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
        {!! Form::open(['action' => 'App\Http\Controllers\PostsControllers\EstablishmentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                <h4>{{Form::label('title', 'Establishment Title')}}</h4>
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Establishment Title'])}}
            </div>
            <br>
            <input
                type='file'
                accept=".jpg, .PNG, .png, .JPG, .jpeg, .webp, .bmp"
                class=""
                name="image">
            <br><br>
            <div class="form-group">
              <h4>{{Form::label('subject', 'Establishment Subject')}}</h4>
                {{Form::text('subject', '', ['class' => 'form-control', 'placeholder' => 'Type your establishment subject here. e.g. Commercial Building'])}}
                <br>
                <h4>{{Form::label('body', 'Establishment Description')}}</h4>
                {{Form::textarea('body', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Type your establishment description here.'])}}
            </div> 
            <br>
            <div class="form-group">
              <h4>{{Form::label('link', 'Establishment Website/Social Media Links')}} <small style="font-size: 18px">(Optional)</small></h4>
              {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'If you have establishment link, you can put it here for promotion.'])}}
            </div>
            <br>
            {{-- Pending --}}
            {{Form::hidden('pending', 'true', ['class' => 'form-control'])}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
        </div>
      </section>
@endsection