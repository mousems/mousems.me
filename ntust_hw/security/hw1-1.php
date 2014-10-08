<?php

echo Go($_GET['plain'] , $_GET['key']);


function Go($plain , $key){

	if (preg_match("/^[A-Z]+$/", $plain)!=1) {
		return "Error.";
	}elseif(preg_match("/^[\d]+$/", $key)!=1) {
		return "Error.";
	}

	echo "Input:".$plain."<br />";

	preg_match_all("/([A-Z])/", $plain, $matches);
	// make $plain break into piceses

	echo "Output:";
	foreach ($matches[1] as $key1 => $value) {
		$tmp = ord($value)+$key;
		if ($tmp>ord("Z")) {
			$tmp = $tmp - 26;
		}
		$tmp = chr($tmp);
		echo $tmp;
	}


}


?>