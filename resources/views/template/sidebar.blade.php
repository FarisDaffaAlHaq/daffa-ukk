<body class="g-sidenav-show  bg-gray-100">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
<div class="sidenav-header">
<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
<a class="navbar-brand m-0" href="/">
<img src="{{asset('gambarhotel/insitu.png')}}" class="navbar-brand-img h-100" alt="main_logo">
<span class="ms-1 font-weight-bold">Hotel Hebat Insitu</span>
</a>
</div>
<hr class="horizontal dark mt-0">
<div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
<ul class="navbar-nav list-group list-group-flush">
@if (Auth::user()->role == 'admin')
    <li class="nav-item mt-3 mb-3">
        <a href="/admin.admin/" class="nav-link list-group-item" style="{{ request()->is('admin.admin') ? 'border: 1px solid #cb0c9f;' : '' }}">Dashboard</a>
    </li>
    <li class="nav-item mt-3 mb-3">
        <a href="/kamar.index/" class="nav-link list-group-item" style="{{ request()->is('kamar.index') ? 'border: 1px solid #32a887;' : '' }}">Kamar</a>
    </li>
    <li class="nav-item mt-3 mb-3">
        <a href="/tipe_kamars" class="nav-link list-group-item" style="{{ request()->is('tipe_kamars') ? 'border: 1px solid #37dedb;' : '' }}">Tipe Kamar</a>
    </li>
    <li class="nav-item mt-3 mb-3">
        <a href="/fasilitasumum" class="nav-link list-group-item" style="{{ request()->is('fasilitasumum') ? 'border: 1px solid #358ca6;' : '' }}">Fasilitas Umum</a>
    </li>
    <li class="nav-item mt-3 mb-3">
        <a href="/saran" class="nav-link list-group-item" style="{{ request()->is('saran') ? 'border: 1px solid #7135a6;' : '' }}">Saran</a>
    </li>
    <li class="nav-item mt-3 mb-3">
        <a href="/fasilitas" class="nav-link list-group-item" style="{{ request()->is('fasilitas') ? 'border: 1px solid #88a635;' : '' }}">Fasilitas</a>
    </li>
    <li class="nav-item mt-3 mb-3">
        <a href="/fasilitas_kamars" class="nav-link list-group-item" style="{{ request()->is('fasilitas_kamars') ? 'border: 1px solid #de8d37;' : '' }}">Fasilitas Kamar</a>
    </li>
    <li class="nav-item mt-3 mb-3">
        <a href="/user" class="nav-link list-group-item" style="{{ request()->is('user') ? 'border: 1px solid #f5a442;' : '' }}">User</a>
    </li>
@endif
@if (Auth::user()->role == 'resepsionis')
<li class="nav-item mt-3 mb-3">
    <a href="/resepsionis.resepsionis/" class="nav-link list-group-item" style="{{ request()->is('resepsionis.resepsionis') ? 'border: 1px solid #eaea;' : '' }}">Dashboard</a>
</li>
<li class="nav-item mt-3 mb-3">
    <a href="/resepsionis.datatamu/" class="nav-link list-group-item" style="{{ request()->is('resepsionis.datatamu') ? 'border: 1px solid #fcba03;' : '' }}">Data Tamu Order</a>
</li>
<li class="nav-item mt-3 mb-3">
    <a href="/resepsionis.cancel/" class="nav-link list-group-item" style="{{ request()->is('resepsionis.cancel') ? 'border: 1px solid #32a852;' : '' }}">Data Tamu Cancel</a>
</li>
<li class="nav-item mt-3 mb-3">
    <a href="/resepsionis.pembayaran/" class="nav-link list-group-item" style="{{ request()->is('resepsionis.pembayaran') ? 'border: 1px solid #313e54;' : '' }}">Pembayaran</a>
</li>
<li class="nav-item mt-3 mb-3">
    <a href="/resepsionis.changestatus/" class="nav-link list-group-item" style="{{ request()->is('resepsionis.changestatus') ? 'border: 1px solid #eb4034;' : '' }}">Kamar</a>
</li>
<li class="nav-item mt-3 mb-3">
    <a href="/resepsionis.guestorder/" class="nav-link list-group-item" style="{{ request()->is('resepsionis.guestorder') ? 'border: 1px solid #74eb34;' : '' }}">Data Tamu Tanpa Akun</a>
</li>
@endif
@if (Auth::user()->role == 'tamu')
<li class="nav-item">
    <a href="/tamu.home/" class="nav-link list-group-item">Dashboard</a>
</li>
@endif
</ul>
</div>
</aside>