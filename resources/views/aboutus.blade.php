<!doctype html>
<html lang="en">
  <head>
  <title>About | DueDeck</title>
<meta name="description" content="The idea of DueDeck stroke us while we were closely working with one of the compliance firms. Now, we’re here to provide a robust yet easy-to-use solution that’ll help you achieve a never imagined scale.">
  @include('include/head')
  </head>
<body>
<header class="header">
  @include('include/header')
</header>
<main>
    <div class="bg-light py-4">
    <div class="container mb-0"><h1 class="heading-2 mb-0"><span class="text-dark">About</span> DueDeck</h1>
    </div>
    </div>
    <div class="container py-md-5 py-4">
     <div class="card p-3 border-0 bg-light mb-4 mb-md-5 value-bg">
         <h2 class="font-18 font-bold">Creating Values!</h2>   
         <p>The idea of DueDeck stroke us while we were closely working with one of the compliance firms. 
We witnessed their struggles.</p>
<p>It significantly affected our experience as their client.</p>
<p>We as a company building info tech solutions, saw them struggling with tedious excel sheets, keeping up with the due dates, managing employees, and going through frustrating client  follow-ups.</p>
<p>Their needs and demands shaped DueDeck.</p>
<p>To date, we have empowered 50+ compliance firms (and growing) with compliance automation.</p>
<p>We are here not to complicate stuff in the name of tech, but provide you with a robust yet easy-to-use solution that will take you from ground zero and achieve the scale that you never would have imagined.</p>
     </div>
   
    <div class="row align-items-center justify-content-center mb-md-5 mb-4">
        <div class="col-md-6 mb-4 pe-lg-5">
            <img src="{{asset('images/our-mission.png')}}" alt="Our Mission" class="img-fluid w-100">
        </div>
            <div class="col-md-6 mb-4">
                <h2 class="font-bold h3">Our Mission</h2>
                <p>We are on a mission to help at least 50,000 Compliance Professionals across India significantly increase their work efficiency.</p>
                <p>We are here to empower them with the necessary technology so that they -</p>
                <ul class="ps-3">
                    <li>Increase their capacity</li>
                    <li>Serve more clients</li>
                    <li>Grow their business</li>
                    <li>Attain a healthy work-life balance.</li>
                </ul>
                <p class="mb-0">All we want is to help them achieve more in less time!</p>
            </div>
        </div>
    

    <div class="row align-items-center justify-content-center mb-md-5 mb-4">
        <div class="col-md-8 mb-4">
        <img src="{{asset('images/our-vision.png')}}" alt="Our Vision" class="img-fluid d-md-none d-bloack mb-4">
                <h2 class="font-bold h3">Our Vision</h2>
                <p>We want to truly make a dent in the Indian ecosystem by enabling more and more Indians to file their compliances without fail.</p>
                <p>This will significantly impact our nation’s economic scenario (in a positive way).</p>
                <p>But this is still a far-fetched reality when we only have 1 Compliance Professional for every 1,00,000 citizens (approx)!</p>
                <p>We at DueDeck want - filing compliances to become more accessible and effortless for each citizen.</p>
                <p>And we are confident that this will happen only by empowering compliance professionals with cutting-edge technology.</p>
                <p class="mb-0">We are here to unite technological marvels with the compliance industry and open up tremendous possibilities for our Nation’s growth.</p>
            </div>
        <div class="col-md-4 mb-4">
            <img src="{{asset('images/our-vision.png')}}" alt="Our Vision" class="img-fluid d-md-block d-none">
        </div>
            
        </div>
    </div>
    </div>
  <footer class="footer">
      @include('include/footer')
  </footer>
  </main>
    
  </body>
</html>