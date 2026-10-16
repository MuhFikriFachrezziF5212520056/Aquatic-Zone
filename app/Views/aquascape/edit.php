<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Palet warna AquaticZone (harus setelah bootstrap) -->
    <link rel="stylesheet" href="<?= base_url('css/aquaticzone-palette.css'); ?>">
</head>
<body class="bg-light">

<div class="container py-4">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning text-dark">
                <h5 class="m-0 fw-bold">Edit Data Ekosistem Aquascape</h5>
            </div>
            <div class="card-body">
                <form action="<?= site_url('aquascape/update/' . $aquascape['id_aquascape']); ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Klien / Pemilik</label>
                        <input type="text" name="nama_klien" class="form-control" value="<?= $aquascape['nama_klien']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lokasi Penempatan</label>
                        <input type="text" name="lokasi" class="form-control" value="<?= $aquascape['lokasi']; ?>" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ukuran Tank</label>
                            <input type="text" name="ukuran_tank" class="form-control" value="<?= $aquascape['ukuran_tank']; ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tema Desain</label>
                            <select name="tema_design" class="form-select" required>
                                <?php $themes = ['Nature Style', 'Iwagumi Style', 'Dutch Style', 'Biotope Style', 'Paludarium']; ?>
                                <?php foreach ($themes as $theme) : ?>
                                    <option value="<?= $theme; ?>" <?= $aquascape['tema_design'] == $theme ? 'selected' : ''; ?>><?= $theme; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Tanggal Pemasangan</label>
                            <input type="date" name="tgl_pemasangan" class="form-control" value="<?= $aquascape['tgl_pemasangan']; ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Status Garansi</label>
                            <select name="status_garansi" class="form-select" required>
                                <option value="Aktif" <?= $aquascape['status_garansi'] == 'Aktif' ? 'selected' : ''; ?>>Aktif</option>
                                <option value="Kadaluarsa" <?= $aquascape['status_garansi'] == 'Kadaluarsa' ? 'selected' : ''; ?>>Kadaluarsa</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Biaya Maintenance (Rp)</label>
                            <input type="number" name="biaya_maintenance" class="form-control" value="<?= $aquascape['biaya_maintenance']; ?>" required>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-warning">Update Data</button>
                        <a href="<?= site_url('aquascape'); ?>" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>