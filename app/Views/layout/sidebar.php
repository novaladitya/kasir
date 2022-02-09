<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- ======= NamaDesa ======= -->
    <a class="brand-link">
        <span class="brand-text font-weight-light d-flex justify-content-center">Percetakan DETUDE</span>
    </a>
    <!-- ======= /NamaDesa ======= -->

    <!-- ======= MenuSidebar ======= -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
            <div class="info">
                <a class="d-block">
                    <i class="fas fa-user"></i>
                    &nbsp;&nbsp;<?= session()->get('nama_user'); ?>
                </a>
            </div>
        </div>

        <!-- ======= MainMenu ======= -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-compact nav-child-indent nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/" class="nav-link p-3 <?= ($halaman == 'riwayat_transaksi') || ($halaman == 'laporan') ? '' : 'active'; ?>">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>Kasir</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/riwayattransaksi" class="nav-link p-3 <?= $halaman == 'riwayat_transaksi' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-history"></i>
                        <p>Riwayat Transaksi</p>
                    </a>
                </li>
                <?php if (session()->get('role') == 'supervisor') : ?>
                    <li class="nav-item">
                        <a href="/laporan" class="nav-link p-3 <?= $halaman == 'laporan' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-wallet"></i>
                            <p>Laporan</p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (session()->get('role') == 'supervisor') : ?>
                    <li class="nav-item">
                        <a href="/akun" class="nav-link p-3 <?= $halaman == 'akun' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Kelola Akun</p>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="/home/logout" class="nav-link p-3">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- ======= /MainMenu ======= -->
    </div>
    <!-- ======= /MenuSidebar ======= -->
</aside>