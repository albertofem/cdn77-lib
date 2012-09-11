<?php

/*
 * This file is part of cdn77-lib
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

namespace AFM\Cdn77;

class Cdn77
{
	protected $cdns = array();

	public function addCdn(CDN $cdn)
	{
		$name = $cdn->getNameSlug();

		if(empty($name))
			throw new \InvalidArgumentException("The CDN you're trying to register doesn't have a name. Use 'setNameSlug' method");

		if(isset($this->cdns[$name]))
			throw new \InvalidArgumentException("Trying to register two CDNs with the same name: '".$name. "'");

		$this->cdns[$name] = $cdn;
	}

	public function getCdn($name)
	{
		if(!isset($this->cdns[$name]))
			throw new \InvalidArgumentException("The CDN '" .$name. "' does not exists or is not registered");

		return $this->cdns[$name];
	}
}
