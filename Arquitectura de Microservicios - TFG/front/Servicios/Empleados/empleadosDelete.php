<!DOCTYPE html>
<head>
    <title>Usuarios | DELETE</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
<?php require("../../include/menu2.php"); ?>

<hgroup>
    <h1>Ejecutando Microservicio Usuario</h1>
    <h2>Verbo: Delete Recurso: /empleados/{id_empleado}</h2>
</hgroup>
ID Empleado : <?php echo $_POST['id_empleado'] ?> <br>

<?php
require("../../vendor/autoload.php");
$client = new GuzzleHttp\Client();
$url = "http://empleado:8080/empleados/" . $_POST['id_empleado'];
$response = $client->request('DELETE', $url,[
    'exceptions' => false, // Para que no muestre Excepciones
    'headers' => [
        'Accept'     => 'application/json'
    ]
]);

if($response->getStatusCode() == 200){
    echo "<h2>Empleado Eliminado con exito</h2><br>";
}
?>


<?php require("../../include/pie.php"); ?>
</body>
</html>
