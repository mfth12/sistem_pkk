<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <!-- ini nama judul halaman -->
      <h1 class="mt-4">Konfigurasi Website</h1>
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
      // File upload error
      if (isset($error)) {
        echo '<div class="alert alert-danger">';
        echo '<button class="close" data-dismiss="alert">&times;</button>';
        echo $error;
        echo '</div>';
      }
      // Error
      echo validation_errors('<div class="alert alert-success">', '</div>');
      ?>

      <!-- sekarang masuk ke kolom isi konten -->
      <div class="card mb-4">
        <div class="card-header">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="umum-tab" data-toggle="tab" href="#umum" role="tab" aria-controls="umum" aria-selected="true">Umum</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="logo-tab" data-toggle="tab" href="#logo" role="tab" aria-controls="logo" aria-selected="false">Logo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="icon-tab" data-toggle="tab" href="#icon" role="tab" aria-controls="icon" aria-selected="false">Favicon</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="ucapan-tab" data-toggle="tab" href="#ucapan" role="tab" aria-controls="ucapan" aria-selected="false">Ucapan</a>
            </li>
          </ul>
        </div>
        <div class="card-body">

          <div class="tab-content" id="myTabContent">
            <!-- menu pertama -->
            <div class="tab-pane fade show active" id="umum" role="tabpanel" aria-labelledby="umum-tab">

              <form action="<?php echo site_url('superadmin/konfig/konfigurasi') ?>" method="post">

                <input type="hidden" name="id_konfigurasi" value="<?php echo $site['id_konfigurasi'] ?>">
                <div class="row mb-3">
                  <div class="col-md-6 order-md-1">
                    <h3>Informasi Dasar</h3>
                    <hr>
                    <div class="form-group">
                      <label>Nama Situs</label>
                      <input type="text" name="namaweb" placeholder="Nama organisasi/perusahaan" value="<?php echo $site['namaweb'] ?>" required class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Nama Desa</label>
                      <input type="text" name="tagline" placeholder="Company tagline/motto" value="<?php echo $site['tagline'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Keterangan situs</label>
                      <textarea name="tentang" rows="3" class="form-control" placeholder="Summary of the company"><?php echo $site['tentang'] ?></textarea>
                    </div>

                    <div class="form-group">
                      <label>Background halaman utama situs</label>
                      <select name="home_setting" class="form-control">
                        <option value="Image">Image Background</option>
                        <option value="Video" <?php if ($site['home_setting'] == "Video") {
                                                echo "selected";
                                              } ?>>Video Background</option>
                      </select>
                    </div>


                    <div class="form-group">
                      <label>Alamat website</label>
                      <input type="url" name="website" placeholder="<?php echo base_url() ?>" value="<?php echo $site['website'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Email resmi</label>
                      <input type="email" name="email" placeholder="youremail@address.com" value="<?php echo $site['email'] ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat perusahaan/organisasi"><?php echo $site['alamat'] ?></textarea>
                    </div>

                    <div class="form-group">
                      <label>Nomer Telp</label>
                      <input type="text" name="telepon" placeholder="021-000000" value="<?php echo $site['telepon'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Fax</label>
                      <input type="text" name="fax" placeholder="021-000000" value="<?php echo $site['fax'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Handphone/seluler</label>
                      <input type="text" name="hp" placeholder="021-000000" value="<?php echo $site['hp'] ?>" class="form-control">
                    </div>

                    <h3>Akun Sosial Media</h3>
                    <hr>

                    <div class="form-group">
                      <label>Facebook</label>
                      <input type="url" name="facebook" placeholder="http://facebook.com/namakamu" value="<?php echo $site['facebook'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Twitter</label>
                      <input type="url" name="twitter" placeholder="http://twitter.com/namakamu" value="<?php echo $site['twitter'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Instagram</label>
                      <input type="url" name="instagram" placeholder="http://instagram.com/namakamu" value="<?php echo $site['instagram'] ?>" class="form-control">
                    </div>

                  </div>

                  <div class="col-md-6 order-md-1">
                    <h3>Modul Optimasisasi Mesin Pencarian</h3>
                    <hr>
                    <div class="form-group">
                      <label>Katakunci (Katakunci untuk Google, Bing, dll)</label>
                      <textarea name="keywords" rows="3" class="form-control" placeholder="Kata kunci / keywords"><?php echo $site['keywords'] ?></textarea>
                    </div>

                    <div class="form-group">
                      <label>Teks Meta</label>
                      <textarea name="metatext" rows="5" class="form-control" placeholder="Kode metatext"><?php echo $site['metatext'] ?></textarea>
                    </div>

                    <h3>Lokasi Google Map</h3>
                    <hr>
                    <div class="form-group">
                      <label>Google Map</label>
                      <textarea name="google_map" rows="5" class="form-control" placeholder="Kode dari Google Map"><?php echo $site['google_map'] ?></textarea>
                    </div>

                    <div class="form-group map">
                      <?php echo $site['google_map'] ?>
                    </div>
                  </div>
                </div>

                <div class="row col-md-12">
                  <input type="reset" name="reset" value="Reset" class="btn btn-secondary mr-2">
                  <input type="submit" name="submit" value="Simpan Konfigurasi" class="btn btn-primary">
                </div>

              </form>
            </div>

            <!-- menu kedua -->
            <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">

              <div class="card mb-4">
                <div class="card-body">
                  Logo akan ditampilkan pada setiap halaman dan elemen dalam website <a href="#"><?php echo $site['namaweb'] ?></a>.
                </div>
              </div>
              <form action="<?php echo site_url('superadmin/konfig/logo') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_konfigurasi" value="<?php echo $site['id_konfigurasi'] ?>">

                <div class="form-group col-md-6">
                  <label>Upload Logo Baru</label>
                  <input type="file" name="logo" class="form-control" id="file">
                  <div id="imagePreview"></div>
                </div>

                <div class="form-group col-md-6 mb-4">
                  <label>Logo Situs Sekarang</label><br>
                  <img src="<?php echo base_url('assets/upload/image/' . $site['logo']) ?>" style="max-width:200px; height:auto;">
                </div>

                <div class="form-group col-md-6">
                  <input type="reset" name="reset" value="Reset" class="btn btn-secondary mr-2">
                  <input type="submit" name="submit" value="Simpan Logo" class="btn btn-primary ">
                </div>
              </form>
            </div>

            <!-- menu ketiga -->
            <div class="tab-pane fade" id="icon" role="tabpanel" aria-labelledby="icon-tab">

              <div class="card mb-4">
                <div class="card-body">
                  Favicon merupakan icon website dan akan ditampilkan pada setiap tab navigasi website <a href="#"><?php echo $site['namaweb'] ?></a>.
                </div>
              </div>
              <form action="<?php echo site_url('superadmin/konfig/icon') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_konfigurasi" value="<?php echo $site['id_konfigurasi'] ?>">

                <div class="form-group col-md-6">
                  <label>Upload Favicon Baru</label>
                  <input type="file" name="icon" class="form-control" id="file">
                  <div id="imagePreview"></div>
                </div>

                <div class="col-md-6 mb-4">
                  <label>Favicon Situs Sekarang</label><br>
                  <img src="<?php echo base_url('assets/upload/image/' . $site['icon']) ?>" style="max-width:200px; height:auto;">
                </div>

                <div class="form-group col-md-6">
                  <input type="reset" name="reset" value="Reset" class="btn btn-secondary mr-2">
                  <input type="submit" name="submit" value="Simpan Favicon" class="btn btn-primary">
                </div>
              </form>
            </div>

            <!-- menu keempat -->
            <div class="tab-pane fade" id="ucapan" role="tabpanel" aria-labelledby="ucapan-tab">

              <form action="<?php echo site_url('superadmin/konfig/ucapan') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_konfigurasi" value="<?php echo $site['id_konfigurasi'] ?>">
                <h3 class="col-md-6 order-md-1">Ucapan Beranda Website</h3>
                <div class="col-md-6 order-md-1">
                  <div class="form-group">
                    <label>Judul Ucapan</label>
                    <input type="text" name="welcome_say" placeholder="Judul Ucapan" value="<?php echo $site['welcome_say'] ?>" required class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Deksripsi Ucapan Sambutan</label>
                    <textarea name="deskripsi_say" rows="6" class="form-control" placeholder="Deskripsi kalimat sambutan"><?php echo $site['deskripsi_say'] ?></textarea>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <input type="reset" name="reset" value="Reset" class="btn btn-secondary mr-2">
                  <input type="submit" name="submit" value="Simpan Ucapan" class="btn btn-primary">
                </div>
              </form>
            </div>


          </div>


        </div> <!-- akhir div card body -->
      </div> <!-- akhir div card -->
    </div> <!-- akhir container fluid -->
  </main>