<x-app-layout>
    <div class="app-wrapper"> 
        
        @include("components.aside")

        <main class="app-main"> 
            <div class="app-content-header"> 
                <div class="container-fluid"> 
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>{{ isset($rental) ? 'Edit Rentals' : 'Add New Rentals' }}</h2>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{route("rentals.index")}}" class="btn btn-md btn-success me-3">Back</a></li>
                            </ol>
                        </div>
                    </div> 
                </div> 
            </div> 
            <div class="app-content"> 
                <div class="container-fluid"> 
                    <div class="row">
                       
                        <div class="container">
                        
                            <form action="{{ isset($rental) ? route('rentals.update', $rental->id) : route('rentals.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($rental))
                                    @method('PUT')
                                @endif

                                @if (!(isset($rental)))
                                <div class="form-group">
                                    <label>Customer</label>
                                    <select name="user_id" class="form-control mb-2" required>
                                        <option value="">-- Select Customer --</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ old('id') == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Car</label>
                                    <select name="car_id" class="form-control mb-2" required>
                                        <option value="">-- Select Car --</option>
                                        @foreach($cars as $car)
                                            <option value="{{ $car->id }}" {{ old('id') == $car->id ? 'selected' : '' }}>
                                                {{ $car->name }} ({{ $car->brand }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif


                                @if (isset($rental))
                                <div class="form-group" >
                                    <label>Customer Name</label>
                                    <input type="text"  class="form-control mb-2" value="{{ old('name', $rental->user->name ?? '') }}"   readonly>
                                </div>
                                @endif

                                @if (isset($rental))
                                <div class="form-group" >
                                    <label>Car Name</label>
                                    <input type="text" class="form-control mb-2" value="{{ old('name', $rental->car->name ?? '') }}"  readonly>
                                </div>
                                @endif

                                @if (isset($rental))
                                <div class="form-group" >
                                    <label>Brand</label>
                                    <input type="text"  class="form-control mb-2" value="{{ old('brand', $rental->car->brand ?? '') }}"  readonly >
                                </div>
                                @endif

                                <div class="form-group" >
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" class="form-control mb-2" value="{{ old('start_date', $rental->start_date ?? '') }}" required>
                                </div>

                                <div class="form-group" >
                                    <label>End Date</label>
                                    <input type="date" name="end_date" class="form-control mb-2" value="{{ old('end_date', $rental->end_date ?? '') }}" required>
                                </div>
                        
                                <div class="form-group" >
                                    <label>Total Cost</label>
                                    <input type="text" name="total_cost" class="form-control mb-2" value="{{ old('total_cost', $rental->total_cost ?? '') }}" required>
                                </div>
                        
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control mb-2">
                                        <option value="pending" {{ (old('status', $rental->status ?? '') === "pending") ? 'selected' : '' }}>pending</option>
                                        <option value="ongoing" {{ (old('status', $rental->status ?? '') === "ongoing") ? 'selected' : '' }}>ongoing</option>
                                        <option value="cancelled" {{ (old('status', $rental->status ?? '') === "cancelled") ? 'selected' : '' }}>cancelled</option>
                                        <option value="completed" {{ (old('status', $rental->status ?? '') === "completed") ? 'selected' : '' }}>completed</option>
                                    </select>
                                </div>
                        
                          
                                <button type="submit" class="btn btn-primary mt-2">
                                    {{ isset($rental) ? 'Update Rentals' : 'Add Rentals' }}
                                </button>
                            </form>
                        </div>

                    </div> 
                </div> 
            </div> 
        </main> 

        @include('components.footer')
    </div>
</x-app-layout>
