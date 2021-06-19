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
            <?php
            if ($this->session->flashdata('sukses')) {
                echo '<div class="alert alert-success">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $this->session->flashdata('sukses');
                echo '</div>';
            }
            if ($this->session->flashdata('dihapus')) {
                echo '<div class="alert alert-danger">';
                echo '<button class="close" data-dismiss="alert">&times;</button>';
                echo $this->session->flashdata('dihapus');
                echo '</div>';
            }
            echo validation_errors('<div class="alert alert-danger">', '<button class="close" data-dismiss="alert">&times;</button></div>'); ?>

            <div class="card mb-4">
                <div class="card-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="utama-tab" data-toggle="tab" href="#utama" role="tab" aria-controls="utama" aria-selected="true">Program Utama</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="false">Detail Program</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <!-- menu pertama -->
                        <div class="tab-pane fade" id="utama" role="tabpanel" aria-labelledby="utama-tab">
                            <p><a href="<?php echo base_url('admin/proker/tambah_utama') ?>" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Tambah Program Utama</a></p>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="TableJeu" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="25px" class="text-center">No.</th>
                                            <th>Program Kerja Utama</th>
                                            <th width="190px" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php // $i = 1;
                                        //foreach ($proker as $proker) { 
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php // echo $i 
                                                                    ?></td>
                                            <td><?php // echo $proker->nama_berita 
                                                ?></td>
                                            <td class="d-flex justify-content-center">
                                                <a href="<?php //echo base_url('admin/proker/edit/' . $proker->id_proker) 
                                                            ?>" class="btn btn-light btn-sm mr-1"><i class="fa fa-edit"></i> Ubah</a>
                                                <?php // include('delete.php') 
                                                ?>
                                                <a href="<?php //echo site_url('proker/read/' . $proker->slug_berita) 
                                                            ?>" target="_blank" class="btn btn-light btn-sm ml-1"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <?php // $i++;
                                        //} 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- menu kedua -->
                        <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                            <p><a href="<?php echo base_url('admin/proker/tambah_detail') ?>" class="btn btn-secondary">
                                    <i class="fa fa-plus"></i> Tambah Detail Program</a></p>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="25" class="text-center">No.</th>
                                            <th>Detail Program Kerja</th>
                                            <th>Pokja</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($proker as $proker) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i ?></td>
                                                <td><?php echo $proker->nama_proker ?></td>
                                                <td><?php echo $proker->nama_pokja ?></td>
                                                <td><?php echo $proker->status ?></td>
                                                <td class="d-flex justify-content-center">
                                                    <a href="<?php echo base_url('admin/proker/edit/' . $proker->id_proker) ?>" class="btn btn-primary btn-sm mr-1"><i class="fa fa-edit"></i> Ubah</a>
                                                    <?php include('delete.php') ?>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>