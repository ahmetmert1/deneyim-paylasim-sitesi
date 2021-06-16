-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Haz 2021, 20:33:16
-- Sunucu sürümü: 10.4.19-MariaDB
-- PHP Sürümü: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `user-verification`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `deneyim`
--

CREATE TABLE `deneyim` (
  `iddeneyim` int(11) NOT NULL,
  `iduye` int(11) NOT NULL,
  `urunadi` varchar(100) NOT NULL,
  `deneyim` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `deneyim`
--

INSERT INTO `deneyim` (`iddeneyim`, `iduye`, `urunadi`, `deneyim`) VALUES
(3, 4, 'Samsung galaxy s45', 'cok kotu bi telefon'),
(4, 7, 'selamselam', 'selambuselamtarafındanselam mustafa mustfa duznelendi\r\n'),
(6, 9, 'lenovo laptop', '3 yıl geçti  bok gibi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `verified`, `token`, `password`) VALUES
(1, 'ahmetmert', 'ahmet@gmail.com', 0, 'c987efc990295f50ea4e69bb328e1a6b963dc89f34d04c3a04cf6001daf8916144dfb0001f1662bfd99b85b891d2a5aa8388', '$2y$10$6mX5G0zF308qVXZtU97DPOQMPQzk4aTuDNT3TFtGRLA6uomdtkjvi'),
(2, 'taner', 'taner@hotmail.com', 0, 'a01cda851fc6c56ecb09b2447534de31e5b369a1e4f44ce1303a00951226252d5d88dd4d8b46e9dd5a7d94533f2474b85877', '$2y$10$oMx.Db4D6jYWJfOBo34xAONBnZ9NRAhJljOY9C1XAxzek8R0rFW.m'),
(3, 'tanere', 'taner2@hotmail.com', 0, '22645300eec8b255450448eb16405e8b03574c2ce39b29a34f9fee7386e98316769019959a94e7b240cb365ad9d24fb4499c', '$2y$10$h/k6lEGC8zUpyQUdaLoDhuDoE6OH2BfcMMI633BuM4ydljz/aQ7SK'),
(4, 'ahmert', 'ahmert@gmail.com', 0, 'f313795ae816919ae88e8cba7ef2129597ce41c789553d35423b3506b5599293777f35f41f7525a4999ba00d1c5303920120', '$2y$10$30zr/g6S5hv7XQcy2Vg0WuiDB8.SYlLj0SDyHitCs3AgbHhVXzcgG'),
(5, 'must', 'must@hotmail.com', 0, '9012e7b8c9d0c3577532dbfda6a61dd423daf4d05c9460d221d4e57835c3bfa938b6d20a9e52193e22768a5ca5be019dad54', '$2y$10$1TK.lJyxsfaHiUKT8IUiwOFr1l9NUDdyjBuUD/a46LQ4mTTR4qr1K'),
(6, 'selcuk', 'selcuk@hotmail.com', 0, '0c884a0ffae5a52e334d58113f847c037f51c857f4d5045dfec19f12abcd679b1f8b880366e2c60f20652cfb07ed6e66f2a6', '$2y$10$13Rp2ALHMguvBA3YDtlgnOiicBWtaAUVUO2KukfJUj4W7WJ3TWLIm'),
(7, 'selam', 'selam@gmail.com', 0, '5ea24a1bf6e3dfc2f3dbad21f81f4dfa5710bc48971a80cffda2d978fb8404c70183531ebb87bb7fb8c8d4385c07cf3db16e', '$2y$10$03uivLiWMK6eVG9lkRN8AuNIKqANbHQ5XJlko9GSQT8YMugDKGu1O'),
(8, 'osman', 'osman@gmail.com', 0, '8dde56fb928b158cf4386b5f56b77020b4700424eebfea69ddecdc8c94ef0c715f28cf9ce5546956735f891abeb0b79eac93', '$2y$10$TOJo.9.AokZBVw6.n3/y0.R6UDbY4J6fh59lFmPmo8ROhshru1UyG'),
(9, 'lenovo', 'lenovo@gmail.com', 0, '80fb0897a2de80dd26e23fd23b35a2d176ebbfb3c83394d3d5829ce7b1043b8499d802908098416c740d6b69908b4bc11b5b', '$2y$10$xVzDVVP8nxf65dEwVPHjzOHcHkVkRPjBwyYo6w5VlZmzYTZ.aamxS'),
(10, 'samsung', 'samsung@gmail.com', 0, '7c99c03c3149398501842f4ea2408d1911c5c8f6e5637463f7937951ef8cf26720d56f6753f109044f9703a0911746ffd2e6', '$2y$10$qEID6AbgLwOZxzRAphBqced9vg/4Ol3jkh4Um4KgRORCCl4tgkkF.');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `deneyim`
--
ALTER TABLE `deneyim`
  ADD PRIMARY KEY (`iddeneyim`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `deneyim`
--
ALTER TABLE `deneyim`
  MODIFY `iddeneyim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
