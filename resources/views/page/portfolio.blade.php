@extends('layouts.master-home')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Portolio</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Portolio</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

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
              <li data-filter=".app">App</li>
              <li data-filter=".card">Card</li>
              <li data-filter=".web">Web</li>
            </ul>
          </div>
        </div>
        
        <div class="row portfolio-container" data-aos="fade-up">
        <?php $count=0?>
          @foreach ( $images as $image )
          <?php $count++ ?>
            <div class="col-lg-4 col-md-6 portfolio-item {{$image->choose}} ">
                <img src="{{ asset($image->image) }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>{{$image->choose . $count}}</h4>
                  <p>{{$image->choose}}</p>
                  <a href="{{asset($image->image)}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
          @endforeach
          


        </div>

      </div>
    </section><!-- End Portfolio Section -->



@endsection