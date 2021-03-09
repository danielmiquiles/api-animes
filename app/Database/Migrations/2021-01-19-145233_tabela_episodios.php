<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TabelaEpisodios extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
                'type' => 'INT',
            ],
            'numero' => [
                'type' => 'INT',
                'null' => false
            ],
            'nome' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
                'null' => true,
            ],
            'anime_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'assistido' => [
                'type' => 'boolean',
                'null' => false,
                'default' => 'f',
			],
			'updated_at' => [
                'type' => 'timestamp',
                'null' => true,                
            ],
        'created_at timestamp default CURRENT_TIMESTAMP',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('episodio');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('episodio');
	}
}
