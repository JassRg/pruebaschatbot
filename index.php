<?php
$method = $_SERVER['REQUEST_METHOD'];
echo "Hola";
if($method = "POST"){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

	switch ($text) {
		case 'hola':
			speech = "Hola buenas tardes";
			break;
		case 'adios':
			speech = "Gracias por hablar con el chatbot";
			break;
		case 'info':
			speech = "Por el momento no hay opciones";
			break;

		default:
			speech = "Perdon, podrías repetirlo?";
			break;
	}

	$response = new \stdClass();
	$response-> speech = "";
	$response -> displayText = "";
	$response -> source = "webhook";
	echo json_encode($response);


}
else{
	echo "Method not allowed";
}

?>
