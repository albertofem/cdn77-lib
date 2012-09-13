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

use AFM\Cdn77\Method\PurgeAll;
use AFM\Cdn77\CDN;

class PurgeAllTest extends \PHPUnit_Framework_TestCase
{
	public function testCorrectQueryString()
	{
		$cdn = new CDN;
		$cdn->setId(1);

		$method = new PurgeAll;
		$method->setCdn($cdn);

		$method->setLogin('test');
		$method->setPassword('password');

		$actual = $method->getQueryString();
		$expected = "?id=1&login=test&password=password";

		$this->assertEquals($expected, $actual);
	}
}
