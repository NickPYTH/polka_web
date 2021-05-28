<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BookClaim extends Migration
{
	public function up()
	{
		if (!$this->db->tableexists('BookClaim'))
        {
            // Setup Keys
            $this->forge->addkey('id', TRUE);

            $this->forge->addfield(array(
                'id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE),
				'id_instance' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'id_reader' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'data' => array('type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE),
				'data_plan' => array('type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE),
				'data_fact' => array('type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE),
            ));
            $this->forge->addForeignKey('id_instance','Instance','id','RESTRICT','RESRICT');
			$this->forge->addForeignKey('id_reader','Reader','id','RESTRICT','RESRICT');
            $this->forge->createtable('BookClaim', TRUE);
        }
	}

	public function down()
	{
		$this->forge->droptable('BookClaim');
	}
}
