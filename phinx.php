<?php

require __DIR__.'/../../../vendor/autoload.php';

bors::init_new();

require_once __DIR__.'/../../../config-host.php';

$db = \B2\Cfg::get('bors.common_cache.db', \B2\Cfg::get('cache_database'));

if(!$db)
	throw new \Exception("Not defined BORS_CACHE database");

return [
	'paths' => [
		'migrations' => __DIR__.'/migrations'
	],

	'environments' => [
		'default_database' => 'main',
		'default_migration_table' => 'phinxlog_bors_cache_static',
		'main' => [
			// BORS_HOST = common host database for all projects.
			'name' => $db,
			'connection' => driver_mysql::factory($db)->connection(),
		]
	]
];
