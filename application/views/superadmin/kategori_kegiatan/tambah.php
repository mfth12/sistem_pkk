<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Kategori Kegiatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-left">

                <?php
                // Validasi
                echo validation_errors('<div class="alert alert-danger">', '<button class="close" data-dismiss="alert">&times;</button></div>');

                // Form
                echo form_open('superadmin/kategori_kegiatan');
                ?>

                <div class="form-group">
                    <label>Nama kategori</label>
                    <input type="text" name="nama_kategori_berita" placeholder="Nama kategori kegiatan" value="<?php echo set_value('nama_kategori_berita') ?>" required class="form-control">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo set_value('keterangan') ?></textarea>
                </div>

                <div class="form-group">
                    <label>Urutan tampil</label>
                    <input type="number" name="urutan" placeholder="Urutan tampil" value="<?php echo set_value('urutan') ?>" required class="form-control">
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <input type="submit" name="submit" value="Tambah Data" class="btn btn-primary">
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>