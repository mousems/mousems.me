<?php

echo Go($_GET['plain']);

function Go($plain){

	if (preg_match("/^[a-z]+$/", $plain)!=1) {
		return "Error.";
	}

	$mapping[1]=array("a","b","c","D","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
	$mapping[2]=array("W","Z","G","R","L","O","U","A","Y","M","T","H","X","C","S","E","P","W","J","B","I","F","Q","V","K","D");


	echo "Input:".$plain."<br />";

	preg_match_all("/([a-z])/", $plain, $matches);
	// make $plain break into piceses


	echo "Output:";
	foreach ($matches[1] as $key1 => $value) {
		$where = array_search($value , $mapping[1]);
		echo $mapping[2][$where];
	}


}



?>