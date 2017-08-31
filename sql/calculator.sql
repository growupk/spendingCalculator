-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Aug 31. 21:37
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
(844, 'itt', 'arra', 100, '2017-08-27 00:51:46', 'Ã‰tel'),
(845, 'asd', 'asd', 124, '2017-08-27 00:52:10', 'Ãœzemanyag'),
(846, 'asd', 'asd', 450, '2017-08-27 00:52:27', 'AlbÃ©rlet/Rezsi'),
(847, 'asd', 'asd', 450, '2017-08-27 01:19:26', 'AlbÃ©rlet/Rezsi'),
(848, 'asd', 'asd', 450, '2017-08-27 01:20:46', 'AlbÃ©rlet/Rezsi'),
(849, 'sd', 'dfdf', 1, '2017-08-27 01:21:30', 'Ãœzemanyag'),
(850, 'sd', 'dfdf', 1, '2017-08-27 01:24:20', 'Ãœzemanyag'),
(851, 'sd', 'dfdf', 1, '2017-08-27 01:24:59', 'Ãœzemanyag'),
(852, 'sd', 'dfdf', 1, '2017-08-27 01:27:50', 'Ãœzemanyag'),
(853, 'sd', 'dfdf', 1, '2017-08-27 01:29:17', 'Ãœzemanyag'),
(854, 'sd', 'dfdf', 1, '2017-08-27 01:31:35', 'Ãœzemanyag'),
(855, 'sda', 'ad', 3000, '2017-08-27 01:32:05', 'Luxus'),
(856, 'af ', 'df ', 650, '2017-08-27 01:32:29', 'EgyÃ©b/Nem vÃ¡rt'),
(857, 'af ', 'df ', 650, '2017-08-27 01:40:38', 'EgyÃ©b/Nem vÃ¡rt'),
(858, 'af ', 'df ', 650, '2017-08-27 01:45:37', 'EgyÃ©b/Nem vÃ¡rt'),
(859, 'af ', 'df ', 650, '2017-08-27 01:50:15', 'EgyÃ©b/Nem vÃ¡rt'),
(860, 'af ', 'df ', 650, '2017-08-27 01:51:32', 'EgyÃ©b/Nem vÃ¡rt'),
(861, 'af ', 'df ', 650, '2017-08-27 01:51:58', 'EgyÃ©b/Nem vÃ¡rt'),
(862, 'af ', 'df ', 650, '2017-08-27 01:56:35', 'EgyÃ©b/Nem vÃ¡rt'),
(863, 'af ', 'df ', 650, '2017-08-28 17:22:59', 'EgyÃ©b/Nem vÃ¡rt');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=864;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
