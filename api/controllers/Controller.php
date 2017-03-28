<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 23/1/17
 * Time: 2:43 PM
 */

namespace MyApp\controllers;

use DavidePastore\Slim\Validation\Validation;
use MyApp\helpers\PitchVisionUtils;
use MyApp\response\APIResponse;
use MyApp\Slim;
use Symfony\Component\Config\Definition\Exception\Exception;

abstract class Controller {

	const API_RESPOND_AS_JSON = 0;
	const API_RESPOND_AS_XML = 1;

	protected $app;
	protected $response;
	protected $respondAs = self::API_RESPOND_AS_JSON;

	private $_httpStatus;

	function __construct(Slim $app) {
		$this->app = $app;
		$this->routes();
		// instantiate a default response object
		$this->response = new APIResponse();
	}

	abstract protected function routes();

	/**
	 * @param       $rules
	 * @param array $params
	 *
	 * @return \Closure
	 */
	public function validate($rules,$params=[]){
		return function() use($rules){
			$this->_validate($rules);
		};
	}

	/**
	 * @param $rules
	 *
	 * @throws \Exception
	 */
	public function _validate($rules) {
		if ($this->app->request->isPost()) {
			$data =$this->app->request->post();
		}elseif($this->app->request->isPut()){
			$data =$this->app->request->put();
		}elseif($this->app->request->isDelete()){
			$data =$this->app->request->delete();
		}else{
			$data =$this->app->router->getCurrentRoute()->getParams();
		}
		$validator = new Validation($rules);
		if($validator->_validate($data)){
			throw new \Exception(PitchVisionUtils::getFirstError($validator->getErrors()));
		}
	}

	/**
	 * @param \MyApp\response\APIResponse|null $response
	 * @param bool|false                       $noExtraData
	 */
	public function respond(APIResponse $response = null, $noExtraData = false){

		if ($response == null) {
			$response = $this->response;
		}

		if ($response && !$response instanceof APIResponse) {
			throw new Exception('Response body should be an object of type Hal');
		}

		$this->app->response->setStatus($this->_httpStatus);

		switch ($this->respondAs) {
			case self::API_RESPOND_AS_JSON:
				$this->app->response->headers->set('Content-Type', 'application/json');
				$this->app->response->setBody($response->asJson());
				break;

			case self::API_RESPOND_AS_XML:
				$this->app->response->headers->set('Content-Type', 'application/xml');
				$this->app->response->setBody($response->asXml());
				break;
		}
	}

	/**
	 * @param int $status
	 */
	protected function setHttpStatus($status = 200) {
		$this->_httpStatus = $status;
	}
}