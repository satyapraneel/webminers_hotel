<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Custom_Settings extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			),
			'custom_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => TRUE,
			),
			'custom_value' => array(
				'type' => 'TEXT',
				'null' => TRUE,
			),
			'status' => array(
				'type' => 'INT',
				'constraint' => 2,
				'null' => TRUE,
			),
			'created_at' => array(
				'type' => 'DATETIME',
				'null' => TRUE,
			),
			'updated_at' => array(
				'type' => 'DATETIME',
				'null' => TRUE,
			),

		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('custom_settings');
	}

	public function down() {
		$this->dbforge->drop_table('custom_settings');
	}
}