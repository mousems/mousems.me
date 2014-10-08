<?php

echo Go($_GET['plain'] , $_GET['key']);


function Go($plain , $key){

	if (preg_match("/[A-Z]+/", $plain)!=1) {
		return "Error.";
	}elseif(preg_match("/[\d]+/", $key)!=1) {
		return "Error.";
	}


}


?>