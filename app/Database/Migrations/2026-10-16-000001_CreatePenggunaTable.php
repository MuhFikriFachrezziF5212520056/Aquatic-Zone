<?php

namespace Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenggunaTable extends Migration
{
    public function up()
    {
        $this->db->query("
            CREATE TABLE pengguna (
                id_pengguna   INT UNSIGNED NOT NULL AUTO_INCREMENT,
                nama_lengkap  VARCHAR(100) NOT NULL,
                username      VARCHAR(50)  NOT NULL,
                password_hash VARCHAR(255) NOT NULL,
                role          VARCHAR(20)  NOT NULL DEFAULT 'Operator',
                created_at    DATETIME     NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (id_pengguna),
                UNIQUE KEY username_unique (username)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
        ");
    }

    public function down()
    {
        $this->db->query('DROP TABLE IF EXISTS pengguna');
    }
}