<x-app-layout>
    <div class="app-wrapper"> 

        @include("components.aside")
      
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
                            <h3 class="mb-0">Rentals Details</h3>
                        </div>

                        @if(Auth::user()->role ==='admin')
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ route('rentals.create')}}"class="btn btn-md btn-success me-3">Create</a></li>
                            </ol>
                        </div>
                        @endif
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
            <th>Customer Name</th>
            <th>Car Details (Name,Brand)</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Total Cost</th>
            <th>Status </th>
            @if(Auth::user()->role ==='admin')

            <th>Actions</th>
            @else
            <th>Actions</th>

            @endif
          </tr>
        </thead>
       
          <tbody>

            @foreach ($rentals as $rental)
            @if((Auth::user()->role == 'customer'))
            @if(!($rental->status == 'completed' ||$rental->status == 'ongoing' ))
            
            <tr>
                <td>{{ $rental->id}}</td>
                <td>{{ $rental->user->name }}</td>
                <td>{{ $rental->car->name }} ({{$rental->car->brand}})</td>
                <td>{{ $rental->start_date }}</td>
                <td>{{ $rental->end_date }}</td>
                <td>${{ number_format($rental->total_cost, 2) }}</td>
                <td>
                    <span class="badge bg-{{ $rental->status === 'completed' ||$rental->status === 'ongoing' ? 'success' : 'danger' }}">
                        {{ $rental->status }}
                    </span>
                </td>
               
                @if(Auth::user()->role ==='admin')
                <td>
                    <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ route('rentals.show', $rental->id) }}" class="btn btn-sm btn-info">show</a>

                    <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
                @else
                <td>             
                 <a href="{{ route('rentals.cancel', $rental->id) }}" class="btn btn-sm btn-danger">Cancel</a>
                </td>
                 @endif

            </tr>
            @endif
            @else
            <tr>
              <td>{{ $rental->id}}</td>
              <td>{{ $rental->user->name }}</td>
              <td>{{ $rental->car->name }} ({{$rental->car->brand}})</td>
              <td>{{ $rental->start_date }}</td>
              <td>{{ $rental->end_date }}</td>
              <td>${{ number_format($rental->total_cost, 2) }}</td>
              <td>
                  <span class="badge bg-{{ $rental->status === 'completed' ||$rental->status === 'ongoing' ? 'success' : 'danger' }}">
                      {{ $rental->status }}
                  </span>
              </td>
             
              @if(Auth::user()->role ==='admin')
              <td>
                  <a href="{{ route('rentals.edit', $rental->id) }}" class="btn btn-sm btn-primary">Edit</a>
                  <a href="{{ route('rentals.show', $rental->id) }}" class="btn btn-sm btn-info">show</a>

                  <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                  </form>
              </td>
              @else
              <td>             
               <a href="{{ route('rentals.cancel', $rental->id) }}" class="btn btn-sm btn-danger">Cancel</a>
              </td>
               @endif

          </tr>
            @endif
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
                    </div> 
                </div> 
            </div> 
        </main> 
      @include('components.footer')
    </div>
</x-app-layout>
