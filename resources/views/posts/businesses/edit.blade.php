@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Edit this business promotion</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li><a href="/businesses">Businesses</a></li>
              <li>Edit</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
            {!! Form::open(['action' => ['App\Http\Controllers\PostsControllers\BusinessController@update', $business->id], 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $business->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div> 
            <div class="form-group">
                {{Form::label('subject', 'Subject')}}
                {{Form::text('subject', $business->subject, ['class' => 'form-control', 'placeholder' => 'Subject'])}}
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', $business->body, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div> 
            <br>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
        </div>
      </section>
@endsection