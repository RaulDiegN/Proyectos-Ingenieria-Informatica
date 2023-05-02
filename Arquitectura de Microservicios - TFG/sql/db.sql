
	DROP TABLE IF EXISTS `empleado`;
	DROP TABLE IF EXISTS `usuario`;

	CREATE TABLE `usuario` (
	  `id_user` int NOT NULL AUTO_INCREMENT,
	  `name` varchar(45) NOT NULL,
	  `dni` int NOT NULL,
	  `edad` int NOT NULL,
	  PRIMARY KEY (`id_user`),
	  UNIQUE KEY `dni_UNIQUE` (`dni`)
	) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

	INSERT INTO `usuario` VALUES (1,'Raul',5784965,21),(2,'Pedro',5796548,45),
	(3,'Luis',68593741,12),(4,'Laura',87563215,39),(5,'Isabel',78326142,43),
	(6,'Alvaro',96374861,24),(7,'Pablo',12489675,25),(8,'Loren',124898795,25);




	CREATE TABLE `empleado` (
	  `id_empleado` int NOT NULL AUTO_INCREMENT,
	  `empresa_id` int NOT NULL,
	  `dni_user` int NOT NULL,
	  `puesto` varchar(45) NOT NULL,
	  PRIMARY KEY (`id_empleado`),
	  KEY `fk_empleado_usuario_idx` (`dni_user`),
	  CONSTRAINT `fk_empleado_usuario` FOREIGN KEY (`dni_user`) REFERENCES `usuario` (`dni`) ON DELETE CASCADE
	) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

	INSERT INTO `empleado` VALUES (1,1,5784965,'Presidente'),(2,1,5796548,'Vice Presidente'),
	(3,1,78326142,'Delegado de Marketing'),(4,2,96374861,'Contable'),(6,3,68593741,'Gerente');
