<?php

namespace B2;

class CacheStatic extends \bors_cache_static
{
	function db_name() { return \B2\Cfg::get('bors.common_cache.db', \B2\Cfg::get('cache_database')); }
	function table_name() { return 'cached_files_ng'; }

	function ignore_on_new_instance() { return true; }

	function table_fields()
	{
		return array(
			'id' => 'file',
			'original_uri',

			'target_class_name',
			'target_id',
			'target_page',

			'recreate' => 'is_recreate',

			'create_time' => ['name' => 'UNIX_TIMESTAMP(`create_ts`)'],
			'expire_time' => ['name' => 'UNIX_TIMESTAMP(`expire_ts`)'],
			'last_compile' => ['name' => 'UNIX_TIMESTAMP(`target_modify_ts`)'],
		);
	}
}
