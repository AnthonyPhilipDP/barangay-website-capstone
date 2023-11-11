@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Edit complaint</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li><a href="/complaints">Complaint</a></li>
              <li>Edit complaint no. {{ $complaint->id }}</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
            {!! Form::open(['action' => ['App\Http\Controllers\BarangayControllers\ComplaintsController@update', $complaint->id], 'method' => 'POST']) !!}
            {{-- NAGREREKLAMO --}}
            <div class="form-group">
                <strong><label for="nagrereklamo" class=" col-form-label text-md-end">{{ __('May sumbong/Nagrereklamo') }}</label></strong>
                <input id="nagrereklamo" type="text" class="form-control @error('nagrereklamo') is-invalid @enderror" name="nagrereklamo" value="{{ $complaint->nagrereklamo }}" required autocomplete="name" autofocus>
            </div>
            {{-- ADDRESS --}}
            <div class="form-group">
                <label for="address" class=" col-form-label text-md-end">{{ __('Tirahan') }}</label>
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $complaint->address }}" required autocomplete="name" autofocus>
            </div>
            {{-- NUMBER --}}
            <div class="form-group">
                <label for="number" class=" col-form-label text-md-end">{{ __('Contact No. (Optional)') }}</label>
                <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ $complaint->number }}" required autocomplete="name" autofocus>
            </div>
            <hr style="border-top: 10px dashed green">
            {{-- INIREREKLAMO --}}
            <div class="form-group">
                <strong><label for="inirereklamo" class=" col-form-label text-md-end">{{ __('Inirereklamo') }}</label></strong>
                <input id="inirereklamo" type="text" class="form-control @error('inirereklamo') is-invalid @enderror" name="inirereklamo" value="{{ $complaint->inirereklamo }}" required autocomplete="name" autofocus>
            </div>
            {{-- ADDRESS NG INIREREKLAMO / address1 --}}
            <div class="form-group">
                <label for="address1" class=" col-form-label text-md-end">{{ __('Tirahan') }}</label>
                <input id="address1" type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{ $complaint->address1 }}" required autocomplete="name" autofocus>
            </div>
            {{-- NUMBER NG INIREREKLAMO / number1 --}}
            <div class="form-group">
                <label for="number1" class=" col-form-label text-md-end">{{ __('Contact No. (Optional)') }}</label>
                <input id="number1" type="text" class="form-control @error('number1') is-invalid @enderror" name="number1" value="{{ $complaint->number1 }}" required autocomplete="name" autofocus>
            </div>
            <hr style="border-top: 10px dashed green">
            {{-- SUBJECT --}}
            <div class="form-group">
                <label for="subject" class=" col-form-label text-md-end">{{ __('Usapin ukol sa:') }}</label>
                <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ $complaint->subject }}" required autocomplete="name" autofocus>
            </div>
            {{-- SALAYSAY --}}
            <div class="form-group">
                <label for="salaysay" class=" col-form-label text-md-end">{{ __('Salaysay') }}</label>
                <textarea id="salaysay" rows="8" type="text" class="form-control @error('salaysay') is-invalid @enderror" name="salaysay" required autocomplete="name" autofocus>{!!$complaint->salaysay!!}</textarea>
            </div>
            {{-- USER_ID --}}
            <div class="form-group">
                <input id="user_id" type="hidden" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ $complaint->user_id }}" required autocomplete="name" readonly>
            </div>
            {{-- USER_EMAIL --}}
            <div class="form-group">
                <input id="user_email" type="hidden" class="form-control @error('user_email') is-invalid @enderror" name="user_email" value="{{ $complaint->user_email }}" required autocomplete="name" readonly>
            </div>
            <br>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary', 'style' => 'float: right'])}}
            {!! Form::close() !!}
        </div>
    </section>
@endsection