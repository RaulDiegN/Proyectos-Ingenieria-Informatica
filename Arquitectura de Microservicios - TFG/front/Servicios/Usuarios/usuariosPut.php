<!DOCTYPE html>
<head>
    <title>Usuarios | PUT</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
<?php require("../../include/menu2.php"); ?>

<hgroup>
    <h1>Ejecutando Microservicio Usuario</h1>
    <h2>Verbo: Put Recurso: /usuario/{id}</h2>
</hgroup>
ID User : <?php echo $_POST['id_user'] ?> <br>
Edad : <?php echo $_POST['edad'] ?> <br>
DNI : <?php echo $_POST['dni'] ?> <br>
Nombre : <?php echo $_POST['name'] ?> <br>

<?php
require("../../vendor/autoload.php");

$client = new GuzzleHttp\Client();
$url = 'http://usuario-jdbc:8080/usuarios/' . $_POST['id_user'];

$response = $client->request('PUT', $url, [
    'headers' => [
        'Content-Type'     => 'application/json'
    ],
    'json' => [
        'id_user' => $_POST['id_user'],
        'edad' => $_POST['edad'],
        'dni' => $_POST['dni'],
        'name' => $_POST['name']
    ]
]);

if($response->getStatusCode() == 200){
    echo "<h2>Usuario Modificado con Exito</h2><br>";
}
?>




<?php require("../../include/pie.php"); ?>
</body>
</html>
