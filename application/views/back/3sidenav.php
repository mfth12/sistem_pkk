<div id="layoutSidenav">
    <?php if ($this->session->userdata('akses_level') == 'superadmin') { ?>
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Utama</div>
                        <a class="nav-link" href="<?php echo site_url('admin') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dasbor
                        </a>
                        <div class="sb-sidenav-menu-heading">Data</div>
                        <a class="nav-link" href="<?php echo site_url('admin/berita') ?> ">
                            <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                            Berita
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
                            Keuangan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="<?php echo site_url('admin/keuangan') ?> ">Sirkulasi</a>
                                <a class="nav-link" href="<?php echo site_url('admin/keuangan/masukan') ?> ">Pemasukan</a>
                                <a class="nav-link" href="<?php echo site_url('admin/keuangan/keluaran') ?> ">Pengeluaran</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="<?php echo site_url('admin/kategori_berita') ?> ">
                            <div class="sb-nav-link-icon"><i class="fas fa-map"></i></div>
                            Pokja
                        </a>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#website" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-hashtag"></i></div>
                            Website
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="website" aria-labelledby="headingTree" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="<?php echo site_url('admin/struktur') ?> "><div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></div>Struktur</a>
                                <a class="nav-link" href="<?php echo site_url('admin/sliders') ?> "><div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>Sliders</a>
                                <a class="nav-link" href="<?php echo site_url('admin/user') ?> "><div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>User</a>
                                <a class="nav-link" href="<?php echo site_url('admin/konfig') ?> "><div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>Konfigurasi</a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Akun</div>
                        <a class="nav-link" href="<?php echo site_url('profile') ?> "> <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Profile
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small white">Anda masuk sebagai:</div>
                    <?php if ($this->session->userdata('akses_level') == 'superadmin') // Jika user yg login adalah pegawai
                    {
                        echo "Administrator Sistem"; // Redirect ke halaman home untuk user
                    } ?>

                    <?php if ($this->session->userdata('akses_level') == 'admin_desa') // Jika user yg login adalah pegawai
                    {
                        echo "Perangkat Desa"; // Redirect ke halaman home untuk user
                    } ?>
                </div>
            </nav>
        </div>
    <?php
    } ?>
