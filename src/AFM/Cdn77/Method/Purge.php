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
	const REQUEST_URI = "https://client.cdn77.com/api/purge";

	/**
	 * @var array
	 */
	protected $files = array();

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

	protected function processResponse($rawResponse)
	{

	}

	public function getRequestUri()
	{
		return self::REQUEST_URI;
	}
}
