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

class AbstractMethodTest extends \PHPUnit_Framework_TestCase
{
	public function testGetQueryStringParams()
	{
		$method = new Method;

		$params = array('param' => 'value', 'param2' => 'value2');

		$method->setParams($params);

		$actual = $method->getQueryString();
		$expected = "?param=value&param2=value2";

		$this->assertEquals($expected, $actual);
	}
}

class Method extends AbstractMethod
{
	public function getRequestUri()
	{
		return 'http://google.com';
	}
}