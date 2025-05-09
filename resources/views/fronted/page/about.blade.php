
@extends('fronted.layout.app')

@section('title', 'About')

@section('content')


<section class="about_section layout_padding">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="{{('assets/images/new-cars-model/ncm2.png')}}"alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About <span>Cars-Rentals</span>
              </h2>
            </div>
            <p>
                Cars-Rentals is a comprehensive car rental management system designed to simplify and streamline the process of renting vehicles for both customers and administrators. The platform provides an intuitive, user-friendly interface where customers can browse available cars, view detailed vehicle information, check availability, and book rentals directly. Each customer has access to a personalized dashboard to track their rental history, total completed rentals, and total spending.
                
                Designed with scalability and flexibility in mind, Cars-Rentals can support both small businesses and large rental agencies. Real-time data updates ensure that availability and booking information are always current, reducing double-bookings and enhancing the user experience. Whether you're a customer looking for a quick, reliable rental or an admin managing multiple vehicles, Cars-Rentals delivers a seamless and effective solution.  </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
