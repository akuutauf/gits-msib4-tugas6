<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand ml-5" href="{{ route('admin.page') }}">
                <img src="{{ asset('icons/otaku-store-id-logo.png') }}" class="navbar-brand-img" alt="...">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="navbar-dashboards">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Menu</span>
                        </a>
                        <div class="collapse show" id="navbar-dashboards">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.page') }}" class="nav-link">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('index.product') }}" class="nav-link">Manage Product</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('index.category') }}" class="nav-link">Manage Category</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">Customer Pages</h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.page') }}">
                            <i class="ni ni-ungroup text-theme"></i>
                            <span class="nav-link-text">Jelajahi Produk</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.cart') }}">
                            <i class="ni ni-cart text-theme"></i>
                            <span class="nav-link-text">Lihat Keranjang</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
