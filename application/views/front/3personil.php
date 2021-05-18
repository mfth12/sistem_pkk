   <!-- Team Area Starts -->
   <section class="download-area section-padding">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="section-top text-center">
                       <h2>Pengurus TP-PKK</h2>
                       <p>Pengurus TP (Tim Penegak) PKK (Pemberdayaan dan Kesejahteraan Keluarga) Desa Uma Beringin Periode 2017-2022</p>
                   </div>
               </div>
           </div>
           <div class="row">
               <?php
                foreach ($struktur as $data4) { ?>
                   <div class="col-lg-3 col-sm-6">
                       <div class="single-team mb-5 mb-lg-0">
                           <div class="team-img" style="<?php echo "background-image: url('" . base_url('back_assets/upload/pengurus/' . $data4->image) . "');" ?>">
                               <div class="hover-state">
                               </div>
                           </div>
                           <div class="team-footer text-center mt-4">
                               <h3><?php echo $data4->name ?></h3>
                               <h5><?php echo $data4->description ?></h5>
                           </div>
                       </div>
                   </div>
               <?php } ?>
           </div>
       </div>
       <div class="more-job-btn mt-3 text-center">
           <a href="#" class="template-btn">Selengkapnya<span class="flaticon-next"></span></a>
       </div>
   </section>
   <!-- Team Area End -->