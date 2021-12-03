<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <span class="brand-text ml-4">MAYLIB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>/img/<?= user()->image ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/user" class="d-block"><?= user()->username ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <?php if( has_permission('manage-users') ) : ?>
                <li class="nav-item <?= ($uri->getSegment(1) == "admin") ? 'menu-open' : ''?>">
                    <a href="#" class="nav-link <?= ($uri->getSegment(1) == "admin") ? 'active' : ''?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Admin
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/dashboard" class="nav-link <?= ($uri->getSegment(2) == "dashboard") ? 'active' : ''?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/userlist" class="nav-link <?= ($uri->getSegment(2) == "userlist") ? 'active' : ''?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif;?>
               <?php if( has_permission('manage-book') ) : ?>
                <li class="nav-item <?= ($uri->getSegment(1) == "buku") ? 'menu-open' : ''?>">
                    <a href="#" class="nav-link <?= ($uri->getSegment(1) == "buku") ? 'active' : ''?>">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Staff
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/buku/dashboard" class="nav-link <?= ($uri->getSegment(2) == "dashboard") ? 'active' : ''?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/buku/list" class="nav-link <?= ($uri->getSegment(2) == "list") ? 'active' : ''?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p> List Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/buku/histori_all" class="nav-link <?= ($uri->getSegment(2) == "histori_all") ? 'active' : ''?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Histori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/buku/anggota" class="nav-link <?= ($uri->getSegment(2) == "anggota") ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Anggota</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/buku/pushNotif" class="nav-link <?= ($uri->getSegment(2) == "pushNotif") ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Push Notifikation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/buku/poin" class="nav-link <?= ($uri->getSegment(2) == "poin") ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Poin </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/buku/absensi" class="nav-link <?= ($uri->getSegment(2) == "absensi") ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Absensi </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($uri->getSegment(1) == "konfirmasi") ? 'menu-open' : ''?>">
                    <a href="#" class="nav-link <?= ($uri->getSegment(1) == "konfirmasi") ? 'active' : ''?>">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Konfirmasi Peminjaman
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/konfirmasi/index" class="nav-link <?= ($uri->getSegment(2) == "index") ? 'active' : ''?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/konfirmasi/qrcode" class="nav-link <?= ($uri->getSegment(2) == "qrcode") ? 'active' : ''?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>QR Code</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/konfirmasi/code" class="nav-link <?= ($uri->getSegment(2) == "code") ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Code</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($uri->getSegment(1) == "pengembalian") ? 'menu-open' : ''?>">
                    <a href="#" class="nav-link <?= ($uri->getSegment(1) == "pengembalian") ? 'active' : ''?>">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Pengembalian
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/pengembalian/index" class="nav-link <?= ($uri->getSegment(2) == "index") ? 'active' : ''?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pengembalian/qrcode" class="nav-link <?= ($uri->getSegment(2) == "qrcode") ? 'active' : ''?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>QR Code</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pengembalian/code" class="nav-link <?= ($uri->getSegment(2) == "code") ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Code</p>
                            </a>
                        </li>
                    </ul>
                </li>
               
                <?php endif;?>
                <li class="nav-item <?= ($uri->getSegment(1) == "mybook") ? 'menu-open' : ''?>">
                    <a href="#" class="nav-link <?= ($uri->getSegment(1) == "mybook") ? 'active' : ''?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            My Book
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/mybook/index" class="nav-link <?= ($uri->getSegment(2) == "index") ? 'active' : ''?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>My book</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="/mybook/histori" class="nav-link <?= ($uri->getSegment(2) == "histori") ? 'active' : ''?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Histori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="/mybook/qrcode_loan" class="nav-link <?= ($uri->getSegment(2) == "qrcode_loan") ? 'active' : ''?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Qrcode</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($uri->getSegment(1) == "user") ? 'menu-open' : ''?>">
                    <a href="#" class="nav-link <?= ($uri->getSegment(1) == "user") ? 'active' : ''?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/user" class="nav-link <?= ($uri->getSegment(1) == "user") ? 'active' : ''?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="<?= base_url('logout')?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->



    </div>
    <!-- /.sidebar -->
</aside>