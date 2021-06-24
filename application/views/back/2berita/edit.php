<script src="https://cdn.tiny.cloud/1/7ko2ftgz9ujgvnh1tq2wbfamm5ztwaieu3mi3b8ayc69fxrh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#keterangan',
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'table emoticons template paste help',
            'autoresize'
        ],
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullpage | ' +
            'forecolor backcolor emoticons | help',
        menu: {
            favs: {
                title: 'My Favorites',
                items: 'code visualaid | searchreplace | emoticons'
            }
        },
        menubar: 'favs file edit view insert format tools table help',
        mobile: {
            menubar: true
        }
    });
</script>

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
            <!-- flash sedikit -->
            <?php
            // Error
            if (isset($error)) {
                echo '<div class="alert alert-warning">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $error;
                echo '</div>';
            }
            // Notifikasi
            if ($this->session->flashdata('dihapus')) {
                echo '<div class="alert alert-danger">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $this->session->flashdata('eror');
                echo '</div>';
            }

            // Validasi
            echo validation_errors('<div class="alert alert-danger">', '<button class="close" data-dismiss="alert">&times;</button> </div>');

            // Form
            echo form_open_multipart('admin/berita/edit/' . $berita->id_berita);
            ?>

            <!-- sekarang masuk ke kolom isi konten -->
            <div class="card mb-4">
                <div class="card-header">
                    <a href="<?php echo site_url('admin/berita') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-lg">
                                <label>Judul Berita</label>
                                <input type="text" name="nama_berita" placeholder="Judul berita" value="<?php echo $berita->nama_berita ?>" required class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-lg">
                                <label>Status Berita</label>
                                <select name="status_berita" class="form-control">
                                    <option value="Publish">Publikasikan</option>
                                    <option value="Draft" <?php if ($berita->status_berita == "Draft") {
                                                                echo "selected";
                                                            } ?>>Simpan sebagai draft</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pokja Berita</label>
                                <select name="id_pokja" class="form-control">
                                    <?php foreach ($pokja as $pokja) { ?>
                                        <option value="<?php echo $pokja->id_pokja ?>" <?php if ($berita->id_pokja == $pokja->id_pokja) { echo "selected"; } ?>>
                                            <?php echo $pokja->nama_pokja ?></option>
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
                                    <option value="Berita">Berita</option>
                                    <option value="Profil" <?php if ($berita->jenis_berita == "Profil") { echo "selected";} ?>>Profil PKK</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Ganti gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Keterangan Berita</label>
                        <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="keterangan"><?php echo $berita->keterangan ?></textarea>
                    </div>

                    <div class="form-group">
                        <input type="reset" name="reset" value="Reset" class="btn btn-secondary">
                        <input type="submit" name="submit" value="Ubah Berita" class="btn btn-primary">
                    </div>



                    <?php echo form_close() ?>


                </div> <!-- akhir div card body -->
            </div> <!-- akhir div card -->
        </div> <!-- akhir container fluid -->
    </main>