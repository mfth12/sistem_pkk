<?php
// $this->load->view('layout/3slider');
// require_once('../layout/3slider');
?>
<!-- Berita slide Starts -->
<section id="berita" class="employee-area section-padding3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-top text-center">
                    <h2>Berita</h2>
                    <p>Berita Terkini PKK Desa Uma Beringin</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="employee-slider owl-carousel">
                    <?php foreach ($berita_slide as $beritaku) { ?>
                        <div class="d-sm-flex">
                            <div class="single-news" style="width: 520px;">
                                <div class="news-img" style="<?php echo "background-image: url('" . base_url('back_assets/upload/image/' . $beritaku->gambar) . "');" ?>"></div>
                                <div class="news-tag">
                                    <ul class="my-3">
                                        <li>
                                            <h5><i class="fa fa-calendar-o"></i> <?php echo date('d M Y', strtotime($beritaku->tanggal_post)) ?></h5>
                                        </li>
                                        <li class="separator mx-2"><span></span></li>
                                        <li>
                                            <h5><i class="fa fa-folder-open-o"></i> Pokja PKK</h5>
                                        </li>
                                    </ul>
                                </div>
                                <div class="news-title">
                                    <h4><a href="<?php echo site_url('kegiatan/read/' . $beritaku->slug_berita) ?>"><?php echo substr($beritaku->nama_berita, 0, 25)?><span class="flaticon-next"></span></a></h4>
                                </div>
                            </div>
                            <!-- end -->
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Berita slide ends -->

