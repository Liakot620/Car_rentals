<x-app-layout>
    <div class="app-wrapper">


        @include('components.aside')

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Car Details</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('cars.create') }}"class="btn btn-md btn-success me-3">Create</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">


                        <div class="container my-3">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Year</th>
                                            <th>Car_type</th>
                                            <th>Daliy_rent_price</th>
                                            <th>Availability</th>
                                            <th>Imgae</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($cars as $car)
                                            <tr>
                                                <td>{{ $car->id }}</td>
                                                <td>{{ $car->name }}</td>
                                                <td>{{ $car->brand }}</td>
                                                <td>{{ $car->model }}</td>
                                                <td>{{ $car->year }}</td>
                                                <td>{{ $car->car_type }}</td>
                                                <td>${{ number_format($car->daily_rent_price, 2) }}</td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $car->availability ? 'success' : 'danger' }}">
                                                        {{ $car->availability ? 'Available' : 'Unavailable' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if ($car->image)
                                                        <img src="{{ asset('storage/' . $car->image) }}"
                                                            alt="Car Image" width="60">
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('cars.edit', $car->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="{{ route('cars.show', $car->id) }}"
                                                        class="btn btn-sm btn-info">show</a>

                                                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST"
                                                        style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <nav aria-label="Table navigation">
                                    {{$cars->links('pagination::bootstrap-5')}}
                            </nav>
                        </div>
                    </div> 
                </div> 
            </div> 
        </main> 
        @include('components.footer')

    </div>
</x-app-layout>
