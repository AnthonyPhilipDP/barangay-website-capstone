@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <br>
            <div class="businessclearance" style="align-content: center">
                <div class="businesscontent"> 
                    <div class="businessfont">
                    <br>
                    TO WHOM IT MAY CONCERN:<br>
                        This is to certify that the business or trade activity described below:<br><br>
                        <div class="businessname">
                            <label style="text-decoration: underline"><strong>{{$businessclearance->businessname}}</strong> </label> 
                            </div>
                            <div class="text-center">
                            <small><i>(Business Name/Trade Activity)</i></small>
                        </div>
                        <br>
                        <div class="businessaddress">              
                            <label style="text-decoration: underline">Block {{$businessclearance->block}} Lot {{$businessclearance->lot}} Phase {{$businessclearance->phase}} {{$businessclearance->house}} {{$businessclearance->street}} {{$businessclearance->subdivision}}</label><br>
                            <label style="text-decoration: underline">{{$businessclearance->barangay}}, {{$businessclearance->city_muni}}, {{$businessclearance->province}} 4108</label>
                            <br>
                            <small><i>(Location)</i></small>
                        </div>
                        <br>
                        <div class="businessoperator">
                            <label style="text-decoration: underline"><strong>{{$businessclearance->name}} {{$businessclearance->middle}}. {{$businessclearance->lastname}}</strong> </label> 
                            </div>
                            <div class="text-center">
                            <small><i>(Operator/Manager)</i></small>
                        </div>
                        <br>
                        <div style="text-align: justify">
                            proposed to be established in this Barangay and is being applied for a Barangay Clearance or Business Permit to be used in securing a corresponding Mayor's Permit has been found to be:                                            
                        </div>
                        <br>
                        <ul>
                            <li>In conformity with the provisions of existing Barangay Ordinances, rules
                                and regulations being enforced in this Barangay;
                            </li>
                            <li>Not among those businesses or trade activities being banned to be         	
                                Established in this Barangay;
                            </li>
                            <li>In view of the foregoing, this Barangay, thru the undersigned – Interpose no objection for the issuance of the corresponding Mayor’s
                                Permit being applied for.
                            </li>
                        </ul>
                        <div class="businesssign"><img src="{{asset('images/templates/CAPT.png')}}">
                            <label class="capt"  style="text-transform: uppercase"><strong>{{'anacleto S. clamosa'}}</strong>
                            <br>
                            </label>
                            <div class="bcpunongbrgy">
                                Punong Barangay
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <button type="button" class="btn btn-primary" style="float: right"><a href="/businessclearance/{{ $businessclearance->id }}/print" style="color:white">Print</a></button>\
            {!! Form::open(['action' => ['App\Http\Controllers\BarangayControllers\BusinessClearanceController@done', $businessclearance->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{-- FIRST NAME --}}
            <div class="form-group">
                {{-- <strong><label for="name" class=" col-form-label text-md-end">{{ __('name') }}</label></strong> --}}
                <input id="name" type="hidden" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $businessclearance->name }}" required autocomplete="name" readonly>
            </div>
            {{-- MIDDLE NAME --}}
            <div class="form-group">
                {{-- <label for="middle" class=" col-form-label text-md-end">{{ __('middle') }}</label> --}}
                <input id="middle" type="hidden" class="form-control @error('middle') is-invalid @enderror" name="middle" value="{{ $businessclearance->middle }}" required autocomplete="middle" readonly>
            </div>
            {{-- LAST NAME --}}
            <div class="form-group">
                {{-- <label for="lastname" class=" col-form-label text-md-end">{{ __('lastname') }}</label> --}}
                <input id="lastname" type="hidden" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $businessclearance->lastname }}" required autocomplete="lastname" readonly>
            </div>
            {{-- SUFFIX --}}
            <div class="form-group">
                {{-- <label for="suffix" class=" col-form-label text-md-end">{{ __('suffix') }}</label> --}}
                <input id="suffix" type="hidden" class="form-control @error('suffix') is-invalid @enderror" name="suffix" value="{{ $businessclearance->suffix }}" required autocomplete="suffix" readonly>
            </div>
            <div class="row">
                {{-- BLOCK NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="block" class=" col-form-label text-md-end">{{ __('Block No.') }}</label> --}}
                        <input id="block" type="hidden" class="form-control @error('block') is-invalid @enderror" name="block" value="{{ $businessclearance->block }}" required autocomplete="block" autofocus>
                </div>
                {{-- LOT NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="lot" class=" col-form-label text-md-end">{{ __('Lot No.') }}</label> --}}
                        <input id="lot" type="hidden" class="form-control @error('lot') is-invalid @enderror" name="lot" value="{{ $businessclearance->lot }}" required autocomplete="lot" autofocus>
                </div>
                {{-- PHASE NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="phase" class=" col-form-label text-md-end">{{ __('Phase No.') }}</label> --}}
                        <input id="phase" type="hidden" class="form-control @error('phase') is-invalid @enderror" name="phase" value="{{ $businessclearance->phase }}" required autocomplete="phase" autofocus>
                </div>
                {{-- HOUSE NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="house" class=" col-form-label text-md-end">{{ __('House No.') }}</label> --}}
                        <input id="house" type="hidden" class="form-control" name="house" value="{{ $businessclearance->house }}" autofocus>
                </div>
                {{-- STREET --}}
                <div class="form-group col-md-4">
                    {{-- <label for="street" class=" col-form-label text-md-end">{{ __('Street') }}</label> --}}
                        <input id="street" type="hidden" class="form-control" name="street" value="{{ $businessclearance->street }}" autofocus>
                </div>
            </div>
            <div class="row">
                {{-- SUBDIVISION --}}
                <div class="form-group col-md-3">
                    {{-- <label for="subdivision" class=" col-form-label text-md-end">{{ __('Subdivision') }}</label> --}}
                        <input id="subdivision" type="hidden" class="form-control @error('subdivision') is-invalid @enderror" name="subdivision" value="{{ $businessclearance->subdivision }}" required autocomplete="subdivision" autofocus>
                </div>
                {{-- BARANGAY --}}
                <div class="form-group col-md-3">
                    {{-- <label for="barangay" class=" col-form-label text-md-end">{{ __('Barangay') }}</label> --}}
                        <input id="barangay" type="hidden" class="form-control @error('barangay') is-invalid @enderror" name="barangay" value="{{ $businessclearance->barangay }}" required autocomplete="barangay" readonly>
                        @error('barangay')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- CITY/MUNICIPALITY --}}
                <div class="form-group col-md-3">
                    {{-- <label for="city_muni" class=" col-form-label text-md-end">{{ __('City/Municipality') }}</label> --}}
                        <input id="city_muni" type="hidden" class="form-control @error('city_muni') is-invalid @enderror" name="city_muni" value="{{ $businessclearance->city_muni }}" required autocomplete="city_muni" autofocus>
                        @error('city_muni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- PROVINCE --}}
                <div class="form-group col-md-3">
                    {{-- <label for="province" class=" col-form-label text-md-end">{{ __('Province') }}</label> --}}
                        <input id="province" type="hidden" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ $businessclearance->province }}" required autocomplete="province" readonly>
                        @error('province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            {{-- BUSINESS NAME --}}
            <div class="form-group col-md-6">
                {{-- <label for="businessname" class=" col-form-label text-md-end">{{ __('Business Name') }}</label> --}}
                    <input id="businessname" type="hidden" class="form-control @error('businessname') is-invalid @enderror" name="businessname" value="{{ $businessclearance->businessname }}" required autocomplete="businessname" autofocus>
                    @error('businessname')
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
            @if(Auth::user()->admin == 1)
            {{Form::hidden('_method', 'PATCH')}}
            {{Form::submit('Mark as claimed', ['class'=>'btn btn-success'])}}
            @endif
            {!! Form::close() !!}
            <br>
            @if( Auth::user()->admin == 1 )
            <form action="{{ route('requestdocs.businessclearance.show', ['id' => $businessclearance->id]) }}" method="POST">
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