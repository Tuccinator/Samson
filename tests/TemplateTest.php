<?php
require('../vendor/autoload.php');

use Samson\Template;

class TemplateTest extends PHPUnit_Framework_TestCase
{
	public function testTemplate()
	{
		$user = [
			'username' => 'Nick Tucci',
			'password' => 'password'
		];

		$template = new Template('user.tpl', $user);
	}
}