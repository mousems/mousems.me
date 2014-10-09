<?php

echo Go($_GET['plain'] , $_GET['key']);

function Go($plain){

	if (preg_match("/^[a-z]+$/", $plain)!=1) {
		return "Error.";
	}elseif(preg_match("/^[a-z]+$/", $key)!=1) {
		return "Error.";
	}


	echo "Input:".$plain."<br />";

	preg_match_all("/([a-z])/", $plain, $matches_plain);
	preg_match_all("/([a-z])/", $key, $matches_key);
	// make $plain,$key break into piceses




}



?>