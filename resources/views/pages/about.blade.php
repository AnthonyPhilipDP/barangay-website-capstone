@extends('layouts.app')

@section('content')
    <div class="container" id="about" style="font-size: 21px">
        <br>
        <div style="text-align: center;">
            <i class="fa-solid fa-house fa-5x"></i>
            <h4 style="margin-top: 0.25em;">About</h4>
            <p><strong>Punta I</strong> is a barangay in the municipality of Tanza, in the province of Cavite. 
                Its population as determined by the 2020 Census was 20,403. 
                This represented 6.54% of the total population of Tanza.</p>  
        </div>
        <section id="location">
            <hr>
            <div class="text-center">
                <h4 style="margin-top: 0.25em;">Barangay Location</h4>
                <img src="{{asset('images/essentials/PuntaMap.png')}}" alt="image" style="width: 500px; height: auto;"><br>
                <button class="btn btn-outline-info btn-sm" ><a href="https://www.google.com/maps/@14.3526,120.8599,4443m/data=!3m1!1e3" style="color: gray" target="_blank" rel="noopener noreferrer">View in Google Map</a></button>
                <br>
                <br>
                <p><strong>Punta I</strong> is situated at approximately 14.3526, 120.8599, in the island of Luzon. 
                Elevation at these coordinates is estimated at 40.8 meters or 133.9 feet above mean sea level.</p> 
            </div>
        </section>
        <section id="chart">
            <hr>
            <div class="text-center">
                <img src="{{asset('images/essentials/OrgChart.jpg')}}" alt="image" style="width: 1000px; height: auto;"><br>
                Organizational Chart of Sangguniang Barangay of Punta - I
            </div>
        </section>
        <hr>
    </div>
@endsection