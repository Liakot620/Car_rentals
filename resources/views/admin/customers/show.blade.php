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
                                <li class="breadcrumb-item"><a href="{{ route('customers.index')}}"class="btn btn-md btn-success me-3">back</a></li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> 
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> 
                    <div class="row">
                       
                        <div class="card mb-4 shadow-sm" style="width: 100%;">
                            
                            <div class="card-body">
                                <p class="card-text">
                                    <strong>name:</strong> {{ $customer->name }}<br>
                                    <strong>Email:</strong> {{ $customer->email }}<br>
                                    <strong>Phone:</strong> {{ $customer->phone }}<br>
                                    <strong>Address:</strong> {{ $customer->address }}<br>
                                </p>
                                
                            </div>
                            
                            <main class="app-main"> <!--begin::App Content Header-->
                                <div class="app-content-header"> <!--begin::Container-->
                                    <div class="container-fluid"> <!--begin::Row-->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3 class="mb-0">Rentals Details</h3>
                                            </div>
                                            
                                        </div> <!--end::Row-->
                                    </div> <!--end::Container-->
                                </div> <!--end::App Content Header--> <!--begin::App Content-->
                                <div class="app-content"> <!--begin::Container-->
                                    <div class="container-fluid"> <!-- Small Box (Stat card) -->
                                        <div class="row">
                                           
                                            
                    <div class="container my-3">
                        <div class="table-responsive">
                          <table class="table table-bordered table-hover align-middle">
                            <thead class="table-dark">
                              <tr>
                                <th>#</th>
                                <th>Car Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Total Cost</th>
                                <th>Status </th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                           
                              <tbody>
                                @foreach ($rentals as $rental)
                                <tr>
                                    <td>{{ $rental->id}}</td>
                                    <td>{{ $rental->car->name }}</td>
                                    <td>{{ $rental->start_date }}</td>
                                    <td>{{ $rental->end_date }}</td>
                                    <td>${{ number_format($rental->total_cost, 2) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $rental->status ? 'success' : 'danger' }}">
                                            {{ $rental->status }}
                                        </span>
                                    </td>
                                   
                                    <td>
                                        <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-sm btn-primary">Edit</a>                    
                                        <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                          </table>
                        </div>
                      
                        <!-- Pagination -->
                        <nav aria-label="Table navigation">
                          <ul class="pagination justify-content-end mt-3">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                      </div>
                                        </div> <!-- /.row -->
                                    </div> <!--end::Container-->
                                </div> <!--end::App Content-->
                            </main> <!--end::App Main--> <!--begin::Footer-->

                        </div>
                        

                    </div> <!-- /.row -->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->
        @include('components.footer')

    </div>
</x-app-layout>
