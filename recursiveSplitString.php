<?php
function splitString($string, $dictionary) {
  $stringLength = strlen($string);
	for($i = 1; $i <= $stringLength; $i++) {
		$possibleCorrectFirstWord = substr($string, 0, $i);
		if (!in_array($possibleCorrectFirstWord, $dictionary)) {
			continue;
		}
		$possibleSolution = array_merge(
			[$possibleCorrectFirstWord], 
			splitString(substr($string, $i), $dictionary)
		);
		if (implode('', $possibleSolution) == $string) {
			return $possibleSolution;
		}
	}
	return [];
}
$dictionary = ['hell', 'hello', 'wo', 'world', 'to', 'today', 'is', 'beautiful'];
$inputString = 'helloworldtodayisbeautiful';
$outputArray = splitString($inputString, $dictionary);
echo implode(' ', $outputArray);
?>
