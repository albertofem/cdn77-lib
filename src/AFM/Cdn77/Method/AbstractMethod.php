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

use Buzz\Browser;
use AFM\Cdn77\Response\Response;
use AFM\Cdn77\Response\ErrorResponse;

abstract class AbstractMethod
{
	const METHOD_GET = "get";
	const METHOD_POST = "post";

	protected $login;

	protected $password;

	protected $params = array();

	protected $method;

	public function setLogin($login)
	{
		$this->login = $login;
		$this->addParam('login', $login);
	}

	public function getLogin()
	{
		return $this->login;
	}

	public function setPassword($password)
	{
		$this->password = $password;
		$this->addParam('password', $password);
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function getParams()
	{
		return $this->params;
	}

	public function addParam($param, $value)
	{
		$this->params[$param] = $value;
	}

	public function setParams(Array $params)
	{
		$this->params = $params;
	}

	public function getQueryString()
	{
		if(empty($this->params))
			return "";

		return "?" . $this->http_build_str($this->params);
	}

	private function http_build_str($query)
	{
		$query_array = array();
		
		foreach($query as $key => $key_value)
		{
			$query_array[] = $key . '=' . urlencode($key_value);
		}
		
		return implode( '&', $query_array);
	}

	public function execute()
	{
		// construct request
		if($this->getMethod() == self::METHOD_GET)
		{
			$rawResponse = $this->doGetRequest();
		}
		else
		{
			$rawResponse = $this->doPostRequest();
		}

		$arrayData = json_decode($rawResponse, true);

		if(isset($arrayData['error']) && $arrayData['error'] == true)
			return new ErrorResponse;

		$rawResponse = $this->processResponse($rawResponse, $arrayData);

		return $rawResponse;
	}

	public function getMethod()
	{
		return $this->method;
	}

	public function setMethod($method)
	{
		$this->method = $method;
	}

	private function doGetRequest()
	{
		$browser = new Browser;
		$response = $browser->get($this->getRequestUri() . $this->getQueryString());

		return $response;
	}

	private function doPostRequest()
	{
		$browser = new Browser;
		$response = $browser->post($this->getRequestUri(), array(), $this->getQueryString());

		return $response;
	}

	protected function processResponse($rawResponse, $arrayData)
	{
		$response = new Response($rawResponse);
		$response->setArrayData($arrayData);

		return $response;
	}

	abstract public function getRequestUri();
}
