<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TabelaUsuarios extends Migration
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
                'type' => 'BOOLEAN',
                'null' => true,
                'default' => true,
			],
            // 'token' => [
            //     'type' => 'TEXT',
            //     'null' => true,
            // ],
			'updated_at' => [
                'type' => 'datetime',
                'null' => true,
                'default' => null,
            ],
        'created_at datetime default current_timestamp',
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
