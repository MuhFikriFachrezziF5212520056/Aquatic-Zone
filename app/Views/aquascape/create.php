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
            <div class="card-header bg-primary text-white">
                <h5 class="m-0 fw-bold">Tambah Ekosistem Aquascape Baru</h5>
            </div>
            <div class="card-body">
                <form action="<?= site_url('aquascape/save'); ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Klien / Pemilik</label>
                        <input type="text" name="nama_klien" class="form-control" required placeholder="Contoh: Kafe Kenangan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lokasi Penempatan</label>
                        <input type="text" name="lokasi" class="form-control" required placeholder="Contoh: Ruang Tamu / Lobby Utama">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ukuran Tank</label>
                            <input type="text" name="ukuran_tank" class="form-control" required placeholder="Contoh: 90x45x45 cm (180L)">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tema Desain</label>
                            <select name="tema_design" class="form-select" required>
                                <option value="Nature Style">Nature Style</option>
                                <option value="Iwagumi Style">Iwagumi Style</option>
                                <option value="Dutch Style">Dutch Style</option>
                                <option value="Biotope Style">Biotope Style</option>
                                <option value="Paludarium">Paludarium</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Tanggal Pemasangan</label>
                            <input type="date" name="tgl_pemasangan" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Status Garansi</label>
                            <select name="status_garansi" class="form-select" required>
                                <option value="Aktif">Aktif</option>
                                <option value="Kadaluarsa">Kadaluarsa</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Biaya Maintenance (Rp)</label>
                            <input type="number" name="biaya_maintenance" class="form-control" required placeholder="350000">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Simpan Data Tank</button>
                        <a href="<?= site_url('aquascape'); ?>" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>