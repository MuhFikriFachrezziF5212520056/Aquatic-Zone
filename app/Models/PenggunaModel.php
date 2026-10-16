<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table         = 'pengguna';
    protected $primaryKey    = 'id_pengguna';
    protected $allowedFields = [
        'nama_lengkap', 'username', 'password_hash', 'role'
    ];
    protected $useTimestamps = false;

    /**
     * Cari satu pengguna berdasarkan username.
     */
    public function cariUsername(string $username)
    {
        return $this->where('username', $username)->first();
    }
}