<?php defined('BASEPATH') || exit('No direct script access allowed');

class Migration_Add_organization extends Migration
{
	/**
	 * @var string The name of the database table
	 */
	private $table_name = 'customer';

	/**
	 * @var array The table's fields
	 */
	private $fields = array(
        'organization' => array(
            'type'       => 'VARCHAR',
            'constraint' => 150,
            'null'       => true,
        )
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