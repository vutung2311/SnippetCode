<?php
$a = array(1, 2, array(array(3 => array(4, array(5)))), array(6, 7, 8), array(9));
echo implode(' ', flattenArray($a)) . PHP_EOL;

function flattenArray($arr) {
	$outputArr = array();
	while (!empty($arr)) {
		$e = array_shift($arr);
		if (!is_array($e)) {
			$outputArr[] = $e;
		} else {
			foreach(array_reverse($e) as $se) {
				array_unshift($arr, $se);
			}
		}
	}
	
	return $outputArr;
}
