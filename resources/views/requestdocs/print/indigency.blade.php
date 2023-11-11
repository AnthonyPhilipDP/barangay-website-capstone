<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
  
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
      
        <title>Barangay Punta Uno</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
      
        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
      
        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
      
        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
      
        <!-- =======================================================
        * Template Name: Reveal - v4.9.1
        * Template URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
      </head>
    <script type="text/javascript">	
        window.print();
        setTimeout(function()
            {
            window.close()
            },750)
    </script>
    <body>
        <div class="content">
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
                    &emsp;&emsp;&emsp;Issued this day &emsp;{{ $indigency->created_at->format('j') }}&emsp; of &emsp;{{ $indigency->created_at->format('F') }}&emsp;, {{ $indigency->created_at->format('Y') }}
                    <br>
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
        </div>
    </body>
</html>
