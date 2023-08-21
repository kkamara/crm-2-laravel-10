<!-- Sidebar navigation-->
<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
      <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Home</span>
      </li>
      <li class="sidebar-item">
        <a 
            class="@if(str_contains(Route::getCurrentRoute()->uri, 'admin/dashboard')) sidebar-link @endif" 
            href="{{ route('adminHome') }}" 
            aria-expanded="false"
        >
          <span>
            <i class="ti ti-layout-dashboard"></i>
          </span>
          <span class="hide-menu">Dashboard</span>
        </a>
      </li>
      @can('view clients')
      <li class="sidebar-item">
        <a 
            class="@if(str_contains(Route::getCurrentRoute()->uri, 'admin/clients')) sidebar-link @endif" 
            href="{{ route('adminClients') }}" 
            aria-expanded="false"
        >
          <span>
            <i class="ti ti-layout-dashboard"></i>
          </span>
          <span class="hide-menu">View Clients</span>
        </a>
      </li>
      @endcan
      @can('view logs')
      <li class="sidebar-item">
        <a 
            class="@if(str_contains(Route::getCurrentRoute()->uri, 'admin/logs')) sidebar-link @endif" 
            href="" 
            aria-expanded="false"
        >
          <span>
            <i class="ti ti-layout-dashboard"></i>
          </span>
          <span class="hide-menu">View Logs</span>
        </a>
      </li>
      @endcan
      @can('view users')
      <li class="sidebar-item">
        <a 
            class="@if(str_contains(Route::getCurrentRoute()->uri, 'admin/users')) sidebar-link @endif" 
            href="" 
            aria-expanded="false"
        >
          <span>
            <i class="ti ti-layout-dashboard"></i>
          </span>
          <span class="hide-menu">View Users</span>
        </a>
      </li>
      @endcan
    </ul>
  </nav>