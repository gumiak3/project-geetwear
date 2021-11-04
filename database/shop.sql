-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Lis 2021, 21:21
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.1

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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `basket`
--

CREATE TABLE `basket` (
  `id_user` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
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
(1, 'bluzka'),
(2, 'bluza'),
(3, 'spodnie');

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
(1, 1, 'photos/produkty/koszulka.jpg', 1),
(2, 1, 'photos/produkty/koszulka_biala.jpg', 0),
(3, 1, 'photos/produkty/koszulka_model.jpg', 0),
(4, 1, 'photos/produkty/koszulka_model_back.jpg', 0),
(5, 2, 'photos/produkty/bluza.jpg', 1),
(6, 2, 'photos/produkty/bluza_1.jpg', 0),
(7, 2, 'photos/produkty/bluza_2.jpg', 0),
(8, 2, 'photos/produkty/bluza_3.jpg', 0);

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
  `id_product` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `id_category` int(11) NOT NULL,
  `price` double NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id_product`, `product_name`, `id_category`, `price`, `amount`) VALUES
(1, 'Bluzka G', 1, 50, 20),
(2, 'Bluza', 2, 150, 20),
(3, 'Spodnie', 3, 120, 20);

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
  `password` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `firstname`, `surname`, `city`, `street`, `ZIP`, `house_number`, `apartment_number`, `email`, `password`, `type`) VALUES
(1, 'Maciej', 'Ślepowroński', 'Siedlce', 'Aleksandrowska', '08-110', 0, 2, 'slepy@gmail.com', 'passwd123', 'admin'),
(2, 'Łukasz', 'Gumienniczuk', 'Siedlce', 'Daszyńskiego', '08-110', 0, 1, 'gumiak@gmail.com', 'passwd123', 'admin'),
(3, 'Marcin', 'Palimat', 'Siedlce', 'Konarskiego', '08-110', 0, 14, 'marcinp@gmail.com', 'marcin123', 'user'),
(4, 'Maciej', 'Ślepowroński', 'Siedlce', 'Aleksandrowska', '08-110', 0, 2, 'slepy@gmail.com', 'passwd123', 'admin'),
(5, 'Łukasz', 'Gumienniczuk', 'Siedlce', 'Daszyńskiego', '08-110', 0, 1, 'gumiak@gmail.com', 'passwd123', 'admin'),
(6, 'Marcin', 'Palimat', 'Siedlce', 'Konarskiego', '08-110', 0, 14, 'marcinp@gmail.com', 'marcin123', 'user');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `basket`
--
ALTER TABLE `basket`
  ADD KEY `id_product` (`id_product`),
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
  ADD PRIMARY KEY (`id_product`),
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
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
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