<x-app-layout>
    <div class="app-wrapper"> 
        
        @include("components.aside")

        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>{{ isset($car) ? 'Edit Car' : 'Add New Car' }}</h2>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{route("cars.index")}}" class="btn btn-md btn-success me-3">Back</a></li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!-- Small Box (Stat card) -->
                    <div class="row">
                       
                        <div class="container">
                        
                            <form action="{{ isset($car) ? route('cars.update', $car->id) : route('cars.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($car))
                                    @method('PUT')
                                @endif
                        
                                <div class="form-group" >
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control mb-2" value="{{ old('name', $car->name ?? '') }}" required>
                                </div>
                        
                                <div class="form-group">
                                    <label>Brand</label>
                                    <input type="text" name="brand" class="form-control mb-2" value="{{ old('brand', $car->brand ?? '') }}" required>
                                </div>
                        
                                <div class="form-group">
                                    <label>Model</label>
                                    <input type="text" name="model" class="form-control mb-2" value="{{ old('model', $car->model ?? '') }}" required>
                                </div>
                        
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="number" name="year" class="form-control mb-2" value="{{ old('year', $car->year ?? '') }}" required>
                                </div>
                        
                                <div class="form-group">
                                    <label>Car Type</label>
                                    <input type="text" name="car_type" class="form-control mb-2" value="{{ old('car_type', $car->car_type ?? '') }}" required>
                                </div>
                        
                                <div class="form-group">
                                    <label>Daily Rent Price</label>
                                    <input type="number" step="0.01" name="daily_rent_price" class="form-control mb-2" value="{{ old('daily_rent_price', $car->daily_rent_price ?? '') }}" required>
                                </div>
                        
                                <div class="form-group">
                                    <label>Availability</label>
                                    <select name="availability" class="form-control mb-2">
                                        <option value="1" {{ (old('availability', $car->availability ?? '') == 1) ? 'selected' : '' }}>Available</option>
                                        <option value="0" {{ (old('availability', $car->availability ?? '') == 0) ? 'selected' : '' }}>Unavailable</option>
                                    </select>
                                </div>
                        
                                <div class="form-group" >
                                    <label>Image</label>
                                    @if(isset($car) && $car->image)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $car->image) }}" width="100" alt="Car Image">
                                        </div>
                                    @endif
                                    <input type="file" name="image" class="form-control-file mb-2">
                                </div>
                        
                                <button type="submit" class="btn btn-primary mt-2">
                                    {{ isset($car) ? 'Update Car' : 'Add Car' }}
                                </button>
                            </form>
                        </div>

                    </div> <!-- /.row -->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->
        @include('components.footer')

    </div>
</x-app-layout>
