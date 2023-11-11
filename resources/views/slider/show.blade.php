@extends('layouts.app')

@section('content')
    <br>
    <button type="button" class="btn btn-primary" style="float: left"><a href="{{ url()->previous() }}" style="color:white">Go Back</a></button>
    <br><br><hr>
    <h1 class="text-center">Slider image no. {{$slider->id}}</h1>
    <div class="container text-center">
        <img src="{{asset('images/' . $slider->image)}}" alt="image" class="d-block w-50" style="height:100%; margin-left:25%">
    </div>
    <hr>
    @if( Auth::guest() == false )
        @if( Auth::user()->admin != 1 )
        @elseif( Auth::user()->admin == 1 )
        {!!Form::open(['action' => ['App\Http\Controllers\SliderController@destroy', $slider->id], 'method' => 'POST', 'style' => 'float: right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
        {!! Form::close() !!}
        @endif
    @elseif( Auth::guest() )
    @endif
    <br><br>
@endsection