<!DOCTYPE html>
<html lang="en">
<head>

     <title>DVC</title>
<!-- 
Hydro Template 
http://www.templatemo.com/tm-509-hydro
-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="{{ asset("assets/landing/css/bootstrap.min.css")}}">
     <link rel="stylesheet" href="{{ asset("assets/landing/css/magnific-popup.css")}}">
     <link rel="stylesheet" href="{{ asset("assets/landing/css/font-awesome.min.css")}}">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ asset("assets/landing/css/templatemo-style.css")}}">
</head>
<body>

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.html" class="navbar-brand">DAVAO VISION COLLEGE</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="#home" class="smoothScroll">Home</a></li>
                         <li><a href="#about" class="smoothScroll">About</a></li>
                         <li><a href="#blog" class="smoothScroll">Blog</a></li>
                         <li><a href="#work" class="smoothScroll">Our Work</a></li>
                         <li><a href="#contact" class="smoothScroll">Contacts</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        
                              @if (Route::has('login'))
                            
                                @auth
                                <li class="section-btn">   
                                <div class="sm:fixed sm:top-0 sm:right-0  z-5">
                                    <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                   </div>
                              </li>
                                @else
                                <li class="section-btn">  
                                <div class="sm:fixed sm:top-0 sm:right-0  z-5">
                                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                                   </div>
                              </li>
                                    @if (Route::has('register'))
                                    <li class="section-btn">  
                                    <div class="sm:fixed sm:top-0 sm:right-0  z-5">
                                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>

                                   </div>
                              </li>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
     <section id="home" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <div class="home-info">
                              <h1>Moving Towards<br> Excellence</h1>
                              <a href="{{ route('register') }}" class="btn section-btn smoothScroll">Enroll Now</a>
                              <span>
                                   CALL US (+66) 010-020-0340
                                   <small>For any inquiry</small>
                              </span>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="home-video">

                              <div class="embed-responsive embed-responsive-16by9">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/E6nD3mIA-ro?si=EqDMJ78XL6P4GMPE&amp;controls=0&amp;start=3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                   {{-- <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FDVCians%2Fvideos%2F6396058087082573%2F&show_text=false&width=560&t=0" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>

                                   <iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ?si=TvURSCTZeojpuwo0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> --}}
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-5 col-sm-6">
                         <div class="about-info">
                              <div class="section-title">
                                   <h2>Let us introduce</h2>
                                   <span class="line-bar">...</span>
                              </div>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <div class="about-info skill-thumb">

                              <strong>Web Design</strong>
                                   <span class="pull-right">85%</span>
                                        <div class="progress">
                                             <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
                                        </div>

                              <strong>Photography</strong>
                                   <span class="pull-right">90%</span>
                                        <div class="progress">
                                             <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                        </div>

                              <strong>Content Marketing</strong>
                                   <span class="pull-right">75%</span>
                                        <div class="progress">
                                             <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                        </div>

                              <strong>CMS Admin</strong>
                                   <span class="pull-right">70%</span>
                                        <div class="progress">
                                             <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                        </div>

                         </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                         <div class="about-image">
                              <img src="{{ asset("assets/landing/images/prince-image.png")}}" class="img-fluid" alt="" >
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- BLOG -->
     <section id="blog" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Our Blog</h2>
                              <span class="line-bar">...</span>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- BLOG THUMB -->
                         <div class="media blog-thumb">
                              <div class="media-object media-left">
                                   <a href="blog-detail.html"><img src="{{ asset("assets/landing/images/blog-image1.jpg")}}" class="img-responsive" alt=""></a>
                              </div>
                              <div class="media-body blog-info">
                                   <small><i class="fa fa-clock-o"></i> December 22, 2017</small>
                                   <h3><a href="blog-detail.html">How To Find Out Beautiful Workspace.</a></h3>
                                   <p>Lorem ipsum dolor sit consectetur adipiscing morbi venenatis.</p>
                                   <a href="blog-detail.html" class="btn section-btn">Read article</a>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- BLOG THUMB -->
                         <div class="media blog-thumb">
                              <div class="media-object media-left">
                                   <a href="blog-detail.html"><img src="{{ asset("assets/landing/images/blog-image2.jpg")}}" class="img-responsive" alt=""></a>
                              </div>
                              <div class="media-body blog-info">
                                   <small><i class="fa fa-clock-o"></i> December 18, 2017</small>
                                   <h3><a href="blog-detail.html">woman sportwear.</a></h3>
                                   <p>Lorem ipsum dolor sit consectetur adipiscing morbi venenatis.</p>
                                   <a href="blog-detail.html" class="btn section-btn">Read more</a>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- BLOG THUMB -->
                         <div class="media blog-thumb">
                              <div class="media-object media-left">
                                   <a href="blog-detail.html"><img src="{{ asset("assets/landing/images/blog-image3.jpg")}}" class="img-responsive" alt=""></a>
                              </div>
                              <div class="media-body blog-info">
                                   <small><i class="fa fa-clock-o"></i> December 14, 2017</small>
                                   <h3><a href="blog-detail.html">new creative fashion.</a></h3>
                                   <p>Lorem ipsum dolor sit consectetur adipiscing morbi venenatis.</p>
                                   <a href="blog-detail.html" class="btn section-btn">Read article</a>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- BLOG THUMB -->
                         <div class="media blog-thumb">
                              <div class="media-object media-left">
                                   <a href="blog-detail.html"><img src="{{ asset("assets/landing/images/blog-image4.jpg")}}" class="img-responsive" alt=""></a>
                              </div>
                              <div class="media-body blog-info">
                                   <small><i class="fa fa-clock-o"></i> December 10, 2017</small>
                                   <h3><a href="blog-detail.html">minimalist design trend in 2018.</a></h3>
                                   <p>Lorem ipsum dolor sit consectetur adipiscing morbi venenatis.</p>
                                   <a href="blog-detail.html" class="btn section-btn">View Detail</a>
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- WORK -->
     <section id="work" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Our work</h2>
                              <span class="line-bar">...</span>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb">
                              <a href="#" class="image-popup">
                                   <img src="{{ asset("assets/landing/images/work-image1.jpg") }}" class="img-responsive" alt="Work">

                                   <div class="work-info">
                                        <h3>Clean &amp; Minimal</h3>
                                        <small>Product Design</small>
                                   </div>
                              </a>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb">
                              <a href="" class="image-popup">
                                   <img src="{{ asset("assets/landing/images/work-image2.jpg") }}" class="img-responsive" alt="Work">

                                   <div class="work-info">
                                        <h3>Studio Bag</h3>
                                        <small>Branding</small>
                                   </div>
                              </a>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb">
                              <a href="#" class="image-popup">
                                   <img src="{{ asset("assets/landing/images/work-image3.jpg") }}" class="img-responsive" alt="Work">

                                   <div class="work-info">
                                        <h3>Frame Design</h3>
                                        <small>Photography</small>
                                   </div>
                              </a>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb">
                              <a href="images/work-image4.jpg" class="image-popup">
                                   <img src="{{ asset("assets/landing/images/work-image4.jpg") }}" class="img-responsive" alt="Work">

                                   <div class="work-info">
                                        <h3>Paint Work</h3>
                                        <small>Art, Design</small>
                                   </div>
                              </a>
                         </div>
                    </div>

               </div>
          </div>
     </section>

     <!-- CONTACT -->
     <section id="contact" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Contact us</h2>
                              <span class="line-bar">...</span>
                         </div>
                    </div>

                    <div class="col-md-8 col-sm-8">
                        
                         <!-- CONTACT FORM HERE -->
                         <form id="contact-form" role="form" action="#" method="post">
                              <div class="col-md-6 col-sm-6">
                                   <input type="text" class="form-control" placeholder="Full Name" id="cf-name" name="cf-name" required="">
                              </div>

                              <div class="col-md-6 col-sm-6">
                                   <input type="email" class="form-control" placeholder="Your Email" id="cf-email" name="cf-email" required="">
                              </div>

                              <div class="col-md-6 col-sm-6">
                                   <input type="tel" class="form-control" placeholder="Your Phone" id="cf-number" name="cf-number" required="">
                              </div>

                              <div class="col-md-6 col-sm-6">
                                   <select class="form-control" id="cf-budgets" name="cf-budgets">
                                        <option>Budget Level</option>
                                        <option>$500 to $1,000</option>
                                        <option>$1,000 to $2,200</option>
                                        <option>$2,200 to $4,500</option>
                                        <option>$4,500 to $7,500</option>
                                        <option>$7,500 to $12,000</option>
                                        <option>$12,000 or more</option>
                                   </select>
                              </div>

                              <div class="col-md-12 col-sm-12">
                                   <textarea class="form-control" rows="6" placeholder="Your requirements" id="cf-message" name="cf-message" required=""></textarea>
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="submit" value="Send Message">
                              </div>

                         </form>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="google-map">
	<!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.3687868307225!2d125.54009617499801!3d7.0831751929197315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32f912eab875df07%3A0x5751664ba49fa172!2sDavao%20Vision%20College!5e0!3m2!1sen!2sph!4v1697626828441!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- FOOTER -->
     <footer data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-5 col-sm-12">
                         <div class="footer-thumb footer-info"> 
                              <h2>Hydro Company</h2>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                         </div>
                    </div>

                    <div class="col-md-2 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h2>Company</h2>
                              <ul class="footer-link">
                                   <li><a href="#">About Us</a></li>
                                   <li><a href="#">Join our team</a></li>
                                   <li><a href="#">Read Blog</a></li>
                                   <li><a href="#">Press</a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-2 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h2>Services</h2>
                              <ul class="footer-link">
                                   <li><a href="#">Pricing</a></li>
                                   <li><a href="#">Documentation</a></li>
                                   <li><a href="#">Support</a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h2>Find us</h2>
                              <p>123 Grand Rama IX, <br> Krung Thep Maha Nakhon 10400</p>
                         </div>
                    </div>                    

                    <div class="col-md-12 col-sm-12">
                         <div class="footer-bottom">
                              <div class="col-md-6 col-sm-5">
                                   <div class="copyright-text"> 
                                        <p>Copyright &copy; 2017 Your Company</p>
                                   </div>
                              </div>
                              <div class="col-md-6 col-sm-7">
                                   <div class="phone-contact"> 
                                        <p>Call us <span>(+66) 010-020-0340</span></p>
                                   </div>
                                   <ul class="social-icon">
                                        <li><a href="https://www.facebook.com/templatemo" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-instagram"></a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>


     <!-- MODAL -->
     <section class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
               <div class="modal-content modal-popup">

                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>

                    <div class="modal-body">
                         <div class="container-fluid">
                              <div class="row">

                                   <div class="col-md-12 col-sm-12">
                                        <div class="modal-title">
                                             <h2>Hydro Co</h2>
                                        </div>

                                        <!-- NAV TABS -->
                                        <ul class="nav nav-tabs" role="tablist">
                                             <li class="active"><a href="#sign_up" aria-controls="sign_up" role="tab" data-toggle="tab">Create an account</a></li>
                                             <li><a href="#sign_in" aria-controls="sign_in" role="tab" data-toggle="tab">Sign In</a></li>
                                        </ul>

                                        <!-- TAB PANES -->
                                        <div class="tab-content">
                                             <div role="tabpanel" class="tab-pane fade in active" id="sign_up">
                                                  <form action="#" method="post">
                                                       <input type="text" class="form-control" name="name" placeholder="Name" required>
                                                       <input type="telephone" class="form-control" name="telephone" placeholder="Telephone" required>
                                                       <input type="email" class="form-control" name="email" placeholder="Email" required>
                                                       <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                       <input type="submit" class="form-control" name="submit" value="Submit Button">
                                                  </form>
                                             </div>

                                             <div role="tabpanel" class="tab-pane fade in" id="sign_in">
                                                  <form action="#" method="post">
                                                       <input type="email" class="form-control" name="email" placeholder="Email" required>
                                                       <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                       <input type="submit" class="form-control" name="submit" value="Submit Button">
                                                       <a href="https://www.facebook.com/templatemo">Forgot your password?</a>
                                                  </form>
                                             </div>
                                        </div>
                                   </div>

                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>

     <!-- SCRIPTS -->
     <script src="{{ asset("assets/landing/js/jquery.js")}}"></script>
     <script src="{{ asset("assets/landing/js/bootstrap.min.js")}}"></script>
     <script src="{{ asset("assets/landing/js/jquery.stellar.min.js")}}"></script>
     <script src="{{ asset("assets/landing/js/jquery.magnific-popup.min.js")}}"></script>
     <script src="{{ asset("assets/landing/js/smoothscroll.js")}}"></script>
     <script src="{{ asset("assets/landing/js/custom.js")}}"></script>

</body>
</html>