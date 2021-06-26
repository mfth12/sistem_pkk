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
            if (isset($error)) {
                echo '<div class="alert alert-warning">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $error;
                echo '</div>';
            }
            echo validation_errors('<div class="alert alert-danger">', '<button class="close" data-dismiss="alert">&times;</button> </div>');
            ?>

            <!-- sekarang masuk ke kolom isi konten -->
            <div class="card mb-4">
                <div class="card-header">
                    <a href="<?php echo site_url('admin/surat') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between lh-condensed">
                        <div class="d-flex">
                            <p><a href="<?php echo site_url('admin') ?>" class="btn btn-success" data-toggle="modal" data-target="#tambahMasuk">
                                    <i class="fa fa-plus"></i> Tambah Surat Masuk</a></p>
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
                                    <th width="30%">Keterangan</th>
                                    <th>No. Surat</th>
                                    <th>Pokja</th>
                                    <th>Tanggal</th>
                                    <th>File</th>
                                    <th>Jenis</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($result as $data) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i ?></td>
                                        <td><?php echo $data->keterangan ?></td>
                                        <td><?php echo $data->nomor ?></td>
                                        <td><?php echo $data->nama_pokja ?></td>
                                        <td><?php echo date('d M Y', strtotime($data->tanggal)) ?></td>
                                        <td>
                                            <a href="<?php echo base_url('back_assets/upload/surat/' . $data->image) ?>" target="_blank">Lihat</a>
                                        </td>
                                        <td class="text-center"><?php if ($data->jenis == "masuk") { ?><span class="badge badge-pill badge-success"style="font-weight: unset;">Surat Masuk</span> <?php }
                                            if ($data->jenis == "keluar") { ?><span class="badge badge-pill badge-danger" style="font-weight: unset;">Surat Keluar</span><?php } ?>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <a href="<?php echo site_url('admin/surat/ubah_masuk/' . $data->id_surat) ?>" class="btn btn-sm btn-light mr-1"><i class="fa fa-edit"></i></a>
                                            <a onclick="deleteConfirm('<?php echo site_url('admin/surat/hapus_in/' . $data->id_surat) ?>')" href="#!" class="btn btn-light btn-sm"><i class="fas fa-trash"></i></a>

                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div> <!-- akhir div tabel -->
                </div> <!-- akhir div card body -->
            </div> <!-- akhir div card -->

            <div class="modal fade" id="tambahMasuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Surat Masuk</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo site_url('admin/surat/masuk') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-form-label" for="nomor">No. Surat</label>
                                    <input type="text" required class="form-control" name="nomor" placeholder="001/SKRT/TP-PKK/II/2021" >
                                </div>

                                <div class="form-group">
                                    <label for="image">Berkas Surat</label><small> (Gambar atau PDF, Max 2Mb)</small>
                                    <input class="form-control" required type="file" name="image" />
                                </div>

                                <div class="form-group">
                                    <label>Pokja</label>
                                    <select name="id_pokja" class="form-control" required>
                                        <?php foreach ($pokja as $pokja) {
                                            if ($pokja->id_pokja != 74) { ?>
                                                <option value="<?php echo $pokja->id_pokja ?>">
                                                    <?php echo $pokja->nama_pokja ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="keterangan">Keterangan Surat</label>
                                    <textarea class="form-control" name="keterangan" placeholder="Keterangan" required=""></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d'); ?>" required="">
                                </div>

                                <button class="btn btn-secondary mr-1" type="button" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Tambah</button>
                            </form>
                        </div> <!-- modal-body -->
                    </div> <!-- modal-content -->
                </div> <!-- modal-dialog -->
            </div> <!-- modal-fade -->
        </div> <!-- akhir container fluid -->
    </main>