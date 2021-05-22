<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <!-- ini nama judul halaman -->
            <h1 class="mt-4"><?php echo $title?></h1>
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

            <!-- sekarang masuk ke kolom isi konten -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex">
                        <p><a href="<?php echo site_url('admin/sliders') ?>" class="btn btn-success mr-2" data-toggle="modal" data-target="#tambahSlide">
                                <i class="fa fa-plus"></i> Tambah Slide</a></p>
                    </div>
                    <div class="table-responsive">
                        <!-- masuk ke tabel -->
                        <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">Urut Tampil</th>
                                    <th>Gambar</th>
                                    <th>Nama Judul</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($slider as $data) { ?>
                                    <tr>
                                        <td class="text-center">
                                            <h4><?php echo $data->nomor ?></h4>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url('back_assets/upload/slider/' . $data->image) ?>" width="64" />
                                        </td>
                                        <td>
                                            <?php echo $data->name ?>
                                        </td>
                                        <td width="30%" class="small">
                                            <?php echo substr($data->description, 0, 150) ?>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <a href="<?php echo site_url('admin/sliders/edit/' . $data->slider_id) ?>" class="btn btn-sm btn-primary mr-1"><i class="fa fa-edit"></i> Ubah</a>
                                            <a onclick="deleteConfirm('<?php echo site_url('admin/sliders/delete/' . $data->slider_id) ?>')" href="#!" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div> <!-- akhir div tabel -->
                </div> <!-- akhir div card body -->
            </div> <!-- akhir div card -->
            <!-- modal tambah user-->
            <!-- modal -->
            <div class="modal fade" id="tambahSlide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Slide</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo site_url('admin/sliders/add') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="image">Gambar Slide </label><small> (Max 2Mb)</small>
                                    <input class="form-control-file" required type="file" name="image" />
                                </div>

                                <div class="form-group">
                                    <label for="name">Judul Slide *</label>
                                    <input class="form-control" required type="text" name="name" placeholder="Nama judul slide" />
                                </div>

                                <div class="form-group">
                                    <label for="name">Urutan Tampil *</label>
                                    <input class="form-control" required type="number" name="nomor" value="<?php echo $nomor ?>" placeholder="<?php echo $nomor ?>" />
                                </div>

                                <div class="form-group">
                                    <label for="deskription">Keterangan Slide *</label>
                                    <textarea class="form-control" name="description" required placeholder="Keterangan Slide"></textarea>
                                    <div class="small text-muted">
                                        * harus diisi
                                    </div>
                                </div>

                                <!-- end -->
                                <!-- end -->
                                <!-- end -->
                                <button class="btn btn-secondary mr-1" type="button" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Tambah</button>
                            </form>
                        </div> <!-- modal-body -->

                    </div> <!-- modal-content -->
                </div> <!-- modal-dialog -->
            </div> <!-- modal-fade -->
        </div> <!-- akhir container fluid -->
    </main>