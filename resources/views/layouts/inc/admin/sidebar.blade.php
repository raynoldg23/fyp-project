<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/customer') }}">
        <i class="mdi mdi-account-box menu-icon"></i>
        <span class="menu-title">Customer Record</span>
      </a>
    </li>

    {{--<li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">UI Elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
        </ul> 
      </div>
    </li>--}}

    {{-- Stocks Sidebar --}}
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#stocks" aria-expanded="false" aria-controls="stocks">
        <i class="mdi mdi-cash menu-icon"></i>
        <span class="menu-title">Purchase</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="stocks">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ url('admin/stocks/create') }}">Add Purchase</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('admin/stocks') }}">View Purchase</a></li>
        </ul>
      </div>
    </li>

    {{-- Products Sidebar --}}
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/products') }}">
        <i class="mdi mdi-file menu-icon"></i>
        <span class="menu-title">Products</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/eyes') }}">
        <i class="mdi mdi-eye menu-icon"></i>
        <span class="menu-title">Customer Eyes</span>
      </a>
    </li>

    
    
    
  </ul>
</nav>