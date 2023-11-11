@extends('layouts.app')

@section('content')
    

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Barangay Clearance Request Form</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li><a href="/clearance">Barangay Clearance</a></li>
              <li>Request</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
            {!! Form::open(['action' => 'App\Http\Controllers\BarangayControllers\ClearanceController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="row">
                {{-- FIRST NAME --}}
                <div class="form-group col-md-5">
                        {{-- <label for="name" class=" col-form-label text-md-end">{{ __('First Name') }}</label> --}}
                            <input id="name" type="hidden" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                {{-- MIDDLE NAME --}}
                <div class="form-group col-md-1">
                            {{-- <label for="middle" class=" col-form-label text-md-end">{{ __('M.I.') }}</label> --}}
                                <input id="middle" type="hidden" class="form-control @error('middle') is-invalid @enderror" name="middle" value="{{ Auth::user()->middle }}" autofocus>
                                @error('middle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                {{-- LAST NAME --}}
                <div class="form-group col-md-4">
                            {{-- <label for="lastname" class=" col-form-label text-md-end">{{ __('Last Name') }}</label> --}}
                                <input id="lastname" type="hidden" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ Auth::user()->lastname }}" required autocomplete="lastname" autofocus>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                {{-- SUFFIX --}}
                <div class="form-group col-md-2">
                    {{-- <label for="suffix" class=" col-form-label text-md-end">{{ __('Suffix') }}</label> --}}
                        <input id="suffix" type="hidden" class="form-control @error('suffix') is-invalid @enderror" name="suffix" value="{{ Auth::user()->suffix }}" required autocomplete="suffix" autofocus>
                        @error('suffix')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            <div class="row">
                {{-- BLOCK NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="block" class=" col-form-label text-md-end">{{ __('Block No.') }}</label> --}}
                        <input id="block" type="hidden" class="form-control @error('block') is-invalid @enderror" name="block" value="{{ Auth::user()->block }}" required autocomplete="block" autofocus>
                </div>
                {{-- LOT NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="lot" class=" col-form-label text-md-end">{{ __('Lot No.') }}</label> --}}
                        <input id="lot" type="hidden" class="form-control @error('lot') is-invalid @enderror" name="lot" value="{{ Auth::user()->lot }}" required autocomplete="lot" autofocus>
                </div>
                {{-- PHASE NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="phase" class=" col-form-label text-md-end">{{ __('Phase No.') }}</label> --}}
                        <input id="phase" type="hidden" class="form-control @error('phase') is-invalid @enderror" name="phase" value="{{ Auth::user()->phase }}" required autocomplete="phase" autofocus>
                </div>
                {{-- HOUSE NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="house" class=" col-form-label text-md-end">{{ __('House No.') }}</label> --}}
                        <input id="house" type="hidden" class="form-control" name="house" value="{{ Auth::user()->house }}" autofocus>
                </div>
                {{-- STREET --}}
                <div class="form-group col-md-4">
                    {{-- <label for="street" class=" col-form-label text-md-end">{{ __('Street') }}</label> --}}
                        <input id="street" type="hidden" class="form-control" name="street" value="{{ Auth::user()->street }}" autofocus>
                </div>
            </div>
            <div class="row">
                {{-- SUBDIVISION --}}
                <div class="form-group col-md-3">
                    {{-- <label for="subdivision" class=" col-form-label text-md-end">{{ __('Subdivision') }}</label> --}}
                        <input id="subdivision" type="hidden" class="form-control @error('subdivision') is-invalid @enderror" name="subdivision" value="{{ Auth::user()->subdivision }}" required autocomplete="subdivision" autofocus>
                </div>
                {{-- BARANGAY --}}
                <div class="form-group col-md-3">
                    {{-- <label for="barangay" class=" col-form-label text-md-end">{{ __('Barangay') }}</label> --}}
                        <input id="barangay" type="hidden" class="form-control @error('barangay') is-invalid @enderror" name="barangay" value="{{ Auth::user()->barangay }}" required autocomplete="barangay" readonly>
                        @error('barangay')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- CITY/MUNICIPALITY --}}
                <div class="form-group col-md-3">
                    {{-- <label for="city_muni" class=" col-form-label text-md-end">{{ __('City/Municipality') }}</label> --}}
                        <input id="city_muni" type="hidden" class="form-control @error('city_muni') is-invalid @enderror" name="city_muni" value="{{ Auth::user()->city_muni }}" required autocomplete="city_muni" autofocus>
                        @error('city_muni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- PROVINCE --}}
                <div class="form-group col-md-3">
                    {{-- <label for="province" class=" col-form-label text-md-end">{{ __('Province') }}</label> --}}
                        <input id="province" type="hidden" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ Auth::user()->province }}" required autocomplete="province" readonly>
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
                        <input id="dob" type="hidden" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ Auth::user()->dob }}" required autocomplete="dob" autofocus>
                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- AGE (BUT HIDDEN) --}}
                <input id="age" type="hidden" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ Auth::user()->age }}" required autocomplete="age" autofocus>
                {{-- PLACE OF BIRTH --}}
                        {{-- POB CITY/MUNICIPALITY --}}
                        <div class="form-group col-md-2">
                            {{-- <label for="pobcity" class=" col-form-label text-md-end">{{ __('Place of Birth') }}</label> --}}
                                <input id="pobcity" type="hidden" class="form-control @error('pobcity') is-invalid @enderror" name="pobcity" value="{{ Auth::user()->pobcity }}" required autocomplete="pobcity" autofocus>
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
                                <input id="pobprovince" type="hidden" class="form-control @error('pobprovince') is-invalid @enderror" name="pobprovince" value="{{ Auth::user()->pobprovince }}" required autocomplete="pobprovince" autofocus>
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
                        <input id="civilstatus" type="hidden" class="form-control @error('civilstatus') is-invalid @enderror" name="civilstatus" value="{{ Auth::user()->civilstatus }}" required autocomplete="civilstatus" autofocus>
                            @error('civilstatus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- CITIZENSHIP --}}
                <div class="form-group col-md-3">
                    {{-- <label for="citizenship" class=" col-form-label text-md-end">{{ __('Citizenship') }}</label> --}}
                        <input id="citizenship" type="hidden" class="form-control @error('citizenship') is-invalid @enderror" name="citizenship" value="{{ Auth::user()->citizenship }}" required autocomplete="citizenship" autofocus>
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
                    <label for="los" class=" col-form-label text-md-end">{{ __('Resident since') }}</label>
                        <input id="los" type="text" class="form-control @error('los') is-invalid @enderror" name="los" value="{{ old('los') }}" required autocomplete="los" autofocus placeholder="Enter the year you started living in the barangay. e.g. 2014">
                        @error('los')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- PURPOSE --}}
                <div class="form-group col-md-6">
                    <label for="purpose" class=" col-form-label text-md-end">{{ __('Purpose') }}</label>
                        <input id="purpose" type="text" class="form-control @error('purpose') is-invalid @enderror" name="purpose" value="{{ old('purpose') }}" required autocomplete="purpose" autofocus>
                        @error('purpose')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- NOTIFIED --}}
                <div class="form-group">
                    {{-- <label for="notified" class=" col-form-label text-md-end">{{ __('notified notified snotifieda:') }}</label> --}}
                        <input id="notified" type="hidden" class="form-control @error('notified') is-invalid @enderror" name="notified" value="false" required autocomplete="notified" readonly>
                        @error('notified')
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
            <hr>
            {{Form::submit('Submit', ['class'=>'btn btn-primary', 'style'=>'float: right'])}}
            <br>
            <br>
            <hr>
            {!! Form::close() !!}
        </div>
    </section>
@endsection