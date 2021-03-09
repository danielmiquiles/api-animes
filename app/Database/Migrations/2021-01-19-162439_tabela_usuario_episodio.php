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
			],
			'episodio_id' => [
				'type' => 'INT',
				'null' => false,
			],
			'usuario_id' => [
				'type' => 'INT',
				'null' => false,
			],
			'assistido' => [
				'type' => 'boolean',
				'default' => 'f',
				'null' => false,
			],
			'created_at' => [
				'type' => 'timestamp',
				'default' => 'CURRENT_TIMESTAMP',
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('usuarioEpisodio');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('usuarioEpisodio');
	}
}
