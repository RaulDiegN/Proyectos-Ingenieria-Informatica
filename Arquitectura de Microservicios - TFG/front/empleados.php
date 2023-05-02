<!DOCTYPE html>
<head>
    <title>Empleados</title>
    <?php include "include/head-links.php"; ?>
</head>
<body>
<?php require("include/menu.php"); ?>

<header>
    <h1>Microservicio de Empleados</h1>
</header>

<div>
    <form action="Servicios/Empleados/empleadosGetAll.php" method="post">
        <input class="button" type="submit" value="Get All">
    </form>
</div>

<div>
    <form action="Servicios/Empleados/empleadosGetID.php" method="post">
        <input type="text" id="id_empleado" name="id_empleado" placeholder="ID Empleado">
        <input class="button button2" type="submit" value="Get ID">
    </form>
</div>

<div>
    <form action="Servicios/Empleados/empleadosPost.php" method="post">
        <input type="text" id="id_empleado" name="id_empleado" placeholder="ID Empleado">
        <input type="text" id="empresa_id" name="empresa_id" placeholder="ID Empresa">
        <input type="text" id="dni_user" name="dni_user" placeholder="DNI">
        <input type="text" id="puesto" name="puesto" placeholder="Puesto">
        <input class="button button3" type="submit" value="Post">
    </form>
</div>

<div>
    <form action="Servicios/Empleados/empleadosPut.php" method="post">
        <input type="text" id="id_empleado" name="id_empleado" placeholder="ID Empleado">
        <input type="text" id="empresa_id" name="empresa_id" placeholder="ID Empresa">
        <input type="text" id="dni_user" name="dni_user" placeholder="DNI">
        <input type="text" id="puesto" name="puesto" placeholder="Puesto">
        <input class="button button4" type="submit" value="Put">
    </form>
</div>

<div>
    <form action="Servicios/Empleados/empleadosDelete.php" method="post">
        <input type="text" id="id_empleado" name="id_empleado" placeholder="ID Empleado">
        <input class="button button5" type="submit" value="Delete">
    </form>
</div>

<div>
    <form action="Servicios/Empleados/empleadosVersion.php" method="post">
        <input class="button button6" type="submit" value="Version">
    </form>
</div>

<?php require("include/pie.php"); ?>
</body>
</html>