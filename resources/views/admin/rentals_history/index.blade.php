<x-app-layout>
    <div class="app-wrapper"> 

        @include("components.aside")
      
        <main class="app-main"> 
            <div class="app-content-header">
                <div class="container-fluid"> 
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Rentals History</h3>
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
            <th>Customer Name</th>
            <th>Car Details (Name,Brand)</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Total Cost</th>
            <th>Status </th>
          </tr>
        </thead>
       
          <tbody>
            @foreach ($rentals as $rental)
            @if($rental->status == 'completed' || $rental->status =='ongoing')
            <tr>
                <td>{{ $rental->id}}</td>
                <td>{{ $rental->user->name }}</td>
                <td>{{ $rental->car->name }} ({{$rental->car->brand}})</td>
                <td>{{ $rental->start_date }}</td>
                <td>{{ $rental->end_date }}</td>
                <td>${{ number_format($rental->total_cost, 2) }}</td>
                <td>
                    <span class="badge bg-{{ $rental->status ==='completed' || $rental->status ==='ongoing' ? 'success' : 'danger' }}">
                        {{ $rental->status }}
                    </span>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
      </table>
    </div>
  
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
