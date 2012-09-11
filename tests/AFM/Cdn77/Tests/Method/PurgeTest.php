<?php

/*
 * This file is part of cdn77-lib
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

namespace AFM\Cdn77\Tests\Method;

use AFM\Cdn77\Method\Purge;
use AFM\Cdn77\CDN;

class PurgeTest extends \PHPUnit_Framework_TestCase
{
	public function testAddFile()
	{
		$purge = new Purge;
		$purge->addFile("/test/file");

		$this->assertContains("/test/file", $purge->getFiles());
	}

	public function testCorrectQueryStringMultipleFiles()
	{
		$cdn = new CDN;
		$cdn->setId(1);

		$method = new Purge;
		$method->setCdn($cdn);

		$method->setLogin('test');
		$method->setPassword('password');

		$method->addFile("/test/file/");
		$method->addFile("/test/file2/new.jpg.mov");

		$actual = $method->getQueryString();
		$expected = "?id=1&login=test&password=password&json=%7B%22purge_paths%22%3A%5B%5B%22%5C%2Ftest%5C%2Ffile%5C%2F%22%2C%22%5C%2Ftest%5C%2Ffile2%5C%2Fnew.jpg.mov%22%5D%5D%7D";

		$this->assertEquals($expected, $actual);
	}
}
