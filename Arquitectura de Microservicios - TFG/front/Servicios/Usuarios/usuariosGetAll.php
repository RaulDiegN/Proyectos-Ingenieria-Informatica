<!DOCTYPE html>
<head>
    <title>Usuarios GET ALL</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
<?php require("../../include/menu2.php"); ?>

<hgroup>
    <h1>Ejecutando Microservicio Usuario</h1>
    <h2>Verbo: Get Recurso: /usuarios</h2>
</hgroup>
<?php
require("../../vendor/autoload.php");
//$data = json_decode( file_get_contents('http://usuarios-jdbc:8081/usuarios'), true );
// $urlKubernetes = "http://usuarios-jdbc:8081/usuarios";
$url = "http://usuario-jdbc:8080/usuarios";
$client = new GuzzleHttp\Client();
$response = $client->request('GET', $url, [
    'exceptions' => false, // Para que no muestre Excepciones
    'headers' => [
        'Accept' => 'application/json'
    ]
]);
$response->getStatusCode(); // devuelve el Código de estado HTTP
$body = $response->getBody(); // Devuelve el contenido de la respuesta.

$array = json_decode($body, true);

foreach ($array as $value) {
    echo "ID Usuario= " . $value['id_user'] . "\n";
    echo "Edad= " . $value['edad'] . "\n";
    echo "DNI= " . $value['dni'] . "\n";
    echo "Nombre= " . $value['name'] . "\n";
    echo "<br>";
}

?>
<?php require("../../include/pie.php"); ?>
</body>
</html>
