<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('inventaris.index') }}" class="nav-link {{ Request::is('inventaris*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-warehouse"></i>
        <p>Inventaris</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('kategoris.index') }}" class="nav-link {{ Request::is('kategoris*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Kategoris</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('keranjangs.index') }}" class="nav-link {{ Request::is('keranjangs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-shopping-cart"></i>
        <p>Keranjangs</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('metode-pembayarans.index') }}"
        class="nav-link {{ Request::is('metode-pembayarans*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Metode Pembayarans</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('suppliers.index') }}" class="nav-link {{ Request::is('suppliers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-people-carry"></i>
        <p>Supplier</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('ekspedisis.index') }}" class="nav-link {{ Request::is('ekspedisis*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-ship"></i>
        <p>Ekspedisi</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('transaksis.index') }}" class="nav-link {{ Request::is('transaksis*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-clipboard-list"></i>
        <p>Transaksi</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('ratings.index') }}" class="nav-link {{ Request::is('ratings*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-star"></i>
        <p>Ratings</p>
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
    <a href="{{ route('transaksi-barangs.index') }}"
        class="nav-link {{ Request::is('transaksiBarangs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Transaksi Barangs</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Users</p>
    </a>
</li>
