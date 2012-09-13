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

use AFM\Cdn77\Response\TrafficStatsResponse;
use AFM\Cdn77\Response\ErrorResponse;

class TrafficStats extends CdnMethod
{
	const REQUEST_URI = "https://client.cdn77.com/api/traffic";

	public function getRequestUri()
	{
		return self::REQUEST_URI;
	}

	public function execute()
	{
		$rawResponse = parent::execute();

		if($rawResponse instanceof ErrorResponse)
			throw new \ErrorException("There was an error processing this method: ". $rawResponse->getDescription());

		$content = $rawResponse->getArrayData();

		$response = new TrafficStatsResponse;
		$response->setLast24Hours($content['24h']);
		$response->setLast48Hours($content['48h']);
		$response->setLast30days($content['30d']);
		$response->setLastMonth($content['01m']);
		$response->setLast30days($content['02m']);
		$response->setCurrentMonth($content['00m']);

		return $response;
	}
}
