<!DOCTYPE html>
<head>
    <title>Usuarios | GET ID</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
<?php require("../../include/menu2.php"); ?>

<hgroup>
    <h1>Ejecutando Microservicio Usuario</h1>
    <h2>Verbo: Get Recurso: /usuario/{id}</h2>
</hgroup>
    <h2>Mostrar datos enviados</h2>
    ID User : <?php echo $_POST['id_user'] ?> <br>


<?php
//$data = json_decode( file_get_contents('http://localhost:8080/empleado/' . $_POST['id_empleado']), true );

require("../../vendor/autoload.php");
$client = new GuzzleHttp\Client();
$url = "http://usuario-jdbc:8080/usuarios/" . $_POST['id_user'];
$response = $client->request('GET', $url,[
    'exceptions' => false, // Para que no muestre Excepciones
    'headers' => [
        'Accept'     => 'application/json'
    ]
]);
$response->getStatusCode(); // devuelve el Código de estado HTTP
$data = $response->getBody(); // Devuelve el contenido de la respuesta.

$body = json_decode($data, true);

if ($body == null){
    echo "<h2> Usuario no Existe </h2>" . "<br>";
} else {
    echo "ID Usuario= " . $body['id_user'] . "\n";
    echo "Edad= " . $body['edad'] . "\n";
    echo "DNI= " . $body['dni'] . "\n";
    echo "Nombre= " . $body['name'] . "\n";
    echo "<br>";
}
?>

<?php require("../../include/pie.php"); ?>
</body>
</html>
