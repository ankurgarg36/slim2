<?php
/**
 * Created by PhpStorm.
 * User: Ankur Garg
 * Date: 9/2/17
 * Time: 5:58 PM
 */

namespace MyApp\helpers;

use Symfony\Component\Validator\ConstraintViolation;

/**
 * Class PitchVisionUtils
 * @package MyApp\helpers
 */
class PitchVisionUtils {

	/**
	 * @param object $constraintViolationList
	 *
	 * it will return the error associated with corrosponding ActiveRecord Class
	 *
	 * @return array|null
	 */
	public static function getActiveRecordErrors($constraintViolationList) {
		/** \Symfony\Component\Validator\ConstraintViolationList $constraintViolationList */
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
	public static function getFirstError($errors) {

		if (!is_array($errors) && count($errors) == 0) {
			return null;
		}
		reset($errors);
		$keys = array_keys($errors);
		$attrName = $keys[0];
		if (!isset($attrName) || !isset($errors[$attrName])) {
			return null;
		}
		$firstError = $errors[$attrName];

		if (!is_array($firstError) && !empty($firstError)) {
			return sprintf("%s=>%s", $attrName, $firstError);
		}

		return $firstError[0];
	}

	public static function arrayMap($arrays = [], $key1, $key2) {
		$result = [];
		foreach ($arrays as $array) {
			if (!array_key_exists($key1, $array) || !array_key_exists($key2, $array)) {
				continue;
			}
			$result[$array[$key1]] = $array[$key2];
		}

		return $result;
	}

	public static function arrayRecursiveDiff($aArray1, $aArray2) {
		$aReturn = [];

		foreach ($aArray1 as $mKey => $mValue) {
			if (array_key_exists($mKey, $aArray2)) {
				if (is_array($mValue)) {
					$aRecursiveDiff = self::arrayRecursiveDiff($mValue, $aArray2[$mKey]);
					if (count($aRecursiveDiff)) {
						$aReturn[$mKey] = $aRecursiveDiff;
					}
				}
				else {
					if ($mValue != $aArray2[$mKey]) {
						$aReturn[$mKey] = $mValue;
					}
				}
			}
			else {
				$aReturn[$mKey] = $mValue;
			}
		}

		return $aReturn;
	}

	public static function objectToArray($object) {
		if (!is_object($object) && !is_array($object)) {
			return $object;
		}

		return array_map('self::objectToArray', (array)$object);
	}
}