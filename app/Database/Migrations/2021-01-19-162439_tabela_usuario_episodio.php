<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TabelaUsuarioEpisodio extends Migration
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
			'episodio_id' => [
				'type' => 'INT',
				'constraint' => 7,
				'null' => false
			],
			'usuario_id' => [
				'type' => 'INT',
				'constraint' => 7,
				'null' => false
			],
			'assistido boolean default 1',
			'created_at datetime default current_timestamp',
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('usuario_episodio');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('usuario_episodio');
	}
}
