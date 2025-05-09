@extends('fronted.layout.app')

@section('title', 'Cars Rents View')

@section('content')


    <section id="new-cars" class="new-cars">
        <div class="container">
            <div class="section-header">
                <p>checkout <span>the</span> rent cars</p>
                <h2>Car Rent View</h2>
            </div>
            <div class="new-cars-content">
                <div class="owl-carousel owl-theme" id="new-cars-carousel">

                    <div class="new-cars-item">
                        <div class="single-new-cars-item">
                            <div class="row">
                                <div class="col-md-7 col-sm-12">
                                    <div class="new-cars-img">
                                        <img src="{{ asset('storage/' . $car_details->image) }}" alt="img" />
                                    </div><!--/.new-cars-img-->
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="new-cars-txt">
                                        <h2><a href="#"> </a></h2>
                                        <p>
                                            Brand: {{ $car_details->brand }}
                                        </p>
                                        <p class="new-cars-para2">
                                            Model: {{ $car_details->model }}
                                        </p>
                                        <p class="new-cars-para2">
                                            year: {{ $car_details->year }}
                                        </p>
                                        <h2 class="new-cars-para2"> Daily Rent : BDT: {{ $car_details->daily_rent_price }}
                                        </h2>
                                    </div>

                                    <form action="{{ url('/submitRent', $car_details->id) }}" method="POST">
                                        @if (session('success'))
                                                    <div class="alert alert-success">{{ session('success') }}</div>
                                                @endif
                                                @if (session('error'))
                                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                                @endif
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6">
                                                
                                                <div class="new-cars-txt">
                                                    <p>Start Date:</p>
                                                    <input type="date" name="start_date" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-sm-6">
                                                <div class="new-cars-txt">
                                                    <p>End Date:</p>
                                                    <input type="date" name="end_date" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" style="margin-left: 30%" class="btn btn-primary btn-lg">Book
                                            Now</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
