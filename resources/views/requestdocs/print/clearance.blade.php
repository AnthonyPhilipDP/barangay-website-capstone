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
            <br>
            <div class="clearance" style="align-content: center">
                <div class="clearancecontent"> 
                    <div class="clearancefont">
                    
                    {!! Form::open(['action' , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <br>
                    To Whom It May Concern:<br>  
                    {{-- @if($clearance->house != null)
                        I have value
                    @else                                   ///checking if have hasValue okay?
                        I dont have value
                    @endif --}}
                    @if($clearance->suffix == 0)
                        &emsp;&emsp;This is to certify that <label class="underline mt-2" style="text-transform: uppercase"><strong>&emsp;{{$clearance->name}} {{$clearance->middle}}. {{$clearance->lastname}}&emsp;</strong></label> is known to be of the following:<br><br>
                    @else
                        &emsp;&emsp;This is to certify that <label class="underline mt-2" style="text-transform: uppercase"><strong>&emsp;{{$clearance->name}} {{$clearance->middle}}. {{$clearance->lastname}} {{$clearance->suffix}}&emsp;</strong></label> is known to be of the following:<br><br>
                    @endif
                        Age&emsp;:	        <label class="underline">&emsp;{{$clearance->age}} years old&emsp;</label><br>
                        Civil Status&emsp;:	<label class="underline">&emsp;{{$clearance->civilstatus}}&emsp;</label><br>
                        Citizenship&emsp;:	    <label class="underline" style="text-transform: uppercase;">&emsp;{{$clearance->citizenship}}&emsp;</label><br>
                        Date of Birth&emsp;:	<label class="underline">&emsp;{{$clearance->dob}}&emsp;</label><br>
                        Place of Birth&emsp;:<label class="underline">&emsp;{{$clearance->pob}}&emsp;</label><br>
                        Length of Stay&emsp;:	<label class="underline">&emsp;{{$clearance->los}}&emsp;</label> <br>                                      
                        Address&emsp;:	        <label class="underline">&emsp;
                            {{-- If I have value --}}
                            @if($clearance->block != null || $clearance->lot != null || $clearance->phase != null || $clearance->subdivision != null)
                                Block {{ $clearance->block }} Lot {{ $clearance->lot }} Phase {{ $clearance->phase }} {{ $clearance->subdivision }}
                            {{-- If I dont have value --}}
                            @else
                                House no. {{ $clearance->house }}, {{ $clearance->street }}
                            @endif
                            &emsp;</label><br>
                        &emsp;&emsp;&emsp;&emsp;&emsp;<label class="underline">&emsp;{{$clearance->barangay}}, {{$clearance->city_muni}}, {{$clearance->province}} 4108&emsp;</label>
                        <br>
                        <br>
                        <div style="text-align: justify">
                        &emsp;&emsp;This further certifies that the above named is a person of a good moral character, integrity, and has no derogatory records filled in this office as of this date.
                        </div>
                        <br>
                        &emsp;&emsp;This certification is issued for <label class="underline mt-2">&emsp;{{$clearance->purpose}}&emsp;</label> purposes.
                        <br>
                        <br>
                        &emsp;&emsp;Issued this day <label class="underline">&emsp;{{ now()->format('j') }}&emsp;</label> of <label class="underline">&emsp;{{ now()->format('F') }}&emsp;</label>, {{ now()->format('Y') }}
                        <br>
                        <br>
                        <br>
                        <label style="text-decoration: overline">Specimen Signature of Requestor</label>
                        {{-- Signature --}}
                        <label class="clearancesign"><img src="{{asset('images/templates/CAPT.png')}}"></label>
                        <br><br><br>
                        <label class="capt"><strong style="text-transform: uppercase; text-decoration: underline;">{{'anacleto S. clamosa'}}</strong>
                        <br>
                        Punong Barangay
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
