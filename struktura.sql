-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Cze 2017, 18:24
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
-- Struktura tabeli dla tabeli `ludzie`
--

CREATE TABLE `ludzie` (
  `id` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `partner` text COLLATE utf8_polish_ci NOT NULL,
  `dzieci` text COLLATE utf8_polish_ci NOT NULL,
  `iledzieci` int(11) NOT NULL,
  `odkogo` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci ROW_FORMAT=COMPACT;

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
(1, 'Mateusz', 'Kasia', '2018-06-16', 'sienio', '$2y$10$3xfEVhkkUoW5UhLOH/XFAePd4OLx0ZE8gd7.7yoNc3xKXH5Xf2hs.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wesele_goscie`
--

CREATE TABLE `wesele_goscie` (
  `id` int(11) NOT NULL,
  `id_wesele` int(11) NOT NULL,
  `id_ludzie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `ludzie`
--
ALTER TABLE `ludzie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wesela`
--
ALTER TABLE `wesela`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wesele_goscie`
--
ALTER TABLE `wesele_goscie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_wesele` (`id_wesele`),
  ADD KEY `id_ludzie` (`id_ludzie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `ludzie`
--
ALTER TABLE `ludzie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `wesela`
--
ALTER TABLE `wesela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `wesele_goscie`
--
ALTER TABLE `wesele_goscie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `wesele_goscie`
--
ALTER TABLE `wesele_goscie`
  ADD CONSTRAINT `wesele_goscie_ibfk_1` FOREIGN KEY (`id_wesele`) REFERENCES `wesela` (`id`),
  ADD CONSTRAINT `wesele_goscie_ibfk_2` FOREIGN KEY (`id_ludzie`) REFERENCES `ludzie` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
