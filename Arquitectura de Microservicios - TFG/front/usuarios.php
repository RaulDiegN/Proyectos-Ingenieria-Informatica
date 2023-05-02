<!DOCTYPE html>
<head>
    <title>Usuarios</title>
    <?php include "include/head-links.php"; ?>
</head>
<body>
<?php require("include/menu.php"); ?>

<header>
    <h1>Microservicio de Usuarios</h1>
</header>

<div>
    <form action="Servicios/Usuarios/usuariosGetAll.php" method="post">
        <input class="button" type="submit" value="Get All">
    </form>
</div>

<div>
    <form action="Servicios/Usuarios/usuariosGetID.php" method="post">
        <input type="text" id="id_user" name="id_user" placeholder="ID User">
        <input class="button button2" type="submit" value="Get ID">
    </form>
</div>

<div>
    <form action="Servicios/Usuarios/usuariosPost.php" method="post">
        <input type="text" id="id_user" name="id_user" placeholder="ID User">
        <input type="text" id="edad" name="edad" placeholder="Edad">
        <input type="text" id="dni" name="dni" placeholder="DNI">
        <input type="text" id="name" name="name" placeholder="Nombre">
        <input class="button button3" type="submit" value="Post">
    </form>
</div>

<div>
    <form action="Servicios/Usuarios/usuariosPut.php" method="post">
        <input type="text" id="id_user" name="id_user" placeholder="ID User">
        <input type="text" id="edad" name="edad" placeholder="Edad">
        <input type="text" id="dni" name="dni" placeholder="DNI">
        <input type="text" id="name" name="name" placeholder="Nombre">
        <input class="button button4" type="submit" value="Put">
    </form>
</div>

<div>
    <form action="Servicios/Usuarios/usuariosDelete.php" method="post">
        <input type="text" id="id_user" name="id_user" placeholder="ID User">
        <input class="button button5" type="submit" value="Delete">
    </form>
</div>

<?php require("include/pie.php"); ?>
</body>
</html>