<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Book extends Migration
{
	public function up()
	{
        if (!$this->db->tableexists('Books'))
        {
            // Setup Keys
            $this->forge->addkey('id', TRUE);

            $this->forge->addfield(array(
                'id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE),
                'Name' => array('type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE),
				'Author' => array('type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE),
            ));

            $this->forge->createtable('Books', TRUE);
        }
	}

	public function down()
	{
		$this->forge->droptable('Books');
	}
}
