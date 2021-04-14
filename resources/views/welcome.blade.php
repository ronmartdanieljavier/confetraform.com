<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ConfeTraForm</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style_home_page.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: ConfeTraForm - v1.1.1
    * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
        <div class="contact-info mr-auto">
            <i class="icofont-envelope"></i> <a href="mailto:support@ConfeTraForm.com.au">support@ConfeTraForm.com.au</a>
            <i class="icofont-phone"></i> 1300 611 787
        </div>
        <div class="social-links">
            <a target="_blank" href="https://twitter.com/ConfeTraForm" class="twitter"><i class="icofont-twitter"></i></a>
            <a target="_blank" href="https://www.facebook.com/linky.infointern" class="facebook"><i class="icofont-facebook"></i></a>
            <a target="_blank" href="https://www.instagram.com/ConfeTraForm/" class="instagram"><i class="icofont-instagram"></i></a>
            <a target="_blank" href="https://www.linkedin.com/in/info-ConfeTraForm-1769ba1bb/" class="linkedin"><i class="icofont-linkedin"></i></i></a>
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="{!! URL::to('/') !!}">ConfeTraForm<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="#hero">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
{{--                <li><a href="#pricing">Pricing</a></li>--}}
                <li><a href="#team">Team</a></li>
{{--                <li><a href="#portfolio">Portfolio</a></li>--}}
                <li><a href="#contact">Contact</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>

            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1>Welcome to <span>ConfeTraForm</span>
        </h1>
        <h2>Your online form for travel conference</h2>
        <div class="d-flex">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
            <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn-watch-video"> Watch Video <i class="icofont-play-alt-2"></i></a>
        </div>
    </div>
</section><!-- End Hero -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="width: 720px;max-width: 720px">
        <div class="modal-content" style="width: 720px;">
            <div class="modal-body" style="padding: 0px;">
                <iframe src="https://vu.ap.panopto.com/Panopto/Pages/Embed.aspx?id=87ec332a-8a59-4bb1-a03c-ac690084ca44&autoplay=false&offerviewer=true&showtitle=true&showbrand=false&start=0&interactivity=all"
                        height="405" width="720"
                        style="border: 1px solid #464646;" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4 class="title"><a href="">Intuitive</a></h4>
                        <p class="description">User interface (UI) and User experience (UX) are one of the selling points of the ConfeTraForm system</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4 class="title"><a href="">Advance Management</a></h4>
                        <p class="description">In our website ConfeTraForm, you can easily manage your university approvers, reviewers, applicants, and applications.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4 class="title"><a href="">Monitoring</a></h4>
                        <p class="description">Monitor Application progress.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="title"><a href="">Australia</a></h4>
                        <p class="description">Partnership all over Australia.</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>About</h2>
                <h3>Find Out More <span>About Us</span></h3>
                {{--                <p>Are you a students, who are looking for internship, or an employer who are looking for interns.</p>--}}
            </div>

            <div class="row">
                <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="100">
                    <img src="{{ asset('assets/img/about.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <h3>Are you looking for online forms for travel conferences in your university,</h3>
                    <p class="font-italic">
                        ConfeTraForm is here for you! A web application that manage your users and applications, it runs in the education sectors, mainly providing services for university who are looking for system that handles the conference travel forms.
                        <br/>
                        <br/>
                        Who are we?<br/>
                        ConfeTraForm began in a team of 2 (Ron, Aline) in 2021 for their thesis project.
                        <br/>
                        <br/>
                    </p>
                    <ul>
                        <li>
                            <i class="bx bx-store-alt"></i>
                            <div>
                                <h5>Mission</h5>
                                <p>The Mission of ConfeTraForm is simple: We help University Faculty to manage their Conference Travel Applications.</p>
                            </div>
                        </li>
                        <li>
                            <i class="bx bx-images"></i>
                            <div>
                                <h5>Vision</h5>
                                <p>Create easy environment for every member of the local and global university workforce</p>
                            </div>
                        </li>
                        <li>
                            <i class="bx bx-info-circle"></i>
                            <div>
                                <h5>ConfeTraForm Pty Ltd.</h5>
                                <p>
                                    ABN: 66 138 728 787<br/>
                                    Address: Suite 87, 200 Barangaroo Ave, Sydney NSW 2000<br/>
                                    Telephone: 1300 611 787<br/>
                                    Fax: 02 8064 1787
                                </p>
                                <p></p>
                                <p>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
        <div class="container" data-aos="fade-up">

            <div class="row skills-content">

                <div class="col-lg-6">

                    <div class="progress">
                        <span class="skill">IT Industry <i class="val">100%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Business Industry <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Construction Industry <i class="val">75%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="progress">
                        <span class="skill">Hospitality Industry<i class="val">80%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Medical Industry <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Accounting Industry <i class="val">55%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Skills Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="icofont-simple-smile"></i>
                        <span data-toggle="counter-up">1,232</span>
                        <p>Happy Interns</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="icofont-document-folder"></i>
                        <span data-toggle="counter-up">5,021</span>
                        <p>Positions</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="icofont-live-support"></i>
                        <span data-toggle="counter-up">1,463</span>
                        <p>Companies</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="icofont-users-alt-5"></i>
                        <span data-toggle="counter-up">100</span>
                        <p>Universities</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
        <div class="container" data-aos="zoom-in">

            <div class="row">

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/img/clients/client-1.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/img/clients/client-3.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/img/clients/client-4.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/img/clients/client-5.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/img/clients/client-6.png') }}" class="img-fluid" alt="">
                </div>

            </div>

        </div>
    </section><!-- End Clients Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Services</h2>
                <h3>Check our <span>Services</span></h3>
                <p>Some of the services we offer include monitoring features, Student intern logbook, Grading features, Portfolio features, Guiding Features… we can support you with your needs in internship, plus we will be adding many other services in the near future.</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4><a href="{!! URL::to('service-easy-integration') !!}">Easy Integration</a></h4>
                        <p>Integration acts as a glue in our website that holds the several computer systems together. It will be simple as well as highly complex. </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4><a href="{!! URL::to('service-student-logbook') !!}">Student Logbook</a></h4>
                        <p>Students who have access to the system are able to log their task on a daily basis</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4><a href="{!! URL::to('service-grading-mechanics') !!}">Grading Mechanics</a></h4>
                        <p>Not only attracting visitors a website can do a lot more than that. </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4><a href="{!! URL::to('service-student-portfolio') !!}">Student Portfolio</a></h4>
                        <p>This feature helps student to make  their portfolio in our website in 3 easy steps. </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-slideshow"></i></div>
                        <h4><a href="{!! URL::to('service-mentoring') !!}">Mentoring</a></h4>
                        <p> this feature ensures that users can easily access the website without any complications.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-arch"></i></div>
                        <h4><a href="{!! URL::to('service-reporting') !!}">Reporting</a></h4>
                        <p>The system provide a comprehensive report for further analysis and reporting</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="zoom-in">

            <div class="owl-carousel testimonials-carousel">

                <div class="testimonial-item">
                    <img src="{{ asset('assets/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
                    <h3>Saul Goodman</h3>
                    <h4>Ceo &amp; Founder</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        The support I received was thorough and timely and my issue was addressed with a single interaction. Awesome Team!.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item">
                    <img src="{{ asset('assets/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
                    <h3>Sara Wilsson</h3>
                    <h4>Designer</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        The service your company provides is top quality. You are active listeners understanding our company’s unique requirements, able to improvise when needed at short notice. and I look forward to many more”.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item">
                    <img src="{{ asset('assets/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        I would like to take the opportunity to thank the team for offering an impeccable service. Every query is addressed promptly and thoroughly with an ongoing support team. It’s so good having a set price for a service and your service has always excelled what you claim to offer. I would recommend your company to anyone who wants an internship and a great support team. Great work guys!
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item">
                    <img src="{{ asset('assets/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
                    <h3>Matt Brandon</h3>
                    <h4>Freelancer</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Thank you for the outstanding service and the internship you have set up for me. Once again thanks.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item">
                    <img src="{{ asset('assets/img/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Thanks for the recent work you have done for us and all the training provided. Couldn't have asked for better service or support. Thanks for making this possible for us.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

            </div>

        </div>
    </section><!-- End Testimonials Section -->
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing" style="display: none">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Pricing</h2>
                <h3>Check our <span>Pricing</span></h3>
                <p>Simple plans. Simple prices. Only pay for what you really need. All plans come with award-winning 24/7 customer support. Change or cancel your plan at any time..</p>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="box">
                        <h3>Entry</h3>
                        <h4><sup>$</sup>0.99<span> / month</span></h4>
                        <ul>
                            <li>Account</li>
                            <li>Student Logbook</li>
                            <li class="na">Student Portfolio</li>
                            <li class="na">Easy Integration</li>
                            <li class="na">Mentoring</li>
                            <li class="na">Grading Mechanics</li>
                            <li class="na">Monitoring</li>
                        </ul>
                        <div class="btn-wrap">
                            <form class="" method="POST" id="payment-form"  action="payment">
                                {{ csrf_field() }}
                                <input class="w3-input w3-border" name="amount" value="0.99" type="hidden"></p>
                                <input class="w3-input w3-border" name="plan" value="ENTRY" type="hidden"></p>
                                <button class="btn-buy">Pay with PayPal</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="box featured">
                        <h3>Professional</h3>
                        <h4><sup>$</sup>19.99<span> / month</span></h4>
                        <ul>
                            <li>Account</li>
                            <li>Student Logbook</li>
                            <li>Student Portfolio</li>
                            <li class="na">Easy Integration</li>
                            <li class="na">Mentoring</li>
                            <li class="na">Grading Mechanics</li>
                            <li class="na">Monitoring</li>
                        </ul>
                        <div class="btn-wrap">
                            <form class="" method="POST" id="payment-form"  action="payment">
                                {{ csrf_field() }}
                                <input class="w3-input w3-border" name="amount" value="19.99" type="hidden"></p>
                                <input class="w3-input w3-border" name="plan" value="PROFESSIONAL" type="hidden"></p>
                                <button class="btn-buy">Pay with PayPal</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="box">
                        <h3>Advance</h3>
                        <h4><sup>$</sup>29.99<span> / month</span></h4>
                        <ul>
                            <li>Account</li>
                            <li>Student Logbook</li>
                            <li>Student Portfolio</li>
                            <li>Easy Integration</li>
                            <li>Mentoring</li>
                            <li class="na">Grading Mechanics</li>
                            <li class="na">Monitoring</li>
                        </ul>
                        <div class="btn-wrap">
                            <form class="" method="POST" id="payment-form"  action="payment">
                                {{ csrf_field() }}
                                <input class="w3-input w3-border" name="amount" value="29.99" type="hidden"></p>
                                <input class="w3-input w3-border" name="plan" value="ADVANCE" type="hidden"></p>
                                <button class="btn-buy">Pay with PayPal</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                    <div class="box">
                        <span class="advanced">Advanced</span>
                        <h3>Ultimate</h3>
                        <h4><sup>$</sup>49.99<span> / month</span></h4>
                        <ul>
                            <li>Account</li>
                            <li>Student Logbook</li>
                            <li>Student Portfolio</li>
                            <li>Easy Integration</li>
                            <li>Mentoring</li>
                            <li>Grading Mechanics</li>
                            <li>Monitoring</li>
                        </ul>
                        <div class="btn-wrap">
                            <form class="" method="POST" id="payment-form"  action="payment">
                                {{ csrf_field() }}
                                <input class="w3-input w3-border" name="amount" value="49.99" type="hidden"></p>
                                <input class="w3-input w3-border" name="plan" value="ULTIMATE" type="hidden"></p>
                                <button class="btn-buy">Pay with PayPal</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Team</h2>
                <h3>Our Hardworking <span>Team</span></h3>
                <p>Meet the Team who’s operating this company.</p>
            </div>

            <div class="row">

                <div class="col-lg-6 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{ asset('assets/img/team/javier.jpg') }}" class="img-fluid" alt="">
                            <div class="social">
                                <a target="_blank" href="https://www.facebook.com/ronmartdaniel.javier.7/"><i class="icofont-facebook"></i></a>
                                <a target="_blank" href="https://www.instagram.com/ronmartdanieljavier/"><i class="icofont-instagram"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Ron Mart Daniel Rivera Javier</h4>
                            <span>Chief Executive Officer</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{ asset('assets/img/team/javier.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>Aline Rodrigues</h4>
                            <span>Chief Executive Officer</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Team Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio" style="display: none">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Portfolio</h2>
                <h3>Check our <span>Portfolio</span></h3>
                <p>There’s nothing more exciting to us than gathering our clients in a boardroom for a day of structured discussion, debate and sharing. We carefully craft our workshops to ensure we capture clear insights on your needs in a structured discussion framework for post-session analysis and recommendations.</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="{{ asset('assets/img/portfolio/intern1.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>App</p>
                        <a href="{{ asset('assets/img/portfolio/intern1.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                        {{--                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>--}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="{{ asset('assets/img/portfolio/intern2.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <a href="{{ asset('assets/img/portfolio/intern2.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                        {{--                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>--}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="{{ asset('assets/img/portfolio/intern3.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 2</h4>
                        <p>App</p>
                        <a href="{{ asset('assets/img/portfolio/intern3.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                        {{--                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>--}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="{{ asset('assets/img/portfolio/intern4.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 2</h4>
                        <p>Card</p>
                        <a href="{{ asset('assets/img/portfolio/intern4.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                        {{--                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>--}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="{{ asset('assets/img/portfolio/intern5.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 2</h4>
                        <p>Web</p>
                        <a href="{{ asset('assets/img/portfolio/intern5.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                        {{--                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>--}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="{{ asset('assets/img/portfolio/intern6.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 3</h4>
                        <p>App</p>
                        <a href="{{ asset('assets/img/portfolio/intern6.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                        {{--                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>--}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="{{ asset('assets/img/portfolio/intern7.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 1</h4>
                        <p>Card</p>
                        <a href="{{ asset('assets/img/portfolio/intern7.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                        {{--                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>--}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="{{ asset('assets/img/portfolio/intern8.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 3</h4>
                        <p>Card</p>
                        <a href="{{ asset('assets/img/portfolio/intern8.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                        {{--                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>--}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <img src="{{ asset('assets/img/portfolio/intern9.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <a href="{{ asset('assets/img/portfolio/intern9.jpg') }}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                        {{--                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>--}}
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Section -->




    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>F.A.Q</h2>
                <h3>Frequently Asked <span>Questions</span></h3>
                {{--                <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>--}}
            </div>

            <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">

                <li>
                    <a data-toggle="collapse" class="" href="#faq1">
                        Edit Your Profile?
                        <i class="icofont-simple-up"></i>
                    </a>
                    <div id="faq1" class="collapse show" data-parent=".faq-list">
                        <p>
                            You can edit individual sections of your ConfeTraForm profile to best reflect your professional experience. Learn how to share updates about your job changes, work anniversaries etc. with your network.
                            To edit sections on your profile:
                            Click the  Me icon at the top of your ConfeTraForm homepage.
                            Click View profile.
                            Click the  Edit icon to the right of the section you’d like to make changes to.
                            Make changes in the fields provided.
                            Click Save.

                        </p>
                    </div>
                </li>

                <li>
                    <a data-toggle="collapse" href="#faq2" class="collapsed">
                        I can’t sign in - Forgot password?
                        <i class="icofont-simple-up"></i>
                    </a>
                    <div id="faq2" class="collapse" data-parent=".faq-list">
                        <p>
                            Go to the Sign in page of the account you want to merge and close and click the Forgot Password? link.
                            Enter the email address registered to the account you want to close and click Send code. This will send the password reset link to that email address.
                            Once you've recovered access to this account, follow the on-screen instructions in the scenario above that best fits your situation.

                        </p>
                    </div>
                </li>

                <li>
                    <a data-toggle="collapse" href="#faq3" class="collapsed">
                        What do ConfeTraForm do with my details?
                        <i class="icofont-simple-up"></i>
                    </a>
                    <div id="faq3" class="collapse" data-parent=".faq-list">
                        <p>
                            We take your privacy very seriously and under no circumstances do we give third parties access to resumés or email addresses without your consent. Feel free to check out our privacy policy for more details.
                        </p>
                    </div>
                </li>

                <li>
                    <a data-toggle="collapse" href="#faq4" class="collapsed">
                        Seeing an error message or having trouble loading a page?
                        <i class="icofont-simple-up"></i>
                    </a>
                    <div id="faq4" class="collapse" data-parent=".faq-list">
                        <p>
                            If you have trouble accessing ConfeTraForm, the problem may be caused by the browser caching an older version of the page.
                            Here are you few things you can try to fix the problem:
                            reload the page by pressing Ctrl-F5 on Windows (or Command+R on a Mac)
                            allow the page to load fully before clicking any buttons
                            clear your browsing history
                            close all browser windows, then re-open your browser and return to ConfeTraForm
                            try using another device to see if the same issue occurs.

                        </p>
                    </div>
                </li>



            </ul>

        </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
                <h3><span>Contact Us</span></h3>
                <p>Send us a message using the form below and we’ll get back to you, generally within 1 business day.</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-map"></i>
                        <h3>Our Address</h3>
                        <p>Suite 87, 200 Barangaroo Ave, Sydney NSW 2000</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-envelope"></i>
                        <h3>Email Us</h3>
                        <p>support@ConfeTraForm.com.au</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-phone-call"></i>
                        <h3>Call Us</h3>
                        <p>1300 611 787</p>
                    </div>
                </div>

            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6 ">
                    <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.9767375484025!2d151.1999506156491!3d-33.86449038065738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ae47017c9673%3A0xf04961a061862aa6!2s87%2F200%20Barangaroo%20Ave%2C%20Barangaroo%20NSW%202000!5e0!3m2!1sen!2sau!4v1605148290064!5m2!1sen!2sau" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div>

                <div class="col-lg-6">
                    <form action="contact-us" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="col form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4>Join Our Newsletter</h4>
                    <p>Join the ConfeTraForm community for exclusive access to even more deals, By joining you are agreeing to the Terms of Service and Privacy Policy and to receiving marketing communications from ConfeTraForm.</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>ConfeTraForm<span>.</span></h3>
                    <p>
                        Suite 87, 200 Barangaroo Ave<br>
                        Sydney NSW 2000<br>
                        Australia <br><br>
                        <strong>Phone:</strong> 1300 611 787<br>
                        <strong>Email:</strong> support@ConfeTraForm.com.au<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#pricing">Free</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#pricing">Professional</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#pricing">Advance</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#pricing">Ultimate</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Social Networks</h4>
                    <p>Follow Us </p>
                    <div class="social-links mt-3">
                        <a target="_blank" href="https://twitter.com/ConfeTraForm" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a target="_blank" href="https://www.facebook.com/linky.infointern" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a target="_blank" href="https://www.instagram.com/ConfeTraForm/" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a target="_blank" href="https://www.linkedin.com/in/info-ConfeTraForm-1769ba1bb/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="copyright">
            &copy; Copyright <strong><span>ConfeTraForm</span></strong>. All Rights Reserved,
            <strong>Disclaimer: This website/app is for a class assignment and not for commercial purposes</strong>

        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
