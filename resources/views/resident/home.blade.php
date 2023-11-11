@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    {{ __('Welcome!, you are now logged in') }}
                    </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row text-center">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <a href="/">
                                <button class="btn btn-primary btn-lg" type="button" title="Browse Homepage">
                                    Browse Homepage
                                </button>
                            </a>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    @if( Auth::user()->suffix == 0 )
                    Name: <strong>{{ Auth::user()->lastname }}, {{ Auth::user()->name }} {{ Auth::user()->middle }}. </strong>
                    @else
                    Name: <strong>{{ Auth::user()->lastname }} {{ Auth::user()->suffix }}., {{ Auth::user()->name }} {{ Auth::user()->middle }}.</strong>
                    @endif
                    <br>
                    Address: <strong>
                        {{-- If I have value --}}
                        @if(Auth::user()->block != null || Auth::user()->lot != null || Auth::user()->phase != null || Auth::user()->subdivision != null)
                        Block {{Auth::user()->block}} Lot {{Auth::user()->lot}} Phase {{Auth::user()->phase}} {{Auth::user()->subdivision}}, {{ Auth::user()->barangay }}, {{ Auth::user()->city_muni }}, {{ Auth::user()->province }}
                        {{-- If I dont have value --}}
                        @else
                            House no. {{Auth::user()->house}}, {{Auth::user()->street}}, {{ Auth::user()->barangay }}, {{ Auth::user()->city_muni }}, {{ Auth::user()->province }}
                        @endif
                    </strong>
                    <br>
                    Date of Birth: <strong>{{ Auth::user()->dob }}</strong>
                    <br>
                    Age: <strong>{{ Auth::user()->age }} years old</strong>
                    <br>
                    Place of Birth: <strong>{{ Auth::user()->pobcity }}, {{ Auth::user()->pobprovince }}</strong>
                    <br>
                    Civil Status: <strong>{{ Auth::user()->civilstatus }}</strong>
                    <br>
                    Citizenship: <strong style="text-transform: capitalize">{{ Auth::user()->citizenship }}</strong>
                </div>
                <div class="container text-center">
                    <div class="container">
                        Promote your business or establishment?
                    </div>
                    <div class="container">
                        <div class="container">
                            <a href="/businesses/create">
                                <button class="btn btn-info" type="button" title="Promote business">
                                    Business
                                </button>
                            </a>
                        </div>
                        <br>
                        <div class="container">
                            <a href="/establishments/create">
                                <button class="btn btn-info" type="button" title="Promote establishment">
                                    Establishment
                                </button>
                            </a>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
