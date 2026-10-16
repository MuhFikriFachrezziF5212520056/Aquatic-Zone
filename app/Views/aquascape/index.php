<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title; ?></title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('vendors/feather/feather.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('vendors/ti-icons/css/themify-icons.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('vendors/css/vendor.bundle.base.css'); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('css/vertical-layout-light/style.css'); ?>">

  <!-- Palet warna AquaticZone (harus setelah style.css) -->
  <link rel="stylesheet" href="<?= base_url('css/aquaticzone-palette.css'); ?>">
</head>

<body>
  <div class="container-scroller">
    <!-- Navbar Topbar -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5 fw-bold text-primary" href="<?= site_url('aquascape'); ?>"><i class="bi bi-water"></i> AquaticZone</a>
        <a class="navbar-brand brand-logo-mini text-primary" href="<?= site_url('aquascape'); ?>"><i class="bi bi-water"></i></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link" href="#">
              <i class="bi bi-person-circle fs-4 text-primary"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow mt-2">
              <div class="px-3 py-2 az-userbox">
                <div class="az-userbox-name"><?= session()->get('nama') ?? 'Operator'; ?></div>
                <div class="az-userbox-role"><?= session()->get('role') ?? 'Operator'; ?></div>
              </div>
              <a class="dropdown-item" href="<?= site_url('logout'); ?>">
                <i class="bi bi-box-arrow-right mr-2"></i> Keluar
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Body Page Wrapper -->
    <div class="container-fluid page-body-wrapper">
      
      <!-- Sidebar Menu -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?= site_url('aquascape'); ?>">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard Maintenance</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('aquascape/create'); ?>">
              <i class="bi bi-plus-circle menu-icon"></i>
              <span class="menu-title">Tambah Tank Baru</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- Main Content Panel -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Monitoring Ekosistem Aquascape</h3>
                  <h6 class="font-weight-normal mb-0">Sistem Informasi Management Pelanggan & Maintenance Aquascape</h6>
                </div>
                <div class="col-12 col-xl-4 text-right">
                  <a href="<?= site_url('aquascape/create'); ?>" class="btn btn-primary"><i class="bi bi-plus-circle mr-1"></i> Tambah Tank Baru</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Cards Summary Statistik -->
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card card-tale">
                <div class="card-body">
                  <p class="mb-4">Total Aquascape Dikelola</p>
                  <p class="fs-30 mb-2"><?= $total_tank; ?> Tank</p>
                  <p>Unit ekosistem aktif terdaftar</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Garansi Aktif (Free Service)</p>
                  <p class="fs-30 mb-2"><?= $total_garansi; ?> Unit</p>
                  <p>Tank dalam masa garansi perawatan</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Tabel Data Maintenance -->
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-3">Daftar Tank & Status Perawatan Klien</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Klien & Lokasi</th>
                          <th>Spesifikasi Tank</th>
                          <th>Tema Desain</th>
                          <th>Tgl Pasang</th>
                          <th>Garansi</th>
                          <th>Biaya Service</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (empty($aquascape)) : ?>
                          <tr>
                            <td colspan="8" class="text-center py-4 text-muted">Belum ada data tank terdaftar.</td>
                          </tr>
                        <?php else : ?>
                          <?php $no = 1; foreach ($aquascape as $a) : ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>
                                <strong><?= $a['nama_klien']; ?></strong><br>
                                <small class="text-muted"><i class="bi bi-geo-alt"></i> <?= $a['lokasi']; ?></small>
                              </td>
                              <td><?= $a['ukuran_tank']; ?></td>
                              <td><span class="badge badge-info"><?= $a['tema_design']; ?></span></td>
                              <td><?= date('d M Y', strtotime($a['tgl_pemasangan'])); ?></td>
                              <td>
                                <span class="badge <?= $a['status_garansi'] == 'Aktif' ? 'badge-success' : 'badge-danger'; ?>">
                                  <?= $a['status_garansi']; ?>
                                </span>
                              </td>
                              <td class="font-weight-bold">Rp <?= number_format($a['biaya_maintenance'], 0, ',', '.'); ?></td>
                              <td>
                                <a href="<?= site_url('aquascape/edit/' . $a['id_aquascape']); ?>" class="btn btn-warning btn-sm p-2"><i class="bi bi-pencil-square"></i></a>
                                <a href="<?= site_url('aquascape/delete/' . $a['id_aquascape']); ?>" class="btn btn-danger btn-sm p-2" onclick="return confirm('Hapus data tank ini?')"><i class="bi bi-trash"></i></a>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- Footer -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">AquaticZone Management System © <?= date('Y'); ?>.</span>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <!-- plugins:js -->
  <script src="<?= base_url('vendors/js/vendor.bundle.base.js'); ?>"></script>
  <script src="<?= base_url('js/off-canvas.js'); ?>"></script>
  <script src="<?= base_url('js/hoverable-collapse.js'); ?>"></script>
  <script src="<?= base_url('js/template.js'); ?>"></script>
</body>

</html>