@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>File a complaint</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li><a href="/index#services">Services</a></li>
              <li><a href="/complaints">Complaint/s</a></li>
              <li>File a complaint</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
            {!! Form::open(['action' => 'App\Http\Controllers\BarangayControllers\ComplaintsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{-- NAGREREKLAMO --}}
            <div class="form-group">
                    <label for="nagrereklamo" class=" col-form-label text-md-end"><strong>{{ __('May sumbong/Nagrereklamo') }}</strong></label>
                        <input id="nagrereklamo" type="text" class="form-control @error('nagrereklamo') is-invalid @enderror" name="nagrereklamo" value="{{ old('nagrereklamo') }}" required autocomplete="name" autofocus>
                        @error('nagrereklamo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </div>
            {{-- ADDRESS --}}
            <div class="form-group">
                <label for="address" class=" col-form-label text-md-end">{{ __('Tirahan') }}</label>
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('number') }}" required autocomplete="name" autofocus>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            {{-- SELPON NUMBER --}}
            <div class="form-group">
                <label for="number" class=" col-form-label text-md-end">{{ __('Phone number (Optional)') }}</label>
                    <input id="number" type="number" class="form-control" name="number" value="{{ old('number') }}" autofocus>
            </div>
            <hr style="border-top: 10px dashed green">
            {{-- INIREREKLAMO --}}
            <div class="form-group">
                <label for="inirereklamo" class=" col-form-label text-md-end"><strong>{{ __('Ipinagsusumbong/Inirereklamo') }}</strong></label>
                    <input id="inirereklamo" type="text" class="form-control @error('inirereklamo') is-invalid @enderror" name="inirereklamo" value="{{ old('inirereklamo') }}" required autocomplete="number" autofocus>
                    @error('inirereklamo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            {{-- ADDRESS ng INIREREKLAMO / address1--}}
            <div class="form-group">
                <label for="address1" class=" col-form-label text-md-end">{{ __('Tirahan') }}</label>
                    <input id="address1" type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{ old('address1') }}" required autocomplete="name" autofocus>
                    @error('address1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            {{-- SELPON NUMBER NG INIREREKLAMO / number1 --}}
            <div class="form-group">
                <label for="number1" class=" col-form-label text-md-end">{{ __('Phone number (Optional)') }}</label>
                    <input id="number1" type="number" class="form-control" name="number1" value="{{ old('number1') }}" autofocus>
            </div>
            <hr style="border-top: 10px dashed green">
            {{-- SUBJECT --}}
            <div class="form-group">
                <label for="subject" class=" col-form-label text-md-end">{{ __('Usapin ukol sa:') }}</label>
                    <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="name" autofocus>
                    @error('subject')
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
            {{-- SOLVED --}}
            <div class="form-group">
                {{-- <label for="solved" class=" col-form-label text-md-end">{{ __('solved solved solved:') }}</label> --}}
                    <input id="solved" type="hidden" class="form-control @error('solved') is-invalid @enderror" name="solved" value="false" required autocomplete="solved" readonly>
                    @error('solved')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            {{-- Imahe --}}
            {{-- <input
                type='file'
                class=""
                name="image"> --}}
                <br>
            <div class="form-group">
                {{Form::label('salaysay', 'Salaysay')}}
                {{Form::textarea('salaysay', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Iyong salaysay'])}}
            </div><br>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
        </div>
      </section>
@endsection