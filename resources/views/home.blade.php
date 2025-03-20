@extends('layouts.master_home')

@section('home_content')
<!-- ======= About Us Section ======= -->
<section id="about-us" class="about-us">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About Us</h2>
      </div>

      <div class="row content">
        <div class="col-lg-6" data-aos="fade-right">
          <h2>{{ $abouts->title }}</h2>
          <h3>{{ $abouts->short_dis }}</h3>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
          <p>
            {{ $abouts->long_dis }}
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> Responsive and intuitive UI/UX</li>
            <li><i class="ri-check-double-line"></i> API integrations for seamless functionality</li>
            <li><i class="ri-check-double-line"></i> With our expertise, we transform complex ideas into Laravel-powered solutions that help businesses thrive.</li>
          </ul>
          <p class="font-italic">
            We build flawless, high-performance Laravel applications with clean code, seamless functionality, and unmatched precision to drive business success.
          </p>
        </div>
      </div>

    </div>
  </section><!-- End About Us Section -->

 <!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Services</h2>
            <p>Laborum repudiandae omnis voluptatum consequatur mollitia ea est voluptas ut</p>
        </div>

        <div class="row">
            @foreach($services as $index => $service)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 w-100">


                    <div class="icon-box"
     style="--icon-color: {{ $service->color ?? '#45b2ff' }};
            --svg-default: #f5f5f5;
            --hover-bg: {{ $service->color ?? '#45b2ff' }};">
    <h4><a href="#">{{ $service->title }}</a></h4>
    <p>{{ $service->description }}</p>
    <div class="icon">
        <span class="svg-container">
            {!! str_replace(['fill="#f5f5f5"', 'fill="#ffffff"', 'fill="'], ['','',''], $service->svg_icon) !!}
        </span>
        <i class="{{ $service->font_icon }}" style="color: var(--icon-color);"></i>
    </div>
</div>




                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Services Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
      </div>

      <div class="row" data-aos="fade-up">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-card">Card</li>
            <li data-filter=".filter-web">Web</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up">

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <img src="{{ asset('frontend/assets/img/portfolio/portfolio-1.jpg')}}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>App 1</h4>
            <p>App</p>
            <a href="{{ asset('frontend/assets/img/portfolio/portfolio-1.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <img src="{{ asset('frontend/assets/img/portfolio/portfolio-2.jpg')}}"class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Web 3</h4>
            <p>Web</p>
            <a href="{{ asset('frontend/assets/img/portfolio/portfolio-2.jpg')}}"data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <img src="{{ asset('frontend/assets/img/portfolio/portfolio-3.jpg')}}"class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>App 2</h4>
            <p>App</p>
            <a href="{{ asset('frontend/assets/img/portfolio/portfolio-3.jpg')}}"data-gall="portfolioGallery" class="venobox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <img src="{{ asset('frontend/assets/img/portfolio/portfolio-4.jpg')}}"class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Card 2</h4>
            <p>Card</p>
            <a href="{{ asset('frontend/assets/img/portfolio/portfolio-4.jpg')}}"data-gall="portfolioGallery" class="venobox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <img src="{{ asset('frontend/assets/img/portfolio/portfolio-5.jpg')}}"class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Web 2</h4>
            <p>Web</p>
            <a href="{{ asset('frontend/assets/img/portfolio/portfolio-5.jpg')}}"data-gall="portfolioGallery" class="venobox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <img src="{{ asset('frontend/assets/img/portfolio/portfolio-6.jpg')}}"class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>App 3</h4>
            <p>App</p>
            <a href="{{ asset('frontend/assets/img/portfolio/portfolio-6.jpg')}}"data-gall="portfolioGallery" class="venobox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <img src="{{ asset('frontend/assets/img/portfolio/portfolio-7.jpg')}}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Card 1</h4>
            <p>Card</p>
            <a href="{{ asset('frontend/assets/img/portfolio/portfolio-7.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <img src="{{ asset('frontend/assets/img/portfolio/portfolio-8.jpg')}}"class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Card 3</h4>
            <p>Card</p>
            <a href="{{ asset('frontend/assets/img/portfolio/portfolio-8.jpg')}}"data-gall="portfolioGallery" class="venobox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <img src="{{ asset('frontend/assets/img/portfolio/portfolio-9.jpg')}}"class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Web 3</h4>
            <p>Web</p>
            <a href="{{ asset('frontend/assets/img/portfolio/portfolio-9.jpg')}}"data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Section -->

  <!-- ======= Our Clients Section ======= -->
  <section id="clients" class="clients">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Brands</h2>
      </div>

      <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">


@foreach($brands as $brand)
        <div class="col-lg-3 col-md-4 col-6">
          <div class="client-logo">
            <img src="{{ $brand->brand_image}}" class="img-fluid" alt="">
          </div>
        </div>
@endforeach


      </div>

    </div>
  </section><!-- End Our Clients Section -->



@endsection
