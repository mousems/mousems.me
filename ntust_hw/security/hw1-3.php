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

	$key_arr = array();

	foreach (str_split($key) as $key1 => $value) {
		if (array_search($value ,$key_arr)===FALSE && $value!="j") {
			array_push($key_arr, $value);
		}
	}

	foreach (str_split("abcdefghiklmnopqrstuvwxyz") as $key1 => $value) {
		if (array_search($value, $key_arr)===FALSE) {
			array_push($key_arr, $value);
		}
	}
	
	$key_table = array(
			array($key_arr[0],$key_arr[1],$key_arr[2],$key_arr[3],$key_arr[4]),
			array($key_arr[5],$key_arr[6],$key_arr[7],$key_arr[8],$key_arr[9]),
			array($key_arr[10],$key_arr[11],$key_arr[12],$key_arr[13],$key_arr[14]),
			array($key_arr[15],$key_arr[16],$key_arr[17],$key_arr[18],$key_arr[19]),
			array($key_arr[20],$key_arr[21],$key_arr[22],$key_arr[23],$key_arr[24])
		);

	// (x,y) = (index mod 5 , ((index-x)/ 5) )
	// $key_table[y][x]


	$ciphertext="";
	foreach ($plain_withx as $key1 => $value) {
		$x1 = array_search($value[0], $key_arr) % 5;
		$y1 = (array_search($value[0], $key_arr)-$x1)/ 5;
		$x2 = array_search($value[1], $key_arr) % 5;
		$y2 = (array_search($value[1], $key_arr)-$x1)/ 5;


		$offset = 1;

		if ($x1==$x2 ) {
			$ciphertext .= $key_table[$y1][($x1+$offset) % 5];
			$ciphertext .= $key_table[$y2][($x2+$offset) % 5];
		}elseif($y1==$y2){
			$ciphertext .= $key_table[($y1+$offset) % 5][$x1];
			$ciphertext .= $key_table[($y2+$offset) % 5][$x2];

		}else{

			$ciphertext .= $key_table[$y2][$x1];
			$ciphertext .= $key_table[$y1][$x2];
		}
	}

	echo "Output:".$ciphertext;


}



?>