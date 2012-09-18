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

use AFM\Cdn77\Method\CdnDetail;
use AFM\Cdn77\CDN;

class CdnDetailTest extends \PHPUnit_Framework_TestCase
{
	public function testSingleCdnData()
	{
		$rawDataSingle = '{"status":"ok","description":[{"id":"54536","origin_url":"Push_Zone","cname":"cdn.cdnhub.com","cache_expiry":2880,"url_signing_on":false,"url_signing_key":""}]}';

		$method = new CdnDetail;
		$method->setRawResponse($rawDataSingle);

		$response = $method->execute();

		$this->assertCdnResponse($response, '54536');
	}

	private function assertCdnResponse(CDN $cdn, $expectedId)
	{
		$this->assertTrue($cdn instanceof CDN);
		$this->assertEquals("cdn.cdnhub.com", $cdn->getUrl());
		$this->assertEquals(2880, $cdn->getCacheExpiration());
		$this->assertEquals($expectedId, $cdn->getId());
	}

	public function testMultipleCdnData()
	{
		$rawData = '{"status":"ok","description":[{"id":"54536","origin_url":"Push_Zone","cname":"cdn.cdnhub.com","cache_expiry":2880,"url_signing_on":false,"url_signing_key":""},{"id":"54537","origin_url":"Push_Zone","cname":"cdn.cdnhub.com","cache_expiry":2880,"url_signing_on":false,"url_signing_key":""}]}';

		$method = new CdnDetail;
		$method->setRawResponse($rawData);

		$response = $method->execute();

		$this->assertArrayHasKey('54536', $response);
		$this->assertArrayHasKey('54537', $response);
		$this->assertCount(2, $response);

		foreach($response as $id => $cdn)
		{
			$this->assertCdnResponse($cdn, $id);
		}
	}
}
