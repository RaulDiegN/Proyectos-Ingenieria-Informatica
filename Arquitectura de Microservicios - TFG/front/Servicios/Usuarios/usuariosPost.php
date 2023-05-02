<!DOCTYPE html>
<head>
    <title>Usuarios | POST</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
<?php require("../../include/menu2.php"); ?>

<hgroup>
    <h1>Ejecutando Microservicio Usuario</h1>
    <h2>Verbo: Post Recurso: /usuario</h2>
</hgroup>
ID User : <?php echo $_POST['id_user'] ?> <br>
Edad : <?php echo $_POST['edad'] ?> <br>
DNI : <?php echo $_POST['dni'] ?> <br>
Nombre : <?php echo $_POST['name'] ?> <br>


<?php

require("../../vendor/autoload.php");

$client = new GuzzleHttp\Client();
$url = "http://usuario-jdbc:8080/usuario";
$response = $client->request('POST', $url, [
    'headers' => [
        'Content-Type'     => 'application/json'
    ],
    'json' => [
        'id_user' => $_POST['id_user'],
        'name' => $_POST['name'],
        'edad' => $_POST['edad'],
        'dni' => $_POST['dni']
    ]
]);
if($response->getStatusCode() == 200){
    echo "<h2>Usuario Creado con exito</h2><br>";
}
?>

<?php require("../../include/pie.php"); ?>
</body>
</html>
