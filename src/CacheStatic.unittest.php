<?php

class TestObj extends \B2\Obj
{
	use \B2\CacheStatic;
}

class CacheStaticTest extends \PHPUnit\Framework\TestCase
{
	public function test_static()
	{
		$page = \B2\CacheStatic\TestObject::load(NULL);
		echo $page->content();

//		$this->assertEquals('<ul type="A"><li>Test</li></ul>', str_replace("\n", "", ("[ul=A][li]Test[/li][/ul]")));
	}
}
