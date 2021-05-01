<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <!-- ini nama judul halaman -->
            <h1 class="mt-4">Kegiatan</h1>
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
                <div class="card-body">
                    <p><a href="<?php echo base_url('index.php/superadmin/kegiatan/tambah') ?>" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah Kegiatan</a></p>
                    <div class="table-responsive">

                        <!-- masuk ke tabel -->
                        <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="25" class="text-center">No.</th>
                                    <th width="25">Gambar</th>
                                    <th>Judul Kegiatan</th>
                                    <th>Kategori</th>
                                    <th>Status - Jenis</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($berita as $berita) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i ?></td>
                                        <td>
                                            <img src="<?php echo base_url('assets/upload/image/thumbs/' . $berita->gambar) ?>" class="img img-responsive" width="60">
                                        </td>
                                        <td><?php echo $berita->nama_berita ?></td>
                                        <td><?php echo $berita->nama_kategori_berita ?></td>
                                        <td><?php echo $berita->status_berita ?> - <?php echo $berita->jenis_berita ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('index.php/superadmin/kegiatan/edit/' . $berita->id_berita) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                            <?php include('delete.php') ?>
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