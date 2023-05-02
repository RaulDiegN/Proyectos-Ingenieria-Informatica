<!DOCTYPE html>
<head>
    <title>Usuarios | PUT</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
<?php require("../../include/menu2.php"); ?>

<hgroup>
    <h1>Ejecutando Microservicio Usuario</h1>
    <h2>Verbo: Put Recurso: /empleados/{id_empleado}</h2>
</hgroup>
ID Empleado : <?php echo $_POST['id_empleado'] ?> <br>
ID Empresa : <?php echo $_POST['empresa_id'] ?> <br>
DNI : <?php echo $_POST['dni_user'] ?> <br>
Puesto : <?php echo $_POST['puesto'] ?> <br>

<?php
require("../../vendor/autoload.php");

$client = new GuzzleHttp\Client();
$url = 'http://empleado:8080/empleados/' . $_POST['id_empleado'];

$response = $client->request('PUT', $url, [
    'headers' => [
        'Content-Type'     => 'application/json'
    ],
    'json' => [
        'id_empleado' => $_POST['id_empleado'],
        'empresa_id' => $_POST['empresa_id'],
        'dni_user' => $_POST['dni_user'],
        'puesto' => $_POST['puesto']
    ]
]);

if($response->getStatusCode() == 200){
    echo "<h2>Empleado Modificado con Exito</h2><br>";
}
?>

<?php require("../../include/pie.php"); ?>
</body>
</html>
