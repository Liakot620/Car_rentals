<x-app-layout>
    <div class="app-wrapper"> 
        
        @include("components.aside")

        <main class="app-main"> 
            <div class="app-content-header"> 
                <div class="container-fluid"> 
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>{{ isset($customer) ? 'Edit Customers' : 'Add New Customers' }}</h2>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{route("customers.index")}}" class="btn btn-md btn-success me-3">Back</a></li>
                            </ol>
                        </div>
                    </div> 
                </div> 
            </div> 
            <div class="app-content"> 
                <div class="container-fluid"> 
                    <div class="row">
                       
                        <div class="container">
                        
                            <form action="{{ isset($customer) ? route('customers.update', $customer->id) : route('customers.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($customer))
                                    @method('PUT')
                                @endif
                        
                                <div class="form-group" >
                                    <label>Customer Name</label>
                                    <input type="text" name="name" class="form-control mb-2" value="{{ old('name', $customer->name ?? '') }}" required>
                                </div>

                                <div class="form-group" >
                                    <label>Customer Email</label>
                                    <input type="text" name="email" class="form-control mb-2" value="{{ old('email', $customer->email ?? '') }}" required>
                                </div>

                               @if (!isset($customer))
                               <div class="form-group" >
                                <label>Customer Password</label>
                                <input type="text" name="password" class="form-control mb-2" value="{{ old('password',$customer->password ??'') }}" required>
                               </div>     
                               @endif

                                <div class="form-group" >
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control mb-2" value="{{ old('phone', $customer->phone ?? '') }}" required>
                                </div>

                                <div class="form-group" >
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control mb-2" value="{{ old('address', $customer->address ?? '') }}" required>
                                </div>
                          
                                <button type="submit" class="btn btn-primary mt-2">
                                    {{ isset($customer) ? 'Update Customers' : 'Add Customers' }}
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
