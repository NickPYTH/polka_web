<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BookClaim extends Migration
{
	public function up()
	{
		if (!$this->db->tableexists('BooksClaim'))
        {
            // Setup Keys
            $this->forge->addkey('id', TRUE);

            $this->forge->addfield(array(
                'id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE),
				'orderGroupId' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'clientEmail' => array('type' => 'VARCHAR', 'null' => FALSE),
				'price' => array('type' => 'INT', 'null' => FALSE),
            ));
            $this->forge->addForeignKey('orderGroupId','Order','id','RESTRICT','RESRICT');
            $this->forge->createtable('BooksClaim', TRUE);
        }
	}

	public function down()
	{
		$this->forge->droptable('BooksClaim');
	}
}
