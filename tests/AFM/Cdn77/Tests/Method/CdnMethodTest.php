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

use AFM\Cdn77\Method\AbstractMethod;
use AFM\Cdn77\Method\CdnMethod;
use AFM\Cdn77\CDN;

class CdnMethodTest extends \PHPUnit_Framework_TestCase
{
	public function testCorrectQueryStringAllCdns()
	{
		$method = new CdnTest;

		$actual = $method->getQueryString();
		$expected = "?id=all";

		$this->assertEquals($expected, $actual);
	}

	public function testCorrectQueryStringSingleCdn()
	{
		$method = new CdnTest;

		$cdn = new CDN;
		$cdn->setId(1);

		$method->setCdn($cdn);

		$actual = $method->getQueryString();
		$expected = "?id=1";

		$this->assertEquals($expected, $actual);
	}
}

class CdnTest extends CdnMethod
{
	public function getRequestUri()
	{
		return '';
	}
}