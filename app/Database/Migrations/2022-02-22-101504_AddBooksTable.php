<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBooksTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',

            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',

            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => '255',

            ],
            'price' => [
                'type' => 'INT',
                'constraint' => '5',

            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'default' => null
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => null
            ],



        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('books');
    }

    public function down()
    {
        $this->forge->dropTable('books');
    }
}
