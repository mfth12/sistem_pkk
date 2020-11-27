<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <!-- ini nama judul halaman -->
      <h1 class="mt-4">Profile</h1>
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
        echo '<div class="alert alert-warning">';
        echo '<button class="close" data-dismiss="alert">&times;</button>';
        echo $this->session->flashdata('maaf');
        echo '</div>';
      }
      // Error
      echo validation_errors('<div class="alert alert-danger">', '<button class="close" data-dismiss="alert">&times;</button></div>');
      ?>

      <!-- sekarang masuk ke kolom isi konten -->

      <div class="row">
        <div class="col-md-4 order-md-1">
          <!-- bagian left up -->
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div class="my-1">
                <img src="<?php echo base_url('assets/img/default.jpg') ?>" class="img-fluid" alt="" />
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div>
                <h6 class="my-0">Terdaftar pada:</h6>
                <small class="text-muted">
                  <!-- <?php echo date('l, d F Y', strtotime($created_at)) ?> -->
                </small>
              </div>
              <span class="text-muted"></span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div>
                <h6 class="my-0">Akses login terakhir:</h6>
                <small class="text-muted">
                  <!-- <?php echo date('l, d F Y', strtotime($last_login)) ?> -->
                </small>
              </div>
              <span class="text-muted"></span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <button class="btn btn-secondary mr-3" data-toggle="modal" data-target="#editPassword">Ganti Password</button>
              <button class="btn btn-success" data-toggle="modal" data-target="#editProfile">Ubah Profile</button>
            </li>
          </ul>
        </div>






        <div class="col-md-8 order-md-1">
          <form class="needs-validation" novalidate>
            <!-- rows here -->
            <div class="row mb-3">
              <div class="col">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Username</span>
                  </div>
                  <input type="text" value="<?php echo $userb->username ?>" class="form-control" id="username" placeholder="Username" required disabled>
                </div>
              </div>
            </div>

            <div class="row mb-4">
              <div class="col">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Hak akses</span>
                  </div>
                  <input type="text" value="<?php if ($userb->akses_level == 'superadmin') echo "Administrator PKK"; ?><?php if ($userb->akses_level == 'admin_pkk') echo "Pengurus PKK"; ?><?php if ($userb->akses_level == 'admin_desa') echo "Perangkat Desa"; ?> " class="form-control" placeholder="Username" disabled>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="nama">Nama Lengkap</label>
                <h4 id="nama" class="mb-3 text-muted"><?php echo $userb->nama ?></h4>
              </div>
            </div>


            <div class="mb-3">
              <label for="email">Email</label> <!-- <span class="text-muted">(Optional)</span> -->
              <h4 id="email" class="mb-3 text-muted"><?php
                                                      if (empty($userb->email)) { //ini jika kolom email kosong
                                                        echo "(Belum ada data)";
                                                      } else { // dan jika berisi inputan data
                                                        echo $userb->email; //maka akan tetap 
                                                      }
                                                      ?></h4>
            </div>
          </form>
        </div>
      </div>
      <!-- akhir isi konten  -->

      <!-- modal ganti edit profile-->
      <!-- modal ganti edit profile-->
      <!-- modal ganti edit profile-->
      <!-- modal ganti edit profile-->
      <!-- modal ganti edit profile-->
      <!-- modal ganti edit profile-->
      <!-- modal -->
      <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Profile</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo site_url('profile/edits/' . $userb->id_user) ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="hidden" value="<?php echo $userb->id_user ?>" class="form-control" name="id_user" id="id_user">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" value="<?php echo $userb->nama ?>" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" name="nama" id="nama" autofocus>
                  <small id="nama" class="form-text text-muted"></small>
                  <div class="invalid-feedback">
                    <?php echo form_error('nama') ?>
                  </div>
                </div>
                <!-- end -->


                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" value="<?php echo $userb->email ?>" name="email">
                  <small id="email" class="form-text text-muted"></small>
                  <div class="invalid-feedback">
                    <?php echo form_error('email') ?>
                  </div>
                </div>
                <!-- end -->


                <!-- <div class="form-group">
				  	<label for="photo">Foto</label>
				  	<input class="form-control-file <?php echo form_error('photo') ? 'is-invalid' : '' ?>"
				  	 type="file" name="photo" />
				  	<input type="hidden" name="old_photo" value="<?php echo $photo ?>" />
  
				  	<div class="invalid-feedback">
				  		<?php echo form_error('photo') ?>
				  	</div>
				</div> -->
                <!-- end -->

                <button class="btn btn-secondary mr-1" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success" href="<?php echo site_url('profile/edits/' . $userb->id_user) ?>">Ubah</button>
              </form>
            </div>
            <!-- <div class="modal-footer">
      <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div> -->
          </div>
        </div>
      </div>


      <!-- modal ganti password-->
      <!-- modal ganti password-->
      <!-- modal ganti password-->
      <!-- modal ganti password-->
      <!-- modal ganti password-->
      <!-- modal ganti password-->
      <!-- modal untuk klik logout dari navbar-->
      <div class="modal fade" id="editPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo site_url('profile/edit_password/' . $userb->id_user) ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="hidden" value="<?php echo $userb->id_user ?>" class="form-control" name="id_user">
                  <input type="hidden" value="<?php echo $userb->password ?>" name="data_password_lama" />
                  <label for="password_lama">Password Lama</label>
                  <input type="password" class="form-control <?php echo form_error('input_tahun') ? 'is-invalid' : '' ?>" name="password_lama" id="password_lama" autofocus required>
                  <small id="input_tahun" class="form-text text-muted"></small>
                  <div class="invalid-feedback">
                    <?php echo form_error('input_tahun') ?>
                  </div>
                </div>
                <!-- end -->
                <div class="form-group">
                  <label for="password_verif">Password Baru</label>
                  <input type="password" class="form-control <?php echo form_error('password_verif') ? 'is-invalid' : '' ?>" name="password_verif" id="password_verif" required>
                  <small id="password_verif" class="form-text text-muted"></small>
                  <div class="invalid-feedback">
                    <?php echo form_error('password_verif') ?>
                  </div>
                </div>
                <!-- end -->


                <div class="form-group">
                  <label for="password_baru">Konfirmasi Password Baru</label>
                  <input type="password" class="form-control <?php echo form_error('password_baru') ? 'is-invalid' : '' ?>" name="password_baru" id="password_baru" required>
                  <small id="password_baru" class="form-text text-muted">Tuliskan kembali password baru anda.</small>
                  <div class="invalid-feedback">
                    <?php echo form_error('password_baru') ?>
                  </div>
                </div>
                <!-- end -->
                <!-- end -->

                <button class="btn btn-secondary mr-1" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success" href="<?php echo site_url('profile/edit_password/' . $userb->id_user) ?>">Ganti</button>
              </form>
            </div>
            <!-- <div class="modal-footer">
      <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div> -->
          </div>
        </div>
      </div>



    </div> <!-- akhir container fluid -->
  </main>