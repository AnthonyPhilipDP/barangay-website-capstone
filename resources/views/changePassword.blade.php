@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Change Password</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li><a href="/home">Account</a></li>
              <li>Change Password</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
  
      <section class="inner-page pt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('change.password') }}">
                                @csrf 
          
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                                    <br><br>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                    <br><br>
                                    <div class="col-md-6">
                                        <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                    </div>
                                </div>
          
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
                                    <br><br>
                                    <div class="col-md-6">
                                        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                    </div>
                                </div>
           
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
@endsection