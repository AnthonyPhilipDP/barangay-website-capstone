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
            <div class="businessclearance" style="align-content: center">
                <div class="businesscontent"> 
                    <div class="font">
                    <br>
                    TO WHOM IT MAY CONCERN:<br>
                        This is to certify that the business or trade activity described below:<br><br>
                        <div class="businessname">
                            <label style="text-decoration: underline"><strong>{{$businessclearance->businessname}}</strong> </label> 
                            </div>
                            <div class="text-center">
                            <small><i>(Business Name/Trade Activity)</i></small>
                        </div>
                        <br>
                        <div class="businessaddress">              
                            <label style="text-decoration: underline">Block {{$businessclearance->block}} Lot {{$businessclearance->lot}} Phase {{$businessclearance->phase}} {{$businessclearance->subdivision}}</label><br>
                            <label style="text-decoration: underline">{{$businessclearance->barangay}}, {{$businessclearance->city_muni}}, {{$businessclearance->province}} 4108</label>
                            <br>
                            <small><i>(Location)</i></small>
                        </div>
                        <br>
                        <div class="businessoperator">
                            <label style="text-decoration: underline"><strong>{{$businessclearance->name}} {{$businessclearance->middle}}. {{$businessclearance->lastname}}</strong> </label> 
                            </div>
                            <div class="text-center">
                            <small><i>(Operator/Manager)</i></small>
                        </div>
                        <br>
                        <div style="text-align: justify">
                            proposed to be established in this Barangay and is being applied for a Barangay Clearance or Business Permit to be used in securing a corresponding Mayor's Permit has been found to be:                                            
                        </div>
                        <br>
                        <ul>
                            <li>In conformity with the provisions of existing Barangay Ordinances, rules
                                and regulations being enforced in this Barangay;
                            </li>
                            <li>Not among those businesses or trade activities being banned to be         	
                                Established in this Barangay;
                            </li>
                            <li>In view of the foregoing, this Barangay, thru the undersigned – Interpose no objection for the issuance of the corresponding Mayor’s
                                Permit being applied for.
                            </li>
                        </ul>
                        <div class="businesssign"><img src="{{asset('images/templates/CAPT.png')}}">
                            <label class="capt"  style="text-transform: uppercase"><strong>{{'anacleto S. clamosa'}}</strong>
                            <br>
                            </label>
                            <div class="punongbrgy">
                                Punong Barangay
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>