-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 20 2021 г., 06:37
-- Версия сервера: 8.0.27
-- Версия PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bd_online_store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `baskets`
--

CREATE TABLE `baskets` (
  `id` int NOT NULL,
  `users_id` int NOT NULL,
  `products_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `baskets`
--

INSERT INTO `baskets` (`id`, `users_id`, `products_id`) VALUES
(1, 9, 2),
(2, 9, 3),
(3, 9, 3),
(4, 9, 3),
(5, 9, 2),
(6, 9, 2),
(7, 9, 2),
(8, 9, 3),
(9, 9, 3),
(10, 9, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Клавишные'),
(2, 'Струнные'),
(3, 'Духовные'),
(4, 'Язычковые'),
(5, 'Ударные'),
(6, 'Перкуссия'),
(7, 'Клавишные'),
(8, 'Электромузыкальные');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(45) NOT NULL,
  `categories_id` int NOT NULL,
  `description` text NOT NULL,
  `link_to_photo` text NOT NULL,
  `number` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `categories_id`, `description`, `link_to_photo`, `number`, `price`) VALUES
(2, 'Гитара классическая Alfabeto SAPELE', 2, 'Классическая (испанская, шестиструнная) гитара — основной представитель семейства гитар, щипковый струнный музыкальный инструмент басового, тенорового и сопранового регистров. В современном виде существует со второй половины XVIII века, используется как аккомпанирующий, сольный и ансамблевый инструмент. Гитара обладает большими художественно-исполнительскими возможностями и широким разнообразием тембров.', 'https://content1.rozetka.com.ua/goods/images/big/176721083.jpg', 5, 3915),
(3, 'Электрогитара Fender Squier', 2, 'Squier by Fender MM Strat HT – бюджетная модель от знаменитого американского гитарного бренда, простая, практичная и удобная гитара, разработанная для начинающих гитаристов и обучающихся игре на инструменте. Электрогитара обладает всеми характерными чертами, которые сделали Стратокастер одной из самых популярных и любимых моделей в мире.', 'https://content2.rozetka.com.ua/goods/images/big/76899202.jpg', 3, 3861);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'undefined',
  `surname` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'undefined',
  `phone` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '380 000 000 00 00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `name`, `surname`, `phone`) VALUES
(9, 'Sem03', '0b04beb06f3e0bdc6f99e91070fb987a', 'CemenP@gmail.com', 'Иван', 'Иванович', '050-000-00-00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_baskets_products` (`products_id`),
  ADD KEY `fk_baskets_users` (`users_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_categories_idx` (`categories_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`,`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD CONSTRAINT `fk_baskets_products` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_baskets_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
