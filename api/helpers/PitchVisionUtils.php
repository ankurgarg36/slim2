<?php
/**
 * Created by PhpStorm.
 * User: Ankur Garg
 * Date: 9/2/17
 * Time: 5:58 PM
 */

namespace MyApp\helpers;

use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;

/**
 * Class PitchVisionUtils
 * @package MyApp\helpers
 */
class PitchVisionUtils {

	/**
	 * @param \Symfony\Component\Validator\ConstraintViolationList $constraintViolationList
	 *
	 * it will return the error associated with corrosponding ActiveRecord Class
	 * @return array|null
	 */
	public static function getActiveRecordErrors(ConstraintViolationList $constraintViolationList) {
		if (empty($constraintViolationList)) {
			return null;
		}

		$error = [];
		/** @var ConstraintViolation $failure */
		foreach ($constraintViolationList as $failure) {
			$error[$failure->getPropertyPath()] = $failure->getMessage();
		}

		return $error;
	}

	/**
	 * @param $errors
	 *
	 * @return null
	 */
	public static function getFirstError($errors){

		if(!is_array($errors) && count($errors)==0){
			return null;
		}
		reset($errors);
		$keys = array_keys($errors);
		$attrName = $keys[0];
		if(!isset($attrName) || !isset($errors[$attrName])){
			return null;
		}
		$firstError = $errors[$attrName];
		if(count($firstError)==0){
			return null;
		}

		return $firstError[0];

	}

	public static function arrayMap($arrays=[],$key1,$key2) {
		$result = [];
		foreach ($arrays as $array) {
			if(!array_key_exists($key1,$array) || !array_key_exists($key2,$array)){
				continue;
			}
			$result[$array[$key1]] = $array[$key2];
		}

		return $result;
	}
}