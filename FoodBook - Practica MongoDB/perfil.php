<?php
    require_once __DIR__ . '/include/config.php';

use Foodbook\App\Form\FormModifyData;

?>
<!DOCTYPE html>
<html lang="es-ES">

    <head>
        <title>Mi perfil - FoodBook</title>
        <link rel="shortcut icon" type="image/png" href="img/logo/FoodBook.png"/>
        <link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">
        <link rel="stylesheet" type="text/css" href="css/estilosFormularios.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        
    </head>
    <body>
       <?php 
        require("include/comun/cabecera.php");
        ?>
        <main class = "main">
		<div class="container" >
			<?php
				require("include/comun/sidebarIzq.php");
			?>

			<div id="contenido">
				
				<h1 class="titulo-perfil">Mi Perfil</h1>
                <?php
                $formModify = new FormModifyData();
                $formModify->gestiona();
                ?>
            </div>
		</div>
	</main>

        
        <?php 
        require("include/comun/pie.php");
        ?>
        <script src="js/menu.js"></script>
    </body>

</html>
