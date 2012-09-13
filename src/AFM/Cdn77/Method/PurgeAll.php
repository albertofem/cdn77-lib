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

class PurgeAll extends CdnMethod
{
	const REQUEST_URI = "https://client.cdn77.com/api/purge-all";

	public function getRequestUri()
	{
		return self::REQUEST_URI;
	}
}
