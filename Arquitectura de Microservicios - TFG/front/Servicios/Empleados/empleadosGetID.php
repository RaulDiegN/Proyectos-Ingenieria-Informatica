<!DOCTYPE html>
<head>
    <title>Usuarios | GET ID</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
<?php require("../../include/menu2.php"); ?>

<hgroup>
    <h1>Ejecutando Microservicio Usuario</h1>
    <h2>Verbo: Get Recurso: /empleados/{id_empleado}</h2>
</hgroup>
    <h2>Mostrar datos enviados</h2>
    ID Empleado : <?php echo $_POST['id_empleado'] ?> <br>

<?php
//$data = json_decode( file_get_contents('http://localhost:8080/empleado/' . $_POST['id_empleado']), true );

require("../../vendor/autoload.php");
$client = new GuzzleHttp\Client();
$uri = "http://empleado:8080/empleados/" . $_POST['id_empleado'];
$response = $client->request('GET', $uri ,[
    'exceptions' => false, // Para que no muestre Excepciones
    'headers' => [
        'Accept'     => 'application/json'
    ]
]);
$response->getStatusCode(); // devuelve el Código de estado HTTP
$data = $response->getBody(); // Devuelve el contenido de la respuesta.

$body = json_decode($data, true);

if ($body == null){
    echo "<h2> Empleado no Existe </h2>" . "<br>";
} else {
    echo "ID Empleado= " . $body['id_empleado'] . "\n";
    echo "ID Empresa= " . $body['empresa_id'] . "\n";
    echo "DNI= " . $body['dni_user'] . "\n";
    echo "Puesto= " . $body['puesto'] . "\n";
    echo "<br>";
}
?>

<?php require("../../include/pie.php"); ?>
</body>
</html>
