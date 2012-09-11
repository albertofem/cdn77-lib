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

class CDN
{
	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $alias;

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @var PushZone
	 */
	protected $pushZone;

	/**
	 * @var string
	 */
	protected $nameSlug;

	/**
	 * @param string $alias
	 */
	public function setAlias($alias)
	{
		$this->alias = $alias;
	}

	/**
	 * @return string
	 */
	public function getAlias()
	{
		return $this->alias;
	}

	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param \AFM\Cdn77\PushZone $pushZone
	 */
	public function setPushZone($pushZone)
	{
		$this->pushZone = $pushZone;
	}

	/**
	 * @return \AFM\Cdn77\PushZone
	 */
	public function getPushZone()
	{
		return $this->pushZone;
	}

	/**
	 * @param string $url
	 */
	public function setUrl($url)
	{
		$this->url = $url;
	}

	/**
	 * @return string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	public function setNameSlug($nameSlug)
	{
		$this->nameSlug = $nameSlug;
	}

	public function getNameSlug()
	{
		return $this->nameSlug;
	}
}
