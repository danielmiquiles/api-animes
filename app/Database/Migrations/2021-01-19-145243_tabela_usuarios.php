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
            ],
            'senha' => [
                'type' => 'TEXT',
                'null' => true,
			],
			'updated_at' => [
                'type' => 'datetime',
                'null' => true,
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
