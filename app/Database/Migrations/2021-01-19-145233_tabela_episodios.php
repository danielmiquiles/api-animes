<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TabelaEpisodios extends Migration
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
            'numero' => [
                'type' => 'INT',
                'constraint' => 4,
                'null' => false
            ],
            'nome' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
                'null' => true,
            ],
            'anime_id' => [
                'type' => 'INT',
                'constraint' => 7,
                'null' => false,
            ],
            'assistido' => [
                'type' => 'bit',
                'null' => false,
                'default' => 0,
			],
			'updated_at' => [
                'type' => 'datetime',
                'null' => true,                
            ],
        'created_at datetime default current_timestamp',
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
