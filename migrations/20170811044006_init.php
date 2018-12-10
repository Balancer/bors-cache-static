<?php

use Phinx\Migration\AbstractMigration;

class Init extends AbstractMigration
{
	public function change()
	{
		// Взять за основу минимальное пересечение всех таблиц AP, AB, PFS, потом — миграции.
		// http://htz.wrk.ru/phpmyadmin/tbl_structure.php?db=AP_CACHE&table=cached_files
		// http://htz.wrk.ru/phpmyadmin/tbl_structure.php?db=AB_CACHE&table=cached_files
		// http://www.forexpf.ru/admin/adminer.php?username=forum&db=BORS_CACHE&table=cached_files

		$table = $this->table('cached_files_ng', ['id' => false, 'primary_key' => 'file'])
			->addColumn('file', 'string')
			->addColumn('original_uri', 'string', ['null' => true])

			->addColumn('create_ts', 'timestamp', ['null' => true, 'default' => NULL])
			->addColumn('expire_ts', 'timestamp', ['null' => true, 'default' => NULL])
			->addColumn('target_modify_ts', 'timestamp', ['null' => true, 'default' => NULL])

			->addColumn('target_class_name', 'string')
			->addColumn('target_id', 'string', ['default' => ''])
			->addColumn('target_page', 'string', ['default' => ''])
			->addColumn('is_recreated', 'boolean', ['default' => false])

			->addIndex(['target_class_name', 'target_object_id', 'target_page'], ['unique' => true])
			->addIndex('original_uri')
			->addIndex('create_ts')
			->addIndex('expire_ts')
			->addIndex('target_modify_ts')

			->create();
	}
}
