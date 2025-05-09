@extends('fronted.layout.app')

@section('content')


<section id="featured-cars" class="featured-cars">
    <div class="container">
      
        <div class="section-header">
            <p>checkout <span>the</span> featured cars</p>
            <h2>featured cars</h2>
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