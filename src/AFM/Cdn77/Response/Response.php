<?php

/*
 * This file is part of cdn77-lib
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

namespace AFM\Cdn77\Response;

class Response
{
	protected $rawData;

	protected $arrayData = null;

	public function __construct($rawData = '')
	{
		$this->rawData = $rawData;
	}

	public function setRawData($rawData)
	{
		$this->rawData = $rawData;
	}

	public function getRawData()
	{
		return $this->rawData;
	}

	public function toArray()
	{
		if(is_null($this->arrayData))
			$this->arrayData = json_decode($this->rawData, true);

		return $this->arrayData;
	}

	public function setArrayData($arrayData)
	{
		$this->arrayData = $arrayData;
	}

	public function getArrayData()
	{
		return $this->arrayData;
	}
}
