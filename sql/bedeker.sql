-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Sty 2024, 18:20
-- Wersja serwera: 10.1.35-MariaDB
-- Wersja PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bedeker`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `client` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `arch` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `clients`
--

INSERT INTO `clients` (`id`, `client`, `tag`, `arch`) VALUES
(110, 'Microsoft', ';Microsoft;', 0),
(111, 'Ikea', ';Ikea;', 0),
(112, 'sdff', ';sdff;', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(11) NOT NULL,
  `client` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `mobile_phone` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `arch` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `contact_details`
--

INSERT INTO `contact_details` (`id`, `client`, `firstname`, `lastname`, `phone`, `mobile_phone`, `email`, `tag`, `arch`) VALUES
(10, '111', 'Sławek', 'Rok', ';222333444;444555666;', ';777888999;222333111;', ';slawomir.rok@ikea.pl;s.rok@ikea.pl;', ';Ikea;klient;szef it;', 0),
(11, '110', 'Miruś', 'Mirończuk', ';297878256;333444555;', ';222333444;222111333;', ';mireczek.m@micro.pl;mmironczuk@soft.com;', ';Microsoft;mirek;mironczuk;', 0),
(12, '111', 'Paweł', 'Dębski', ';222333222;', ';333222111;', ';p.debski@ikea.com;', ';Ikea;szef it;dębski;', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contact_details_comment`
--

CREATE TABLE `contact_details_comment` (
  `id` int(11) NOT NULL,
  `contact_details_id` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `date` date NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `arch` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `contact_details_comment`
--

INSERT INTO `contact_details_comment` (`id`, `contact_details_id`, `author`, `date`, `content`, `arch`) VALUES
(11, '12', 'Quazar', '2021-02-02', 'nie dwonić', 0),
(12, '12', 'Quazar', '2021-02-02', 'nigdy', 0),
(13, '12', 'Quazar', '2021-02-02', 'po prostu nie', 0),
(14, '11', 'Quazar', '2021-02-02', 'dwonić', 0),
(15, '11', 'Quazar', '2021-02-02', 'i to jeszcze jak', 0),
(16, '11', 'Quazar', '2021-02-02', 'dobry rozmówca, polecam +rep', 0),
(17, '10', 'Quazar', '2021-02-02', 'ekhem', 0),
(18, '10', 'Quazar', '2021-02-02', 'nie', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `procedures`
--

CREATE TABLE `procedures` (
  `id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `date` date NOT NULL,
  `path` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `arch` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `procedures`
--

INSERT INTO `procedures` (`id`, `author`, `subject`, `date`, `path`, `tag`, `arch`) VALUES
(24, 'Quazar', 'spamassassin mta', '2021-02-02', 'users_contents/spamassassin mta.txt', ';spamassassin;mta;', 0),
(25, 'Quazar', 'logowanie', '2021-07-05', 'users_contents/logowanie.txt', ';logowanie;', 0),
(26, 'Quazar', 'reload nginxa', '2021-07-05', 'users_contents/reload nginxa.txt', ';reload;nginx;', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `routers`
--

CREATE TABLE `routers` (
  `id` int(11) NOT NULL,
  `client` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `operator` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `down` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `up` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `local_contact` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `operator_contact` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `snmp_password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `arch` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `routers`
--

INSERT INTO `routers` (`id`, `client`, `location`, `model`, `ip`, `operator`, `down`, `up`, `type`, `user`, `password`, `state`, `local_contact`, `operator_contact`, `role`, `snmp_password`, `tag`, `arch`) VALUES
(51, '110', 'Poznań', 'turris', ';168.234.21.254;10.10.2.2;10.9.105.4;', ';Tempus;priv;priv;', ';200;', ';200;', ';dsl;', ';ubek;subek;', ';222;aaa;', 'Monitorowany', ';333444555 - Sławek;222333444 - Marcin;', ';800999777 - Tempus;', 'Centrala', '321', ';Microsoft;turris;centrala;', 0),
(55, '111', 'małkowo', 'allied', ';2.2.2.2;4.4.4.4;', ';test;test2;', ';3;3;', ';4;4;', ';dsl;p2p;', ';admin;haslo;', ';admin;hasło;', 'Niemonitorowany', ';333444555 - sławek;', ';222333444 - Marcin;', 'Oddział', 'sad', ';Ikea;centrala;', 0),
(56, '110', 'małkowo', 'allied', ';1.1.1.1;', ';ttt;', ';3;', ';2;', ';dsl;', ';dd;', ';dd;', 'Monitorowany', ';333444555 - ktoś;', ';666777888 - qq;', 'Oddział', '123', ';Microsoft;dsf;', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `routers_comment`
--

CREATE TABLE `routers_comment` (
  `id` int(11) NOT NULL,
  `routers_id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `date` date NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `arch` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `routers_comment`
--

INSERT INTO `routers_comment` (`id`, `routers_id`, `author`, `date`, `content`, `arch`) VALUES
(58, 51, 'Quazar', '2021-02-02', 'może', 0),
(59, 51, 'Quazar', '2021-02-02', 'oby', 0),
(60, 51, 'Quazar', '2021-02-02', 'tak!!', 0),
(65, 55, 'Quazar', '2021-07-05', 'dd', 0),
(66, 55, 'Quazar', '2021-07-05', 'gg', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `servers`
--

CREATE TABLE `servers` (
  `id` int(11) NOT NULL,
  `client` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `server_type` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `operation_system` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `server_role` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `arch` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `servers`
--

INSERT INTO `servers` (`id`, `client`, `location`, `server_type`, `operation_system`, `server_role`, `ip`, `user`, `password`, `state`, `tag`, `arch`) VALUES
(1, '111', 'Poznań', 'Kontener', 'Ubuntu18.04', ';zimbra;mta;', ';10.9.101.135;33.45.211.4;', ';root;', ';dAWdsse2;', 'Monitorowany', ';Ikea;zimbra;poczta;', 0),
(2, '110', 'małkowo', 'Fizyczny', 'centos', ';IFS;', ';22.22.22.22;10.10.14.23;', ';root;', ';ADNIAnia;', 'Monitorowany', ';Microsoft;', 0),
(3, '111', 'małkowo', 'Wirtualny', 'debian9', ';voip;', ';3.3.33.3;234.77.82.80;', ';root;cirrus;', ';123;almus;', 'Niemonitorowany', ';Ikea;voip;elastix;', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `servers_comment`
--

CREATE TABLE `servers_comment` (
  `id` int(11) NOT NULL,
  `servers_id` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `date` date NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `arch` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `servers_comment`
--

INSERT INTO `servers_comment` (`id`, `servers_id`, `author`, `date`, `content`, `arch`) VALUES
(7, '2', 'Quazar', '2021-02-02', 'PP działa no to super', 0),
(8, '2', 'Quazar', '2021-02-02', 'git', 0),
(9, '3', 'Quazar', '2021-02-02', 'molto bene', 0),
(10, '3', 'Quazar', '2021-02-02', 'mongoł', 0),
(11, '1', 'Quazar', '2021-02-02', 'echhh', 0),
(12, '1', 'Quazar', '2021-02-02', 'guttt', 0),
(15, '1', 'Quazar', '2021-02-02', 'git', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `arch` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `tags`
--

INSERT INTO `tags` (`id`, `tag`, `arch`) VALUES
(182, 'sanpol', 0),
(183, 'allied', 0),
(184, 'router', 0),
(185, 'turris', 0),
(186, 'centrala', 0),
(187, 'rockfin', 0),
(188, 'oddział', 0),
(192, 'zimbra', 0),
(193, 'poczta', 0),
(194, 'ifs', 0),
(195, 'ważne', 0),
(196, 'voip', 0),
(197, 'elastix', 0),
(200, 'klient', 0),
(201, 'szef it', 0),
(202, 'mirek', 0),
(203, 'mironczuk', 0),
(204, 'polcar', 0),
(205, 'dębski', 0),
(209, 'anwim', 0),
(230, 'spamassassin', 0),
(231, 'mta', 0),
(232, 'logowanie', 0),
(233, 'reload', 0),
(234, 'nginx', 0),
(235, 'vpn', 0),
(237, 'Microsoft', 0),
(238, 'Ikea', 0),
(239, 'test2', 0),
(240, 'Ik', 0),
(241, 'dsf', 0),
(242, 'sdff', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `privilege` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `firstname`, `lastname`, `email`, `password`, `privilege`) VALUES
(4, 'Quazar', 'Damian', 'Krzemiński', 'damian.krzeminski13@gmail.com', '$2y$10$kK4tXhXKLpq3gbV6Cj2h9.ipSFDNFMxTgGGJWWzDJ2WBrO7F9R9Tq', 'Admin'),
(26, 'cirrus_dm', 'Dominik', 'Matysiak', 'dmatysiak@cirrus.pl', '$2y$10$SkhQnBnjrGgEBrFO2VMqve3zcuh.kP0ynhHPgRL.g3Jy394bV9eYS', 'Admin'),
(27, 'cirrus_bl', 'Bartek', 'Łazarski', 'blazarski@cirrus.pl', '$2y$10$e4lAMknUFTE7.Zj0lZ.FquqfgNbDPYMakjzovIYJfp8hGUSzg2mhe', 'Admin');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `contact_details_comment`
--
ALTER TABLE `contact_details_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `procedures`
--
ALTER TABLE `procedures`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `routers`
--
ALTER TABLE `routers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `routers_comment`
--
ALTER TABLE `routers_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `servers_comment`
--
ALTER TABLE `servers_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT dla tabeli `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `contact_details_comment`
--
ALTER TABLE `contact_details_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `procedures`
--
ALTER TABLE `procedures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT dla tabeli `routers`
--
ALTER TABLE `routers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT dla tabeli `routers_comment`
--
ALTER TABLE `routers_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT dla tabeli `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `servers_comment`
--
ALTER TABLE `servers_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
