<div id="layoutSidenav_content">
    <main>
        <!-- masuk ke kontainer konten halaman -->
        <div class="container-fluid">
            <!-- ini nama judul halaman -->
            <h1 class="mt-4">Halaman Sedang Maintenance</h1>
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

            <div class="card mb-4">
                <div class="card-body">
                    Mohon maaf atas ketidaknyamanannya, halaman ini sedang dalam proses konstruksi untuk sementara waktu.
                    <a href="#">Pelajari lebih lanjut</a>
                </div>
            </div>
        </div>
    </main>