<?php
/**
 * Created by PhpStorm.
 * User: ashima
 * Date: 30/1/17
 * Time: 12:34 PM
 */

namespace MyApp\helpers;

class URL {

	public function sluggify($string, $separator = '-', $maxLength = 96)
	{
		$title = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
		$title = preg_replace("%[^-/+|\w ]%", '', $title);
		$title = strtolower(trim(substr($title, 0, $maxLength), '-'));
		$title = preg_replace("/[\/_|+ -]+/", $separator, $title);

		return $title;
	}

}