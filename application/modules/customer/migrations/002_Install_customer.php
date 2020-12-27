<?php defined('BASEPATH') || exit('No direct script access allowed');

class Migration_Install_customer extends Migration
{
	/**
	 * @var string The name of the database table
	 */
	private $table_name = 'customer';

	/**
	 * @var array The table's fields
	 */
	private $fields = array(
		'id' => array(
			'type'       => 'INT',
			'constraint' => 11,
			'auto_increment' => true,
		),
        'code' => array(
            'type'       => 'VARCHAR',
            'constraint' => 20,
            'null'       => false,
        ),
        'name' => array(
            'type'       => 'VARCHAR',
            'constraint' => 150,
            'null'       => false,
        ),
        'phone' => array(
            'type'       => 'VARCHAR',
            'constraint' => 40,
            'null'       => false,
        ),
        'email' => array(
            'type'       => 'VARCHAR',
            'constraint' => 40,
            'null'       => true,
        ),
        'address' => array(
            'type'       => 'VARCHAR',
            'constraint' => 250,
            'null'       => true,
        ),
        'deleted' => array(
            'type'       => 'TINYINT',
            'constraint' => 1,
            'default'    => '0',
        ),
        'deleted_by' => array(
            'type'       => 'BIGINT',
            'constraint' => 20,
            'null'       => true,
        ),
        'created_on' => array(
            'type'       => 'datetime',
            'default'    => '2000-01-01 00:00:00',
        ),
        'created_by' => array(
            'type'       => 'BIGINT',
            'constraint' => 20,
            'null'       => false,
        ),
        'modified_on' => array(
            'type'       => 'datetime',
            'default'    => '2000-01-01 00:00:00',
        ),
        'modified_by' => array(
            'type'       => 'BIGINT',
            'constraint' => 20,
            'null'       => true,
        ),
	);

	/**
	 * Install this version
	 *
	 * @return void
	 */
	public function up()
	{
		$this->dbforge->add_field($this->fields);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table($this->table_name);
	}

	/**
	 * Uninstall this version
	 *
	 * @return void
	 */
	public function down()
	{
		$this->dbforge->drop_table($this->table_name);
	}
}