<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
{
	public function up()
	{
		if (!$this->db->tableexists('Order'))
        {
            // Setup Keys
            $this->forge->addkey('id', TRUE);

            $this->forge->addfield(array(
                'id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE),
				'id_book' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
            ));
            $this->forge->addForeignKey('id_book','Books','id','RESTRICT','RESRICT');
            $this->forge->createtable('Order', TRUE);
        }
	}

	public function down()
	{
		$this->forge->droptable('Order');
	}
}
