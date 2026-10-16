<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        $db = $this->db;

        $akun = [
            [
                'nama_lengkap'  => 'Muh. Fikri Fachrezzi',
                'username'      => 'Fikr',
                'password_hash' => password_hash('fikr123', PASSWORD_DEFAULT),
                'role'          => 'Administrator',
            ],
            [
                'nama_lengkap'  => 'Operator Teknik',
                'username'      => 'operator',
                'password_hash' => password_hash('rahasia123', PASSWORD_DEFAULT),
                'role'          => 'Operator',
            ],
        ];

        foreach ($akun as $a) {
            // idempoten: aman dijalankan berulang, demo password selalu ter-reset
            $db->query("
                INSERT INTO pengguna (nama_lengkap, username, password_hash, role)
                VALUES (?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE
                    nama_lengkap  = VALUES(nama_lengkap),
                    password_hash = VALUES(password_hash),
                    role          = VALUES(role)
            ", [$a['nama_lengkap'], $a['username'], $a['password_hash'], $a['role']]);
        }
    }
}