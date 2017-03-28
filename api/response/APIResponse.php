<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 31/1/17
 * Time: 2:34 PM
 */

namespace MyApp\response;

use Nocarrier\Hal;

class APIResponse extends Hal {

	/**
	 * @param null $uri
	 * @param null $data
	 */
	public function __construct($uri = null, $data = null) {
		$selfLink = $uri;

		if (is_array($uri)) {
			$selfLink = $uri['self']['href'];
		}

		if (is_null($data) || empty($data)) {
			parent::__construct($selfLink);
		}
		else {
			parent::__construct($selfLink, $data);
		}

		if (is_array($uri)) {
			foreach ($uri as $rel => $href) {
				if ($rel != 'self') {
					$this->addLink($rel, $href['href'], ['method' => $href['method']]);
				}
			}
		}
	}

	/**
	 * @param array $data
	 *
	 * Add data to existing data array (will actually perform a merge)
	 */
	public function addData(Array $data = null) {
		$this->data = array_merge($this->data, $data);
	}
}