<!DOCTYPE html>
<head>
    <title>Empleados</title>
    <?php include "include/head-links.php"; ?>
</head>
<body>
<?php require("include/menu.php"); ?>

<header>
    <h1>Microservicio de Python</h1>
</header>

<div>
    <form action="Servicios/Python/edadesPythonV1.php" method="post">
        <input class="button" type="submit" value="Edades">
    </form>
</div>

<div>
    <form action="Servicios/Python/edadesPythonV2.php" method="post">
        <input class="button button2" type="submit" value="DNI">
    </form>
</div>

<?php require("include/pie.php"); ?>
</body>
</html>