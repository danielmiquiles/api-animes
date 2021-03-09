<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TabelaAnimes extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 'serial',
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'ano' => [
                'type' => 'int',
                'null' => true,
            ],
            'imagem' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
			],
			'updated_at' => [
                'type' => 'timestamp',
                'null' => true,
            ],
        'created_at timestamp default CURRENT_TIMESTAMP',
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
