<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fa fa-h-square" aria-hidden="true"></i>
    </div>
    <div class="sidebar-brand-text mx-3">MyHotle </div>
</a>
<?php if (session()->role == "admin"):?>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Management User
</div>
<!-- Nav Item list User-->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin');?>">
        <i class="fas fa-user"></i>
        <span>List User</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Management Hotel
</div>
<!-- Nav Item - Kamar -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('kamar');?>">
    <i class="fas fa-bed"></i>
    <span>Kamar</span></a>
</li>
<!-- Nav Item - edit Profile -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('pembayaran');?>">
    <i class="far fa-credit-card"></i>
    <span>Metode Pembayaran</span></a>
</li>

<?php endif;?>

<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
    Transaksi
</div>
<!-- Nav Item - Kamar -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('transaksi');?>">
    <i class="fas fa-key"></i>
    <span>Pesan Kamar</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('konfirmasi');?>">
    <i class="fas fa-money-bill-wave"></i>
    <span>konfirmasi Pembayaran</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
    Profil User
</div>
<!-- nav Item - profile -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('user');?>">
        <i class="fas fa-user"></i>
        <span>Profil Saya</span></a>
</li>

<!-- Driver -->
<hr class="sidebar-divider">
<!-- Nav Item - Logout-->
<li class="nav-item">
    <a class="nav-link" href="<?= site_url('logout') ?>">
        <i class="fas fa-sign-out-alt"></i>
        <span>Keluar Akun</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>