


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE DATABASE IF NOT EXISTS `foodbook` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `foodbook`;

CREATE TABLE `user_data` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_nickname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_DNI` varchar(9) DEFAULT NULL,
  `user_age` int(5) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `date_account_create` date DEFAULT NULL,
  `date_account_remove` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `user_nickname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_data`(`user_id`, `user_name`, `user_nickname`, `user_lastname`, `user_DNI`, `user_age`, `user_email`, `date_account_create`, `date_account_remove`)
VALUES
(1, 'Ramon', 'ramon77', 'garcia', '01749564s', 21, 'ramon@email.com', '2019-04-03', NULL ),
(2, 'Raul', 'userABD', 'diego', '78459635p', 22, 'user@email.com', '2019-04-03', NULL),
(3, 'pedro', 'peter', 'pera', '78546921i', 42, 'pedro@email.com', '2019-03-03', NULL);

INSERT INTO `user_login`(`user_id`, `user_nickname`, `user_email`, `user_password`)
VALUES
(1, 'ramon77', 'ramon@email.com', '$2y$10$73QOYx7HwzPw8JhszC/9JuoQNFSb1IIb3KGsA2sOp82IIC1iz9Rf6'),
(2, 'userABD', 'user@email.com', '$2y$10$V5w3Rrxk5kf8pmYT1MtNYOgRhQ/oNhe3hcjQRqDbC1JmeW8eiPudG'),
(3, 'peter', 'pedro@email.com', '$2y$10$Acd6NILDDlktFkBQUDbAeu.DLcaBj8pmX2dgU1J.x8oaFiQDtgZzG');

ALTER TABLE `user_login`
  ADD PRIMARY KEY `user_id` (`user_id`);
  
ALTER TABLE `user_data`
  ADD KEY (`user_id`);
  
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`user_id`);