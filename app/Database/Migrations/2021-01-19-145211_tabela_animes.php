<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TabelaAnimes extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 7,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'ano' => [
                'type' => 'int',
                'constraint' => 7,
                'null' => true,
            ],
            'imagem' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
			],
			'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
        'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('anime');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('anime');
	}
}
