-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 20 2024 г., 13:58
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `FIZZ`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Basket`
--

CREATE TABLE `Basket` (
  `Id_basket` int NOT NULL,
  `User_id` int DEFAULT NULL,
  `Content` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Basket`
--

INSERT INTO `Basket` (`Id_basket`, `User_id`, `Content`) VALUES
(2, 6, '{\"20\": 2, \"24\": 3}');

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE `Category` (
  `Category_id` int NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Category`
--

INSERT INTO `Category` (`Category_id`, `Name`) VALUES
(8, '343434'),
(9, 'dsdsaddsa');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `id_product` int NOT NULL,
  `User_id` int NOT NULL,
  `comment_text` text NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `OrderProduct`
--

CREATE TABLE `OrderProduct` (
  `id_orderproduct` int NOT NULL,
  `id_product` int NOT NULL,
  `id_order` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Orders`
--

CREATE TABLE `Orders` (
  `Id_order` int NOT NULL,
  `User_id` int NOT NULL,
  `Date_of_order` varchar(30) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Total_price` decimal(25,0) NOT NULL,
  `Used_bonuses` decimal(10,0) DEFAULT NULL,
  `Accrued_bonuses` decimal(10,0) DEFAULT NULL,
  `Id_product` int DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Orders`
--

INSERT INTO `Orders` (`Id_order`, `User_id`, `Date_of_order`, `Status`, `Total_price`, `Used_bonuses`, `Accrued_bonuses`, `Id_product`, `comment`) VALUES
(4, 6, '2024-04-14 19:39:35', 'Выполнено', '666', '1', '1', NULL, NULL),
(5, 6, '2024-04-14 19:39:35', 'Доставка', '12323', '1', '1', NULL, NULL),
(6, 6, '2024-06-20 12:27:46am', 'новый', '12323', '1', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `Product`
--

CREATE TABLE `Product` (
  `Id_product` int NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Category_id` int NOT NULL,
  `Price` int NOT NULL,
  `Image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Product`
--

INSERT INTO `Product` (`Id_product`, `Name`, `Description`, `Category_id`, `Price`, `Image`) VALUES
(20, 'CoticTail', 'new', 8, 22, '1111.png'),
(23, 'Lana Lemonade', 'Babyy', 8, 666, 'lana.jpg'),
(24, 'asdadsdas', 'asdsaddas', 9, 12323, 'sadsdsa');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `User_id` int NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password_hash` varchar(50) NOT NULL,
  `Bonus_points` decimal(10,0) NOT NULL,
  `Role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`User_id`, `Email`, `Password_hash`, `Bonus_points`, `Role`) VALUES
(4, '1234@gmail.com', '12345678', '0', 'admin'),
(6, '1234555@gmail.com', '12345678', '0', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Basket`
--
ALTER TABLE `Basket`
  ADD PRIMARY KEY (`Id_basket`),
  ADD KEY `User_id_5` (`User_id`);

--
-- Индексы таблицы `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`Category_id`),
  ADD KEY `Category_id` (`Category_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `id_product` (`id_product`,`User_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Индексы таблицы `OrderProduct`
--
ALTER TABLE `OrderProduct`
  ADD PRIMARY KEY (`id_orderproduct`),
  ADD KEY `id_product` (`id_product`,`id_order`),
  ADD KEY `id_order` (`id_order`);

--
-- Индексы таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`Id_order`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `Id_product` (`Id_product`);

--
-- Индексы таблицы `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`Id_product`),
  ADD KEY `Price` (`Price`),
  ADD KEY `Category_id` (`Category_id`),
  ADD KEY `Id_product` (`Id_product`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Basket`
--
ALTER TABLE `Basket`
  MODIFY `Id_basket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Category`
--
ALTER TABLE `Category`
  MODIFY `Category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `OrderProduct`
--
ALTER TABLE `OrderProduct`
  MODIFY `id_orderproduct` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `Orders`
--
ALTER TABLE `Orders`
  MODIFY `Id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `Product`
--
ALTER TABLE `Product`
  MODIFY `Id_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `User_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Basket`
--
ALTER TABLE `Basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `Users` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `Users` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `Product` (`Id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `OrderProduct`
--
ALTER TABLE `OrderProduct`
  ADD CONSTRAINT `orderproduct_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `Product` (`Id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderproduct_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `Orders` (`Id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `Users` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Id_product`) REFERENCES `Product` (`Id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `Category` (`Category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
