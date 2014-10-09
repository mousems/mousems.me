<?php
echo Go($_GET['plain'] , $_GET['key']);


function char_to_int($char){

	return ord($char)-ord('a');
}


function int_to_char($inta){

	return chr($inta+ord('a'));
}


function Go($plain , $key){

	if (preg_match("/^[a-z]+$/", $plain)!=1) {
		return "Error.";
	}elseif(preg_match("/^[a-z]+$/", $key)!=1) {
		return "Error.";
	}


	echo "Input:".$plain."<br />";


	$leftcount = strlen($plain) - strlen($key);

	$key .= substr($plain, 0 , $leftcount);

	$ciphertext = "";
	for ($i=0; $i < strlen($plain); $i++) { 

		$int1 = char_to_int(substr($plain, $i ,1));
		$int2 = char_to_int(substr($key , $i , 1)); 

		$ciphertext .= int_to_char( ($int1 ^ $int2)  % 26);
	}



	echo "Output:".$ciphertext;


}



?>