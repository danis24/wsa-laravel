<!DOCTYPE html>
<html lang="@yield('lang', config('app.locale', 'en'))">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Atnic">

  <title>@yield('title', config('app.name', 'WSA-Analyzer'))</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Styles -->
  @section('styles')
  <link href="{{ mix('/css/inspinia.css') }}" rel="stylesheet">
  @show

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  @stack('head')
</head>
<body id="page-top" class="landing-page no-skin-config">

     <div class="navbar-wrapper">
          <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
               <div class="container">
                    <div class="navbar-header page-scroll">
                         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                         </button>
                         <a class="navbar-brand" href="/">WS-ANALYZER</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                         <ul class="nav navbar-nav navbar-right">
                              <li><a class="page-scroll" href="#page-top">Home</a></li>
                              <li><a class="page-scroll" href="#features">Features</a></li>
                              <li><a class="page-scroll" href="#testimonials">About Us</a></li>
                              <li><a class="page-scroll" href="#contact">Contact</a></li>
                              <!-- <li><a class="page-scroll" href="#team">Owner</a></li> -->
                              <li><a class="page-scroll" href="/login">Login</a></li>
                              <li><a class="page-scroll" href="/register">Signup</a></li>
                         </ul>
                    </div>
               </div>
          </nav>
     </div>
     <div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
               <div class="item active">
                    <div class="container">
                         <div class="carousel-caption">
                              <h1>Website Vulnerabilities Scanner</h1>
                              <p>powered by 100+ ethical hackers</p>
                              <p>
                                   <a class="btn btn-lg btn-primary" href="/register" role="button">Try Now</a>
                              </p>
                         </div>
                    </div>
                    <!-- Set background for slide in css -->
                    <div class="header-back one"></div>

               </div>
          </div>
     </div>


     <section id="features" class="container services">
          <div class="row">
               <div class="col-sm-3">
                    <h2>Severity Analyzer</h2>
                    <p>Severity level is a security level that becomes a reference whether a website vulnerable to attack, by using severity lever we can see the level of the gap, how dangerous the gap is, High, Medium or Low</p>
               </div>
               <div class="col-sm-3">
                    <h2>vulnerabilites Scanner</h2>
                    <p>In computer security, a vulnerability is a weakness which allows an attacker to reduce a system's information assurance. Vulnerabilities are the intersection of three elements: a system susceptibility or flaw, attacker access to the flaw, and attacker capability to exploit the flaw.</p>
               </div>
               <div class="col-sm-3">
                    <h2>MULTIPLE SCAN</h2>
                    <p>We can do a lot of scans of a website at once by using the method of event and listen so that the scanning process takes place in the background</p>
               </div>
               <div class="col-sm-3">
                    <h2>Report Generator</h2>
                    <p>The results of the scanner will be displayed in a report generated according to the bug or gap contained in the website according to the level of severitynya</p>
               </div>
          </div>
     </section>

     <section  class="container features">
          <div class="row">
               <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>SECURE YOUR WEBSITE NOW</h1><br>
               </div>
          </div>
          <div class="row">
               <div class="col-md-4 text-center wow fadeInLeft">
                    <div>
                         <i class="fa fa-pencil-square-o features-icon"></i>
                         <h2>LOGIN / REGISTER</h2>
                         <p>Before scan your website please register for new account or login for user.</p>
                    </div>
                    <div class="m-t-lg">
                         <i class="fa fa-dot-circle-o features-icon"></i>
                         <h2>SCAN YOUR WEBSITE</h2>
                         <p>Scan your website after verify domain in the your hosting</p>
                    </div>
               </div>
               <div class="col-md-4 text-center  wow zoomIn">
                    <div>
                         <i class="fa fa-sitemap features-icon"></i>
                         <h2>ADD YOUR DOMAIN</h2>
                         <p>Add your domain for scan your website in the form add target from main panel</p>
                    </div>
                    <div class="m-t-lg">
                         <i class="fa fa-bar-chart features-icon"></i>
                         <h2>SECURITY ASSESSMENT REPORT</h2>
                         <p>Make result after your site success the scan</p>
                    </div>
               </div>
               <div class="col-md-4 text-center wow fadeInRight">
                    <div>
                         <i class="fa fa-envelope features-icon"></i>
                         <h2>VERIFY DOMAIN OWNERSHIP</h2>
                         <p>Please verify your ownership with download and upload file verification on your host.</p>
                    </div>
                    <div class="m-t-lg">
                         <i class="fa fa-print features-icon"></i>
                         <h2>GENERATE REPORT</h2>
                         <p>after tested your site generate report for real report in the scanner.</p>
                    </div>
               </div>
          </div>
     </section>

     <section id="team" class="gray-section team">
          <!-- <div class="container">
          <div class="row m-b-lg">
          <div class="col-lg-12 text-center">
          <div class="navy-line"></div>
          <h1>OWNER</h1>
          <p>Safe your system with hight security</p>
     </div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="team-member wow zoomIn">
<img style="width: 200px; height: 200px; margin-bottom: 20px;" src="<%= image_path('landing/avatar.jpg') %>" class="img-responsive img-circle" alt="">
<h4><span class="navy">Danis</span> Yogaswara</h4>
<p>We work with love and love with life</p>
<ul class="list-inline social-icon">
<li><a href="#"><i class="fa fa-twitter"></i></a>
</li>
<li><a href="#"><i class="fa fa-facebook"></i></a>
</li>
<li><a href="#"><i class="fa fa-linkedin"></i></a>
</li>
</ul>
</div>
</div>
</div>
</div>
</section> -->

<section id="testimonials" class="navy-section testimonials" style="margin-top: 0">
     <div class="container">
          <div class="row">
               <div class="col-lg-12 text-center wow zoomIn">
                    <h1>
                         About us
                    </h1>
                    <div class="testimonials-text">
                         WS-ANALYZER is a web security scanner that performs fully automated tests to identify security issues on your website. It checks for SQL injections, XSS and 700+ other vulnerabilities. Together with our network of handpicked ethical hackers, we detect vulnerabilities for you before hackers do.
                    </div>
               </div>
          </div>
     </div>

</section>

<section id="contact" class="gray-section contact">
     <div class="container">
          <div class="row m-b-lg">
               <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Contact Us</h1>
                    <p>if any suggestions or criticism can be directly sent via email below</p>
               </div>
          </div>
          <div class="row m-b-lg">
               <div class="col-lg-3 col-lg-offset-3">
                    <address>
                         <strong><span class="navy">Cyfo, Inc.</span></strong><br/>
                         Kp. Cibiru Tonggoh RT 01 RW 07, Ds. Cibiru Wetan<br/>
                         Kec, Cileunyi, 40625, Jawa Barat, Indonesia<br/>
                         <abbr title="Phone">P:</abbr> (+62) 89-6691-236-46
                    </address>
               </div>
               <div class="col-lg-4">
                    <p class="text-color">
                         this application is made to meet the graduation requirements in the form of application products that must be created with the title Web Secuity Analizer, Author: Danis Yogaswara.
                    </p>
               </div>
          </div>
          <div class="row">
               <div class="col-lg-12 text-center">
                    <a href="mailto:danistutorial@gmail.com" class="btn btn-primary">Send us mail</a>
                    <p class="m-t-sm">
                         Or follow us on social platform
                    </p>
                    <ul class="list-inline social-icon">
                         <li><a href="#"><i class="fa fa-twitter"></i></a>
                         </li>
                         <li><a href="#"><i class="fa fa-facebook"></i></a>
                         </li>
                         <li><a href="#"><i class="fa fa-linkedin"></i></a>
                         </li>
                    </ul>
               </div>
          </div>
          <div class="row">
               <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                    <p><strong>&copy; 2018 Cyfo Inc @ Danis Yogaswara</strong></p>
               </div>
          </div>
     </div>
</section>
@yield('content')

@section('scripts')
<!-- Mainly scripts -->
<script src="http://webapplayers.com/inspinia_admin-v2.7.1/js/jquery-3.1.1.min.js"></script>
<script src="http://webapplayers.com/inspinia_admin-v2.7.1/js/bootstrap.min.js"></script>
<script src="http://webapplayers.com/inspinia_admin-v2.7.1/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="http://webapplayers.com/inspinia_admin-v2.7.1/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="http://webapplayers.com/inspinia_admin-v2.7.1/js/inspinia.js"></script>
<script src="http://webapplayers.com/inspinia_admin-v2.7.1/js/plugins/pace/pace.min.js"></script>
<script src="http://webapplayers.com/inspinia_admin-v2.7.1/js/plugins/wow/wow.min.js"></script>

@show
@stack('body')
<script type="text/javascript">


$(function() {

     $('body').addClass('landing-page');
     $('body').attr('id', 'page-top');

     $('body').scrollspy({
          target: '.navbar-fixed-top',
          offset: 80
     });

     // Page scrolling feature
     $('a.page-scroll').bind('click', function(event) {
          var link = $(this);
          $('html, body').stop().animate({
               scrollTop: $(link.attr('href')).offset().top - 50
          }, 500);
          event.preventDefault();
          $("#navbar").collapse('hide');
     });

     var cbpAnimatedHeader = (function() {
          var docElem = document.documentElement,
          header = document.querySelector( '.navbar-default' ),
          didScroll = false,
          changeHeaderOn = 200;
          function init() {
               window.addEventListener( 'scroll', function( event ) {
                    if( !didScroll ) {
                         didScroll = true;
                         setTimeout( scrollPage, 250 );
                    }
               }, false );
          }
          function scrollPage() {
               var sy = scrollY();
               if ( sy >= changeHeaderOn ) {
                    $(header).addClass('navbar-scroll')
               }
               else {
                    $(header).removeClass('navbar-scroll')
               }
               didScroll = false;
          }
          function scrollY() {
               return window.pageYOffset || docElem.scrollTop;
          }
          init();

     })();


     // Activate WOW.js plugin for animation on scrol
     new WOW().init();


});

</script>
</body>
</html>
