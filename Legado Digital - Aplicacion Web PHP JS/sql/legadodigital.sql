-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-04-2019 a las 21:39:24
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `legadodigital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rate`
--

CREATE TABLE `rate` (
  `package_id` int(11) NOT NULL,
  `living_will` int(11) NOT NULL,
  `storage` int(11) NOT NULL,
  `social_networks` int(11) NOT NULL,
  `unsuscribe_social_networks` int(11) NOT NULL,
  `social_networks_publication` int(11) NOT NULL,
  `online_reputation` int(11) NOT NULL,
  `legal_advice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta_user`
--

CREATE TABLE `consulta_user` (
  `user_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `text_consulta` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testament_user`
--

CREATE TABLE `testament_user` (
  `user_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `text_testament` text,
  `text_annexed` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `testament_user`
--

INSERT INTO `testament_user` (`user_id`, `description`, `text_testament`, `text_annexed`) VALUES
(35, 'mi testamento', 'adio mundo cruel', 'les odio a todos!!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_associated`
--

CREATE TABLE `user_associated` (
  `associated_firstname` varchar(255) NOT NULL,
  `associated_lastname` varchar(255) NOT NULL,
  `associated_DNI` varchar(9) NOT NULL,
  `associated_email` varchar(255) NOT NULL,
  `associated_id` int(11) NOT NULL,
  `associated_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_DNI` varchar(9) DEFAULT NULL,
  `user_birth_date` date DEFAULT NULL,
  `user_age` int(5) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_telephone` int(50) DEFAULT NULL,
  `date_account_create` date DEFAULT NULL,
  `date_account_remove` date DEFAULT NULL,
  `user_rate` enum('limitado','platinium','básico','') NOT NULL DEFAULT 'básico',
  `user_question` varchar(255) DEFAULT NULL,
  `user_response` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_data`
--

INSERT INTO `user_data` (`user_id`, `user_name`, `user_lastname`, `user_DNI`, `user_birth_date`, `user_age`, `user_email`, `user_telephone`, `date_account_create`, `date_account_remove`, `user_rate`, `user_question`, `user_response`, `user_image`) VALUES
(35, 'user', 'user', NULL, NULL, 19, 'user@user.com', 654223106, '2019-03-25', NULL, 'básico', 'Nombre de mascota', 'pato', 'img/users/35.jpg'),
(36, 'Ricardo', 'Cabrera', NULL, NULL, NULL, 'rcabre01@ucm.es', NULL, '2019-04-04', NULL, 'básico', '', NULL, NULL),
(37, 'alex', 'alex', NULL, NULL, NULL, 'alex@ucm', NULL, '2019-04-07', NULL, 'básico', '', NULL, NULL),
(38, 'lawyer', 'peter', NULL, NULL, NULL, 'peter@ucm', NULL, '2019-05-04', NULL, 'básico', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `user_nickname` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email_login` varchar(255) NOT NULL,
  `user_type` enum('user_admin','user_lawer','user_client','user_partner') NOT NULL DEFAULT 'user_client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_login`
--

INSERT INTO `user_login` (`user_id`, `user_nickname`, `user_password`, `user_email_login`, `user_type`) VALUES
(35, 'useraw', '$2y$10$5piZZRtR0pME7Xn.ZqeXB.9pcdpx8egwyESx3WNe935K8Oms3X6Ti', 'user@user.com', 'user_client'),
(36, 'ricardo', '$2y$10$RFoN9fMbSxZkZmRt3emN5eya3VtbPQFA4C9nh8QA9UZeVAmyQ4Nfu', 'rcabre01@ucm.es', 'user_client'),
(37, 'alex', '$2y$10$LwegyfjwJf7HBG2GEUmZa./TmKefKfbmm6ANA4RL7CWqdPJ3JiYCa', 'alex@ucm', 'user_client'),
(38, 'lawyer', '$2y$10$J23SP3N6ocApSQUpT3Np/.o8zJuIGxYs1XnP/E1ATutXjVdLcR.Iy', 'peter@ucm', 'user_lawer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_path`
--

CREATE TABLE `user_path` (
  `user_id` int(11) NOT NULL,
  `name_path` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_path`
--

INSERT INTO `user_path` (`user_id`, `name_path`) VALUES
(35, 'usuario'),
(36, 'ricardo,alex,juan,hola'),
(37, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_statistics`
--

CREATE TABLE `user_statistics` (
  `user_id_statistic` int(11) NOT NULL,
  `storage` int(10) NOT NULL,
  `social_networks` int(11) NOT NULL,
  `unsuscribe_social_networks` int(11) NOT NULL,
  `social_networks_publication` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_user_asociated`
--

CREATE TABLE `user_user_asociated` (
  `associated_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estructura de tabla para la tabla `lawyer_asociated`
--

CREATE TABLE `lawyer_asociated` (
  `lawyer_asociated_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estructura de tabla para la tabla `lawyer_asociated`
--

CREATE TABLE `lawyer` (
  `user_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `lawyer` (`user_id`, `lawyer_id`) VALUES
(38, 1);
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`package_id`);

--
-- Indices de la tabla `testament_user`
--
ALTER TABLE `testament_user`
  ADD KEY `user_id` (`user_id`);
  
--
-- Indices de la tabla `consulta_user`
--
ALTER TABLE `consulta_user`
  ADD KEY `user_id` (`user_id`);
  
--
-- Indices de la tabla `lawyer`
--
ALTER TABLE `lawyer`
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `user_associated`
--
ALTER TABLE `user_associated`
  ADD PRIMARY KEY (`associated_id`),
  ADD KEY `associated_user_id` (`associated_user_id`);

--
-- Indices de la tabla `user_data`
--
ALTER TABLE `user_data`
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `user_path`
--
ALTER TABLE `user_path`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indices de la tabla `user_statistics`
--
ALTER TABLE `user_statistics`
  ADD KEY `user_id_statistic` (`user_id_statistic`);

--
-- Indices de la tabla `user_user_asociated`
--
ALTER TABLE `user_user_asociated`
  ADD KEY `associated_user_id` (`associated_user_id`,`user_id`);
  
--
-- Indices de la tabla `user_user_asociated`
--
ALTER TABLE `lawyer_asociated`
  ADD KEY `lawyer_asociated_id` (`lawyer_asociated_id`,`user_id`);

ALTER TABLE `lawyer`
  ADD PRIMARY KEY (`lawyer_id`);

--
-- AUTO_INCREMENT de la tabla `user_associated`
--
ALTER TABLE `user_associated`
  MODIFY `associated_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
  
  --
-- AUTO_INCREMENT de la tabla `lawyer`
--
ALTER TABLE `lawyer`
  MODIFY `lawyer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `testament_user`
--
ALTER TABLE `testament_user`
  ADD CONSTRAINT `testament_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`);

--
-- Filtros para la tabla `user_associated`
--
ALTER TABLE `user_associated`
  ADD CONSTRAINT `user_associated_ibfk_1` FOREIGN KEY (`associated_user_id`) REFERENCES `user_login` (`user_id`);

--
-- Filtros para la tabla `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`);

--
-- Filtros para la tabla `user_path`
--
ALTER TABLE `user_path`
  ADD CONSTRAINT `user_path_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`);

--
-- Filtros para la tabla `user_statistics`
--
ALTER TABLE `user_statistics`
  ADD CONSTRAINT `user_statistics_ibfk_1` FOREIGN KEY (`user_id_statistic`) REFERENCES `user_login` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
