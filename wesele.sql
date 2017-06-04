-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Cze 2017, 15:04
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wesele`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wesela`
--

CREATE TABLE `wesela` (
  `id` int(11) NOT NULL,
  `mlody` text COLLATE utf8_polish_ci NOT NULL,
  `mloda` text COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wesela`
--

INSERT INTO `wesela` (`id`, `mlody`, `mloda`, `data`, `login`, `haslo`) VALUES
(1, 'Mateusz', 'Kasia', '2018-08-16', 'sienio', '$2y$10$3xfEVhkkUoW5UhLOH/XFAePd4OLx0ZE8gd7.7yoNc3xKXH5Xf2hs.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `wesela`
--
ALTER TABLE `wesela`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `wesela`
--
ALTER TABLE `wesela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
