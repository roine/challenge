<?php

class Response{
	// function respA
}

if(strtolower($_POST['a']) === 'ping'){
	$_POST['q'] = "Ok";
}
print_r($_POST);
?>