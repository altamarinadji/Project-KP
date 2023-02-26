<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                        <a class="nav-link" href="/dashboard"  aria-expanded="false" ><i class="fas fa-chart-line"></i>Dashboard</a>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Master</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/master_products">Master Product<span class="badge badge-secondary">New</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/master_bb">Master Bahan Baku<span class="badge badge-secondary">New</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/master_pelanggan">Master Pelanggan<span class="badge badge-secondary">New</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Transaksi</a>
                        <div id="submenu-3" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/master_pesanan">Daftar Pesanan</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- <a class="nav-link" href="{{ route('home') }}"  aria-expanded="false" ><i class="fas fa-chart-home"></i>Ke Halaman Pelanggan</a> -->
                    
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     
                                Ke Halaman Pelanggan
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                </ul>
            </div>
        </nav>
    </div>
</div>