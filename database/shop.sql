-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Lis 2021, 16:36
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `shop`
--
CREATE DATABASE shop;
use shop;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `basket`
--

CREATE TABLE `basket` (
  `id_user` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `id_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id_category`, `category_name`) VALUES
(1, 'Koszulki'),
(2, 'Bluzy'),
(3, 'Skiety');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gallery`
--

CREATE TABLE `gallery` (
  `id_foto` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `main` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `gallery`
--

INSERT INTO `gallery` (`id_foto`, `id_product`, `foto`, `main`) VALUES
(1, 1, 'photos/produkty/koszulka_1.jpg', 1),
(2, 1, 'photos/produkty/koszulka_2.jpg', 0),
(3, 1, 'photos/produkty/koszulka_3.jpg', 0),

(4, 2, 'photos/produkty/bluza_UFO_1.jpg', 1),
(5, 2, 'photos/produkty/bluza_UFO_2.jpg', 0),
(6, 2, 'photos/produkty/bluza_UFO_3.jpg', 0),

(8, 3, 'photos/produkty/bluza_sz_1.jpg', 1),
(9, 3, 'photos/produkty/bluza_sz_2.jpg', 0),
(10, 3, 'photos/produkty/bluza_sz_3.jpg', 0),

(11, 4, 'photos/produkty/bluza_Adid_1.jpg', 1),
(12, 4, 'photos/produkty/bluza_Adid_2.jpg', 0),
(13, 4, 'photos/produkty/bluza_Adid_3.jpg', 0),

(14, 5, 'photos/produkty/bluza_cz_1.jpg', 1),
(15, 5, 'photos/produkty/bluza_cz_2.jpg', 0),
(16, 5, 'photos/produkty/bluza_cz_3.jpg', 0),

(17, 6, 'photos/produkty/skieta_1.jpg', 1),
(18, 6, 'photos/produkty/skieta_2.jpg', 0),
(19, 6, 'photos/produkty/skieta_3.jpg', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `shipment_date` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `id_basket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `id_category` int(11) NOT NULL,
  `price` double NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--


INSERT INTO `products` (`id`, `id_product`, `product_name`, `size`, `id_category`, `price`, `amount`) VALUES
(1, 1, 'Bluzka G', 'S', 1, 50, 20),
(2, 1, 'Bluzka G', 'M', 1, 50, 20),
(3, 1, 'Bluzka G', 'L', 1, 50, 20),
(4, 1, 'Bluzka G', 'XL', 1, 50, 20),

(5, 2, 'Bluza UFO', 'S', 2, 150, 20),
(6, 2, 'Bluza UFO', 'M', 2, 150, 20),
(7, 2, 'Bluza UFO', 'L', 2, 150, 20),
(8, 2, 'Bluza UFO', 'XL', 2, 150, 20),

(9, 3, 'Szara bluza z długim rękawem', 'S', 2, 89.99, 20),
(10, 3, 'Szara bluza z długim rękawem', 'M', 2, 89.99, 20),
(11, 3, 'Szara bluza z długim rękawem', 'L', 2, 89.99, 20),
(12, 3, 'Szara bluza z długim rękawem', 'XL', 2, 89.99, 20),

(13, 4, 'Bluza Adidas', 'S', 2, 129.99, 20),
(14, 4, 'Bluza Adidas', 'M', 2, 129.99, 20),
(15, 4, 'Bluza Adidas', 'L', 2, 129.99, 20),
(16, 4, 'Bluza Adidas', 'XL', 2, 129.99, 20),

(17, 5, 'Czarna bluza z długim rękawem', 'S', 2, 99.99, 20),
(18, 5, 'Czarna bluza z długim rękawem', 'S', 2, 99.99, 20),
(19, 5, 'Czarna bluza z długim rękawem', 'S', 2, 99.99, 20),
(20, 5, 'Czarna bluza z długim rękawem', 'S', 2, 99.99, 20),

(21, 6, 'Biała skieta', '38', 3, 25, 20),
(22, 6, 'Biała skieta', '40', 3, 25, 20),
(23, 6, 'Biała skieta', '42', 3, 25, 20),
(24, 6, 'Biała skieta', '44', 3, 25, 20);


-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `street` varchar(40) NOT NULL,
  `ZIP` varchar(20) NOT NULL,
  `house_number` int(11) NOT NULL,
  `apartment_number` int(11) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `firstname`, `surname`, `city`, `street`, `ZIP`, `house_number`, `apartment_number`, `email`, `password`, `type`) VALUES
(1, 'Maciej', 'Ślepowroński', 'Siedlce', 'Aleksandrowska', '08-110', 0, 2, 'slepy@gmail.com', 'qwer123', 'admin'),
(2, 'Łukasz', 'Gumienniczuk', 'Siedlce', 'Daszyńskiego', '08-110', 0, 1, 'gumiak@gmail.com', 'qwer123', 'admin'),
(3, 'dsakld', 'ldksaldk', '', '', '', 0, NULL, 'gumiacz@gmail.com', '$2y$10$0AXhHRC7vjvxlUgKz7.J9Oi', 'user'),
(4, 'sdakldsa', 'kdlsakldksal', '', '', '', 0, NULL, 'guma@gmail.com', '$2y$10$ijgisZJLrLMHA9gVolE4GOC', 'user'),
(5, 'sdalkd', 'kdslakdla', '', '', '', 0, NULL, 'jd123@gmail.com', '$2y$10$6qBeRavsN2PoT7HnwMyefuMrIvjU0nYeQs5TfyKTPWA4YDfiEzE5q', 'user');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `basket`
--
ALTER TABLE `basket`
  ADD KEY `id` (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeksy dla tabeli `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_product` (`id_product`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `basket_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ograniczenia dla tabeli `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

--
-- Ograniczenia dla tabeli `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;