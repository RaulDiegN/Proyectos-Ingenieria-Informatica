<header>
    <div class="menuBar">
        <div class="menuLogo">
            <a href="index.php">
                <p class="menuCompanyText">
                    Legado Digital
                </p>
            </a>
        </div>

        <nav>
            <ul>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a class="active" href="index.php">Home</a></li>
                    <?php if (isset($_SESSION['abogado'])): ?>
                        <li><a href="consultas.php">Consultas</a></li>
                    <?php else: ?>
                        <li><a href="servicios.php">Servicios</a></li>
                        <li><a href="#cajafuerte">Caja Fuerte</a></li>
                    <?php endif ?>
                    <li><a href="datosPersonales.php">Mi Perfil</a></li>
                    <li><a href="logout.php">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li><a href="login.php">Iniciar Sesión</a></li>
                    <li><a href="registro.php">Registrarse</a></li>
                    <li><a href="servicios.php">Servicios</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
</header>
