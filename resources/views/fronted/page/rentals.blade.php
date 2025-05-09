
@extends('fronted.layout.app')

@section('title', 'Rentals')

@section('content')


<section id="featured-cars" class="featured-cars">
    <div class="container">
     
        <div class="section-header">
            <p>Available <span>Cars</span> For Rent</p>
            <h2>Rent cars</h2>
        </div>
        

                 <div class="container" style="margin-top:40px">
                        <div class="row">
                           <div class="col-md-offset-1 col-md-2 col-sm-12">
                                <div class="single-model-search">
                                    <h2>All Cars</h2>
                                    <div class="model-select-icon">
                                        <select class="form-control">

                                              <option value="default">style</option><!-- /.option-->

                                              <option value="sedan">sedan</option><!-- /.option-->

                                              <option value="van">van</option><!-- /.option-->
                                              <option value="roadster">roadster</option><!-- /.option-->

                                        </select><!-- /.select-->
                                    </div><!-- /.model-select-icon -->
                                </div>
                            </div>
                            <div class="col-md-offset-1 col-md-2 col-sm-12">
                                <div class="single-model-search">
                                    <h2>All Brand</h2>
                                    <div class="model-select-icon">
                                        <select class="form-control">

                                              <option value="default">make</option><!-- /.option-->

                                              <option value="toyota">toyota</option><!-- /.option-->

                                              <option value="holden">holden</option><!-- /.option-->
                                              <option value="maecedes-benz">maecedes-benz.</option><!-- /.option-->

                                        </select><!-- /.select-->
                                    </div><!-- /.model-select-icon -->
                                </div>
                            </div>

                            <div class="col-md-offset-1 col-md-2 col-sm-12">
                                <div class="single-model-search">
                                    <h2>Max Daily Rent Price</h2>
                                        <input type="number" style="width:100%; height:50px" min="0">
                                </div>
                            </div>
                            <div class="col-md-offset-1 col-md-2 col-sm-12">
                                <div class="single-model-search">
                                    <button class="btn btn-info" style="margin-top: 35px"><a href="#">Search</a></button>
                                </div>
                            </div>

                           
                        </div>
                 </div>

                 <div class="featured-cars-content">
                    <div class="row">
                        @foreach ($cars as $car )
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-featured-cars">
                                <div class="featured-img-box">
                                    <div class="featured-cars-img">
                                        <img src="{{ asset('storage/' . $car->image) }}" alt="cars">
                                    </div>
                                    <div class="featured-model-info">
                                        <p>
                                            model: {{$car->model}}
                                            <span class="featured-hp-span"> year : {{$car->year}}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="featured-cars-txt">
                                    <h2><a href="#">{{$car->name}}</a></h2>
                                    <p style="margin-bottom: 5px" > brand : {{$car->brand}}</p> 
                                    <h3 style="font-size: medium">Daily Rent: {{$car->daily_rent_price}}</h3>
                                        <button type="submit" class="btn btn-info">
                                         <a href="{{url('/cars-view-rent',$car->id)}}">Rent Now</a>
                                        </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    
                </div>
    </div>

</section>
@endsection
