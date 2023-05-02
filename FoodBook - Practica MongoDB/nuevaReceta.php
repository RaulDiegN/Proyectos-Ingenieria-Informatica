<?php

    require_once __DIR__ . '/include/config.php';
    use Foodbook\App\Form\FormReceta;
?>
<!DOCTYPE html>
<html lang="es-ES">

    <head>
        <title>Crear Receta - FoodBook</title>
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
        <section id="topSection">
		<div class="container">
			<?php
				require("include/comun/sidebarIzq.php");
			?>

			<div id="contenido">
				
				<h1 class="titulo-perfil">Crear Receta</h1>
                <div >
                    <?php
                    $form = new FormReceta();
                    $form->gestiona();
                    ?>
                </div>
				
			</div>

		</div>
	</section>

        
        <?php 
        require("include/comun/pie.php");
        ?>
        <script src="js/menu.js"></script>
    </body>

</html>
