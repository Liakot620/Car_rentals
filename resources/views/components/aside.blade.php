<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> <a href="{{ url('admin/dashboard') }}" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                </li>           
             </ul>

             @if(Auth::user()->role==='admin')
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> <a href="{{ url("admin/cars")}}" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Cars
                        </p>
                    </a>
                </li>           
             </ul>
             @endif

            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> <a href="{{ url("admin/rentals")}}" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Rentals
                        </p>
                    </a>
                </li>           
             </ul>
             
             @if(Auth::user()->role ==='admin')
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> <a href="{{ url("admin/customers")}}" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Customers
                        </p>
                    </a>
                </li>           
             </ul>
             @endif

             @if(!(Auth::user()->role ==='admin'))

            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> <a href="{{ url("admin/rentals_history")}}" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Rentals History
                        </p>
                    </a>
                </li>           
             </ul>
             @endif

        </nav>
    </div> 

</aside> 