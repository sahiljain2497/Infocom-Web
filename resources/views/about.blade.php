@extends('layouts.global')

@section('content')
<div class="container about-container">
    <div class="row">
       <div class="col-sm-6 about_us_point">
            <h2>ABOUT OUR COMPANY</h2>
                <hr/>
                <br/>
                <h5><u>WHAT WE DO?</u></h5>
                <br/>
            <ul>
                <li>End to End Service Provider for Telecom and IT Solutions.</li>
                <li>RF Survey for 2G, 3G and 4G telecom network.</li>
                <li>EMI and EMF testing for tower radiation, Radiation testing, Drive test and optimization.</li>
                <li>Installation of all kinds of equipment including Microwave, BTS, BSC, IBS, MSAN etc.</li>
                <li>Commissioning of various 2G, 3G, 4G equipment</li>
                <li>Providing experienced Telecom and IT man power to clients.</li>
                <li>Providing complete IT solutions in the field of Cloud computing, Networking, Software</li> 
            </ul>
        </div>
        <div class="col-sm-6">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/about-image-1.jpg" alt="Tower-1" width="100%" height="100%">
                    </div>
                    <div class="carousel-item">
                        <img src="images/about-image-2.jpg" alt="Tower-2" width="100%" height="100%">
                    </div>
                    <div class="carousel-item">
                        <img src="images/about-image-3.jpg" alt="Tower-3" width="100%" height="100%">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection