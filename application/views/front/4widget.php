<div class="single-widget category-widget">
    <h4 class="title">Berita Pokja</h4>
    <?php $footer_berita  = $this->site_model->nav_berita();?>
    <?php foreach ($footer_berita as $nav_berita) { ?>
        <ul>
            <li>
                <a href="<?php echo site_url('berita/pokja/' . $nav_berita->slug_pokja) ?>" class="justify-content-between align-items-center d-flex">
                    <h6><?php echo $nav_berita->nama_pokja ?></h6> <span></span>
                </a>
            </li>
        <?php } ?>
        </ul>
</div>