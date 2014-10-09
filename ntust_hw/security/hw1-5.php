<?php
echo Go($_GET['plain'] , $_GET['key']);


function Go($plain , $key){

	if (preg_match("/^[a-z]+$/", $plain)!=1) {
		return "Error.";
	}elseif(preg_match("/^[\d]+$/", $key)!=1) {
		return "Error.";
	}


	echo "Input:".$plain."<br />";


	$column_count = strlen($key);
	$cipher_arr = array();
	$ciphertext = "";

	for ($i=0; $i < strlen($key); $i++) { 
		$key_value=substr($key, $i ,1);
		$tmp = "";
		for ($j=$i; $j <= strlen($plain); $j+=$column_count) { 
			$tmp .= substr($plain, $j , 1);
		}

		$cipher_arr[$key_value] = $tmp;

	}

	for ($i=1; $i <= $column_count ; $i++) { 
		$ciphertext .= $cipher_arr[$i];
	}

	echo "Output:".$ciphertext;


}



?>