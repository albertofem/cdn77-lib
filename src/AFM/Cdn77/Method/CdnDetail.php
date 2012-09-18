<?php

/*
 * This file is part of cdn77-lib
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

namespace AFM\Cdn77\Method;

use AFM\Cdn77\CDN;
use AFM\Cdn77\Response\Response;

class CdnDetail extends CdnMethod
{
	const REQUEST_URI = "https://client.cdn77.com/api/cdn-detail";

	public function __construct(CDN $cdn = null)
	{
		if(!is_null($cdn))
			$this->setCdn($cdn);
	}

	public function getRequestUri()
	{
		return self::REQUEST_URI;
	}

	public function execute()
	{
		$response = parent::execute();

		if($response instanceof Response)
		{
			return $this->processCdnResponse($response->getArrayData());
		}

		return $response;
	}

	private function processCdnResponse(Array $cdnData)
	{
		$cdnData = $cdnData['description'];

		if(count($cdnData) > 1)
		{
			$cdns = array();

			// multiple CDN
			foreach($cdnData as $cdn)
			{
				$cdns[$cdn['id']] = $this->createCdnFromData($cdn);
			}

			return $cdns;
		}

		return $this->createCdnFromData($cdnData[0]);
	}

	private function createCdnFromData($cdnData)
	{
		$cdn = new CDN;

		$cdn->setUrl($cdnData['cname']);
		$cdn->setId($cdnData['id']);
		$cdn->setCacheExpiration($cdnData['cache_expiry']);

		return $cdn;
	}
}
