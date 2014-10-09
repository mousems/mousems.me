<?php

echo Go($_GET['plain'] , $_GET['key']);

function Go($plain , $key){

	if (preg_match("/^[a-z]+$/", $plain)!=1) {
		return "Error.";
	}elseif(preg_match("/^[a-z]+$/", $key)!=1) {
		return "Error.";
	}


	echo "Input:".$plain."<br />";

	preg_match_all("/([a-z])/", $plain, $matches_plain);
	preg_match_all("/([a-z])/", $key, $matches_key);
	// make $plain,$key break into piceses

	$key_arr1 = array();
	/*
		array(
			char,
			char,
			...
		)

	*/


	foreach ($matches_key[1] as $key1 => $value) {
		//check character repeat
		if (array_search($value, $key_arr1)===FALSE) {
			array_push($key_arr1, $value);
		}
	}

	$plain_withx = array();
	/*
		array(
			array(
				char,
				char
			),
			array(
				char,
				char
			),
			...

		)
	*/


	foreach ($matches_plain[1] as $key1 => $value) {
		if ($key1==0) {
			$plain_str = $value;
		}else{
			if($matches_plain[1][$key1-1]==$value){
				$plain_str .= "x";
			}
			$plain_str .= $value;
		}

	}

	if (strlen($plain_str)%2==1) {
		$plain_str .= "x";
	}



	$tmp = array(); // later overwrite $plain_withx
	preg_match_all("/([a-z]{2})/", $plain_str, $plain_withx);
	foreach ($plain_withx[1] as $key1 => $value) {
		preg_match("/^([a-z])([a-z])$/", $value , $plain_withx[1][$key1]);
		array_push($tmp, array($plain_withx[1][$key1][1] , $plain_withx[1][$key1][2]));
	}

	$plain_withx = $tmp;
	//plain final

	
	print_r($plain_withx);


	echo "Output:";


}



?>