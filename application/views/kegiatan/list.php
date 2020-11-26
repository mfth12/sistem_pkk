
<?php 
	$this->load->view('layout/3slider'); 
?>
  
  <section class="mb-4">
	  <h2>
	  </h2>
  </section>

  <section class="py-5 text-center bg-light mb-4">
    <div class="container">
      <h2><?php echo $title ?></h2>
      </div>
    </div>
  </section>

<div class="container">

  <div class="row text-center">

    <?php foreach($berita as $berita) { ?>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">

          <img class="img img-responsive" height="300" src="<?php echo base_url('assets/upload/image/'.$berita->gambar)?>" alt="<?php echo $berita->nama_berita?>">
          <div class="card-body">
            <h4 class="card-title"><?php echo $berita->nama_berita?></h4>
            <p class="card-text"><strong><?php echo date('d M Y',strtotime($berita->tanggal_post))?></strong>
            </p>
            <p class="card-text"><?php echo character_limiter($berita->keterangan,150) ?>
            </p>
            <div class="clearfix"></div>
          </div>
          <div class="card-footer">
            <a href="<?php echo site_url('kegiatan/read/'.$berita->slug_berita) ?>" class="btn btn-primary w-100">Baca selengkapnya</a>
          </div>
        </div>
      </div>
    
        <?php } ?>
        <div class="clearfix"> </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container -->