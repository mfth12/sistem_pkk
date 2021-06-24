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
            <div class="card mb-4">
                <div class="card-header">
                    <a href="<?php echo site_url('admin/konfig') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <p><button class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i> Tambah Pokja
                        </button></p>

                    <?php include('tambah.php') ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">Urut</th>
                                    <th>Nama Pokja</th>
                                    <th>Keterangan</th>
                                    <th>Slug</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($pokja as $pokja) { ?>
                                    <tr>
                                        <td width="15px" class="text-center">
                                            <h4><?php echo $pokja->urutan ?></h4>
                                        </td>
                                        <td><?php echo $pokja->nama_pokja ?></td>
                                        <td width="30%" class="small"><?php echo $pokja->keterangan ?></td>
                                        <td><?php echo $pokja->slug_pokja ?></td>
                                        <td class="d-flex justify-content-center">
                                            <a href="<?php echo base_url('admin/pokja/edit/' . $pokja->id_pokja) ?>" class="btn btn-primary btn-sm mr-1"><i class="fa fa-edit"></i> Ubah</a>
                                            <?php // include('delete.php') ?> 
                                            <a href="<?php echo site_url('berita/pokja/' . $pokja->slug_pokja) ?>" target="_blank" class="btn btn-light btn-sm ml-1"><i class="fa fa-eye"></i></a>
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