<?php defined('BASEPATH') || exit('No direct script access allowed');

class Migration_adding_application_field extends Migration
{
	/**
	 * @var string The name of the database table
	 */
	private $table_name = 'api_keys';

	/**
	 * @var array The table's fields
	 */
	private $fields = array(
        'application' => array(
            'type'       => 'VARCHAR',
            'constraint' => 50, 
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