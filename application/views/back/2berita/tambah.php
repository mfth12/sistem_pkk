<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        file_browser_callback: function(field, url, type, win) {
            tinyMCE.activeEditor.windowManager.open({
                file: '<?php echo base_url() ?>assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
                title: 'KCFinder',
                width: 700,
                height: 500,
                inline: true,
                close_previous: false
            }, {
                window: win,
                input: field
            });
            return false;
        },
        selector: "#keterangan",
        height: 150,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <!-- ini nama judul halaman -->
            <h1 class="mt-4">Tambah Kegiatan</h1>
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
            <!-- flash sedikit -->
            <?php
            // Error
            if (isset($error)) {
                echo '<div class="alert alert-danger">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $error;
                echo '</div>';
            }

            // Validasi
            echo validation_errors('<div class="alert alert-success">', '<button class="close" data-dismiss="alert">&times;</button> </div>');

            // Form
            echo form_open_multipart('superadmin/kegiatan/tambah');
            ?>
            <!-- sekarang masuk ke kolom isi konten -->
            <div class="card mb-4">
                <div class="card-header">
                    <a href="<?php echo site_url('superadmin/kegiatan') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-lg">
                                <label>Nama Kegiatan</label>
                                <input type="text" name="nama_berita" placeholder="Nama kegiatan" value="<?php echo set_value('nama_berita') ?>" required class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-lg">
                                <label>Status Kegiatan</label>
                                <select name="status_berita" class="form-control">
                                    <option value="Publish">Publikasikan</option>
                                    <option value="Draft">Simpan sebagai draft</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori Kegiatan</label>
                                <select name="id_kategori_berita" class="form-control">
                                    <?php foreach ($kategori as $kategori) { ?>
                                        <option value="<?php echo $kategori->id_kategori_berita ?>">
                                            <?php echo $kategori->nama_kategori_berita ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Posting</label>
                                <select name="jenis_berita" class="form-control">
                                    <option value="Berita">Kegiatan</option>
                                    <option value="Profil">Profil PKK</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Upload Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Keterangan Kegiatan</label>
                        <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="keterangan"><?php echo set_value('keterangan') ?></textarea>
                    </div>

                    <div class="form-group">
                        <input type="reset" name="reset" value="Reset" class="btn btn-secondary">
                        <input type="submit" name="submit" value="Tambah Kegiatan" class="btn btn-primary">
                    </div>




                    <?php echo form_close() ?>

                </div> <!-- akhir div card body -->
            </div> <!-- akhir div card -->
        </div> <!-- akhir container fluid -->
    </main>