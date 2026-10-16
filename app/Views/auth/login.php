<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title; ?></title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('vendors/ti-icons/css/themify-icons.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('vendors/css/vendor.bundle.base.css'); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('css/vertical-layout-light/style.css'); ?>">

  <!-- Palet warna AquaticZone (harus setelah style.css) -->
  <link rel="stylesheet" href="<?= base_url('css/aquaticzone-palette.css'); ?>">
</head>

<body class="az-login-body">
  <div class="container-fluid az-login-wrap">

    <!-- Panel kiri: identitas + Testimony -->
    <div class="row az-login-brand">
      <div class="col-12 d-flex flex-column justify-content-between">
        <div>
          <h2 class="az-login-logo"><i class="bi bi-water"></i> AquaticZone</h2>
          <p class="az-login-tagline">
            Sistem Informasi Management Pelanggan &amp; Maintenance Aquascape
          </p>
        </div>

        <div class="az-login-features">
          <div class="az-login-feature">
            <i class="bi bi-graph-up-arrow"></i>
            <div>
              <strong>Monitoring Real-time</strong>
              <span>Pantau kondisi ekosistem &amp; garansi pelanggan</span>
            </div>
          </div>
          <div class="az-login-feature">
            <i class="bi bi-droplet-half"></i>
            <div>
              <strong>Data Terpusat</strong>
              <span>Satu basis data untuk seluruh unit tank</span>
            </div>
          </div>
          <div class="az-login-feature">
            <i class="bi bi-shield-lock"></i>
            <div>
              <strong>Akses Terlindungi</strong>
              <span>Hanya operator terdaftar yang dapat masuk</span>
            </div>
          </div>
        </div>

        <p class="az-login-copy">&copy; <?= date('Y'); ?> AquaticZone Management System</p>
      </div>
    </div>

    <!-- Panel kanan: form login -->
    <div class="row az-login-form-wrap">
      <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="az-login-card">

          <div class="text-center mb-4">
            <i class="bi bi-water az-login-mark"></i>
            <h3 class="az-login-title">Masuk ke Dashboard</h3>
            <p class="az-login-sub">Gunakan akun operator AquaticZone Anda</p>
          </div>

          <?php if (session()->getFlashdata('error')) : ?>
            <div class="az-alert az-alert-danger">
              <i class="bi bi-exclamation-triangle-fill"></i>
              <?= session()->getFlashdata('error'); ?>
            </div>
          <?php endif; ?>

          <?php if (session()->getFlashdata('errors')) : ?>
            <div class="az-alert az-alert-danger">
              <i class="bi bi-exclamation-triangle-fill"></i>
              <ul class="mb-0 ps-3">
                <?php foreach (session()->getFlashdata('errors') as $e) : ?>
                  <li><?= $e; ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <form action="<?= site_url('login/attempt'); ?>" method="post" autocomplete="off">
            <div class="az-field">
              <label for="username">Username</label>
              <div class="az-input">
                <i class="bi bi-person"></i>
                <input type="text" id="username" name="username" class="form-control"
                       placeholder="Masukkan username"
                       value="<?= old('username'); ?>" required>
              </div>
            </div>

            <div class="az-field">
              <label for="password">Password</label>
              <div class="az-input">
                <i class="bi bi-key"></i>
                <input type="password" id="password" name="password" class="form-control"
                       placeholder="Masukkan password" required>
              </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="form-check az-check">
                <input type="checkbox" class="form-check-input" id="ingat" name="ingat">
                <label class="form-check-label" for="ingat">Ingat saya</label>
              </div>
              <a href="#" class="az-link">Lupa password?</a>
            </div>

            <button type="submit" class="az-btn-login">
              <i class="bi bi-box-arrow-in-right"></i> Masuk
            </button>
          </form>

          <p class="az-hint">
            <i class="bi bi-info-circle"></i>
            Demo &mdash; <code>Fikr</code> / <code>fikr123</code>
          </p>

        </div>
      </div>
    </div>

  </div>

  <!-- plugins:js -->
  <script src="<?= base_url('vendors/js/vendor.bundle.base.js'); ?>"></script>
</body>

</html>