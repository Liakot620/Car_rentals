<x-app-layout>
    <div class="app-wrapper"> 
        
        @include("components.aside")

        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Rental Show</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ route('rentals.index')}}"class="btn btn-md btn-success me-3">back</a></li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!-- Small Box (Stat card) -->
                    <div class="row">
                       
                        <div class="card mb-4 shadow-sm" style="width: 100%;">
                           
                            <div class="card-body">
                                <h5 class="card-title"></h5><br>
                                <p class="card-text">
                                    <strong>Customer Name:</strong> {{ $rental->user->name}}<br>
                                    <strong>Car Name:</strong> {{ $rental->car->name}}<br>
                                    <strong>Start Date:</strong> {{ $rental->start_date }}<br>
                                    <strong>End Date:</strong> {{ $rental->end_date }}<br>
                                    <strong>Total Cost:</strong> ${{ number_format($rental->total_cost, 2) }}<br>
                                    <strong>Status:</strong>
                                    <span class="badge bg-{{ $rental->status === 'completed' ? 'success' : 'danger' }}">
                                        {{ $rental->status  }}
                                    </span>
                                </p>
                                <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this rentals?');">
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
