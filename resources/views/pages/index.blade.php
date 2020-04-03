@extends('layouts.app')

@section('content')
<div id="home">
    <div class="container">
        <div class="row justify-content-center" id="main-header">
            <div class="col-md-8 col-sm-12">
                <h1>&lt;For the Developers&gt;<br>&lt;/By a Developer&gt;</h1>
                <h3>Code Snippets, Tutorials, Workshops and News</h3>
                <form>
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                            <input type="email" class="form-control" placeholder="Email Address" name="newsletter_email" id="newsletter_email" required>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                            <button type="submit" class="btn btn-primary">Join!</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-sm-12">
                <img src="/storage/images/dev.svg" class="img-fluid" alt="Developer Coding Graphics">
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center" id="companies">
            <div class="col-lg-10 text-center">
                <h3>Ali has worked with:</h3><br>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <img src="/storage/images/companies/Dalys1895.png" alt="Dalys1895" title="Dalys1895" class="img-fluid" />
                    </li>
                    <li class="list-inline-item">
                        <img src="/storage/images/companies/Rajput-Group-Of-Petroleum.png" alt="Rajput GOP" title="Rajput Group of Petroleum" class="img-fluid" />
                    </li>
                    <li class="list-inline-item">
                        <img src="/storage/images/companies/kyiky.png" alt="KYIKY" title="KYIKY" class="img-fluid" />
                    </li>
                    <li class="list-inline-item">
                        <img src="/storage/images/companies/airupthair.png" alt="AirUpThAir" title="AirUpThair" class="img-fluid" />
                    </li>
                    <li class="list-inline-item">
                        <img src="/storage/images/companies/icefox.png" alt="Icefox" title="IceFox" class="img-fluid" />
                    </li>
                    <li class="list-inline-item">
                        <img src="/storage/images/companies/studygenie.png" alt="StudyGenie" title="StudyGenie" class="img-fluid" />
                    </li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center" id="about">
            <div class="col-lg-10 text-center">
                <h1>Who is this Ali fellow?</h1>
                <p>Just a simple guy that helps people take their businesses to the next level by creating websites and mobile apps for them and fellow developers just like you learn how to develope websites and applications, blogging, and coding practices to <span>become a kickass dev.</span></p>
                <a href="/about" class="btn btn-primary">MORE ABOUT ALI</a>
            </div>
        </div>
        <div class="row justify-content-center" id="projects">
            <div class="col-lg-10">
                <h1 class="text-center">Projects I've Worked On</h1>
                <div class="row project-row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <img src="storage/images/projects/kyiky.jpg" class="img-fluid" alt="KYIKY Voiceover Company" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-auto">
                        <p class="title">ARTISTS MANAGEMENT SYSTEM</p>
                        <h1 class="name">Kyiky</h1>
                        <p class="description">Needed to manage their VoiceOver Artists and their beautiful and talented voices. This Web App was built for a China Based VoiceOver Company KYIKY.</p>
                        <a href="https://kyiky.com" target="_blank">View Website <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="row project-row">
                    <div class="col-lg-6 col-md-6 order-md-1 order-2 rtl my-auto">
                        <p class="title">OPEN SOURCE WEBSITE</p>
                        <h1 class="name">Stimulus Check Calculator</h1>
                        <p class="description">In Response to the COVID-19 Pandemic, US Government is giving out Stimulus Checks to it Tax Paying Citizes, I've created a Open Source Website where anyone can calculate how much money they'l likely recieve.</p>
                        <a href="https://stimuluscheck.app/" target="_blank">View Website <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="col-lg-6 col-md-6 order-1">
                        <img src="storage/images/projects/StimulusCheck.png" class="img-fluid" alt="Stimulus Check" />
                    </div>
                </div>
                <div class="row project-row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <img src="storage/images/projects/Mount%20Vernon%20Baptist%20Temple.jpg" class="img-fluid" alt="Mt. Vernon Baptist Temple" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-auto">
                        <p class="title">WEBSITE & MOBILE APPS</p>
                        <h1 class="name">Mount Vernon Baptist Temple</h1>
                        <p class="description">A Temple in Mt. Vernon wanted to update their old website from the 90’s. We build a website from ground up with iOS and Android Apps.</p>
                        <a href="https://mtvbaptisttemple.com/" target="_blank">View Website <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="row project-row">
                    <div class="col-lg-6 col-md-6 order-md-1 order-2 rtl my-auto">
                        <p class="title">HEALTH WEB AND MOBILE APPS</p>
                        <h1 class="name">Crappsy</h1>
                        <p class="description">Based in New York City, a startup needed a website that determines your health, based on images of users. We created an AI to process images and created this website.</p>
                        <a href="https://www.crappsy.com/home" target="_blank">View Website <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="col-lg-6 col-md-6 order-1">
                        <img src="storage/images/projects/crappsy.jpg" class="img-fluid" alt="Crappsy Health App" />
                    </div>
                </div>
                <div class="row project-row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <img src="storage/images/projects/boost-traffic.jpg" class="img-fluid" alt="Mt. Vernon Baptist Temple" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-auto">
                        <p class="title">SAAS WEB APPLICATION</p>
                        <h1 class="name">Boost Traffic</h1>
                        <p class="description">A SaaS Application, already built on a template, needed a new look. I designed the Website using Photoshop and XD. Once the designed were approved, I developed the website in a Responsive Front-End.</p>
                        <a href="https://boost-traffic.io/" target="_blank">View Website <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="row project-row">
                    <div class="col-lg-6 col-md-6 order-md-1 order-2 rtl my-auto">
                        <p class="title">FOOD CATALOG WEBSITE</p>
                        <h1 class="name">Zetov USA</h1>
                        <p class="description">Based in New York City, a snacks company needed a new design for their website from early '20s'. I designed and developed a Responsive Front-End to be integrated by their backend team.</p>
                        <a href="https://zetovusa.com" target="_blank">View Website <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="col-lg-6 col-md-6 order-1">
                        <img src="storage/images/projects/zetov.jpg" class="img-fluid" alt="Crappsy Health App" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center" id="blog">
            <div class="col-12 text-center">
                <h1>Popular Articles</h1>
                <p>These are some of the most visited and shared articles I’ve ever written.</p>
            </div>
            @include('includes.post-card')
            <div class="col-12 text-center pt-4">
                <a href="{{ url('/blog') }}" class="btn btn-primary">See All Articles...</a>
            </div>
        </div>
    </div>
</div>    
@endsection
