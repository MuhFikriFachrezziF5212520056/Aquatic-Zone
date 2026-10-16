<?php

namespace App\Models;

use CodeIgniter\Model;

class AquascapeModel extends Model
{
    protected $table            = 'aquascape';
    protected $primaryKey       = 'id_aquascape';
    protected $allowedFields    = [
        'nama_klien', 'lokasi', 'ukuran_tank', 
        'tema_design', 'tgl_pemasangan', 'status_garansi', 'biaya_maintenance'
    ];
}