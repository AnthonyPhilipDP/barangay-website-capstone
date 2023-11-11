@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <br>
            <div class="residency" style="align-content: center">
                <div class="residencycontent"> 
                    <div class="residencyfont">
                    
                    {!! Form::open(['action' , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                    To Whom It May Concern:<br>  
                    {{-- @if($residency->house != null)
                        I have value
                    @else                                   ///checking if have hasValue okay?
                        I dont have value
                    @endif --}}
                    @if($residency->suffix == 0)
                        &emsp;&emsp;This is to certify that <label class="underline mt-2" style="text-transform: uppercase"><strong>&emsp;{{$residency->name}} {{$residency->middle}}. {{$residency->lastname}}&emsp;</strong></label> is known to be of the following:<br><br>
                    @else
                        &emsp;&emsp;This is to certify that <label class="underline mt-2" style="text-transform: uppercase"><strong>&emsp;{{$residency->name}} {{$residency->middle}}. {{$residency->lastname}} {{$residency->suffix}}&emsp;</strong></label> is known to be of the following:<br><br>
                    @endif
                        Age&emsp;:	        <label class="underline">&emsp;{{$residency->age}} years old&emsp;</label><br>
                        Civil Status&emsp;:	<label class="underline">&emsp;{{$residency->civilstatus}}&emsp;</label><br>
                        Citizenship&emsp;:	    <label class="underline" style="text-transform: uppercase;">&emsp;{{$residency->citizenship}}&emsp;</label><br>
                        Date of Birth&emsp;:	<label class="underline">&emsp;{{$residency->dob}}&emsp;</label><br>
                        Place of Birth&emsp;:<label class="underline">&emsp;{{$residency->pobcity}}, {{$residency->pobprovince}}&emsp;</label><br>
                        Length of Stay&emsp;:	<label class="underline">&emsp;{{$residency->los}} up to present&emsp;</label> <br>                                      
                        Address&emsp;:	        <label class="underline">&emsp;
                            {{-- If I have value --}}
                            @if($residency->block != null || $residency->lot != null || $residency->phase != null || $residency->subdivision != null)
                            Block {{$residency->block}} Lot {{$residency->lot}} Phase {{$residency->phase}} {{$residency->subdivision}}
                            {{-- If I dont have value --}}
                            @else
                                House no. {{$residency->house}}, {{$residency->street}}
                            @endif
                        &emsp;</label><br>
                        &emsp;&emsp;&emsp;&emsp;&emsp;<label class="underline">&emsp;{{$residency->barangay}}, {{$residency->city_muni}}, {{$residency->province}} 4108&emsp;</label>
                        <br>
                        <br>
                        <div style="text-align: justify">
                        &emsp;&emsp;This further certifies that as per records of census in the barangay, he/she and his/her family/next of kin are known to me to be a bona fide resident and a registered voter/RBI member in this Barangay of good moral character, never been involved in any irregularities and has no derogatory record nor pending case filed in this office. 
                        </div>
                        &emsp;&emsp;This certification is issued for <label class="underline mt-2">&emsp;{{$residency->purpose}}&emsp;</label> purposes.
                        <br>
                        &emsp;&emsp;&emsp;Issued this day {{ $residency->created_at->format('j') }} of {{ $residency->created_at->format('F') }}, {{ $residency->created_at->format('Y') }}.
                        <br>
                        <br>
                        <br>
                        <label style="text-decoration: overline">Specimen Signature of Requestor</label>
                        {{-- Signature --}}
                        <label class="residencysign"><img src="{{asset('images/templates/CAPT.png')}}"></label>
                        <br><br><br>
                        <label class="capt"><strong style="text-transform: uppercase; text-decoration: underline;">{{'anacleto S. clamosa'}}</strong>
                        <br>
                        Punong Barangay
                        </label>
                    </div>
                </div>
            </div>
            <hr>
            <button type="button" class="btn btn-primary" style="float: right"><a href="/residency/{{ $residency->id }}/print" style="color:white">Print</a></button>
            {!! Form::open(['action' => ['App\Http\Controllers\BarangayControllers\ResidencyCertificateController@done', $residency->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{-- FIRST NAME --}}
            <div class="form-group">
                {{-- <strong><label for="name" class=" col-form-label text-md-end">{{ __('name') }}</label></strong> --}}
                <input id="name" type="hidden" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $residency->name }}" required autocomplete="name" readonly>
            </div>
            {{-- MIDDLE NAME --}}
            <div class="form-group">
                {{-- <label for="middle" class=" col-form-label text-md-end">{{ __('middle') }}</label> --}}
                <input id="middle" type="hidden" class="form-control @error('middle') is-invalid @enderror" name="middle" value="{{ $residency->middle }}" required autocomplete="middle" readonly>
            </div>
            {{-- LAST NAME --}}
            <div class="form-group">
                {{-- <label for="lastname" class=" col-form-label text-md-end">{{ __('lastname') }}</label> --}}
                <input id="lastname" type="hidden" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $residency->lastname }}" required autocomplete="lastname" readonly>
            </div>
            {{-- SUFFIX --}}
            <div class="form-group">
                {{-- <label for="suffix" class=" col-form-label text-md-end">{{ __('suffix') }}</label> --}}
                <input id="suffix" type="hidden" class="form-control @error('suffix') is-invalid @enderror" name="suffix" value="{{ $residency->suffix }}" required autocomplete="suffix" readonly>
            </div>
            <div class="row">
                {{-- BLOCK NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="block" class=" col-form-label text-md-end">{{ __('Block No.') }}</label> --}}
                        <input id="block" type="hidden" class="form-control @error('block') is-invalid @enderror" name="block" value="{{ $residency->block }}" required autocomplete="block" autofocus>
                </div>
                {{-- LOT NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="lot" class=" col-form-label text-md-end">{{ __('Lot No.') }}</label> --}}
                        <input id="lot" type="hidden" class="form-control @error('lot') is-invalid @enderror" name="lot" value="{{ $residency->lot }}" required autocomplete="lot" autofocus>
                </div>
                {{-- PHASE NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="phase" class=" col-form-label text-md-end">{{ __('Phase No.') }}</label> --}}
                        <input id="phase" type="hidden" class="form-control @error('phase') is-invalid @enderror" name="phase" value="{{ $residency->phase }}" required autocomplete="phase" autofocus>
                </div>
                {{-- HOUSE NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="house" class=" col-form-label text-md-end">{{ __('House No.') }}</label> --}}
                        <input id="house" type="hidden" class="form-control" name="house" value="{{ $residency->house }}" autofocus>
                </div>
                {{-- STREET --}}
                <div class="form-group col-md-4">
                    {{-- <label for="street" class=" col-form-label text-md-end">{{ __('Street') }}</label> --}}
                        <input id="street" type="hidden" class="form-control" name="street" value="{{ $residency->street }}" autofocus>
                </div>
            </div>
            <div class="row">
                {{-- SUBDIVISION --}}
                <div class="form-group col-md-3">
                    {{-- <label for="subdivision" class=" col-form-label text-md-end">{{ __('Subdivision') }}</label> --}}
                        <input id="subdivision" type="hidden" class="form-control @error('subdivision') is-invalid @enderror" name="subdivision" value="{{ $residency->subdivision }}" required autocomplete="subdivision" autofocus>
                </div>
                {{-- BARANGAY --}}
                <div class="form-group col-md-3">
                    {{-- <label for="barangay" class=" col-form-label text-md-end">{{ __('Barangay') }}</label> --}}
                        <input id="barangay" type="hidden" class="form-control @error('barangay') is-invalid @enderror" name="barangay" value="{{ $residency->barangay }}" required autocomplete="barangay" readonly>
                        @error('barangay')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- CITY/MUNICIPALITY --}}
                <div class="form-group col-md-3">
                    {{-- <label for="city_muni" class=" col-form-label text-md-end">{{ __('City/Municipality') }}</label> --}}
                        <input id="city_muni" type="hidden" class="form-control @error('city_muni') is-invalid @enderror" name="city_muni" value="{{ $residency->city_muni }}" required autocomplete="city_muni" autofocus>
                        @error('city_muni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- PROVINCE --}}
                <div class="form-group col-md-3">
                    {{-- <label for="province" class=" col-form-label text-md-end">{{ __('Province') }}</label> --}}
                        <input id="province" type="hidden" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ $residency->province }}" required autocomplete="province" readonly>
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
                        <input id="dob" type="hidden" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $residency->dob }}" required autocomplete="dob" autofocus>
                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- AGE (BUT HIDDEN) --}}
                <input id="age" type="hidden" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $residency->age }}" required autocomplete="age" autofocus>
                {{-- PLACE OF BIRTH --}}
                        {{-- POB CITY/MUNICIPALITY --}}
                        <div class="form-group col-md-2">
                            {{-- <label for="pobcity" class=" col-form-label text-md-end">{{ __('Place of Birth') }}</label> --}}
                                <input id="pobcity" type="hidden" class="form-control @error('pobcity') is-invalid @enderror" name="pobcity" value="{{ $residency->pobcity }}" required autocomplete="pobcity" autofocus>
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
                                <input id="pobprovince" type="hidden" class="form-control @error('pobprovince') is-invalid @enderror" name="pobprovince" value="{{ $residency->pobprovince }}" required autocomplete="pobprovince" autofocus>
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
                        <input id="civilstatus" type="hidden" class="form-control @error('civilstatus') is-invalid @enderror" name="civilstatus" value="{{ $residency->civilstatus }}" required autocomplete="civilstatus" autofocus>
                            @error('civilstatus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- CITIZENSHIP --}}
                <div class="form-group col-md-3">
                    {{-- <label for="citizenship" class=" col-form-label text-md-end">{{ __('Citizenship') }}</label> --}}
                        <input id="citizenship" type="hidden" class="form-control @error('citizenship') is-invalid @enderror" name="citizenship" value="{{ $residency->citizenship }}" required autocomplete="citizenship" autofocus>
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
                        <input id="los" type="hidden" class="form-control @error('los') is-invalid @enderror" name="los" value="{{ $residency->los }}" required autocomplete="los" autofocus>
                        @error('los')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- PURPOSE --}}
                <div class="form-group col-md-6">
                    {{-- <label for="purpose" class=" col-form-label text-md-end">{{ __('Purpose') }}</label> --}}
                        <input id="purpose" type="hidden" class="form-control @error('purpose') is-invalid @enderror" name="purpose" value="{{ $residency->purpose }}" required autocomplete="purpose" autofocus>
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
            <form action="{{ route('requestdocs.residency.show', ['id' => $residency->id]) }}" method="POST">
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