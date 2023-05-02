<?php

use Foodbook\App\UsuarioRegistro;
use Foodbook\App\UsuarioReceta;

require_once __DIR__ . '/include/config.php';
    if (isset($_SESSION['user_id'])) {
        $user = UsuarioRegistro::findUser($_SESSION['user_id']);
    }
?>
<!DOCTYPE html>
<html lang="es-ES">

    <head>
        <title>Favoritas - FoodBook</title>
        <link rel="shortcut icon" type="image/png" href="img/logo/FoodBook.png"/>
        <link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">
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
				
				<h1 class="titulo-perfil">Recetas Favoritas</h1>

                    <?php
                        $recetas = UsuarioReceta::findRecetasUser($user->userNickname());
                        if(!empty($recetas)) {
                            foreach ($recetas as $receta) {
                                $receta = UsuarioReceta::findReceta($receta);
                                $receta["receta_pre"] = trim($receta["receta_pre"], ',');
                                $receta["receta_ing"] = trim($receta["receta_ing"], ',');
                                echo ' <fieldset> <legend>' . $receta["receta_nombre"] . '</legend><div class="recetaRow">
                            <label>Nombre del creador: </label>' . $receta["receta_cocinero"] . '.</div>
                               <div class="recetaRow"> <label>Método de preparación: </label>' . $receta["receta_pre"] . '.</div>';
                                echo '<div class="recetaRow">
                            <label>Ingredientes necesarios: </label>' . $receta["receta_ing"] . '.</div>';
                                echo '</fieldset>';
                            }
                        }
                    ?>


			</div>

		</div>
	</section>

        
        <?php 
        require("include/comun/pie.php");
        ?>
        <script src="js/menu.js"></script>
    </body>

</html>
