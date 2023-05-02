<!DOCTYPE html>
<head>
    <title>Usuarios | GET ID</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
<?php require("../../include/menu2.php"); ?>

<hgroup>
    <h1>Ejecutando Microservicio Phyton V2</h1>
    <h2>Verbo: Get Recurso: /dni</h2>
</hgroup>

<?php
require("../../vendor/autoload.php");
$client = new GuzzleHttp\Client();
$uri = "http://python:4000/dni";
$response = $client->request('GET', $uri ,[
    'exceptions' => false, // Para que no muestre Excepciones
    'headers' => [
        'Accept'     => 'application/json'
    ]
]);
$respuesta = $response->getStatusCode(); // devuelve el Código de estado HTTP


if ($respuesta == 404){
    echo "<h2>Servicio No disponible</h2>";
} else {
    $data = $response->getBody(); // Devuelve el contenido de la respuesta.
}

echo $data;
?>

<?php require("../../include/pie.php"); ?>
</body>
</html>
