<!--Main Navigation-->
<header class="fixed-top">
    <!-- Jumbotron -->
    <div class="p-3 text-center bg-white border-bottom">
        <div class="container">
            <div class="row gy-3">
                <!-- Left elements -->
                <div class="col-lg-2 col-sm-4 col-4">
                    <a href="{{ route('home.page') }}" class="float-start">
                        <img src="{{ asset('icons/otaku-store-id-logo.png') }}" height="50" />
                    </a>
                </div>
                <!-- Left elements -->

                <!-- Center elements -->
                <div class="order-lg-last col-lg-5 col-sm-8 col-8">
                    <div class="d-flex float-end">
                        <a href="" class="btn-theme me-1 py-1 px-3 nav-link d-flex align-items-center">
                            <i class="fa-solid fa-store m-1 me-md-2"></i>
                            <p class="d-none d-md-block mb-0">Toko</p>
                        </a>
                        <a href="{{ route('index.cart') }}"
                            class="btn-theme me-1 py-1 px-3 nav-link d-flex align-items-center">
                            <i class="fas fa-shopping-cart m-1 me-md-2"></i>
                            <p class="d-none d-md-block mb-0">Keranjang Ku</p>
                        </a>
                        <a href="{{ route('admin.page') }}"
                            class="btn-theme py-1 px-3 nav-link d-flex align-items-center">
                            <i class="fas fa-user-alt m-1 me-md-2"></i>
                            <p class="d-none d-md-block mb-0">Admin</p>
                        </a>
                    </div>
                </div>
                <!-- Center elements -->

                <!-- Right elements -->
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="input-group float-center">
                        <div class="form-outline">
                            <input type="search" id="form1" class="form-control" />
                            <label class="form-label" for="form1">Mau kepoin apa hari ini?</label>
                        </div>
                        <button type="button" class="btn search-theme shadow-0">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- Right elements -->
            </div>
        </div>
    </div>
    <!-- Jumbotron -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-theme">
        <!-- Container wrapper -->
        <div class="container justify-content-center justify-content-md-between">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarLeftAlignExample" aria-controls="navbarLeftAlignExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home.page') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.page') }}#figure">Figure</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.page') }}#manga">Manga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.page') }}#nendoroid">Nendoroid</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.page') }}#merchandise">Merchandise</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.page') }}#accessories">Accessories</a>
                    </li>
                    <!-- Navbar dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            Lain-lain
                        </a>
                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">Hots Figure</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Promo & Diskon</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Ready Stock</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Pre-Order</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Out Coming</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>
