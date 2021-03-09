<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TabelaUsuarios extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
                'type' => 'INT',
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ],
            'email' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
                'null' => false,
                'unique' => true,
            ],
            'senha' => [
                'type' => 'TEXT',
                'null' => true,
			],
            'ativo' => [
                'type' => 'boolean',
                'null' => true,
                'default' => 't',
			],
			'updated_at' => [
                'type' => 'timestamp',
                'null' => true,
                'default' => null,
            ],
        'created_at timestamp default CURRENT_TIMESTAMP',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('usuario');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('usuario');
	}
}
