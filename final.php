<?php

$x = "";
$y = "";
$z = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	
	$x = floatval($_POST["x"]);
	$y = floatval($_POST["y"]);
	$z = floatval($_POST["z"]);
	
	$ary = array("x"=>$x, "y"=>$y, "z"=>$z);
	$json = json_encode($ary);
	
	//This snipit of code was provided by Postman
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://us-east1-primeval-pixel-286718.cloudfunctions.net/function-final',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => $json,
		CURLOPT_HTTPHEADER => array(
		'Content-Type: application/json'
		),
	));

	$response = curl_exec($curl);

	curl_close($curl);

	
	$answer = "The third side of the Triangle is: ". $response;
	
}

?>

<!doctype html>
<html>

	<head>
		<title>Forrester Final</title>
		<meta charset="utf-8">
	</head>
	
	<body>
	
		<h1>This finds the third side of a triangle given two sides and an angle</h1>
	
		<form action="final.php" method="post">
			<label for="x"> Side 1: </label>
			<input type="number" step=".01" id="x" name="x">
			<br>
			<label for="y"> Side 2: </label>
			<input type="number" step=".01" id="y" name="y">
			<br>
			<label for="z"> Angle: </label>
			<input type="number" step=".01" id="z" min="0" max="360" name="z">
			<br>
			<input type="submit" value="Go">
		</form>
		
		<p id="answer"><?php echo $answer; ?> </p>
		
	</body>

</html>