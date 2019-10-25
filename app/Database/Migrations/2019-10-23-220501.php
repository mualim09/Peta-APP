<?php namespace App\Database\Migrations;

class MapsData extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],
                        'name'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',
                        ],
                        'address' => [
                                'type'           => 'TEXT',
                                'null'           => TRUE,
                        ],
                        'description' => [
                                'type'           => 'TEXT',
                                'null'           => TRUE,
                        ],
                        'image' => [
                                'type'           => 'VARCHAR',
                                'null'           => '20',
                        ],
                        'lat' => [
                                'type'           => 'FLOAT',
                                'null'           => 30,
                        ],
                        'long' => [
                                'type'           => 'FLOAT',
                                'null'           => 30,
                        ],
                        'type' => [
                                'type'           => 'VARCHAR',
                                'null'           => '10',
                        ],
                        'created_at' => [
                                'type'           => 'TIMESTAMP',
                                'null'           => TRUE,
                        ],
                        'updated_at' => [
                                'type'           => 'TIMESTAMP',
                                'null'           => TRUE,
                        ],
                        'deleted_at' => [
                                'type'           => 'TIMESTAMP',
                                'null'           => TRUE,
                        ],
                ]);
                $this->forge->addKey('id', TRUE);
                $this->forge->createTable('mapsdata');
        }

        public function down()
        {
                $this->forge->dropTable('mapsdata');
        }
}