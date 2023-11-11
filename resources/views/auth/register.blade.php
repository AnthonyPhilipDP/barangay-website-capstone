@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Register</h2>
            <ol>
              <li><a href="/login">Login</a></li>
              <li>Register</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
            @if(Auth::guest())
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                {{-- FIRST NAME --}}
                <div class="form-group col-md-5">
                        <label for="name" class=" col-form-label text-md-end">{{ __('First Name *') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                {{-- MIDDLE NAME --}}
                <div class="form-group col-md-1">
                            <label for="middle" class=" col-form-label text-md-end">{{ __('M.I.') }}</label>
                                <input id="middle" type="text" class="form-control @error('middle') is-invalid @enderror" name="middle" value="{{ old('middle') }}" autofocus>
                                @error('middle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                {{-- LAST NAME --}}
                <div class="form-group col-md-4">
                            <label for="lastname" class=" col-form-label text-md-end">{{ __('Last Name *') }}</label>
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                {{-- SUFFIX --}}
                <div class="form-group col-md-2">
                    <label for="suffix" class=" col-form-label text-md-end">{{ __('Suffix') }}</label>
                        <select id="suffix" type="text" class="form-select @error('suffix') is-invalid @enderror" name="suffix" required autocomplete="suffix" autofocus>
                            <option value="0" selected>None</option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                            <option value="5th">5th</option>
                            <option value="6th">6th</option>
                            <option value="7th">7th</option>
                            <option value="8th">8th</option>
                            <option value="9th">9th</option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                            <option value="V">V</option>
                            <option value="Jr.">Jr</option>
                            <option value="Sr.">Sr</option>
                        </select>
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
                    <label for="block" class=" col-form-label text-md-end">{{ __('Block No.') }}</label>
                        <input id="block" type="number" class="form-control" name="block" value="{{ old('block') }}" autofocus>
                </div>
                {{-- LOT NO. --}}
                <div class="form-group col-md-2">
                    <label for="lot" class=" col-form-label text-md-end">{{ __('Lot No.') }}</label>
                        <input id="lot" type="number" class="form-control" name="lot" value="{{ old('lot') }}" autofocus>
                </div>
                {{-- PHASE NO. --}}
                <div class="form-group col-md-2">
                    <label for="phase" class=" col-form-label text-md-end">{{ __('Phase No.') }}</label>
                        <input id="phase" type="number" class="form-control" name="phase" value="{{ old('phase') }}" autofocus>
                </div>
                {{-- HOUSE NO. --}}
                <div class="form-group col-md-2">
                    <label for="house" class=" col-form-label text-md-end">{{ __('House No.') }}</label>
                        <input id="house" type="number" class="form-control" name="house" value="{{ old('house') }}" autofocus>
                </div>
                {{-- STREET --}}
                <div class="form-group col-md-4">
                    <label for="street" class=" col-form-label text-md-end">{{ __('Street') }}</label>
                        <input id="street" type="text" class="form-control" name="street" value="{{ old('street') }}" autofocus>
                </div>
            </div>
            <div class="row">
                {{-- SUBDIVISION --}}
                <div class="form-group col-md-3">
                    <label for="subdivision" class=" col-form-label text-md-end">{{ __('Subdivision') }}</label>
                        <input id="subdivision" type="text" class="form-control" name="subdivision" value="{{ old('subdivision') }}" autofocus>
                </div>
                {{-- BARANGAY --}}
                <div class="form-group col-md-3">
                    <label for="barangay" class=" col-form-label text-md-end">{{ __('Barangay') }}</label>
                        <input id="barangay" type="text" class="form-control @error('barangay') is-invalid @enderror" name="barangay" value="{{ "Punta I" }}" required autocomplete="barangay" readonly>
                        @error('barangay')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- CITY/MUNICIPALITY --}}
                <div class="form-group col-md-3">
                    <label for="city_muni" class=" col-form-label text-md-end">{{ __('City/Municipality') }}</label>
                        <input id="city_muni" type="text" class="form-control @error('city_muni') is-invalid @enderror" name="city_muni" value="{{ "Tanza" }}" required autocomplete="city_muni" readonly>
                        @error('city_muni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- PROVINCE --}}
                <div class="form-group col-md-3">
                    <label for="province" class=" col-form-label text-md-end">{{ __('Province') }}</label>
                        <input id="province" type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ "Cavite" }}" required autocomplete="province" readonly>
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
                    <label for="dob" class=" col-form-label text-md-end">{{ __('Date of Birth *') }}</label>
                        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- PLACE OF BIRTH --}}
                    {{-- POB CITY/MUNICIPALITY --}}
                    <div class="form-group col-md-2">
                        <label for="pobcity" class=" col-form-label text-md-end">{{ __('Place of Birth *') }}</label>
                            <input id="pobcity" type="text" class="form-control @error('pobcity') is-invalid @enderror" name="pobcity" value="{{ old('pobcity') }}" required autocomplete="pobcity" autofocus>
                            <small class="form-text text-muted">City/Municipality</small>
                            @error('pobcity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    {{-- POB PROVINCE --}}
                    <div class="form-group col-md-2">
                        <label for="pob" class=" col-form-label text-md-end">&nbsp;</label>
                            <input id="pobprovince" type="text" class="form-control @error('pobprovince') is-invalid @enderror" name="pobprovince" value="{{ old('pobprovince') }}" required autocomplete="pobprovince" autofocus>
                            <small class="form-text text-muted">Province</small>
                            @error('pobprovince')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                {{-- CIVIL STATUS --}}
                <div class="form-group col-md-3">
                    <label for="civilstatus" class=" col-form-label text-md-end">{{ __('Civil Status *') }}</label>
                        <select id="civilstatus" type="text" class="form-select @error('civilstatus') is-invalid @enderror" name="civilstatus" value="{{ old('civilstatus') }}" required autocomplete="civilstatus" autofocus>
                            <option value="Single" selected>Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                            @error('civilstatus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- CITIZENSHIP --}}
                <div class="form-group col-md-3">
                    <label for="citizenship" class=" col-form-label text-md-end">{{ __('Citizenship *') }}</label>
                        <select id="citizenship" type="text" class="form-select @error('citizenship') is-invalid @enderror" name="citizenship" required autocomplete="citizenship" autofocus>
                              <option value="">-- select one --</option>
                              <option value="filipino">Filipino</option>
                              <option value="afghan">Afghan</option>
                              <option value="albanian">Albanian</option>
                              <option value="algerian">Algerian</option>
                              <option value="american">American</option>
                              <option value="andorran">Andorran</option>
                              <option value="angolan">Angolan</option>
                              <option value="antiguans">Antiguans</option>
                              <option value="argentinean">Argentinean</option>
                              <option value="armenian">Armenian</option>
                              <option value="australian">Australian</option>
                              <option value="austrian">Austrian</option>
                              <option value="azerbaijani">Azerbaijani</option>
                              <option value="bahamian">Bahamian</option>
                              <option value="bahraini">Bahraini</option>
                              <option value="bangladeshi">Bangladeshi</option>
                              <option value="barbadian">Barbadian</option>
                              <option value="barbudans">Barbudans</option>
                              <option value="batswana">Batswana</option>
                              <option value="belarusian">Belarusian</option>
                              <option value="belgian">Belgian</option>
                              <option value="belizean">Belizean</option>
                              <option value="beninese">Beninese</option>
                              <option value="bhutanese">Bhutanese</option>
                              <option value="bolivian">Bolivian</option>
                              <option value="bosnian">Bosnian</option>
                              <option value="brazilian">Brazilian</option>
                              <option value="british">British</option>
                              <option value="bruneian">Bruneian</option>
                              <option value="bulgarian">Bulgarian</option>
                              <option value="burkinabe">Burkinabe</option>
                              <option value="burmese">Burmese</option>
                              <option value="burundian">Burundian</option>
                              <option value="cambodian">Cambodian</option>
                              <option value="cameroonian">Cameroonian</option>
                              <option value="canadian">Canadian</option>
                              <option value="cape verdean">Cape Verdean</option>
                              <option value="central african">Central African</option>
                              <option value="chadian">Chadian</option>
                              <option value="chilean">Chilean</option>
                              <option value="chinese">Chinese</option>
                              <option value="colombian">Colombian</option>
                              <option value="comoran">Comoran</option>
                              <option value="congolese">Congolese</option>
                              <option value="costa rican">Costa Rican</option>
                              <option value="croatian">Croatian</option>
                              <option value="cuban">Cuban</option>
                              <option value="cypriot">Cypriot</option>
                              <option value="czech">Czech</option>
                              <option value="danish">Danish</option>
                              <option value="djibouti">Djibouti</option>
                              <option value="dominican">Dominican</option>
                              <option value="dutch">Dutch</option>
                              <option value="east timorese">East Timorese</option>
                              <option value="ecuadorean">Ecuadorean</option>
                              <option value="egyptian">Egyptian</option>
                              <option value="emirian">Emirian</option>
                              <option value="equatorial guinean">Equatorial Guinean</option>
                              <option value="eritrean">Eritrean</option>
                              <option value="estonian">Estonian</option>
                              <option value="ethiopian">Ethiopian</option>
                              <option value="fijian">Fijian</option>
                              <option value="finnish">Finnish</option>
                              <option value="french">French</option>
                              <option value="gabonese">Gabonese</option>
                              <option value="gambian">Gambian</option>
                              <option value="georgian">Georgian</option>
                              <option value="german">German</option>
                              <option value="ghanaian">Ghanaian</option>
                              <option value="greek">Greek</option>
                              <option value="grenadian">Grenadian</option>
                              <option value="guatemalan">Guatemalan</option>
                              <option value="guinea-bissauan">Guinea-Bissauan</option>
                              <option value="guinean">Guinean</option>
                              <option value="guyanese">Guyanese</option>
                              <option value="haitian">Haitian</option>
                              <option value="herzegovinian">Herzegovinian</option>
                              <option value="honduran">Honduran</option>
                              <option value="hungarian">Hungarian</option>
                              <option value="icelander">Icelander</option>
                              <option value="indian">Indian</option>
                              <option value="indonesian">Indonesian</option>
                              <option value="iranian">Iranian</option>
                              <option value="iraqi">Iraqi</option>
                              <option value="irish">Irish</option>
                              <option value="israeli">Israeli</option>
                              <option value="italian">Italian</option>
                              <option value="ivorian">Ivorian</option>
                              <option value="jamaican">Jamaican</option>
                              <option value="japanese">Japanese</option>
                              <option value="jordanian">Jordanian</option>
                              <option value="kazakhstani">Kazakhstani</option>
                              <option value="kenyan">Kenyan</option>
                              <option value="kittian and nevisian">Kittian and Nevisian</option>
                              <option value="kuwaiti">Kuwaiti</option>
                              <option value="kyrgyz">Kyrgyz</option>
                              <option value="laotian">Laotian</option>
                              <option value="latvian">Latvian</option>
                              <option value="lebanese">Lebanese</option>
                              <option value="liberian">Liberian</option>
                              <option value="libyan">Libyan</option>
                              <option value="liechtensteiner">Liechtensteiner</option>
                              <option value="lithuanian">Lithuanian</option>
                              <option value="luxembourger">Luxembourger</option>
                              <option value="macedonian">Macedonian</option>
                              <option value="malagasy">Malagasy</option>
                              <option value="malawian">Malawian</option>
                              <option value="malaysian">Malaysian</option>
                              <option value="maldivan">Maldivan</option>
                              <option value="malian">Malian</option>
                              <option value="maltese">Maltese</option>
                              <option value="marshallese">Marshallese</option>
                              <option value="mauritanian">Mauritanian</option>
                              <option value="mauritian">Mauritian</option>
                              <option value="mexican">Mexican</option>
                              <option value="micronesian">Micronesian</option>
                              <option value="moldovan">Moldovan</option>
                              <option value="monacan">Monacan</option>
                              <option value="mongolian">Mongolian</option>
                              <option value="moroccan">Moroccan</option>
                              <option value="mosotho">Mosotho</option>
                              <option value="motswana">Motswana</option>
                              <option value="mozambican">Mozambican</option>
                              <option value="namibian">Namibian</option>
                              <option value="nauruan">Nauruan</option>
                              <option value="nepalese">Nepalese</option>
                              <option value="new zealander">New Zealander</option>
                              <option value="ni-vanuatu">Ni-Vanuatu</option>
                              <option value="nicaraguan">Nicaraguan</option>
                              <option value="nigerien">Nigerien</option>
                              <option value="north korean">North Korean</option>
                              <option value="northern irish">Northern Irish</option>
                              <option value="norwegian">Norwegian</option>
                              <option value="omani">Omani</option>
                              <option value="pakistani">Pakistani</option>
                              <option value="palauan">Palauan</option>
                              <option value="panamanian">Panamanian</option>
                              <option value="papua new guinean">Papua New Guinean</option>
                              <option value="paraguayan">Paraguayan</option>
                              <option value="peruvian">Peruvian</option>
                              <option value="polish">Polish</option>
                              <option value="portuguese">Portuguese</option>
                              <option value="qatari">Qatari</option>
                              <option value="romanian">Romanian</option>
                              <option value="russian">Russian</option>
                              <option value="rwandan">Rwandan</option>
                              <option value="saint lucian">Saint Lucian</option>
                              <option value="salvadoran">Salvadoran</option>
                              <option value="samoan">Samoan</option>
                              <option value="san marinese">San Marinese</option>
                              <option value="sao tomean">Sao Tomean</option>
                              <option value="saudi">Saudi</option>
                              <option value="scottish">Scottish</option>
                              <option value="senegalese">Senegalese</option>
                              <option value="serbian">Serbian</option>
                              <option value="seychellois">Seychellois</option>
                              <option value="sierra leonean">Sierra Leonean</option>
                              <option value="singaporean">Singaporean</option>
                              <option value="slovakian">Slovakian</option>
                              <option value="slovenian">Slovenian</option>
                              <option value="solomon islander">Solomon Islander</option>
                              <option value="somali">Somali</option>
                              <option value="south african">South African</option>
                              <option value="south korean">South Korean</option>
                              <option value="spanish">Spanish</option>
                              <option value="sri lankan">Sri Lankan</option>
                              <option value="sudanese">Sudanese</option>
                              <option value="surinamer">Surinamer</option>
                              <option value="swazi">Swazi</option>
                              <option value="swedish">Swedish</option>
                              <option value="swiss">Swiss</option>
                              <option value="syrian">Syrian</option>
                              <option value="taiwanese">Taiwanese</option>
                              <option value="tajik">Tajik</option>
                              <option value="tanzanian">Tanzanian</option>
                              <option value="thai">Thai</option>
                              <option value="togolese">Togolese</option>
                              <option value="tongan">Tongan</option>
                              <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                              <option value="tunisian">Tunisian</option>
                              <option value="turkish">Turkish</option>
                              <option value="tuvaluan">Tuvaluan</option>
                              <option value="ugandan">Ugandan</option>
                              <option value="ukrainian">Ukrainian</option>
                              <option value="uruguayan">Uruguayan</option>
                              <option value="uzbekistani">Uzbekistani</option>
                              <option value="venezuelan">Venezuelan</option>
                              <option value="vietnamese">Vietnamese</option>
                              <option value="welsh">Welsh</option>
                              <option value="yemenite">Yemenite</option>
                              <option value="zambian">Zambian</option>
                              <option value="zimbabwean">Zimbabwean</option>
                        </select>
                        @error('citizenship')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            {{-- EMAIL --}}
            <div class="form-group">
                <label for="email" class=" col-form-label text-md-end">{{ __('Email *') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="row">
                {{-- PASSWORD --}}
                <div class="form-group col-md-6">
                    <label for="password" class=" col-form-label text-md-end">{{ __('Password *') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- CONFIRM PASSWORD --}}
                <div class="form-group col-md-6">
                    <label for="password-confirm" class=" col-form-label text-md-end">{{ __('Confirm Password *') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div><small>* Password must be at least 8 characters</small></div>
            </div>
            {{-- REGISTER AS --}}
            <div class="form-group">
                {{-- <label for="admin" class=" col-form-label text-md-end">{{ __('Register as: ') }}</label> --}}
                    <input id="admin" type="hidden" class="form-control" name="admin" value="{{ "0" }}" autofocus> 
            </div>
            {{-- SUBMIT --}}
            <hr>
            <div class="row text-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
                <p>Already have an account? <a href="/login" style="color: green">Click here</a> to sign in.</p><hr>
            </div>
        </form>
    @elseif(Auth::user()->admin == 1)
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                {{-- FIRST NAME --}}
                <div class="form-group col-md-5">
                        <label for="name" class=" col-form-label text-md-end">{{ __('First Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                {{-- MIDDLE NAME --}}
                <div class="form-group col-md-1">
                            <label for="middle" class=" col-form-label text-md-end">{{ __('M.I.') }}</label>
                                <input id="middle" type="text" class="form-control @error('middle') is-invalid @enderror" name="middle" value="{{ old('middle') }}" required autocomplete="middle" autofocus>
                                @error('middle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                {{-- LAST NAME --}}
                <div class="form-group col-md-4">
                            <label for="lastname" class=" col-form-label text-md-end">{{ __('Last Name') }}</label>
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                {{-- SUFFIX --}}
                <div class="form-group col-md-2">
                    <label for="suffix" class=" col-form-label text-md-end">{{ __('Suffix') }}</label>
                        <select id="suffix" type="text" class="form-select @error('suffix') is-invalid @enderror" name="suffix" required autocomplete="suffix" autofocus>
                            <option value="0" selected>None</option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                            <option value="5th">5th</option>
                            <option value="6th">6th</option>
                            <option value="7th">7th</option>
                            <option value="8th">8th</option>
                            <option value="9th">9th</option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                            <option value="V">V</option>
                            <option value="Jr.">Jr</option>
                            <option value="Sr.">Sr</option>
                        </select>
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
                        <input id="block" type="hidden" class="form-control" name="block" value="{{ old('block') }}" autofocus> 
                </div>
                {{-- LOT NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="lot" class=" col-form-label text-md-end">{{ __('Lot No.') }}</label> --}}
                        <input id="lot" type="hidden" class="form-control" name="lot" value="{{ old('lot') }}" autofocus>
                </div>
                {{-- PHASE NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="phase" class=" col-form-label text-md-end">{{ __('Phase No.') }}</label> --}}
                        <input id="phase" type="hidden" class="form-control" name="phase" value="{{ old('phase') }}" autofocus>
                </div>
                {{-- HOUSE NO. --}}
                <div class="form-group col-md-2">
                    {{-- <label for="house" class=" col-form-label text-md-end">{{ __('House No.') }}</label> --}}
                        <input id="house" type="hidden" class="form-control" name="house" value="{{ old('house') }}" autofocus>
                </div>
                {{-- STREET --}}
                <div class="form-group col-md-4">
                    {{-- <label for="street" class=" col-form-label text-md-end">{{ __('Street') }}</label> --}}
                        <input id="street" type="hidden" class="form-control" name="street" value="{{ old('street') }}" autofocus>
                </div>
            </div>
            <div class="row">
                {{-- SUBDIVISION --}}
                <div class="form-group col-md-3">
                    {{-- <label for="subdivision" class=" col-form-label text-md-end">{{ __('Subdivision') }}</label> --}}
                        <input id="subdivision" type="hidden" class="form-control @error('subdivision') is-invalid @enderror" name="subdivision" value="{{ old('subdivision') }}" required autocomplete="subdivision" autofocus>
                        @error('subdivision')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- BARANGAY --}}
                <div class="form-group col-md-3">
                    {{-- <label for="barangay" class=" col-form-label text-md-end">{{ __('Barangay') }}</label> --}}
                        <input id="barangay" type="hidden" class="form-control @error('barangay') is-invalid @enderror" name="barangay" value="{{ "Punta 1" }}" required autocomplete="barangay" readonly>
                        @error('barangay')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- CITY/MUNICIPALITY --}}
                <div class="form-group col-md-3">
                    {{-- <label for="city_muni" class=" col-form-label text-md-end">{{ __('City/Municipality') }}</label> --}}
                        <input id="city_muni" type="hidden" class="form-control @error('city_muni') is-invalid @enderror" name="city_muni" value="{{ "Tanza" }}" required autocomplete="city_muni" readonly>
                        @error('city_muni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- PROVINCE --}}
                <div class="form-group col-md-3">
                    {{-- <label for="province" class=" col-form-label text-md-end">{{ __('Province') }}</label> --}}
                        <input id="province" type="hidden" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ "Cavite" }}" required autocomplete="province" readonly>
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
                    <label for="dob" class=" col-form-label text-md-end">{{ __('Date of Birth') }}</label>
                        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- EMAIL --}}
                <div class="form-group col-md-10">
                    <label for="email" class=" col-form-label text-md-end">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            <div class="row">
                {{-- PASSWORD --}}
                <div class="form-group col-md-6">
                    <label for="password" class=" col-form-label text-md-end">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- CONFIRM PASSWORD --}}
                <div class="form-group col-md-6">
                    <label for="password-confirm" class=" col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            {{-- REGISTER AS --}}
            <div class="form-group">
                    {{-- <label for="admin" class=" col-form-label text-md-end">{{ __('Register as: ') }}</label> --}}
                        <input id="admin" type="hidden" class="form-control" name="admin" value="{{ "1" }}" autofocus> 
            </div>
            <div class="row">
            {{-- PLACE OF BIRTH --}}
                {{-- POB CITY/MUNICIPALITY --}}
                <div class="form-group col-md-3">
                    {{-- <label for="pobcity" class=" col-form-label text-md-end">{{ __('Place of Birth') }}</label> --}}
                        <input id="pobcity" type="hidden" class="form-control @error('pobcity') is-invalid @enderror" name="pobcity" value="Tanza" required autocomplete="pobcity" autofocus>
                        {{-- <small class="form-text text-muted">City/Municipality</small> --}}
                        @error('pobcity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- POB PROVINCE --}}
                <div class="form-group col-md-3">
                    {{-- <label for="pob" class=" col-form-label text-md-end">{{ __('nbsp;') }}</label> --}}
                        <input id="pobprovince" type="hidden" class="form-control @error('pobprovince') is-invalid @enderror" name="pobprovince" value="Cavite" required autocomplete="pobprovince" autofocus>
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
                        <input id="civilstatus" type="hidden" class="form-control @error('civilstatus') is-invalid @enderror" name="civilstatus" value="Admin" required autocomplete="civilstatus" autofocus>
                            @error('civilstatus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                {{-- CITIZENSHIP --}}
                <div class="form-group col-md-3">
                    {{-- <label for="citizenship" class=" col-form-label text-md-end">{{ __('Citizenship') }}</label> --}}
                        <input id="citizenship" type="hidden" class="form-control @error('citizenship') is-invalid @enderror" name="citizenship" value="Admin" required autocomplete="citizenship" autofocus>
                        @error('citizenship')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            {{-- SUBMIT --}}
            <hr>
            <div class="row text-center container">
                <a class="btn btn-success" href="#" data-toggle="modal" data-target="ModalDelete">{{ __('Register') }}</a>
                {{-- <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button> --}}
            </div>
            
            @include('auth.modal.register')
        </form>
    @endif
        </div>
      </section>
@endsection
