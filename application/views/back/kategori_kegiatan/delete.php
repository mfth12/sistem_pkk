<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $kategori_berita->id_kategori_berita ?>">
  <i class="fa fa-trash"></i>
</button>


<div class="modal fade" id="delete<?php echo $kategori_berita->id_kategori_berita ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menghapus data ini?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        Data yang telah dihapus tidak akan bisa dikembalikan.
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a href="<?php echo base_url('superadmin/kategori_kegiatan/delete/' . $kategori_berita->id_kategori_berita) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
      </div>
    </div>
  </div>
</div>