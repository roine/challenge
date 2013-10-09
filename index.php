<?php

class Response{

	private static $information = array(
	'Ping' => 'Ok',
	'Email Address' => 'demonj92@gmail.com',
	'Name' => 'Jonathan de Montalembert',
	'Resume' => 'https://www.dropbox.com/s/znr4nguuvn6y04s/jonathan-de_montalembert-web_developer.pdf'
	'Source' => 'view-source:http://demo.jdemont.com/'
	);
	
	public static function handler($a){
		switch ($a){
			case 'Ping':
			case 'Email Address':
			case 'Name':
			case 'Resume':
			case 'Source':
			$response = self::$information[$a];
			break;
			case 'Question':
			$response = self::resolve_question();
			break;
			default:
			$response = "Hey! There ain't no <b>$a</b> in the job description!";
		}

		echo $response;
	}

	private static function resolve_question(){
		$q = $_POST['q'];

		preg_match_all('!-?\d+!', $q, $numbers);
		preg_match('/\s[+*\/-]\s/', $q, $operand);

		$number1 = (int)$numbers[0][0];
		$number2 = (int)$numbers[0][1];
		// trim the whitespace
		$operand = trim($operand[0], " ");

		switch($operand){
			case '+':
			return $number1 + $number2;
			break;
			case '-':
			return $number1 - $number2;
			break;
			case '/':
			return $number1 / $number2;
			break;
			case '*':
			return $number1 * $number2;
			break;
			default:
			return "Something went wrong!".$operand[0];
		}
	}


}

Response::handler($_POST['a']);
?>