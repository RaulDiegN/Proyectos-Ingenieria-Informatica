<header class="header">
    <div class="contenedor">
        <div class="div-logo">
            <img src="img/logo/FoodBook.png" class="img-logo">
        </div>
              
        <span class="icon-menu" id="btn-menu"><img src="img/iconos/menu.png"></span>
        <nav class="nav" id="nav">
            <ul class="menu">
                <li class="menu_item"><a class ="menu_link" href="home.php">Home</a></li>
                <li class="menu_item"><a class ="menu_link" href="ayuda.php">Cocina para Principiantes</a></li>
                <li class="menu_item"><a class ="menu_link" href="nosotros.php">Sobre Nosotros</a></li>
                <?php if (!isset($_SESSION['user_id'])): ?>
                <li class="menu_item"><a class ="menu_link" href="login.php">Login</a></li>
                <li class="menu_item"><a class ="menu_link" href="registro.php">Registro</a></li>
                <?php else: ?>
                <li class="menu_item"><a class ="menu_link" href="perfil.php">Mi Perfil</a></li>
                <li class="menu_item"><a class ="menu_link" href="logout.php">Cerrar Sesión</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
</header>