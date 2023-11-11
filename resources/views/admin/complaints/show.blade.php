@extends('layouts.app')

@section('content')
    <button type="button" class="btn btn-primary" style="float: left"><a href="{{ url()->previous() }}" style="color:white">Go Back</a></button>
    
    <br><br>
    <h1>Blotter {{$complaint->id}}</h1>
    <hr>
    <div>
    {!! Form::open(['action' => 'App\Http\Controllers\BarangayControllers\ComplaintsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
        Maay sumbong/Nagrereklamo: <br><b>{{$complaint->nagrereklamo}}</b><br>
        <label for="nagrereklamo" class=" col-form-label text-md-end">{{ __('May sumbong/Nagrereklamo') }}</label>
        <input id="nagrereklamo" type="text" class="form-control @error('nagrereklamo') is-invalid @enderror" name="nagrereklamo" value="{{ $complaint->nagrereklamo }}" required autocomplete="name" autofocus>
        </div>
        Tirahan: <br><b>{{$complaint->address}}</b><br>
        Cellphone No.: <br><b>{{$complaint->number}}</b><br>
        Ipinagsusumbong/Inirereklamo: <br><b>{{$complaint->inirereklamo}}</b><br>
        Tirahan: <br><b>{{$complaint->address1}}</b><br>
        Cellphone No.: <br><b>{{$complaint->number1}}</b><br>
        Usapin ukol sa: <br><b>{{$complaint->subject}}</b><br>
        Salaysay: <br><b>{!!$complaint->salaysay!!}</b>
    </div>
    <hr>
    <small>Petsa at Oras: <b>{{$complaint->created_at}}</b></small>
    <hr>
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <!--Admin-->
    @if(Auth::guest())
    @elseif(Auth::user()->id !== 1)
    @else
    <a href="/complaints/{{$complaint->id}}/edit" class="btn btn-primary">Edit</a>
    {!!Form::open(['action' => ['App\Http\Controllers\BarangayControllers\ComplaintsController@destroy', $complaint->id], 'method' => 'POST', 'style' => 'float: right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
    {!! Form::close() !!}
    @endif
@endsection