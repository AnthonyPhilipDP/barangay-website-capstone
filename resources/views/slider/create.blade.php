@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center image-form">
                <form class="col-md-6 image-uplode d-inline-block border shadow-lg rounded p-2 mt-5" action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="m-5">
                        <h3 class="float-start mb-5">Uplode Image For Carousel Slide</h3>
                        <input type="file" class="form-control form-control-lg" name="image" id="image">
                    </div>
                    <div class="m-5">
                        <button class="btn btn-primary">Uplode Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
@endsection
