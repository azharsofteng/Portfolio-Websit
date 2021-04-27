@extends('layouts.website-master')
@section('title', 'Home')
@section('user-content')
<!-- About Section Start -->

<!-- Hero Area Start -->
<div id="hero-area" class="hero-area-bg">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <div class="contents">
                    <h5 class="script-font wow fadeInUp" data-wow-delay="0.2s">Hi This is</h5>
                    <h2 class="head-title wow fadeInUp" data-wow-delay="0.4s">{{ $about->name }}</h2>
                    <p class="script-font wow fadeInUp" data-wow-delay="0.6s">{{ $about->designation }}</p>
                    <ul class="social-icon wow fadeInUp" data-wow-delay="0.8s">
                        <li>
                            <a target="_blank" class="facebook" href="{{ $about->facebook }}"><i class="icon-social-facebook"></i></a>
                        </li>
                        <li>
                            <a target="_blank" class="twitter" href="{{ $about->twitter }}"><i class="icon-social-twitter"></i></a>
                        </li>
                        <li>
                            <a target="_blank" class="instagram" href="{{ $about->instagram }}"><i class="icon-social-instagram"></i></a>
                        </li>
                        <li>
                            <a target="_blank" class="linkedin" href="{{ $about->linkedin }}"><i class="icon-social-linkedin"></i></a>
                        </li>
                        <li>
                            <a target="_blank" class="google" href="mailto:{{ $about->email }}"><i class="icon-social-google"></i></a>
                        </li>
                    </ul>
                    <div class="header-button wow fadeInUp" data-wow-delay="1s">
                        <a href="#" class="btn btn-common">Get a Free Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End -->
<section id="about" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="img-thumb wow fadeInLeft" data-wow-delay="0.3s">
                    <img class="img-fluid" src="{{ asset($about->image) }}" alt="" />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="profile-wrapper wow fadeInRight" data-wow-delay="0.3s">
                    <h3>Hi Guys!</h3>
                    <p>{{ $about->cover_letter }}</p>
                    <div class="about-profile">
                        <ul class="admin-profile">
                            <li><span class="pro-title"> Name </span> <span class="pro-detail">{{ $about->name }}</span></li>
                            <li><span class="pro-title"> Age </span> <span class="pro-detail">{{ $about->age }} Years</span></li>
                            <li><span class="pro-title"> Experience </span> <span class="pro-detail">{{ $about->experience }} Years</span></li>
                            <li><span class="pro-title"> Country </span> <span class="pro-detail">{{ $about->country }}</span></li>
                            <li><span class="pro-title"> Location </span> <span class="pro-detail">{{ $about->location }}</span></li>
                            <li><span class="pro-title"> e-mail </span> <span class="pro-detail">{{ $about->email }}</span></li>
                            <li><span class="pro-title"> Phone </span> <span class="pro-detail">{{ $about->phone }}</span></li>
                            <li><span class="pro-title"> Freelance </span> <span class="pro-detail">{{ $about->freelance }}</span></li>
                        </ul>
                    </div>
                    <a href="{{ asset($about->resume) }}" download class="btn btn-common"><i class="icon-paper-clip"></i> Download Resume</a>
                    <a href="#contact" class="btn btn-danger"><i class="icon-speech"></i> Contact Me</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Services Section Start -->
<section id="services" class="services section-padding">
    <h2 class="section-title wow flipInX" data-wow-delay="0.4s">What I do</h2>
    <div class="container">
        <div class="row">
            @forelse ($services as $service)
                <!-- Services item -->
                <div class="col-md-6 col-lg-3 col-xs-12">
                    <div class="services-item wow fadeInDown" data-wow-delay="0.3s">
                        <div class="icon">
                            <img style="height: 50px;" src="{{ asset($service->icon) }}" alt="">
                        </div>
                        <div class="services-content">
                            <h3><a href="#">{{ $service->name }}</a></h3>
                            <p>{{ $service->short_description }}</p>
                        </div>
                    </div>
                </div>
                <!-- Services item end -->
            @empty
                <!-- Services item -->
                <div class="col-md-6 col-lg-3 col-xs-12">
                    <div class="services-item wow fadeInDown" data-wow-delay="0.3s">
                        <div class="icon">
                            <i class="icon-grid"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Front-end Development</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse condi.</p>
                        </div>
                    </div>
                </div>
                <!-- Services item end -->
            @endforelse
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- Resume Section Start -->
<div id="resume" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="education wow fadeInRight" data-wow-delay="0.3s">
                    <ul class="timeline">
                        <li>
                            <i class="icon-graduation"></i>
                            <h2 class="timelin-title">Education</h2>
                        </li>
                        @forelse ($education_resume as $item)
                            <li>
                                <div class="content-text">
                                    <h3 class="line-title">{{ $item->degree_and_designation }}</h3>
                                    <span>{{ $item->session_and_year }}</span>
                                    <p class="line-text">{{ $item->short_description }}</p>
                                </div>
                            </li>
                        @empty
                            <li>
                                <div class="content-text">
                                    <h3 class="line-title">Bsc In CSE - Yale University</h3>
                                    <span>2012 - 2016</span>
                                    <p class="line-text">Expenses as material breeding insisted building to in. Continual so distrusts pronounce by unwilling listening. Thing do taste on we manor.</p>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="experience wow fadeInRight" data-wow-delay="0.6s">
                    <ul class="timeline">
                        <li>
                            <i class="icon-briefcase"></i>
                            <h2 class="timelin-title">Experience</h2>
                        </li>
                        @forelse ($experience_resume as $item)
                            <li>
                                <div class="content-text">
                                    <h3 class="line-title">{{ $item->degree_and_designation }}</h3>
                                    <span>{{ $item->session_and_year }}</span>
                                    <p class="line-text">{{ $item->short_description }}</p>
                                </div>
                            </li>
                        @empty
                            <li>
                                <div class="content-text">
                                    <h3 class="line-title">Art Director - Tesla Inc.</h3>
                                    <span>Jan 2018 - Present</span>
                                    <p class="line-text">Expenses as material breeding insisted building to in. Continual so distrusts pronounce by unwilling listening. Thing do taste on we manor.</p>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Resume Section End -->

<!-- Portfolio Section -->
<section id="portfolios" class="section-padding">
    <!-- Container Starts -->
    <div class="container">
        <h2 class="section-title wow flipInX" data-wow-delay="0.4s">My Remarkable Works</h2>
        <div class="row">
            <div class="col-md-12">
                <!-- Portfolio Controller/Buttons -->
                <div class="controls text-center">
                    <a class="filter active btn btn-common" data-filter="all">
                        All
                    </a>
                    @foreach ($categories as $item)
                    <a class="filter btn btn-common" data-filter=".{{ $item->id }}">
                        {{ $item->name }}
                    </a>
                    @endforeach
                </div>
                <!-- Portfolio Controller/Buttons Ends-->
            </div>

            <!-- Portfolio Recent Projects -->
            <div id="portfolio" class="row wow fadeInDown" data-wow-delay="0.4s">
                @foreach ($portfolios as $portfolio)
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix {{ $portfolio->category->id }} print">
                        <div class="portfolio-item">
                            <div class="shot-item">
                                <img src="{{ asset($portfolio->image) }}" alt="" />
                                <div class="overlay">
                                    <div class="icons">
                                        <a class="lightbox preview" href="{{ asset($portfolio->image) }}">
                                            <i class="icon-eye"></i>
                                        </a>
                                        <a class="link" href="#">
                                            <i class="icon-link"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <!-- Container Ends -->
</section>
<!-- Portfolio Section Ends -->

<!-- Counter Area Start-->
<section class="counter-section section-padding">
    <div class="container">
        <div class="row">
            <!-- Counter Item -->
            <div class="col-md-3 col-sm-6 work-counter-widget text-center">
                <div class="counter wow fadeInDown" data-wow-delay="0.3s">
                    <div class="icon"><i class="icon-briefcase"></i></div>
                    <div class="counterUp">250</div>
                    <p>Project Working</p>
                </div>
            </div>
            <!-- Counter Item -->
            <div class="col-md-3 col-sm-6 work-counter-widget text-center">
                <div class="counter wow fadeInDown" data-wow-delay="0.6s">
                    <div class="icon"><i class="icon-check"></i></div>
                    <div class="counterUp">950</div>
                    <p>Project Done</p>
                </div>
            </div>
            <!-- Counter Item -->
            <div class="col-md-3 col-sm-6 work-counter-widget text-center">
                <div class="counter wow fadeInDown" data-wow-delay="0.9s">
                    <div class="icon"><i class="icon-diamond"></i></div>
                    <div class="counterUp">150</div>
                    <p>Awards Received</p>
                </div>
            </div>
            <!-- Counter Item -->
            <div class="col-md-3 col-sm-6 work-counter-widget text-center">
                <div class="counter wow fadeInDown" data-wow-delay="1.2s">
                    <div class="icon"><i class="icon-heart"></i></div>
                    <div class="counterUp">299</div>
                    <p>Happy Clients</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Counter Area End-->

<!-- Contact Section Start -->
<section id="contact" class="section-padding">
    <div class="contact-form">
        <div class="container">
            <div class="row contact-form-area wow fadeInUp" data-wow-delay="0.4s">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="contact-block">
                        <h2>Contact Form</h2>
                        <form method="POST" action="{{ route('contact.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-error="Please enter your name" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" placeholder="Email" id="email" class="form-control" name="email" required data-error="Please enter your email" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="Phone Number" id="phone" class="form-control" name="phone" data-error="Please enter your phone" required />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="Subject" id="msg_subject" class="form-control" data-error="Please enter your subject" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Your Message" rows="5" data-error="Write your message" name="message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button">
                                        <button class="btn btn-common mb-2" id="submit" type="submit">Send Message</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="footer-right-area wow fadeIn">
                        <h2>Contact Address</h2>
                        <div class="footer-right-contact">
                            <div class="single-contact">
                                <div class="contact-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <p>{{ $about->location }}</p>
                            </div>
                            <div class="single-contact">
                                <div class="contact-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <p><a href="mailto:hello@tom.com">hello@tom.com</a></p>
                                <p><a href="mailto:{{ $about->email }}">{{ $about->email }}</a></p>
                            </div>
                            <div class="single-contact">
                                <div class="contact-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <p><a href="#">{{ $about->phone }}</a></p>
                                <p><a href="#">{{ $about->telephone }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <object
                        style="border: 0; height: 450px; width: 100%;"
                        data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d34015.943594576835!2d-106.43242624069771!3d31.677719472407432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86e75d90e99d597b%3A0x6cd3eb9a9fcd23f1!2sCourtyard+by+Marriott+Ciudad+Juarez!5e0!3m2!1sen!2sbd!4v1533791187584"
                    ></object>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
@endsection