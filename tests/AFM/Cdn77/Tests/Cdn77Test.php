<?php

/*
 * This file is part of cdn77-lib
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

namespace AFM\Cdn77\Tests;

use AFM\Cdn77\Cdn77;
use AFM\Cdn77\CDN;

class Cdn77Test extends \PHPUnit_Framework_TestCase
{
	public function testAddCdn()
	{
		$cdn77 = new Cdn77;
		$cdn = new CDN;
		$cdn->setNameSlug("test_cdn");

		$cdn77->addCdn($cdn);

		$this->assertTrue($cdn77->getCdn("test_cdn") === $cdn);
	}

	/**
 	 * @expectedException \InvalidArgumentException
	 */
	public function testCdnAlreadyRegistered()
	{
		$cdn77 = new Cdn77;
		$cdn = new CDN;
		$cdn->setNameSlug("test_cdn");

		$cdn77->addCdn($cdn);
		$cdn77->addCdn($cdn);
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testRegisterCdnWithInvalidName()
	{
		$cdn77 = new Cdn77;
		$cdn = new CDN;

		$cdn77->addCdn($cdn);
	}
}
