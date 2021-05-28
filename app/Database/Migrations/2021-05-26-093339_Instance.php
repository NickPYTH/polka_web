<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Instance extends Migration
{
	public function up()
	{
		if (!$this->db->tableexists('Instance'))
        {
            // Setup Keys
            $this->forge->addkey('id', TRUE);

            $this->forge->addfield(array(
                'id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE),
				'id_book' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'wear_coefficient' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'default' => 1),
            ));
            $this->forge->addForeignKey('id_book','Books','id','RESTRICT','RESRICT');
            $this->forge->createtable('Instance', TRUE);
        }
	}

	public function down()
	{
		$this->forge->droptable('Instance');
	}
}
