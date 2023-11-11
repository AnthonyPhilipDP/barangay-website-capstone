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
            <div class="residency" style="align-content: center">
                <div class="residencycontent"> 
                    <div class="residencyfont">
                    
                    {!! Form::open(['action' , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    
                    To Whom It May Concern:<br>  
                    {{-- @if($residency->house != null)
                        I have value
                    @else                                   ///checking if have hasValue okay?
                        I dont have value
                    @endif --}}
                    @if($residency->suffix == 0)
                        &emsp;&emsp;This is to certify that <label class="underline mt-2" style="text-transform: uppercase"><strong>&emsp;{{$residency->name}} {{$residency->middle}}. {{$residency->lastname}}&emsp;</strong></label> is known to be of the following:<br><br>
                    @else
                        &emsp;&emsp;This is to certify that <label class="underline mt-2" style="text-transform: uppercase"><strong>&emsp;{{$residency->name}} {{$residency->middle}}. {{$residency->lastname}} {{$residency->suffix}}&emsp;</strong></label> is known to be of the following:<br><br>
                    @endif
                        Age&emsp;:	        <label class="underline">&emsp;{{$residency->age}} years old&emsp;</label><br>
                        Civil Status&emsp;:	<label class="underline">&emsp;{{$residency->civilstatus}}&emsp;</label><br>
                        Citizenship&emsp;:	    <label class="underline" style="text-transform: uppercase;">&emsp;{{$residency->citizenship}}&emsp;</label><br>
                        Date of Birth&emsp;:	<label class="underline">&emsp;{{$residency->dob}}&emsp;</label><br>
                        Place of Birth&emsp;:<label class="underline">&emsp;{{$residency->pobcity}}, {{$residency->pobprovince}}&emsp;</label><br>
                        Length of Stay&emsp;:	<label class="underline">&emsp;{{$residency->los}}&emsp;</label> <br>                                      
                        Address&emsp;:	        <label class="underline">&emsp;
                            {{-- If I have value --}}
                            @if($residency->block != null || $residency->lot != null || $residency->phase != null || $residency->subdivision != null)
                            Block {{$residency->block}} Lot {{$residency->lot}} Phase {{$residency->phase}} {{$residency->subdivision}}
                            {{-- If I dont have value --}}
                            @else
                                House no. {{$residency->house}}, {{$residency->street}}
                            @endif
                            &emsp;</label><br>
                        &emsp;&emsp;&emsp;&emsp;&emsp;<label class="underline">&emsp;{{$residency->barangay}}, {{$residency->city_muni}}, {{$residency->province}} 4108&emsp;</label>
                        <br>
                        <br>
                        <div style="text-align: justify">
                        &emsp;&emsp;This further certifies that as per records of census in the barangay, he/she and his/her family/next of kin are known to me to be a bona fide resident and a registered voter/RBI member in this Barangay of good moral character, never been involved in any irregularities and has no derogatory record nor pending case filed in this office. 
                        </div>
                        &emsp;&emsp;This certification is issued for <label class="underline mt-2">&emsp;{{$residency->purpose}}&emsp;</label> purposes.
                        <br>
                        &emsp;&emsp;Issued this day <label class="underline">&emsp;{{ now()->format('j') }}&emsp;</label> of <label class="underline">&emsp;{{ now()->format('F') }}&emsp;</label>, {{ now()->format('Y') }}
                        <br>
                        <br>
                        <br>
                        <label style="text-decoration: overline">Specimen Signature of Requestor</label>
                        {{-- Signature --}}
                        <label class="residencysign"><img src="{{asset('images/templates/CAPT.png')}}"></label>
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
