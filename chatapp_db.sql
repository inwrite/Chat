-- Устанавливаем SQL_MODE и начинаем транзакцию
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Устанавливаем кодировку
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Создаем таблицу `messages`
CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` varchar(300) NOT NULL,
  `outgoing_msg_id` varchar(300) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `msg_img` varchar(500) DEFAULT NULL, -- Сообщение может не содержать изображение
  PRIMARY KEY (`msg_id`) -- Устанавливаем первичный ключ для msg_id
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Создаем таблицу `user_form`
CREATE TABLE `user_form` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL, -- Ограничиваем имя до 100 символов
  `email` varchar(150) NOT NULL, -- Ограничиваем email до 150 символов
  `password` varchar(255) NOT NULL, -- Ограничиваем пароль до 255 символов для хешей
  `img` varchar(300) DEFAULT NULL, -- Картинка может быть NULL
  `status` varchar(300) DEFAULT 'offline', -- Статус по умолчанию
  PRIMARY KEY (`user_id`), -- Устанавливаем первичный ключ
  UNIQUE KEY `email` (`email`) -- Устанавливаем уникальность email
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Завершаем транзакцию
COMMIT;

-- Восстанавливаем настройки
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
