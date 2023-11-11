@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <br>
            <div class="indigency" style="align-content: center">     
                <div class="indigencycontent">
                {!! Form::open(['action' , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                <label style="text-transform:uppercase">To Whom It May Concern:</label><br><br>
                {{-- @if($indigency->house != null)
                    I have value
                @else                                   ///checking if have hasValue okay?
                    I dont have value
                @endif --}}
                @if($indigency->suffix == 0)
                    &emsp;&emsp;&emsp;This is to certify that <label class="name"><strong>{{$indigency->name}} {{$indigency->middle}}. {{$indigency->lastname}}</strong></label>
                    , of legal age ({{$indigency->dob}} - {{$indigency->pobcity}}, {{$indigency->pobprovince}}), {{$indigency->civilstatus}}, {{$indigency->citizenship}} citizen
                    and a registered RBI member of 
                    {{-- If I have value --}}
                    @if($indigency->block != null || $indigency->lot != null || $indigency->phase != null || $indigency->subdivision != null)
                    Block {{$indigency->block}} Lot {{$indigency->lot}} Phase {{$indigency->phase}} {{$indigency->subdivision}},
                    {{-- If I dont have value --}}
                    @else
                        House no. {{ $indigency->house }}, {{ $indigency->street }}
                    @endif
                    {{$indigency->barangay}}, {{$indigency->city_muni}}, {{$indigency->province}}.
                    This further certifies that as per records of 
                    census in the barangay, she/he and her/his family/next of kin are known to me to be  
                    residents in this Barangay since <i><strong>{{$indigency->los}}</strong></i>
                    of good moral character and one of <i><strong>indigent</strong></i> families.
                    <br><br>
                    &emsp;&emsp;&emsp;This certification is being issued upon the request of said party for {{$indigency->purpose}} Requirements purposes.
                    <br><br>
                    &emsp;&emsp;&emsp;Issued this day {{ $indigency->created_at->format('j') }} of {{ $indigency->created_at->format('F') }}, {{ $indigency->created_at->format('Y') }}.
                    <br>
                    {{-- //&emsp;&emsp;Given this day {{ $goodmoral->created_at->format('d') }} of {{ $monthName }}, {{ $goodmoral->created_at->format('Y') }}. --}}
                @else
                    &emsp;&emsp;&emsp;This is to certify that <label class="underline mt-2" style="text-transform: uppercase"><strong>&emsp;{{$indigency->name}} {{$indigency->middle}}. {{$indigency->lastname}} {{$indigency->suffix}}&emsp;</strong></label> is known to be of the following:<br><br>
                @endif
                    <br><br>
                    {{-- Signature --}}
                    <label class="indigencysign"><img src="{{asset('images/templates/CAPT.png')}}"></label>
                    <br><br><br>
                    <label class="capt">Hon. ANACLETO S. CLAMOSA
                    <br>
                    Punong Barangay
                    </label>
                </div>
            </div>
            <hr>
            <button type="button" class="btn btn-primary" style="float: right"><a href="/indigency/{{ $indigency->id }}/print" style="color:white">Print</a></button>
            {!! Form::open(['action' => ['App\Http\Controllers\BarangayControllers\IndigencyController@done', $indigency->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{-- FIRST NAME --}}
            <div class="form-group">
                {{-- <strong><label for="name" class=" col-form-label text-md-end">{{ __('name') }}</label></strong> --}}
                <input id="name" type="hidden" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $indigency->name }}" required autocomplete="name" readonly>
            </div>
            {{-- MIDDLE NAME --}}
            <div class="form-group">
                {{-- <label for="middle" class=" col-form-label text-md-end">{{ __('middle') }}</label> --}}
                <input id="middle" type="hidden" class="form-control @error('middle') is-invalid @enderror" name="middle" value="{{ $indigency->middle }}" required autocomplete="middle" readonly>
            </div>
            {{-- LAST NAME --}}
            <div class="form-group">
                {{-- <label for="lastname" class=" col-form-label text-md-end">{{ __('lastname') }}</label> --}}
                <input id="lastname" type="hidden" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $indigency->lastname }}" required autocomplete="lastname" readonly>
            </div>
            {{-- SUFFIX --}}
            <div class="form-group">
                {{-- <label for="suffix" class=" col-form-label text-md-end">{{ __('suffix') }}</label> --}}
                <input id="suffix" type="hidden" class="form-control @error('suffix') is-invalid @enderror" name="suffix" value="{{ $indigency->suffix }}" required autocomplete="suffix" readonly>
            </div>
            <div class="row">
                {{-- BLOCK NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="block" class=" col-form-label text-md-end">{{ __('Block No.') }}</label> --}}
                        <input id="block" type="hidden" class="form-control @error('block') is-invalid @enderror" name="block" value="{{ $indigency->block }}" required autocomplete="block" autofocus>
                </div>
                {{-- LOT NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="lot" class=" col-form-label text-md-end">{{ __('Lot No.') }}</label> --}}
                        <input id="lot" type="hidden" class="form-control @error('lot') is-invalid @enderror" name="lot" value="{{ $indigency->lot }}" required autocomplete="lot" autofocus>
                </div>
                {{-- PHASE NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="phase" class=" col-form-label text-md-end">{{ __('Phase No.') }}</label> --}}
                        <input id="phase" type="hidden" class="form-control @error('phase') is-invalid @enderror" name="phase" value="{{ $indigency->phase }}" required autocomplete="phase" autofocus>
                </div>
                {{-- HOUSE NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="house" class=" col-form-label text-md-end">{{ __('House No.') }}</label> --}}
                        <input id="house" type="hidden" class="form-control" name="house" value="{{ $indigency->house }}" autofocus>
                </div>
                {{-- STREET --}}
                <div class="form-group col-md-4">
                    {{-- <label for="street" class=" col-form-label text-md-end">{{ __('Street') }}</label> --}}
                        <input id="street" type="hidden" class="form-control" name="street" value="{{ $indigency->street }}" autofocus>
                </div>
            </div>
            <div class="row">
                {{-- SUBDIVISION --}}
                <div class="form-group col-md-3">
                    {{-- <label for="subdivision" class=" col-form-label text-md-end">{{ __('Subdivision') }}</label> --}}
                        <input id="subdivision" type="hidden" class="form-control @error('subdivision') is-invalid @enderror" name="subdivision" value="{{ $indigency->subdivision }}" required autocomplete="subdivision" autofocus>
                </div>
                {{-- BARANGAY --}}
                <div class="form-group col-md-3">
                    {{-- <label for="barangay" class=" col-form-label text-md-end">{{ __('Barangay') }}</label> --}}
                        <input id="barangay" type="hidden" class="form-control @error('barangay') is-invalid @enderror" name="barangay" value="{{ $indigency->barangay }}" required autocomplete="barangay" readonly>
                        @error('barangay')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- CITY/MUNICIPALITY --}}
                <div class="form-group col-md-3">
                    {{-- <label for="city_muni" class=" col-form-label text-md-end">{{ __('City/Municipality') }}</label> --}}
                        <input id="city_muni" type="hidden" class="form-control @error('city_muni') is-invalid @enderror" name="city_muni" value="{{ $indigency->city_muni }}" required autocomplete="city_muni" autofocus>
                        @error('city_muni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- PROVINCE --}}
                <div class="form-group col-md-3">
                    {{-- <label for="province" class=" col-form-label text-md-end">{{ __('Province') }}</label> --}}
                        <input id="province" type="hidden" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ $indigency->province }}" required autocomplete="province" readonly>
                        @error('province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            <div class="row">
                {{-- DATE OF BIRTH --}}
                <div class="form-group col-md-2">
                    {{-- <label for="dob" class=" col-form-label text-md-end">{{ __('Date of Birth') }}</label> --}}
                        <input id="dob" type="hidden" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $indigency->dob }}" required autocomplete="dob" autofocus>
                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- AGE (BUT HIDDEN) --}}
                <input id="age" type="hidden" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $indigency->age }}" required autocomplete="age" autofocus>
                {{-- PLACE OF BIRTH --}}
                        {{-- POB CITY/MUNICIPALITY --}}
                        <div class="form-group col-md-2">
                            {{-- <label for="pobcity" class=" col-form-label text-md-end">{{ __('Place of Birth') }}</label> --}}
                                <input id="pobcity" type="hidden" class="form-control @error('pobcity') is-invalid @enderror" name="pobcity" value="{{ $indigency->pobcity }}" required autocomplete="pobcity" autofocus>
                                {{-- <small class="form-text text-muted">City/Municipality</small> --}}
                                @error('pobcity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        {{-- POB PROVINCE --}}
                        <div class="form-group col-md-2">
                            {{-- <label for="pob" class=" col-form-label text-md-end">{{ __('nbsp;') }}</label> --}}
                                <input id="pobprovince" type="hidden" class="form-control @error('pobprovince') is-invalid @enderror" name="pobprovince" value="{{ $indigency->pobprovince }}" required autocomplete="pobprovince" autofocus>
                                {{-- <small class="form-text text-muted">Province</small> --}}
                                @error('pobprovince')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                {{-- CIVIL STATUS --}}
                <div class="form-group col-md-3">
                    {{-- <label for="civilstatus" class=" col-form-label text-md-end">{{ __('Civil Status') }}</label> --}}
                        <input id="civilstatus" type="hidden" class="form-control @error('civilstatus') is-invalid @enderror" name="civilstatus" value="{{ $indigency->civilstatus }}" required autocomplete="civilstatus" autofocus>
                            @error('civilstatus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- CITIZENSHIP --}}
                <div class="form-group col-md-3">
                    {{-- <label for="citizenship" class=" col-form-label text-md-end">{{ __('Citizenship') }}</label> --}}
                        <input id="citizenship" type="hidden" class="form-control @error('citizenship') is-invalid @enderror" name="citizenship" value="{{ $indigency->citizenship }}" required autocomplete="citizenship" autofocus>
                        @error('citizenship')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            <div class="row">
                {{-- LENGTH OF STAY --}}
                <div class="form-group col-md-6">
                    {{-- <label for="los" class=" col-form-label text-md-end">{{ __('Length of Stay') }}</label> --}}
                        <input id="los" type="hidden" class="form-control @error('los') is-invalid @enderror" name="los" value="{{ $indigency->los }}" required autocomplete="los" autofocus>
                        @error('los')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- PURPOSE --}}
                <div class="form-group col-md-6">
                    {{-- <label for="purpose" class=" col-form-label text-md-end">{{ __('Purpose') }}</label> --}}
                        <input id="purpose" type="hidden" class="form-control @error('purpose') is-invalid @enderror" name="purpose" value="{{ $indigency->purpose }}" required autocomplete="purpose" autofocus>
                        @error('purpose')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- DONE? --}}
                <div class="form-group col-md-6">
                    {{-- <label for="done" class=" col-form-label text-md-end">{{ __('Done') }}</label> --}}
                        <input id="done" type="hidden" class="form-control @error('done') is-invalid @enderror" name="done" value="false" required autocomplete="done" autofocus>
                        @error('done')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            @if(Auth::user()->admin == 1)
            {{Form::hidden('_method', 'PATCH')}}
            {{Form::submit('Mark as claimed', ['class'=>'btn btn-success'])}}
            @endif
            {!! Form::close() !!}
            <br><br>
            @if( Auth::user()->admin == 1 )
            <form action="{{ route('requestdocs.indigency.show', ['id' => $indigency->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <label style="float: right">
                    <button type="submit" class="btn btn-info">Notify to Claim</button>
                </label>
            </form>
            @endif
            <br>
        </div>
    </div>
    <br><br>
@endsection