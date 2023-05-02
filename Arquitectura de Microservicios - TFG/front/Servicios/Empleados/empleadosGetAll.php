<!DOCTYPE html>
<head>
    <title>Usuarios GET ALL</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
<?php require("../../include/menu2.php"); ?>

<hgroup>
    <h1>Ejecutando Microservicio Usuario</h1>
    <h2>Verbo: Get Recurso: /empleados</h2>
</hgroup>

<?php
require("../../vendor/autoload.php");

$client = new GuzzleHttp\Client();
$uri = "http://empleado:8080/empleados";
$response = $client->request('GET', $uri,[
    'exceptions' => false, // Para que no muestre Excepciones
    'headers' => [
        'Accept'     => 'application/json'
    ]
]);
$response->getStatusCode(); // devuelve el Código de estado HTTP
$body = $response->getBody(); // Devuelve el contenido de la respuesta.

$array = json_decode($body, true);
//$data = json_decode( file_get_contents('http://localhost:8080/empleados'), true );

foreach ($array as $value) {
    echo "ID Empleado= " . $value['id_empleado'] . "\n";
    echo "ID Empresa= " . $value['empresa_id'] . "\n";
    echo "DNI= " . $value['dni_user'] . "\n";
    echo "Puesto= " . $value['puesto'] . "\n";
    echo "<br>";
}
?>

<?php require("../../include/pie.php"); ?>
</body>
</html>
