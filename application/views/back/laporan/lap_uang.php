<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <!-- ini nama judul halaman -->
            <h1 class="mt-4"><?php echo $title ?></h1>
            <h4 class="mb-2">Tanggal <?php echo date('d F', strtotime($satu)) . " Sampai " . date('d F Y', strtotime($dua)) ?></h4>
            <!-- ini nama bread crumb -->
            <?php
            // Notifikasi
            if ($this->session->flashdata('sukses')) {
                echo '<div class="alert alert-success">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $this->session->flashdata('sukses');
                echo '</div>';
            }
            // Notifikasi
            if ($this->session->flashdata('maaf')) {
                echo '<div class="alert alert-danger">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $this->session->flashdata('maaf');
                echo '</div>';
            }
            // Error
            echo validation_errors('<div class="alert alert-danger">', '<button class="close" data-dismiss="alert">&times;</button></div>');
            ?>

            <div class="card mb-4">
                <div class="card-header">
                    <a href="<?php echo site_url('admin/laporan') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between lh-condensed">
                        <p><a href="#!" onclick="window.print()" class="btn btn-secondary">
                                <i class="fa fa-print"></i> Cetak</a></p>
                    </div>
                    <div class="table-responsive">
                        <!-- masuk ke tabel -->
                        <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="25" class="text-center">No.</th>
                                    <th width="25%">Keterangan</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Bukti</th>
                                    <th>Jumlah</th>
                                    <th class="text-center">Jenis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($result as $data) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i ?></td>
                                        <td><?php echo $data->keterangan ?></td>
                                        <td class="text-center"><?php echo date('d M Y', strtotime($data->tanggal)) ?></td>
                                        <td class="text-center">
                                        <?php if ($data->jenis == "masuk") { ?><i>-</i><?php } else {?>
                                            <a href="<?php echo base_url('back_assets/upload/transaksi/' . $data->image) ?>" target="_blank">Lihat</a>
                                            <?php } ?>
                                        </td>
                                        <td width="25%" class="text-right">Rp <?= number_format($data->jumlah, 2, ',', '.'); ?></td>
                                        <td class="text-center"><?php if ($data->jenis == "masuk") { ?><span class="badge badge-pill badge-success" style="font-weight: unset;">Pemasukan</span> <?php }
                                                                                                                                                                                                if ($data->jenis == "keluar") { ?><span class="badge badge-pill badge-danger" style="font-weight: unset;">Pengeluaran</span><?php } ?>
                                        </td>

                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>


                            <thead>
                                <?php
                                error_reporting(0);
                                foreach ($ttl as $total) {
                                    $jumlah += $total->jumlah;
                                }

                                foreach ($ttl_k as $total_k) {
                                    $jumlah -= $total_k->jumlah;
                                }
                                ?>
                                <tr>
                                    <th colspan="4" scope="col">SALDO TOTAL</th>
                                    <th class="text-right" scope="col">Rp. <?= number_format($jumlah, 2, ',', '.'); ?></th>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>
                        </table>
                    </div> <!-- akhir div tabel -->
                </div> <!-- akhir div card body -->
            </div> <!-- akhir div card -->
    </main>