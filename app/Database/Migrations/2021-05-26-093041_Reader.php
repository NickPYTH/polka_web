<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reader extends Migration
{
	public function up(){
		if (!$this->db->tableexists('Reader'))
			{
				// Setup Keys
				$this->forge->addkey('id', TRUE);

				$this->forge->addfield(array(
					'id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE),
					'FIO' => array('type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE),
				));

				$this->forge->createtable('Reader', TRUE);
			}
	}

	public function down()
	{
		$this->forge->droptable('Reader');
	}
}
