<?php defined('BASEPATH') || exit('No direct script access allowed');

class Migration_adding_control_fields extends Migration
{
	/**
	 * @var string The name of the database table
	 */
	private $table_name = 'api_keys';

	/**
	 * @var array The table's fields
	 */
	private $fields = array(
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
        $this->dbforge->add_column($this->table_name, $this->fields);
    }

	/**
	 * Uninstall this version
	 *
	 * @return void
	 */
	public function down()
    {
        foreach ($this->fields as $column_name => $column_def)
        {
            $this->dbforge->drop_column($this->table_name, $column_name);
        }
    }
}