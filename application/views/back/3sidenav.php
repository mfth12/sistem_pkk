<div id="layoutSidenav">

    <!-- SUPERADMIN -->
    <?php if ($this->session->userdata('akses_level') == 'superadmin') { ?>

        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <!-- Menu side navigation -->
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Overview</div>
                        <a class="nav-link" href="<?php echo site_url('admin') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <!-- heading nav_bar -->
                        <div class="sb-sidenav-menu-heading">Data</div>
                        <!-- bagian penilaian -->
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                            Berita
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo site_url('admin/berita') ?> ">Semua Berita</a>
                                <a class="nav-link" href="<?php echo site_url('admin/kategori_berita') ?> ">Kategori Berita</a>
                            </nav>
                        </div>
                        <!-- bagian jabatan -->
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
                        <!-- bagian users -->
                        <a class="nav-link" href="<?php echo site_url('admin/user') ?> ">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            User
                        </a>
                        <!-- bagian pewagai -->
                        <a class="nav-link" href="<?php echo site_url('admin/konfig') ?> ">
                            <div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>
                            Konfigurasi Website
                        </a>
                        <!-- bagian pewagai -->
                        <a class="nav-link" href="<?php echo site_url('admin/sliders') ?> ">
                            <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                            Sliders
                        </a>
                        <a class="nav-link" href="<?php echo site_url('admin/struktur') ?> ">
                            <div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></div>
                            Struktur PKK
                        </a>

                        <!-- bagian terakhir -->
                        <div class="sb-sidenav-menu-heading">Akun</div>
                        <a class="nav-link" href="<?php echo site_url('profile') ?> ">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Profile
                        </a>
                        <!-- selesai side_bar -->
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
    <!-- PERANGKATDESA -->
    <?php if ($this->session->userdata('akses_level') == 'admin_desa') { ?>

        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <!-- Menu side navigation -->
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Overview</div>
                        <a class="nav-link" href="<?php echo site_url('auth') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <!-- heading nav_bar -->
                        <div class="sb-sidenav-menu-heading">Data</div>
                        <!-- bagian penilaian -->
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                            Kegiatan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo site_url('superadmin/kegiatan') ?> ">Semua Kegiatan</a>
                                <a class="nav-link" href="<?php echo site_url('superadmin/kegiatan/tambah') ?> ">Tambah Kegiatan</a>
                            </nav>
                        </div>
                        <!-- bagian jabatan -->
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
                            Keuangan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="<?php echo site_url('superadmin/keuangan') ?> ">Sirkulasi</a>
                                <a class="nav-link" href="<?php echo site_url('superadmin/keuangan/masukan') ?> ">Pemasukan</a>
                                <a class="nav-link" href="<?php echo site_url('superadmin/keuangan/keluaran') ?> ">Pengeluaran</a>
                            </nav>
                        </div>
                        <!-- bagian users -->
                        <a class="nav-link" href="<?php echo site_url('superadmin/user') ?> ">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Data User
                        </a>

                        <!-- bagian terakhir -->
                        <div class="sb-sidenav-menu-heading">Akun</div>
                        <a class="nav-link" href="<?php echo site_url('profile') ?> ">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Profile
                        </a>
                        <!-- selesai side_bar -->
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small white">Anda masuk sebagai:</div>
                    <?php if ($this->session->userdata('akses_level') == 'superadmin') // Jika user yg login adalah pegawai
                    {
                        echo "Administrator PKK"; // Redirect ke halaman home untuk user
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