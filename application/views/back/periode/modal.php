<div class="modal fade" id="delete<?php echo $periode->id_periode ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menghapus periode ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">
                Penghapusan periode akan berakibat pada seluruh data di dalam sistem. Seluruh data yang terekam pada periode tersebut akan
                hilang dan tidak dapat dikembalikan lagi. Lakukan pertimbangan sebelum mengambil keputusan menghapus item periode.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a href="<?php echo base_url('admin/periode/delete/' . $periode->id_periode) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Periode</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-left">

                <?php
                // Form
                echo form_open('admin/periode/tambah');
                ?>
                <div class="form-group">
                    <label class="col-form-label" for="jumlah">Periode Baru</label>
                    <input type="number" class="form-control" name="nama_periode" id="jumlah" min="1990" max="2599" placeholder="Tahun" required>
                </div>
                <input type="password" name="pswd" placeholder="Password Anda" required class="form-control">
                <input type="hidden" name="ket" value="tidak" required class="form-control">
                <input type="hidden" name="pswd_lama" value="<?php echo $user->password ?>" class="form-control" />


            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <input type="submit" name="submit" value="Tambah Periode" class="btn btn-primary">
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<div class="modal fade" id="aktifkan<?php echo $periode->id_periode ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Aktivasi Periode</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-left">
            <?php
                // Form
                echo form_open('admin/periode/aktifkeun/'.$periode->id_periode);
                ?>
                <div class="form-group">
                    <h3>Anda yakin ingin mengaktifkan periode ini?</h3>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="pswd">Konfirmasi Password Anda</label>
                    <input type="password" name="pswd" placeholder="Password Anda" required class="form-control">
                </div>
                <input type="hidden" name="pswd_lama" value="<?php echo $user->password ?>" class="form-control" />
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <input type="submit" name="submit" value="Aktifkan" class="btn btn-primary">
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>