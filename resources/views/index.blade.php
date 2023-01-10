<!doctype html>
<html lang="en">
  <head>
  <title>DueDeck | Easiest Compliance Automation Tool</title>
  <meta name="description" content="Looking for Compliance Automation Software for CA/CS/CWS or Tax Consultants? Look no further than DueDeck - an easy-to-use tool that is designed to help you streamline your compliance process and save you time & money. Learn how it can help you.">
  
  @include('include/head')
  </head>
<body>
<header class="header">
  @include('include/header')
</header>
<main>
<div data-bs-spy="scroll" data-bs-target="#duedeck-navbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="" tabindex="0">
  <!-- Banner Sec  -->
  <section id="home" class="banner-sec">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-7 mb-5 align-self-center" style="margin-top: 20px;">
      <img src="{{asset('images/Hero-section.png')}}" alt="Duedeck Dashbaord" width="300" class="img-fluid d-lg-none d-block mb-md-4 mb-3 mx-auto hero-img">
        <div class="baner-content text-lg-start text-md-center">
            <h1 class="title">Achieve More In Less Time As 
              <span class="text-brand">A Compliance Professional</span>
            </h1>
            <p class="discription text-md-start text-center">
              The easiest tool that <strong class="font-medium"> automates compliance, client communication & employee tasks</strong> for you - so that you focus on growing your business.
            </p>
        </div>
        <div class="mt-md-5 mt-3 text-lg-start text-center">
        <a href="/#pricing"><button class="btn btn-success btn-lg rounded-pill me-3"> Get Started <i class="bi bi-arrow-right"></i></button></a>
         <a href="/trial-request"><button class="btn btn-duedeck-outline btn-lg" type="submit"><i class="bi bi-display"></i> Book Demo </button></a>
        </div>
      </div>
      <div class="col-lg-5 align-self-end" style="margin-top: 20px;">
          <img src="{{asset('images/Hero-section.png')}}" alt="Duedeck Dashbaord" class="img-fluid d-none d-lg-block">
      </div>
    </div>
    </div>
  </section>

  <section class="sec-WorkEfficiency py-lg-5 py-md-4 py-3 ">
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-6 text-center">
          <h2 class="heading-2 text-center text-black">4x Your <span class="text-brand">Work Efficiency</span></h2>
           <div class=" p-2 text-center shadow my-4">
              <img src="{{asset('images/dashboard.png')}}" alt="Dashbaord" wi class="img-fluid">
           </div>
          </div>
          <div class="col-lg-8 text-center">
          <p class="lead text-white "><strong class="font-medium"> CA / CS / CWA or Tax Consultants</strong> who use DueDeck - experience at least 4 times increase in their work efficiency. Tasks now get fulfilled in minutes that took them hours otherwise. Which means? More free time!</p>
          </div>
      </div>
    </div>
  </section>
   
  <section class="py-lg-5 py-md-4 py-3">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-7 order-md-2">
          <h2 class="heading-2 text-black"><span class="text-brand">Handle More Clients</span> With Lesser Workforce</h2>
          <div class="heading-devider mb-4"></div>
          <p class="lead">Managing more & more clients doesn’t mean hiring more & more employees. DueDeck is designed for all team sizes and allows you to handle a bigger client-base with a minimal staff strength.</p>
        </div>
        <div class="col-md-5 order-md-1 pe-lg-4">
          <img src="{{asset('images/handle-multiple-client.jpg')}}" alt="Handle More Clients" class="img-fluid rounded-5" width=" ">
        </div>
      </div>
    </div>
  </section>
  <section class="bg-gradient-1 py-lg-5 py-md-4 py-3">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-7">
          <h2 class="heading-2 text-black"><span class="text-brand">Prepare To Compete</span> With FinTech Giants</h2>
          <div class="heading-devider mb-4"></div>
          <p class="lead">With DueDeck, you stay up-to-date with market dynamics by making use of the latest technology. Your clients stay satisfied & you don’t worry about getting wiped out in the world of FinTech platforms.</p>
        </div>
        <div class="col-md-5 text-end">
            <img src="{{asset('images/prepare.jpg')}}" alt="Prepare" class="img-fluid rounded-5" width=" ">
        </div>
      </div>
    </div>
  </section>
  <div class="container py-lg-5 py-md-4 py-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <h2 class="text-center heading-2 text-dark mb-md-5 mb-3">Testimonials</h2>
        <div id="TestimonialCarousel" class="carousel slide " data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#TestimonialCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#TestimonialCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#TestimonialCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
                <!-- Wrapper for slides -->
          <div class="carousel-inner testimonial-slider">
            <div class="carousel-item active">
              <div class=" p-4">
                  <div class="t-card">
                    <div class="row">
                      <div class="col-md-2">
                        <img src="{{asset('images/parimal-jadhav.jpg')}}" alt="Photo" class="profile-photo">
                      </div>
                      <div class="col-md-10">
                      <span class="quoate-icon"><i class="bi bi-quote"></i></span>
                          <p class="message">Lorem Ipsum ist ein einfacher 
                          Lorem Ipsum ist in der Industrie bereits der 
                          iste natus error sit voluptatem accusantium 
                          totam rem aperiam, eaque ipsa quae ab illo 
                          architecto beatae vitae dicta sunt explicabo.</p>
                          <p class="author-name">CS Parimal Jadhav</p>
                          <p class="company-name">Company Name, Pune</p>
                        
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="p-4">
                  <div class="t-card">
                    <div class="row">
                      <div class="col-md-2">
                        <img src="{{asset('images/parimal-jadhav.jpg')}}" alt="Photo" class="profile-photo">
                      </div>
                      <div class="col-md-10">
                      <span class="quoate-icon"><i class="bi bi-quote"></i></span>
                          <p class="message">Lorem Ipsum ist ein einfacher 
                          Lorem Ipsum ist in der Industrie bereits der 
                          iste natus error sit voluptatem accusantium 
                          totam rem aperiam, eaque ipsa quae ab illo 
                          architecto beatae vitae dicta sunt explicabo.</p>
                          <p class="author-name">CS Parimal Jadhav</p>
                          <p class="company-name">Company Name, Pune</p>
                        
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class=" p-4">
                  <div class="t-card">
                    <div class="row">
                      <div class="col-md-2">
                        <img src="{{asset('images/parimal-jadhav.jpg')}}" alt="Photo" class="profile-photo">
                      </div>
                      <div class="col-md-10">
                      <span class="quoate-icon"><i class="bi bi-quote"></i></span>
                          <p class="message">Lorem Ipsum ist ein einfacher 
                          Lorem Ipsum ist in der Industrie bereits der 
                          iste natus error sit voluptatem accusantium 
                          totam rem aperiam, eaque ipsa quae ab illo 
                          architecto beatae vitae dicta sunt explicabo.</p>
                          <p class="author-name">CS Parimal Jadhav</p>
                          <p class="company-name">Company Name, Pune</p>
                        
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="controls">
          <a class="left" href="#TestimonialCarousel"
            data-bs-slide="prev"><i class="bi bi-arrow-left-square-fill"></i></a>
          <a class="right" href="#TestimonialCarousel"
            data-bs-slide="next"><i class="bi bi-arrow-right-square-fill"></i></a>
        </div>
        </div>
        
      </div>
    </div>
  </div>
  <section class="bg-gradient-1 py-lg-5 py-md-4 py-3 mb-0">
    <div class="container">
    <h2 class="heading-2 text-black text-center mb-md-5 mb-4">DueDeck <span class="text-brand">Helps You</span></h2>
    <div class="row align-items-center">
      <div class="col-md-5 pe-md-5 mb-md-0 mb-3">
        <img src="{{asset('images/helps-you.png')}}" alt="Helps You" class="img-fluid">
      </div>
      <div class="col-md-7">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-6 text-center mb-3">
            <div class="card help-feature-card">
              <img src="{{asset('images/taxes-ontime.svg')}}" alt="File Taxes On Time">
              <h3 class="helps-title">File Taxes<br> On Time</h3>
            </div>
          </div>
          <div class="col-lg-4 col-6 mb-3 text-center">
            <div class="card help-feature-card">
              <img src="{{asset('images/team-productivity.svg')}}" alt="Productivity">
              <h3 class="helps-title">Increase Team <br>Productivity</h3>
            </div>
          </div>
          <div class="col-lg-4 col-6 mb-3 text-center">
            <div class="card help-feature-card">
              <img src="{{asset('images/speedUp.svg')}}" alt="Speed Up">
              <h3 class="helps-title">Speed Up <br>Client Coordination</h3>
            </div>
          </div>
          <div class="col-lg-4 col-6 text-center">
            <div class="card help-feature-card">
              <img src="{{asset('images/doc-sharing.svg')}}" alt="Document Sharing">
              <h3 class="helps-title">Ease Up <br>Document Sharing</h3>
            </div>
          </div>
          <div class="col-lg-4 col-6 mb-3 text-center">
            <div class="card help-feature-card">
              <img src="{{asset('images/paid-on-time.svg')}}" alt="Get Paid">
              <h3 class="helps-title">Get Paid <br>On Time</h3>
            </div>
          </div>
          <div class="col-lg-4 col-6 text-center">
            <div class="card help-feature-card">
              <img src="{{asset('images/misCommunication.svg')}}" alt="Prevent Miscommunication">
              <h3 class="helps-title">Prevent <br>Miscommunication</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </section>
  <section id="features" class="features-sec py-lg-5 py-3">
      <div class="container">
          <h2 class="heading-2 text-white text-center mb-4">Everything You Need</h2>
          <div class="row justify-content-center mb-5">
              <div class="col-md-10 text-center">
                <p class="text-white">DueDeck Is Loaded With Everything That You Need To Put Your Office On Auto-Pilot Mode.</p>
              </div>
          </div>
          <div class="row features-row justify-content-center">
              <div class="col-lg-3 col-md-6 mb-3">
                <div class="card feature-card">
                  <div class="feature-icon-box">
                    <img src="{{asset('images/AutoTaskCreation.svg')}}" alt="Auto Task Creation" class="feature-icon">
                  </div>
                  <h3 class="feature-name">Auto Task <br>Creation</h3>
                  <p class="feature-detail">
                  Create customized Act wise Service Task masters and allocate to your clients. Automated Tasks would be created on predecided dates before due dates.
                  </p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 mb-3">
                <div class="card feature-card">
                  <div class="feature-icon-box">
                    <img src="{{asset('images/AutoAllocation.svg')}}" alt="Auto Task Creation" class="feature-icon">
                  </div>
                  <h3 class="feature-name">Auto Allocation <br>to Staff</h3>
                  <p class="feature-detail">
                  Auto allocation of auto generated tasks to predefined co-workers would relieve you from tedious task allocation work among your staff.
                  This automation would not only ensure timely creation of tasks but also allocation in the trays of your staff.
                  </p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 mb-3">
                <div class="card feature-card">
                  <div class="feature-icon-box">
                    <img src="{{asset('images/AutoInvoicing.svg')}}" alt="Appointment" class="feature-icon">
                  </div>
                  <h3 class="feature-name">Auto <br>Invoicing</h3>
                  <p class="feature-detail">
                  With auto generatation and auto allocation of tasks you can fix your annual invoicing and frequency of invoicing. Invoices would be generated automatically at predecided monthly / quarterly / half yearly / yearly intervals. 
                  </p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 mb-3">
                <div class="card feature-card">
                  <div class="feature-icon-box">
                    <img src="{{asset('images/Appointment.svg')}}" alt="Appointment" class="feature-icon">
                  </div>
                  <h3 class="feature-name">Appointment Management</h3>
                  <p class="feature-detail">
                  You, your staff and clients can fix and track appointments. Not only this you can reschedule, accept, cancel, maintain minutes of appointments online.
                  </p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 mb-3">
                <div class="card feature-card">
                  <div class="feature-icon-box">
                    <img src="{{asset('images/NoticeManagment.svg')}}" alt="Notice Management" class="feature-icon">
                  </div>
                  <h3 class="feature-name">Notice Management Tool</h3>
                  <p class="feature-detail">
                  Track hearing dates, maintain submissions of each hearing, maintain client and internal discussions on litigations, maintain client communication trails in litigation. All issues are addressed in minutely designed Notice Management Tool.
                  </p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 mb-3">
                <div class="card feature-card">
                  <div class="feature-icon-box">
                    <img src="{{asset('images/HierarchyManagement.svg')}}" alt="Hierarchy Management" class="feature-icon">
                  </div>
                  <h3 class="feature-name">Hierarchy Management</h3>
                  <p class="feature-detail">
                  We know office management strucure plays an important role. Customizable user access controls and reporting controls are provided as per your office hierarchy. 
                  </p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 mb-3">
                <div class="card feature-card">
                  <div class="feature-icon-box">
                    <img src="{{asset('images/WebMobileApplication.svg')}}" alt="Web & Mobile Application" class="feature-icon">
                  </div>
                  <h3 class="feature-name">Web & Mobile Application</h3>
                  <p class="feature-detail">
                  DueDeck provides web as well as mobile application for clients. Presence on Web & Mobile makes your office online and cloud based. Work from home, tracing pending work and allocating work as made easy for everyone.
                  </p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 mb-3">
                <div class="card feature-card">
                  <div class="feature-icon-box">
                    <img src="{{asset('images/Customizable.svg')}}" alt="Customizable" class="feature-icon">
                  </div>
                  <h3 class="feature-name">Customizable</h3>
                  <p class="feature-detail">
                  DueDeck not only provides best user experience it is built in such a way that any office requirement can be fit into. Have your own way of working? DueDeck does not believe in a one-size-fits-all approach & allows you to customize all modules as per your own taste.
                  </p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 mb-3">
                <div class="card feature-card">
                  <div class="feature-icon-box">
                    <img src="{{asset('images/secured.svg')}}" alt="Secured" class="feature-icon">
                  </div>
                  <h3 class="feature-name">Secured Application</h3>
                  <p class="feature-detail">
                  Your data is safe & secure with Secure Sockets Layer (SSL), with Dedicated Server and backup facilities over Cloud Environment.
                  </p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 mb-3">
                <div class="card feature-card mb-0">
                  <div class="feature-icon-box">
                    <img src="{{asset('images/OnlinePayments.svg')}}" alt="Online Payments" class="feature-icon">
                  </div>
                  <h3 class="feature-name">Online Payments</h3>
                  <p class="feature-detail">
                  We all work for payments. How if all your clients can can view bills on mobile and have options to pay through Credit / Debit card, Net Banking, UPI. Yes we have successfully integrated & tested facility from RazorPay to make ease in payments. These are subject to variable charges from the service provider.
                  </p>
                </div>
              </div>
          </div>
      </div>
  </section>
  <section style="background:#EBF7FB" class="py-lg-5 py-3">
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-12 text-center">
          <h3 class="h2 text-dark mb-4 font-bold">You Don’t Have To Be Tech-Savy To Automate Your Accounting Tasks Anymore!</h3>
          <a href="/#pricing"> <button type="button" class="btn btn-duedeck btn-lg">Start Automating</button></a>
      </div>
    </div>
  </div>
  </section>
  
  <div class="container text-center py-md-5 py-4">
    <h2 class="heading-2">What’s More?</h2>
    <p class="lead text-secondary mb-4">Your Subscription Comes With</p>
    <div class="row mt-4 mt-md-5">
        <div class="col-md-4 mb-md-0 mb-3">
            <div class=" ">
                <img src="{{asset('images/money-back.svg')}}" width="70" height="70" alt="Money Back" class="mx-auto mb-3">
                <h4 class="font-18 font-bold mb-3">21-Days<br>
              Money Back Guarantee*</h4>
            </div>
        </div>
        <div class="col-md-4 mb-md-0 mb-3 border-end border-start">
            <div class=" ">
                <img src="{{asset('images/free-training.svg')}}" width="70" height="70" alt="Free Training" class="mx-auto mb-3">
                <h4 class="font-18 font-bold mb-3">Resources & <br> Training Material</h4>
              <p class="font-14 text-white mb-0"></p>
            </div>
        </div>
        <div class="col-md-4 mb-md-0 mb-3">
            <div class=" ">
                <img src="{{asset('images/support.svg')}}" width="70" height="70" alt="Customer Support" class="mx-auto mb-3">
                <h4 class=" font-18 font-bold mb-3">Dedicated <br>
                Customer Support</h4>
               
            </div>
        </div>
    </div>
     
  </div>


<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing-sec py-lg-12 py-md-12 py-3 ">
      <div class="container" data-aos="fade-up">
        <header class="mb-3 align-items-center">
			    <p class="text-center">PRICING PLAN</p>
          <h2 class="text-center wow fadeIn mt-3">Simple, Transparent And Affordable Pricing</h2>         
        </header>
        <div class="row">
        <div class="col-md-12 mb-md-0 mb-12 wow fadeIn">
          <h2 class="text-center heading-2 wow fadeIn mt-3">Coming Soon</h2>
        </div>
        </div>    
        
      </div>  
  </section>
<!-- End Pricing Section -->


@if(isset($packages))
  <section id="pricing" class="pricing-sec py-lg-4 py-md-4 py-3">
    <div class="container">
      <h2 class="text-center heading-2 wow fadeIn mt-3">Pricing Plans</h2>
      <p class="lead text-center mb-5 wow fadeInUp" data-wow-delay="0.5s">Simple, Transparent And Affordable Pricing</p>
      <div class="row mb-3 align-items-center">
        @foreach ($packages as $package)
        <div class="col-md-4 mb-md-0 mb-4 wow fadeIn" data-wow-delay="0.8s">
          <div class="card pricing-card
          @if($package['name'] == 'Pro')
          pro
          @endif
          ">
              <div class="card-header text-center">
                  <h4 class="plan-name">{{ $package['name'] }}</h4>
                  <p class="price"> <strike style="margin-right: 20px;opacity: 0.5;">₹
                  @if($package['amount'] == 4999.00)  
                    9,999.00
                  @endif
                  @if($package['amount'] == 5999.00)  
                    11,999.00
                  @endif
                  @if($package['amount'] == 7999.00)  
                    15,999.00
                  @endif
                </strike>  ₹ {{ $package['amount'] }}</p>
              </div>
              <div class="card-body border-bottom font-15">
                @foreach(collect($package['packages'])->where('isaddon', 0)->where('isactive', 1)->where('function_id', '!=', 5)->sortBy('function.functionorder') as $feature)
                    
                   
                  <div class="d-flex justify-content-between mb-2">
                    <p class="font-medium mb-0">{{ $feature['function']['name'] }} Count</p>
                    <p class="mb-0">Upto
                    <?php if($feature['function']['name'] == 'Space'){  
                        $size = $feature['no_of_count'];
                        $units = array( 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
                        $power = $size > 0 ? floor(log($size, 1024)) : 0;
                        $space = number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
                        echo $space;
                      }else{
                        echo $feature['no_of_count'];
                      }   
                    ?>               
                    {{ $feature['function']['name'] }}</p>
                  </div>
                @endforeach
              </div>
              <div class="card-body border-bottom">
                  <h4 class="text-center font-medium font-18 mb-3">Modules</h4>
                  <div class="row">
                    @foreach (explode(",", $package['modulenames']) as $menu)
                    <div class="col-md-6">
                      <p class="module-name"><span class="icon"><i class="bi bi-check-circle-fill"></i></span>{{ $menu }}</p>
                    </div>
                    @endforeach
                    <div class="col-md-6">
                      <p class="module-name"><span class="icon"><i class="bi bi-check-circle-fill"></i></span> Email
                      @if($package['name'] == 'Scale')
                      & Phone
                      @endif
                      Support
                    </p>
                    </div>
                    <div class="col-md-6">
                      <p class="module-name"><span class="icon"><i class="bi bi-check-circle-fill"></i></span> Recorded Training Content</p>
                    </div>
                  </div>
              </div>
              <div class="card-body text-center">
              <h4 class="font-medium font-16">Mobile Application for Clients</h4>
              <p class="font-14">Client will be charged Rs. 49</p>
                <a href="/checkout/{{ $package['id'] }}"> <button type="button" class="btn btn-duedeck px-5">Buy Now</button></a>
              </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif
 
  <section id="faq">
    <div class="container py-lg-5 py-md-4">
        <div class="row">
          <div class="col-lg-4 pe-lg-4">
            <img src="{{asset('images/faq.svg')}}" alt="FAQs" class="img-fluid d-md-none d-lg-block" width="100%">
          </div>
          <div class="col-lg-8">
              <h2 class="heading-2 mb-4">Frequently Asked Questions</h2>
              <div class="accordion faq-accordion" id="FaqsAccordion">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="Faqheading_1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#Faq_1" aria-expanded="true" aria-controls="Faq_1">
                    Is there any condition for a 21-day money-back guarantee?
                    </button>
                  </h2>
                  <div id="Faq_1" class="accordion-collapse collapse show" aria-labelledby="Faqheading_1" data-bs-parent="#FaqsAccordion">
                    <div class="accordion-body">
                      Yes, you need to log in & actively use DueDeck for a minimum of 20 days within the first 21 days. After that, if you are not happy with the product, you can send us an email to hello@duedeck.com and you will receive the full refund. No questions asked! But, if you don’t use the software for at least 20 days, you won’t be eligible for a refund.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="Faqheading_2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Faq_2" aria-expanded="false" aria-controls="Faq_2">
                    How will I get access to the software?
                    </button>
                  </h2>
                  <div id="Faq_2" class="accordion-collapse collapse" aria-labelledby="Faqheading_2" data-bs-parent="#FaqsAccordion">
                    <div class="accordion-body">
                      Get DueDeck. Once you buy any of our plans, you will get the confirmation & login details via email. You can log in to your account and start using the software right away
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="Faqheading_4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Faq_4" aria-expanded="false" aria-controls="Faq_4">
                    Do I need to buy separate subscriptions for different devices?
                    </button>
                  </h2>
                  <div id="Faq_4" class="accordion-collapse collapse" aria-labelledby="Faqheading_4" data-bs-parent="#FaqsAccordion">
                    <div class="accordion-body">
                    No, DueDeck is a cloud-based software & it can be accessed through any device. However, if you need a separate admin-level account, you have to buy a separate subscription.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="Faqheading_5">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Faq_5" aria-expanded="false" aria-controls="Faq_5">
                    How do I know whether my PC or laptop is compatible with the software?
                    </button>
                  </h2>
                  <div id="Faq_5" class="accordion-collapse collapse" aria-labelledby="Faqheading_5" data-bs-parent="#FaqsAccordion">
                    <div class="accordion-body">
                    DueDeck is a cloud-based software that can be accessed from any device irrespective of the device configuration. All you need is a good web browser like Chrome, Firefox, or Safari and an internet connection.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="Faqheading_6">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Faq_6" aria-expanded="false" aria-controls="Faq_6">
                    Is all the sensitive information safe in DueDeck?
                    </button>
                  </h2>
                  <div id="Faq_6" class="accordion-collapse collapse" aria-labelledby="Faqheading_6" data-bs-parent="#FaqsAccordion">
                    <div class="accordion-body">
                    Your data is safe & secure with Secure Sockets Layer (SSL), with Dedicated Server and backup facilities over Cloud Environment. All these platforms are secured ones in the market. So yes, these will best take care of securing your sensitive data.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="Faqheading_7">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Faq_7" aria-expanded="false" aria-controls="Faq_7">
                    Will I get any help if I face an issue while using the software?
                    </button>
                  </h2>
                  <div id="Faq_7" class="accordion-collapse collapse" aria-labelledby="Faqheading_7" data-bs-parent="#FaqsAccordion">
                    <div class="accordion-body">
                    There are self explanatory demo videos for your reference. Still, if you need any help, you can raise a ticket from "Need Help" tab from your login. Also, you can share your issues on - hello@duedeck.com and we will make sure to solve them as soon as possible.
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>
  </section>
</div>
<!-- <div class="sticky-btns">
<a href="trial-request.php" target="_blank" class="btn-free-trial">21 Days Free Trial <i class="bi bi-box-arrow-in-up-right"></i></a>
</div> -->
  <!-- FOOTER -->
  <footer class="footer">
      @include('include/footer')
  </footer>
  </main>
    
  </body>
</html>