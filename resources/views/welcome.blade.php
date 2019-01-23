<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      
      <title>{{ config('app.name', 'Laravel') }}</title>
      
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      
      <!-- Fonts -->
      <link rel="dns-prefetch" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">

    </head>
    <body>
       {{-- <div id="landingPage"></div>  --}}

      <header>
        <div class="header-top">
          <div class="logo">
            <img src="{{ URL::to('/').'/images/logo.png' }}">
          </div>
          <div class="account-menu">
              
            <span>Already a member?</span><a class="login-toggle" href="#">Login</a>
            <div id="login-form" class="login-form">
              <!-- <form method="POST" action="{{ route('client.login.submit') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">

                    
                        <input id="email" type="text" class="form-control" name="email" placeholder="Username" value="{{ old('email') }}" required autofocus>
                    
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                    
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    
                </div>
                <button type="submit" class="btn btn-primary">
                    Login
                </button>
              </form> -->
            </div>
          </div>
        </div>
        <div class="header-register">
          <div id="register-form" class="register-form">
            <!-- <div class="register-title">Create a new account</div>
            <a class="social-register face" href="#">Sign up with facebook</a>
            <a class="social-register google" href="#">Sign up with Google</a>

            <div class="register-separator">
              <div class="separator-icon"></div>
            </div>

            <form method="post">
              <div class="birthday">
                <div class="birthday-label">Birthday</div>
                <div class="birthday-date">
                  <input type="text" name="month" class="month" placeholder="Aug">
                  <input type="text" name="date" class="date" placeholder="21">
                  <input type="text" name="year" class="year" placeholder="1993">
                </div>
              </div>

              <div class="gender">
                <div class="gender-radio gender-male checked">
                  <input type="radio" name="gender" class="male" value="male" checked><span>Male</span>
                </div>
                <div class="gender-radio gender-female">
                  <input type="radio" name="gender" class="female" value="female"><span>Female</span>
                </div>
              </div>
              <input type="text" name="username" class="account-details" placeholder="Username">
              <input type="email" name="email" class="account-details" placeholder="E-mail">
              <input type="password" name="password" class="account-details" placeholder="Password">
              <input type="password" name="password_confirmation" class="account-details" placeholder="Repeat password">
              <input type="submit" class="register-submit" value="Register">
            </form> -->
            
          </div>

          <div class="header-social">
            <div class="social-icon">
              <div class="social-label">Follow us</div>
              <a href="" class="face"></a>
              <a href="" class="instagram"></a>
            </div>
          </div>
        </div>
      </header>
      <section class="offers-section">
        <div class="container">
          <div class="section-title">What we offer to our users?</div>
          <div class="section-separator">
            <img src="{{ URL::to('/').'/images/section-separator.jpg' }}">
          </div>
          <div class="row-grid">
            <div class="grid-item">
              <div class="offer-img"><img src="{{ URL::to('/').'/images/anti-scam.png' }}"></div>
              <div class="offer-title">Anti-scam system</div>
              <div class="offer-description">Lorem Ipsum is simply dummy text of the printing typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever s∂ince the 1500s, when an unknown printer took a galley </div>
            </div>
            <div class="grid-item">
              <div class="offer-img"><img src="{{ URL::to('/').'/images/support.png' }}"></div>
              <div class="offer-title">Support 24/7</div>
              <div class="offer-description">Lorem Ipsum is simply dummy text of the printing typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever s∂ince the 1500s, when an unknown printer took a galley </div>
            </div>
            <div class="grid-item">
              <div class="offer-img"><img src="{{ URL::to('/').'/images/matching.png' }}"></div>
              <div class="offer-title">Q-matching</div>
              <div class="offer-description">Lorem Ipsum is simply dummy text of the printing typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever s∂ince the 1500s, when an unknown printer took a galley </div>
            </div>
          </div>
          <div class="section-title">Meet singles across the world</div>
          <div class="section-separator">
            <img src="{{ URL::to('/').'/images/section-separator.jpg' }}">
          </div>
        </div>
      </section>

      <section class="meet-section">
        <div class="container">
          <div class="row-grid top">
            <div class="grid-item">
              <img src="{{ URL::to('/').'/images/single-img-1.png' }}">
              <div class="info-wrap">
                <div class="info">
                  <span class="name">Lara<span>, <span class="age">23<span>
                </div>
                <div class="status">
                  <img class="status-icon" src="{{ URL::to('/').'/images/online-icon.png' }}">
                  <span class="status-name">online</span>
                </div>
              </div>
            </div>
            <div class="grid-item">
              <img src="{{ URL::to('/').'/images/single-img-2.png' }}">
              <div class="info-wrap">
                <div class="info">
                  <span class="name">Ivona<span>, <span class="age">23<span>
                </div>
                <div class="status">
                  <img class="status-icon" src="{{ URL::to('/').'/images/online-icon.png' }}">
                  <span class="status-name">online</span>
                </div>
              </div>
            </div>
            <div class="grid-item">
              <img src="{{ URL::to('/').'/images/single-img-3.png' }}">
              <div class="info-wrap">
                <div class="info">
                  <span class="name">Jasmina<span>, <span class="age">23<span>
                </div>
                <div class="status">
                  <img class="status-icon" src="{{ URL::to('/').'/images/online-icon.png' }}">
                  <span class="status-name">online</span>
                </div>
              </div>
            </div>
          </div>

          <div class="row-grid bottom">
            <div class="grid-item">
              <img src="{{ URL::to('/').'/images/single-img-1.png' }}">
              <div class="info-wrap">
                <div class="info">
                  <span class="name">Lara<span>, <span class="age">23<span>
                </div>
                <div class="status">
                  <img class="status-icon" src="{{ URL::to('/').'/images/online-icon.png' }}">
                  <span class="status-name">online</span>
                </div>
              </div>
            </div>
            <div class="grid-item">
              <img src="{{ URL::to('/').'/images/single-img-2.png' }}">
              <div class="info-wrap">
                <div class="info">
                  <span class="name">Ivona<span>, <span class="age">23<span>
                </div>
                <div class="status">
                  <img class="status-icon" src="{{ URL::to('/').'/images/online-icon.png' }}">
                  <span class="status-name">online</span>
                </div>
              </div>
            </div>
            <div class="grid-item">
              <img src="{{ URL::to('/').'/images/single-img-3.png' }}">
              <div class="info-wrap">
                <div class="info">
                  <span class="name">Jasmina<span>, <span class="age">23<span>
                </div>
                <div class="status">
                  <img class="status-icon" src="{{ URL::to('/').'/images/online-icon.png' }}">
                  <span class="status-name">online</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="testimonial-section">
        <div class="container">
          <div class="register-button">
            <a href="#register-form">Register now</a>
          </div>
          <div class="section-title">LunaDate experiences</div>
          <div class="section-separator">
            <img src="{{ URL::to('/').'/images/section-separator.jpg' }}">
          </div>
          {{--<div class="row">--}}
              {{--<div class="col-md-12">--}}
                  <div id="testimonial-slider" class="owl-carousel">
                      <div class="testimonial">
                          <div class="pic">
                              <img src="{{ URL::to('/').'/images/testimonial-img-1.png' }}">
                          </div>
                          <div class="info">
                            <div class="info-header">
                              <h3 class="title"><span class="name">John</span>, <span class="age">46</span></h3>
                              <span class="country">New Baltimore, NY, US</span>
                            </div>
                            <p class="description">
                              "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras suscipit arcu sed scelerisque auctor. Vestibulum justo enim, dapibus sed magna sed, consequat accumsan nunc. Vivamus."
                            </p>
                          </div>                          
                      </div>
      
                      <div class="testimonial">
                          <div class="pic">
                              <img src="{{ URL::to('/').'/images/testimonial-img-2.png' }}">
                          </div>
                          <div class="info">
                            <div class="info-header">
                              <h3 class="title"><span class="name">John</span>, <span class="age">46</span></h3>
                              <span class="country">New Baltimore, NY, US</span>
                            </div>
                            <p class="description">
                              "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras suscipit arcu sed scelerisque auctor. Vestibulum justo enim, dapibus sed magna sed, consequat accumsan nunc. Vivamus."
                            </p>
                          </div>                          
                      </div>

                      <div class="testimonial">
                          <div class="pic">
                              <img src="{{ URL::to('/').'/images/testimonial-img-1.png' }}">
                          </div>
                          <div class="info">
                            <div class="info-header">
                              <h3 class="title"><span class="name">John</span>, <span class="age">46</span></h3>
                              <span class="country">New Baltimore, NY, US</span>
                            </div>
                            <p class="description">
                              "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras suscipit arcu sed scelerisque auctor. Vestibulum justo enim, dapibus sed magna sed, consequat accumsan nunc. Vivamus."
                            </p>
                          </div>                          
                      </div>
      
                      <div class="testimonial">
                          <div class="pic">
                              <img src="{{ URL::to('/').'/images/testimonial-img-2.png' }}">
                          </div>
                          <div class="info">
                            <div class="info-header">
                              <h3 class="title"><span class="name">John</span>, <span class="age">46</span></h3>
                              <span class="country">New Baltimore, NY, US</span>
                            </div>
                            <p class="description">
                              "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras suscipit arcu sed scelerisque auctor. Vestibulum justo enim, dapibus sed magna sed, consequat accumsan nunc. Vivamus."
                            </p>
                          </div>                          
                      </div>
                  </div>
              {{--</div>--}}
          {{--</div>--}}
          <div class="section-title section-title-video">Why LunaDate is the best dating website?</div>
          <div class="section-separator">
            <img src="{{ URL::to('/').'/images/section-separator.jpg' }}">
          </div>
        </div>
      </section>

      <section class="video-section">
        <div class="container">
          <div class="video-row">
            <div class="video-col">
            <video controls>
              <source src="{{ URL::to('/').'/videos/video1.mp4' }}" type="video/mp4">
            </video>
            </div>
            <div class="description">
            Lorem Ipsum is simply dummy text of the printing typesetting 
            industry. Lorem Ipsumhas been the industry's standard 
            dummy text ever s∂ince the 1500s, when an unknown printer 
            took a galley Lorem Ipsum is simply dummy text of the 
            printing typesetting industry. Lorem Ipsumhas been the 
            industry's standard dummy text ever s∂ince the 1500s, when 
            an unknown printer took a galley Lorem Ipsum is simply 
            dummy text of the printing typesetting.
            Industry. Lorem Ipsumhas been the industry's standard 
            dummy text ever s∂ince the 1500s, when an unknown printer 
            took a galley Lorem Ipsum is simply dummy text of the 
            printing typesetting. Lorem Ipsumhas been the industry's 
            standard dummy text ever s∂ince the 1500s, when an 
            unknown printer took a galley.
            </div>
          </div>
        </div>
      </section>

      <footer>
        <div class="footer-row">
          <div class="footer-left">
            <div class="footer-logo">
              <a href="{{ URL::to('/') }}" ><img src="{{ URL::to('/').'/images/footer-logo.png' }}"></a>
            </div>
          </div>
          <div class="footer-right">
            <div class="footer-menu">
              <a href="#">Terms & Codition</a>
              <a href="#">Privacy</a>
              <a href="#">FAQ</a>
            </div>
            <div class="footer-contact">
              <a class="email" href="mailto:info@lunadate.rs">info@lunadate.rs</a>
              <a class="mobile first" href="tel:+381694622882">(+381) 69 46 22 882</a>
              <a class="mobile" href="tel:+381694622882">(+381) 69 46 22 882</a>
            </div>
            <div class="footer-social">
              <a class="facebook" href="#"><img src="{{ URL::to('/').'/images/footer-fb-icon.png' }}"></a>
              <a class="instagram" href="#"><img src="{{ URL::to('/').'/images/footer-instagram-icon.png' }}"></a>
            </div>
          </div>
        </div>
        <div class="copyright">2018. LunaDate all rights reserved. Developed and designed by Boopro.</div>
      </footer>

    </body>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script> --}}

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/').'/js/custom.js' }}"></script>




<script type="text/javascript">
  //$(document).ready(function() {
    
  //});
</script>

</html>
