-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 23 2020 г., 10:27
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `jewellery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_24_122349_create_products_table', 1),
(5, '2020_06_03_053927_create_product_types_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `title` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `weight` double(5,2) NOT NULL,
  `cost` double(8,2) NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `imagePath` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `code`, `title`, `weight`, `cost`, `description`, `imagePath`, `created_at`, `updated_at`, `product_type_id`) VALUES
(1, '1070', 'Обручальное кольцо с алмазной гранью', 2.76, 3033.00, 'Обручальное кольцо из красного золота 585 пробы с алмазной гранью.', 'productImages/epXJ6D1Nh6kQwHB2wB3dWWDo9adn8R15jVUIcW08.webp', '2020-07-23 05:14:26', '2020-07-23 05:14:26', 1),
(2, '2076', 'Золотые серьги с фианитами', 1.10, 2148.00, 'Серьги из красного золота 585 пробы с фианитами.', 'productImages/0Wz2qJ8SfPWqsc8zqrtYS3eHWwOVabGb22jcLAqC.webp', '2020-07-23 05:15:44', '2020-07-23 05:15:44', 2),
(3, '3925/08/0/22', 'Золотая подвеска с фианитом', 0.69, 936.00, 'Подвеска из красного золота 375 пробы с фианитом.', 'productImages/2fVZEwoyRmf0OzvJQWDHFMUa67tYMem4Tc88b4Yt.webp', '2020-07-23 05:17:28', '2020-07-23 05:17:28', 3),
(4, '66938/3', 'Золотая цепочка', 0.89, 1766.00, 'Цепочка из красного золота 585 пробы. Плетение «Панцирное».', 'productImages/zhk7HOu6VLUA7zW9wWs0D5n12V9kk15IBv5uwVsK.webp', '2020-07-23 05:18:50', '2020-07-23 05:18:50', 4),
(5, '06051', 'Золотая цепочка', 68.23, 124441.00, 'Литая цепочка из красного золота 585 пробы. Плетение «Бисмарк».', 'productImages/LlN4OoigXRtzXICPDTplONW2P0KAiepRU0Dr8Voe.webp', '2020-07-23 05:20:43', '2020-07-23 05:20:43', 4),
(6, '21571/375', 'Золотые серьги с фианитами', 2.55, 3460.00, 'Серьги из красного золота 375 пробы с фианитами.', 'productImages/gqkhuisk1Dzn8EzwVYWdAbTDEi1aIoi3XtYp8JCY.webp', '2020-07-23 05:21:30', '2020-07-23 05:21:30', 2),
(7, '31103/а', 'Золотая подвеска «Буква А» с фианитами', 0.62, 1211.00, 'Подвеска «Буква А» из красного золота 585 пробы с фианитами.', 'productImages/pFXu0lqLSAndtfwF6aTovtgF19xdv9dE4ytiDClY.webp', '2020-07-23 05:22:21', '2020-07-23 05:22:21', 3),
(8, 'Product_code', 'Product_name', 12.00, 1200.00, 'Product_description.', 'productImages/placeholder.jpg', '2020-07-23 05:23:50', '2020-07-23 05:23:50', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` char(35) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `product_types`
--

INSERT INTO `product_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Кольца', '2020-07-23 05:14:26', '2020-07-23 05:14:26'),
(2, 'Серьги', '2020-07-23 05:15:44', '2020-07-23 05:15:44'),
(3, 'Подвески', '2020-07-23 05:17:28', '2020-07-23 05:17:28'),
(4, 'Цепочки', '2020-07-23 05:18:50', '2020-07-23 05:18:50');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$rYJaWCHXk5k3uRXYbkBxHei.gAfu93DA335BBbV6i63Z8B9etaAeG', NULL, '2020-07-22 10:28:08', '2020-07-22 10:28:08'),
(2, 'client', 'client', 'client@gmail.com', NULL, '$2y$10$ZZccRszoAJXH5DJR756byu4PwzSIJIzYm56MYPAQ0OyUindROdjnq', NULL, '2020-07-22 10:45:22', '2020-07-22 10:45:22');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_product_type_id_foreign` (`product_type_id`);

--
-- Индексы таблицы `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_types_title_unique` (`title`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
