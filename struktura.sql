-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Cze 2017, 12:50
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

--
-- Zrzut danych tabeli `ludzie`
--

INSERT INTO `ludzie` (`id`, `imie`, `partner`, `dzieci`, `iledzieci`, `odkogo`) VALUES
(12, 'Ewelina KaÅºmierak', 'NIE', 'NIE', 0, 'WspÃ³lny'),
(13, 'Marcin Banach', 'NIE', 'NIE', 0, 'WspÃ³lny'),
(14, 'Maciej Romaniuk', 'TAK', 'NIE', 0, 'WspÃ³lny'),
(15, 'Åukasz Szewczyk', 'TAK', 'NIE', 0, 'WspÃ³lny');

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
(4, 'Mateusz', 'Katarzyna', '2018-06-16', 'sienio', '$2y$10$XARNbTA/9xi6kMkQuMQzpewwWXrJlGrlwS2TdojVOtfoRNC2igr6W');

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
-- Zrzut danych tabeli `wesele_goscie`
--

INSERT INTO `wesele_goscie` (`id`, `id_wesele`, `id_ludzie`) VALUES
(10, 4, 12),
(11, 4, 13),
(12, 4, 14),
(13, 4, 15);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT dla tabeli `wesela`
--
ALTER TABLE `wesela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `wesele_goscie`
--
ALTER TABLE `wesele_goscie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
