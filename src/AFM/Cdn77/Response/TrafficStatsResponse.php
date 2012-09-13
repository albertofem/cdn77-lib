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

class TrafficStatsResponse extends Response
{
	protected $last24Hours;

	protected $last48Hours;

	protected $last30days;

	protected $currentMonth;

	protected $lastMonth;

	protected $beforeLastMonth;

	public function setBeforeLastMonth($beforeLastMonth)
	{
		$this->beforeLastMonth = $beforeLastMonth;
	}

	public function getBeforeLastMonth()
	{
		return $this->beforeLastMonth;
	}

	public function setCurrentMonth($currentMonth)
	{
		$this->currentMonth = $currentMonth;
	}

	public function getCurrentMonth()
	{
		return $this->currentMonth;
	}

	public function setLast24Hours($last24Hours)
	{
		$this->last24Hours = $last24Hours;
	}

	public function getLast24Hours()
	{
		return $this->last24Hours;
	}

	public function setLast30days($last30days)
	{
		$this->last30days = $last30days;
	}

	public function getLast30days()
	{
		return $this->last30days;
	}

	public function setLast48Hours($last48Hours)
	{
		$this->last48Hours = $last48Hours;
	}

	public function getLast48Hours()
	{
		return $this->last48Hours;
	}

	public function setLastMonth($lastMonth)
	{
		$this->lastMonth = $lastMonth;
	}

	public function getLastMonth()
	{
		return $this->lastMonth;
	}
}
