<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fab fa-adn"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Administrator</div>
</a>

<!-- Divider -->

<!-- Nav Item - Dashboard -->
<hr class="sidebar-divider my-0">
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-home"></i>
        <span>Dashboard</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider my-0">
<li class="nav-item">
    <a class="nav-link" href="{{ route('customers.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Customers</span></a>
</li>

<hr class="sidebar-divider my-0">
<li class="nav-item">
    <a class="nav-link" href="{{ route('products.index') }}">
        <i class="fas fa-fw fa-list-ul"></i>
        <span>Products</span></a>
</li>

<hr class="sidebar-divider my-0">
<li class="nav-item">
    <a class="nav-link" href="{{ route('category.index') }}">
        <i class="fab fa-dropbox"></i>
        <span>Categories</span></a>
</li>


<hr class="sidebar-divider my-0">
<li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fas fa-fw fa-cart-plus"></i>
        <span>Sales</span></a>
</li>

<hr class="sidebar-divider my-0">
<li class="nav-item">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-history"></i>
        <span>History</span></a>
</li>

<!-- Divider -->
{{-- <hr class="sidebar-divider d-none d-md-block"> --}}

{{-- <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> --}}
