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
            if ($this->session->flashdata('maaf')) {
                echo '<div class="alert alert-danger">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $this->session->flashdata('maaf');
                echo '</div>';
            }
            // Error
            echo validation_errors('<div class="alert alert-danger">', '<button class="close" data-dismiss="alert">&times;</button></div>');
            ?>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between lh-condensed">
                        <div class="d-flex">
                            <p><a href="<?php echo site_url('admin/surat/masuk') ?>" class="btn btn-success mr-2">
                            <i class="fas fa-download"> </i> Surat Masuk</a></p>
                            <p><a href="<?php echo site_url('admin/surat/keluar') ?>" class="btn btn-danger">
                            <i class="fas fa-upload"> </i> Surat Keluar</a></p>
                        </div>
                        <div>
                            <p><a href="#!" onclick="window.print()" class="btn btn-secondary">
                                    <i class="fa fa-print"></i> Cetak</a></p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- masuk ke tabel -->
                        <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="25" class="text-center">No.</th>
                                    <th>Keterangan</th>
                                    <th>Pokja</th>
                                    <th>File</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Jenis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($result as $data) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i ?></td>
                                        <td><?php echo $data->keterangan ?></td>
                                        <td><?php echo $data->nama_pokja ?></td>
                                        <td>
                                            <a href="<?php echo base_url('back_assets/upload/surat/' . $data->image) ?>" target="_blank">Lihat</a>
                                        </td>
                                        <td class="text-center"><?php echo date('d M Y', strtotime($data->tanggal)) ?></td>
                                        <td class="text-center"><?php if ($data->jenis == "masuk") { ?><span class="badge badge-pill badge-success"style="font-weight: unset;">Surat Masuk</span> <?php }
                                            if ($data->jenis == "keluar") { ?><span class="badge badge-pill badge-danger" style="font-weight: unset;">Surat Keluar</span><?php } ?>
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div> <!-- akhir div tabel -->
                </div> <!-- akhir div card body -->
            </div>
        </div>
    </main>