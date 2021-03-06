-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Sze 20. 18:03
-- Kiszolgáló verziója: 10.1.16-MariaDB
-- PHP verzió: 5.6.24

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
(1052, 'FÃ©legyhÃ¡zi', 'zsÃ¶mle', 170, '2017-09-02 17:26:53', 'Ã‰tel'),
(1053, 'Auchan', 'ebÃ©d', 2530, '2017-09-02 17:27:24', 'Ã‰tel'),
(1054, 'SpÃ¡r', 'vacsora, ebÃ©d', 1739, '2017-09-04 18:07:47', 'Ã‰tel'),
(1055, 'SpÃ¡r', 'vacsora, ebÃ©d', 851, '2017-09-05 19:04:42', 'Ã‰tel'),
(1056, 'SpÃ¡r', 'vacsora, ebÃ©d, reggeli', 2256, '2017-09-06 18:43:14', 'Ã‰tel'),
(1057, 'FÃ©legyhÃ¡zi', 'kifli', 180, '2017-09-07 17:07:58', 'Ã‰tel'),
(1058, 'SpÃ¡r', 'vacsora', 584, '2017-09-07 17:08:31', 'Ã‰tel'),
(1059, 'Utca', 'Ã¼dÃ­tÅ‘', 3000, '2017-09-08 16:50:36', 'Luxus'),
(1060, 'Tesco', 'szilikon, autÃ³ illatosÃ­tÃ³', 2044, '2017-09-09 21:26:58', 'EgyÃ©b/Nem vÃ¡rt'),
(1061, '11 Ã“rÃ¡si', 'SÃ¶r', 420, '2017-09-10 11:42:40', 'Luxus'),
(1062, 'OMV', 'benzin', 5003, '2017-09-10 15:55:14', 'Ãœzemanyag'),
(1063, 'Anyu', 'biztosÃ­tÃ¡s, kocsi kilincs', 15000, '2017-09-10 15:55:59', 'EgyÃ©b/Nem vÃ¡rt'),
(1064, 'Fundamenta', 'lakÃ¡s takarÃ©k', 10000, '2017-09-12 20:07:08', 'Luxus'),
(1065, 'SpÃ¡r', 'vacsora', 705, '2017-09-12 20:08:14', 'Ã‰tel'),
(1066, 'HÃ¡ztartÃ¡s', 'kÃ¶zÃ¶s kassza', 1000, '2017-09-14 18:02:22', 'AlbÃ©rlet/Rezsi'),
(1067, 'MediaMarkt', 'jack kÃ¡bel', 600, '2017-09-14 18:03:58', 'EgyÃ©b/Nem vÃ¡rt'),
(1068, 'SpÃ¡r', 'sÃ¶rÃ¶k', 1096, '2017-09-14 18:07:42', 'Luxus'),
(1069, 'SpÃ¡r', 'vacsora', 492, '2017-09-14 18:08:36', 'Ã‰tel'),
(1070, 'Itthon', 'Kard (Andor)', 1000, '2017-09-15 00:11:07', 'EgyÃ©b/Nem vÃ¡rt'),
(1071, 'FÃ©legyhÃ¡zi', 'kifli', 120, '2017-09-15 17:02:47', 'Ã‰tel'),
(1072, 'Obi', 'csavarhÃºzÃ³k, csavarok', 2938, '2017-09-15 19:48:11', 'EgyÃ©b/Nem vÃ¡rt'),
(1073, 'Tesco', 'pÃ©ksÃ¼ti (kirÃ¡ndulÃ¡s)', 1243, '2017-09-16 20:41:23', 'Ã‰tel'),
(1074, 'Exchange', 'romÃ¡n lej', 4970, '2017-09-16 20:46:58', 'Luxus'),
(1075, 'Omv', 'benzin', 4000, '2017-09-16 20:47:24', 'Ãœzemanyag'),
(1076, 'Pizza Torony', 'pizza', 1430, '2017-09-16 20:52:52', 'Ã‰tel'),
(1077, 'SpÃ¡r', 'ebÃ©d, vacsora', 2543, '2017-09-17 15:45:27', 'Ã‰tel'),
(1078, 'SpÃ¡r', 'vacsora', 752, '2017-09-19 19:17:09', 'Ã‰tel'),
(1079, 'SpÃ¡r', 'vacsora, ebÃ©d', 640, '2017-09-20 18:02:41', 'Ã‰tel'),
(1080, 'SpÃ¡r', 'vitamin', 1599, '2017-09-20 18:03:08', 'EgyÃ©b/Nem vÃ¡rt');

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
(16, 138854, '2017-09-01 14:21:05', 69949);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1081;
--
-- AUTO_INCREMENT a táblához `gate_money`
--
ALTER TABLE `gate_money`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
