<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('barang-keluars.index') }}" class="nav-link {{ Request::is('barangKeluars*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>Barang Keluar</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('barang-masuks.index') }}" class="nav-link {{ Request::is('barangMasuks*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-sign-out-alt "></i>
        <p>Barang Masuk</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('ekspedisis.index') }}" class="nav-link {{ Request::is('ekspedisis*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-ship"></i>
        <p>Ekspedisi</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('inventaris.index') }}" class="nav-link {{ Request::is('inventaris*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-warehouse"></i>
        <p>Inventaris</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('pegawais.index') }}" class="nav-link {{ Request::is('pegawais*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-tie"></i>
        <p>Pegawai</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('pembelis.index') }}" class="nav-link {{ Request::is('pembelis*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-smile"></i>
        <p>Pembeli</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('transaksis.index') }}" class="nav-link {{ Request::is('transaksis*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-clipboard-list"></i>
        <p>Transaksi</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('suppliers.index') }}" class="nav-link {{ Request::is('suppliers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-people-carry"></i>
        <p>Supplier</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('keranjangs.index') }}" class="nav-link {{ Request::is('keranjangs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-shopping-cart"></i>
        <p>Keranjangs</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('ratings.index') }}" class="nav-link {{ Request::is('ratings*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-star"></i>
        <p>Ratings</p>
    </a>
</li>
