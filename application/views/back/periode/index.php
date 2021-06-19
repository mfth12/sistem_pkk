<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <!-- ini nama judul halaman -->
            <h1 class="mt-4"><?php echo $title ?></h1>
            <!-- ini nama bread crumb -->
            <ol class="breadcrumb">
                <?php foreach ($this->uri->segments as $segment) : ?>
                    <?php $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
                    $is_active =  $url == $this->uri->uri_string; ?>
                    <li class="breadcrumb-item <?php echo $is_active ? 'active' : '' ?>">
                        <?php if ($is_active) : ?>
                            <?php echo ucfirst($segment) ?>
                        <?php else : ?>
                            <a href="<?php echo site_url($url) ?>"> <?php echo ucfirst($segment) ?></a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
            <?php
            // Notifikasi
            if ($this->session->flashdata('sukses')) {
                echo '<div class="alert alert-success">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $this->session->flashdata('sukses');
                echo '</div>';
            }
            // Notifikasi
            if ($this->session->flashdata('dihapus')) {
                echo '<div class="alert alert-danger">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $this->session->flashdata('dihapus');
                echo '</div>';
            }
            // Error
            echo validation_errors('<div class="alert alert-danger">', '<button class="close" data-dismiss="alert">&times;</button></div>');
            ?>

            <!-- sekarang masuk ke kolom isi konten -->
            <div class="card mb-4">
                <div class="card-header">
                    <a href="<?php echo site_url('admin/konfig') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <p><button class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i> Tambah Periode
                        </button></p>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Tahun Periode</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($periode as $periode) { ?>
                                    <tr>
                                        <td width="15px" class="text-center">
                                            <h4><?php echo $i ?></h4>
                                        </td>
                                        <td>
                                            <h4><?php echo $periode->nama_periode ?></h4>
                                        </td>
                                        <td>
                                            <?php if ($periode->ket == "aktif") { ?><h5><span class="badge badge-pill badge-success">Aktif</span></h5><?php }
                                                                                                                                                    if ($periode->ket == "tidak") { ?><h5><span class="badge badge-pill badge-secondary">Tidak aktif</span></h5><?php } ?>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <?php if ($periode->ket == "tidak") { ?>
                                                <button class="btn btn-secondary btn-sm mr-1" data-toggle="modal" data-target="#aktifkan<?php echo $periode->id_periode ?>">
                                                    <i class="fa fa-check"></i> Aktifkan
                                                </button>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $periode->id_periode ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            <?php } else {  ?> <i>Aksi tidak diizinkan</i> <?php  }?>
                                            <?php include('modal.php') ?>
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div> <!-- akhir div tabel -->
                </div> <!-- akhir div card body -->
            </div> <!-- akhir div card -->



        </div> <!-- akhir container fluid -->
    </main>