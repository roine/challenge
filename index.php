<?php

class Response{
	// function respA
}
print_r($_POST);
if(strtolower($_POST['a']) === 'ping'){
	$_POST['q'] = "Ok";
}
?>