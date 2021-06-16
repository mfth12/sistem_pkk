<section id="galeri" class="news-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-top text-center">
                    <h2><?php echo $title ?></h2>
                    <p>Foto Galeri <?php echo $site['namaweb'] . ' ' . $site['tagline'] ?></p>
                </div>
            </div>
        </div>
        <div class="row">

            <?php $no = 0;
            foreach ($galeri as $berita) {
                if ($no == 0) { ?>
                    <div class="col-lg-4 col-md-4 mb-5">
                        <div data-toggle="modal" data-target="#myModal" class="single-news mb-3 mb-lg-0">
                            <a href="#myGallery" data-slide-to="<?= $no; ?>">
                                <div class="news-img" style="<?php echo "background-image: url('" . base_url('back_assets/upload/galeri/' . $berita->image) . "');" ?>">
                                </div>
                                <div class="news-tag">
                                    <ul class="my-3">
                                        <li>
                                            <h5><i class="fa fa-folder-open-o"></i> Pokja PKK</h5>
                                        </li>
                                    </ul>
                                </div>
                                <div class="news-title">
                                    <h4><a href="#myGallery" data-slide-to="<?= $no; ?>"><?php echo $berita->name ?></a></h4>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-lg-4 col-md-4 mb-5">
                        <div data-toggle="modal" data-target="#myModal" class="single-news mb-3 mb-lg-0">
                            <a href="#myGallery" data-slide-to="<?= $no; ?>">
                                <div class="news-img" style="<?php echo "background-image: url('" . base_url('back_assets/upload/galeri/' . $berita->image) . "');" ?>">
                                </div>
                                <div class="news-tag">
                                    <ul class="my-3">
                                        <li>
                                            <h5><i class="fa fa-folder-open-o"></i> Pokja PKK</h5>
                                        </li>
                                    </ul>
                                </div>
                                <div class="news-title">
                                    <h4><a href="#myGallery" data-slide-to="<?= $no; ?>"><?php echo $berita->name ?></a></h4>
                                </div>
                            </a>
                        </div>
                    </div>
            <?php  }
                $no++;
            } ?>
            <!-- end -->

        </div>
    </div>
</section>

<!--begin modal window-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--CAROUSEL CODE GOES HERE-->
                <!--begin carousel-->
                <div id="myGallery" class="carousel slide" data-ride="carousel" data-interval="false">
                    <!-- carausel inner-->
                    <div class="carousel-inner">
                        <?php $bo = 1;
                        foreach ($galeri as $ben) {
                            if ($bo == 1) { ?>
                                <div class="carousel-item active"> <img width="100%" src="<?php echo base_url('back_assets/upload/galeri/' . $ben->image) ?>" alt="item<?php echo $bo; ?>">
                                    <div class="carousel-caption">
                                        <h3 class="text-white"><?php echo $ben->name ?></h3>
                                        <p><?php echo $ben->description ?></p>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="carousel-item"> <img width="100%" src="<?php echo base_url('back_assets/upload/galeri/' . $ben->image) ?>" alt="item<?php echo $bo; ?>">
                                    <div class="carousel-caption">
                                        <h3 class="text-white"><?php echo $ben->name ?></h3>
                                        <p><?php echo $ben->description ?></p>
                                    </div>
                                </div>
                            <?php  }
                            $bo++; ?>
                        <?php  } ?>
                    </div>
                    <a class="carousel-control-prev" href="#myGallery" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myGallery" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>