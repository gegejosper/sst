@extends('layouts.front')

@section('content')

  <main id="main">
    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">
        <div class="section-header">
          <h2 align="center"> <i class="fa fa-truck"></i> Plans and Bundles</h2>
          <p align="center">You wouldn’t want to miss our Sky Plan and Bundles!</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><img src="img/onesky-cable-2.png" alt="" style="width:150px;"></div>
              <h4 class="title"><a href="">P299.00 / month</a></h4>
              <p class="description">with one-time installation fee of P1,599, 37 Standard Definition channels
10 High Definition channels</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><img src="img/onesky-cable-2.png" alt="" style="width:150px;"></div>
              <h4 class="title"><a href="">P549.00 / month</a></h4>
              <p class="description">with one-time installation fee of P1,599, 60 Standard Definition channels
24 High Definition channels</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInLeft" data-wow-delay="0.2s">
              <div class="icon"><img src="img/onesky-cable-2.png" alt="" style="width:150px;"></div>
              <h4 class="title"><a href="">P999.00 / month</a></h4>
              <p class="description">with one-time installation fee of P1,599, 80 Standard Definition channels
30 High Definition channels</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight" data-wow-delay="0.2s">
              <div class="icon"><img src="img/onesky-cable-2.png" alt="" style="width:150px;"></div>
              <h4 class="title"><a href="">P1,999.00 / month</a></h4>
              <p class="description">with one-time installation fee of P1,599, 25 Standard Definition channels
40 High Definition channels</p>
            </div>
          </div>
        
          
        </div>

      </div>
    </section><!-- #services -->
    

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2 align="center">Clients</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>

        <div class="owl-carousel clients-carousel">
          <img src="img/clients/client-1.png" alt="">
          <img src="img/clients/client-2.png" alt="">
          <img src="img/clients/client-3.png" alt="">
          <img src="img/clients/client-4.png" alt="">
          <img src="img/clients/client-5.png" alt="">
          <img src="img/clients/client-6.png" alt="">
          <img src="img/clients/client-7.png" alt="">
          <img src="img/clients/client-8.png" alt="">
        </div>

      </div>
    </section>
    <!-- #clients -->

    <!--==========================
      Our Portfolio Section
    ============================-->
    <!-- <section id="portfolio" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Our Portfolio</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/1.jpg" class="portfolio-popup">
                <img src="img/portfolio/1.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 1</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/2.jpg" class="portfolio-popup">
                <img src="img/portfolio/2.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 2</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/3.jpg" class="portfolio-popup">
                <img src="img/portfolio/3.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 3</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/4.jpg" class="portfolio-popup">
                <img src="img/portfolio/4.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 4</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/5.jpg" class="portfolio-popup">
                <img src="img/portfolio/5.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 5</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/6.jpg" class="portfolio-popup">
                <img src="img/portfolio/6.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 6</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/7.jpg" class="portfolio-popup">
                <img src="img/portfolio/7.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 7</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/8.jpg" class="portfolio-popup">
                <img src="img/portfolio/8.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 8</h2></div>
                </div>
              </a>
            </div>
          </div>

        </div>

      </div>
    </section> -->
    <!-- #portfolio -->



    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 text-center text-lg-left">
          

            <h3 class="cta-title">Door to Door Forwarding</h3>
            <p class="cta-text">Cargo are transported at some stage of their journey along the world’s roads where we give you a reassuring presence. </p>
          </div>
          <div class="col-lg-4 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="{{ url('/booking') }}">Request Booking Now!</a>
          </div>
        </div>

      </div>
    </section>
   
  </main>
@endsection
