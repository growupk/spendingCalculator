-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Sze 01. 14:21
-- Kiszolgáló verziója: 10.1.23-MariaDB
-- PHP verzió: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `calculator`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cost`
--

CREATE TABLE `cost` (
  `id` int(11) NOT NULL,
  `to_spend_where` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `to_spend_what` varchar(300) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `to_spend_price` int(255) NOT NULL,
  `buy_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `costs_type` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `cost`
--

INSERT INTO `cost` (`id`, `to_spend_where`, `to_spend_what`, `to_spend_price`, `buy_date`, `costs_type`) VALUES
(1016, 'asd', 'asd', 30, '2017-09-01 12:46:21', 'Ã‰tel'),
(1017, 'sd', '213', 50, '2017-09-01 12:46:29', 'EgyÃ©b/Nem vÃ¡rt'),
(1018, 'sd', '213', 50, '2017-09-01 12:53:00', 'EgyÃ©b/Nem vÃ¡rt'),
(1019, 'sd', '213', 50, '2017-09-01 12:54:38', 'EgyÃ©b/Nem vÃ¡rt'),
(1020, 'sd', '213', 50, '2017-09-01 12:54:47', 'EgyÃ©b/Nem vÃ¡rt'),
(1021, 'sd', '213', 50, '2017-09-01 12:55:25', 'EgyÃ©b/Nem vÃ¡rt'),
(1022, 'sd', '213', 50, '2017-09-01 12:55:30', 'EgyÃ©b/Nem vÃ¡rt'),
(1023, 'sd', '213', 50, '2017-09-01 12:55:43', 'EgyÃ©b/Nem vÃ¡rt'),
(1024, 'sd', '213', 50, '2017-09-01 12:55:50', 'EgyÃ©b/Nem vÃ¡rt'),
(1025, 'sd', '213', 50, '2017-09-01 12:55:57', 'EgyÃ©b/Nem vÃ¡rt'),
(1026, 'sd', '213', 50, '2017-09-01 12:56:31', 'EgyÃ©b/Nem vÃ¡rt'),
(1027, 'sd', '213', 50, '2017-09-01 12:56:39', 'EgyÃ©b/Nem vÃ¡rt'),
(1028, 'sd', '213', 50, '2017-09-01 12:57:23', 'EgyÃ©b/Nem vÃ¡rt'),
(1029, 'sd', '213', 50, '2017-09-01 12:58:49', 'EgyÃ©b/Nem vÃ¡rt'),
(1030, 'sd', '213', 50, '2017-09-01 12:59:10', 'EgyÃ©b/Nem vÃ¡rt'),
(1031, 'sd', '213', 50, '2017-09-01 12:59:14', 'EgyÃ©b/Nem vÃ¡rt'),
(1032, 'sd', '213', 50, '2017-09-01 12:59:38', 'EgyÃ©b/Nem vÃ¡rt'),
(1033, 'sd', '213', 50, '2017-09-01 13:00:17', 'EgyÃ©b/Nem vÃ¡rt'),
(1034, 'sd', '213', 50, '2017-09-01 13:19:43', 'EgyÃ©b/Nem vÃ¡rt'),
(1035, 'sd', '213', 50, '2017-09-01 13:43:37', 'EgyÃ©b/Nem vÃ¡rt'),
(1036, 'sd', '213', 50, '2017-09-01 13:44:09', 'EgyÃ©b/Nem vÃ¡rt'),
(1037, 'asd', 'asd', 12312123, '2017-09-01 14:04:50', 'Ã‰tel'),
(1038, 'asd', 'asd', 12312123, '2017-09-01 14:07:22', 'Ã‰tel'),
(1039, 'asd', 'asd', 12312123, '2017-09-01 14:09:12', 'Ã‰tel'),
(1040, '123', '123', 123, '2017-09-01 14:09:20', 'Ãœzemanyag'),
(1041, '123', '123', 123, '2017-09-01 14:10:23', 'Ãœzemanyag');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `gate_money`
--

CREATE TABLE `gate_money` (
  `id` int(255) NOT NULL,
  `total_money` int(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `next_money` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `gate_money`
--

INSERT INTO `gate_money` (`id`, `total_money`, `date`, `next_money`) VALUES
(16, 1000, '2017-09-01 14:21:05', NULL);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `gate_money`
--
ALTER TABLE `gate_money`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1042;
--
-- AUTO_INCREMENT a táblához `gate_money`
--
ALTER TABLE `gate_money`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
