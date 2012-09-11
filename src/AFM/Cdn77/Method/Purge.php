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

class Purge extends CdnMethod
{
	/**
	 * @var array
	 */
	protected $files = array();

	/**
	 * @var string
	 */
	protected $requestUri = "https://client.cdn77.com/api/purge";

	public function getMethod()
	{
		return self::METHOD_POST;
	}

	public function addFile($file)
	{
		if(!isset($this->files[$file]))
			$this->files[] = $file;
	}

	public function setFiles(Array $files)
	{
		$this->files = $files;
	}

	public function getFiles()
	{
		return $this->files;
	}

	public function getQueryString()
	{
		$this->params['json'] = json_encode(array('purge_paths' => array($this->files)));

		return parent::getQueryString();
	}

	public function execute()
	{
		if(empty($this->files))
			throw new \InvalidArgumentException("No files to purge");

		return parent::execute();
	}

	public function setRequestUri($requestUri)
	{
		$this->requestUri = $requestUri;
	}

	public function getRequestUri()
	{
		return $this->requestUri;
	}
}
