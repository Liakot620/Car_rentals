<x-app-layout>
    <div class="app-wrapper"> 
        
        @include("components.aside")

        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Car Show</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ route('cars.index')}}"class="btn btn-md btn-success me-3">back</a></li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!-- Small Box (Stat card) -->
                    <div class="row">
                       
                        <div class="card mb-4 shadow-sm" style="width: 100%;">
                            @if($car->image)
                                <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="https://via.placeholder.com/400x200?text=No+Image" class="card-img-top" alt="No Image">
                            @endif
                        
                            <div class="card-body">
                                <h5 class="card-title">{{ $car->name }}</h5><br>
                                <p class="card-text">
                                    <strong>Brand:</strong> {{ $car->brand }}<br>
                                    <strong>Model:</strong> {{ $car->model }}<br>
                                    <strong>Year:</strong> {{ $car->year }}<br>
                                    <strong>Type:</strong> {{ $car->car_type }}<br>
                                    <strong>Daily Rent:</strong> ${{ number_format($car->daily_rent_price, 2) }}<br>
                                    <strong>Availability:</strong>
                                    <span class="badge bg-{{ $car->availability ? 'success' : 'danger' }}">
                                        {{ $car->availability ? 'Available' : 'Unavailable' }}
                                    </span>
                                </p>
                                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this car?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                        

                    </div> <!-- /.row -->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->
        @include('components.footer')

    </div>
</x-app-layout>
