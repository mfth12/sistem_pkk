<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <!-- ini nama judul halaman -->
            <h1 class="mt-4">Data User</h1>
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
            // Notifikasi
            if ($this->session->flashdata('maaf')) {
                echo '<div class="alert alert-secondary">';
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
                    <p><a href="<?php echo site_url('superadmin/user/tambah') ?>" class="btn btn-primary" data-toggle="modal" data-target="#tambahuser">
                            <i class="fa fa-plus"></i> Tambah User</a></p>
                    <div class="table-responsive">

                        <!-- masuk ke tabel -->
                        <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="25" class="text-center">No.</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Hak Akses</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($userb as $user) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i ?></td>
                                        <td><?php echo $user->nama ?></td>
                                        <td><?php echo $user->username ?></td>
                                        <td><?php echo $user->email ?></td>
                                        <td><?php if ($user->akses_level == 'superadmin') echo "Administrator PKK"; ?><?php if ($user->akses_level == 'admin_pkk') echo "Pengurus PKK"; ?><?php if ($user->akses_level == 'admin_desa') echo "Perangkat Desa"; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo site_url('superadmin/user/edit/' . $user->id_user) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                            <?php $hey = $user->id_user; ?>
                                            <a onclick="deleteConfirm('<?php echo site_url('superadmin/user/delete/' . $hey) ?>')" href="#!" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div> <!-- akhir div tabel -->
                </div> <!-- akhir div card body -->
            </div> <!-- akhir div card -->
            <!-- modal tambah user-->
            <!-- modal tambah user-->
            <!-- modal -->
            <div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo site_url('superadmin/user/tambah') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input required type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo set_value('nama') ?>">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input required type="email" name="email" class="form-control" placeholder="email" value="<?php echo set_value('email') ?>">
                                </div>

                                <div class="form-group">
                                    <label>Username</label>
                                    <input required type="text" name="username" class="form-control" placeholder="username" value="<?php echo set_value('username') ?>">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input required type="password" name="password" class="form-control" placeholder="password" value="<?php echo set_value('password') ?>">
                                </div>

                                <div class="form-group">
                                    <label>Level Hak Akses</label>
                                    <select name="akses_level" class="form-control">
                                        <option value="admin_desa" selected>Perangkat Desa</option>
                                        <option value="superadmin">Administrator PKK</option>
                                    </select>
                                </div>
                                <!-- end -->
                                <!-- end -->
                                <!-- end -->
                                <button class="btn btn-secondary mr-1" type="button" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                        <!-- <div class="modal-footer">
                          <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
                          </div> -->
                    </div>
                </div>

            </div> <!-- akhir container fluid -->
    </main>