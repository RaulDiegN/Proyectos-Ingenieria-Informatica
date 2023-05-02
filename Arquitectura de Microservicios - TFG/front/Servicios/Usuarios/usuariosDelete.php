<!DOCTYPE html>
<head>
    <title>Usuarios | DELETE</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
<?php require("../../include/menu2.php"); ?>

<hgroup>
    <h1>Ejecutando Microservicio Usuario</h1>
    <h2>Verbo: Delete Recurso: /usuario/{id}</h2>
</hgroup>
ID User : <?php echo $_POST['id_user'] ?> <br>

<?php
require("../../vendor/autoload.php");
$client = new GuzzleHttp\Client();
$url = "http://usuario-jdbc:8080/usuarios/" . $_POST['id_user'];
$response = $client->request('DELETE', $url,[
    'exceptions' => false, // Para que no muestre Excepciones
    'headers' => [
        'Accept'     => 'application/json'
    ]
]);

if($response->getStatusCode() == 200){
    echo "<h2>Usuario Eliminado con exito</h2><br>";
}
?>



<?php require("../../include/pie.php"); ?>
</body>
</html>
