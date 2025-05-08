<x-app-layout>
    <div class="app-wrapper"> 

        @include("components.aside")
      
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Customers Details</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ route('customers.create')}}"class="btn btn-md btn-success me-3">Create</a></li>
                            </ol>
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
            <th>Customer Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
          </tr>
        </thead>
       
          <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->id}}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
              
                <td>
                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-sm btn-info">show</a>

                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline-block;">
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
      @include('components.footer')
    </div>
</x-app-layout>
