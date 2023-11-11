@extends('layouts.app')

@section('content')
<style>
    img {
        width: 100%;
        height: 450px;
    }
</style>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8 ps-3 mb-3 p-0">
                                <h2>Slider</h2>
                            </div>
                            @if( Auth::guest() == false )
                                @if( Auth::user()->admin != 1 )
                                @elseif( Auth::user()->admin == 1 )
                                <div class="col-md-4 add-slider mb-3 p-0">
                                    <a href="{{ route('slider.create') }}" class="btn btn-lg btn-primary float-end me-4">Add new image</a>
                                </div>
                                @endif
                            @elseif( Auth::guest() )
                            @endif
                        </div>
                    </div>
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner ">
                            @foreach($sliders as $slider)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <div class="slider-image text-center">
                                        <a href="slider/{{$slider->id}}">
                                            <img src="{{  asset('images/'.$slider->image) }}" class="d-inline-block border text-center rounded" style="height: 100%" alt="{{ $slider->image }}">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection