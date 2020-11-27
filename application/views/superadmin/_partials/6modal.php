<!-- modal -->
<!-- modal untuk klik logout dari navbar-->
<!-- Logout Modal-->
<!-- Logout Modal-->
<!-- Logout Modal-->
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar dari Sistem?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Silakan keluar jika anda sudah yakin, dan ingin menyudahi sesi Anda dalam sistem ini.</div>
      <div class="modal-footer">

        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="<?php echo site_url('auth/logout'); ?>">Keluar</a>

      </div>
    </div>
  </div>
</div>

<!-- Logout Delete Confirmation-->
<!-- Logout Delete Confirmation-->
<!-- Logout Delete Confirmation-->
<!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menghapus data ini?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Data yang telah dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div>
    </div>
  </div>
</div>


<!-- Logout Delete Confirmation-->
<!-- Logout Delete Confirmation-->
<!-- Logout Delete Confirmation-->
<!-- Logout Delete Confirmation-->
<div class="modal fade" id="hapus_penilaian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda yakin menghapus data penilaian ini?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Data penilaian yang akan anda dihapus tidak akan bisa dikembalikan. Mohon pertimbangkan kembali sebelum menghapus data penilaian ini.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="tombol-delete" class="btn btn-danger" href="#">Hapus</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Kecil Detail Unit-->
<!-- Modal Kecil Detail Unit-->
<!-- Modal Kecil Detail Unit-->
<!-- Modal Kecil Detail Unit-->
<div class="modal fade" id="addModalKecilUnit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Unit</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('admin/data_pegawai/addunit') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="input_unit">Input Nama Unit Baru</label>
            <input type="text" class="form-control <?php echo form_error('input_unit') ? 'is-invalid' : '' ?>" name="input_unit" id="input_unit" autofocus>
            <small id="input_unit" class="form-text text-muted">Menambah Unit akan berpengaruh pada manajemen penilaian pegawai Al-Madinah.</small>
            <div class="invalid-feedback">
              <?php echo form_error('input_unit') ?>
            </div>
          </div>

          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
      <!-- <div class="modal-footer">
      <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
    </div> -->
    </div>
  </div>
</div>

<!-- Modal Kecil Detail Tahun-->
<!-- Modal Kecil Detail Tahun-->
<!-- Modal Kecil Detail Tahun-->
<!-- Modal Kecil Detail Tahun-->
<div class="modal fade" id="addModalKecilTahun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Tahun</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('admin/data_pegawai/addtahun') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="input_tahun">Input Tahun Baru</label>
            <input type="number" class="form-control <?php echo form_error('input_tahun') ? 'is-invalid' : '' ?>" name="input_tahun" id="input_tahun" autofocus>
            <small id="input_tahun" class="form-text text-muted">Menambah Tahun akan berpengaruh pada manajemen penilaian pegawai Al-Madinah. Serta menjadi rujukan untuk melakukan input penilaian pegawai berdasarkan tahun.</small>
            <div class="invalid-feedback">
              <?php echo form_error('input_tahun') ?>
            </div>
          </div>


          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
      <!-- <div class="modal-footer">
      <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div> -->
    </div>
  </div>
</div>