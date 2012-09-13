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

abstract class CdnMethod extends AbstractMethod
{
	/**
	 * @var CDN
	 */
	protected $cdn;

	public function __construct()
	{
		$this->params['id'] = "all";
	}

	/**
	 * @param \AFM\Cdn77\CDN $cdn
	 */
	public function setCdn(CDN $cdn)
	{
		$this->cdn = $cdn;
		$this->params['id'] = $cdn->getId();
	}

	/**
	 * @return CDN
	 */
	public function getCdn()
	{
		return $this->cdn;
	}
}
