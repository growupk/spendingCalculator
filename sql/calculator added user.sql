-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Sze 20. 14:45
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
(1283, 'Tesco', 'vacsora', 3415, '2017-09-19 11:58:40', 'Ã‰tel'),
(1284, 'SpÃ¡r', 'nagy bevÃ¡sÃ¡rlÃ¡s', 12030, '2017-09-19 11:59:11', 'Ã‰tel'),
(1285, 'Omv', 'benzin', 15000, '2017-09-19 11:59:29', 'Ãœzemanyag'),
(1286, 'MÃ¡tra', 'kirÃ¡ndulÃ¡s', 37307, '2017-09-19 12:00:27', 'Luxus'),
(1287, 'Auchan', 'reggeli, ebÃ©d', 4150, '2017-09-19 12:01:12', 'Ã‰tel'),
(1288, 'Allianz', 'biztosÃ­tÃ¡s', 22500, '2017-09-19 12:02:42', 'EgyÃ©b/Nem vÃ¡rt'),
(1289, 'Szeged', 'szÃ¡mlÃ¡k', 30000, '2017-09-19 12:03:48', 'AlbÃ©rlet/Rezsi'),
(1290, 'test', 'test', 500, '2017-09-20 09:51:53', 'Ã‰tel'),
(1291, 'test', 'test', 10, '2017-09-20 14:34:55', 'Ã‰tel'),
(1292, 'test', 'test', 500, '2017-09-20 16:19:04', 'Ãœzemanyag'),
(1293, 'test', 'test', 777, '2017-09-20 16:19:30', 'Luxus');

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
(16, 124912, '2017-09-01 14:21:05', -1277);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `user_type`, `username`, `password`) VALUES
(4, 'admin', 'growupk', '*A4B6157319038724E3560894F7F932C8886EBFCF');

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
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1294;
--
-- AUTO_INCREMENT a táblához `gate_money`
--
ALTER TABLE `gate_money`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
