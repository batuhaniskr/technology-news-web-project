-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamaný: 14 Haz 2017, 22:17:45
-- Sunucu sürümü: 5.7.11-log
-- PHP Sürümü: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabaný: `teknoloji`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapýsý `aktiviteler`
--

CREATE TABLE `aktiviteler` (
  `aktiviteId` int(11) NOT NULL,
  `ipAdresi` varchar(50) NOT NULL,
  `tarih` varchar(50) NOT NULL,
  `aktiviteAd` text NOT NULL,
  `uyeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `aktiviteler`
--


-- --------------------------------------------------------

--
-- Tablo için tablo yapýsý `icerikler`
--

CREATE TABLE `icerikler` (
  `icerikId` int(11) NOT NULL,
  `icerikBaslik` text NOT NULL,
  `icerik` text NOT NULL,
  `turId` int(11) DEFAULT NULL,
  `icerikslider` varchar(10) NOT NULL,
  `videoUrl` varchar(100) NOT NULL,
  `onay` int(11) NOT NULL DEFAULT '0',
  `icerikTarih` varchar(50) NOT NULL,
  `izlenme` int(11) DEFAULT NULL,
  `icerikResim` varchar(100) NOT NULL,
  `icerikBDetay` varchar(400) NOT NULL,
  `seoKey` varchar(50) NOT NULL,
  `icerikYazar` varchar(50) NOT NULL,
  `kod1` text NOT NULL,
  `kod2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `icerikler`
--

CREATE TABLE `iletisim` (
  `iletisimId` int(11) NOT NULL,
  `iletisimAd` varchar(100) NOT NULL,
  `iletisimMail` varchar(50) NOT NULL,
  `iletisimBaslik` varchar(50) NOT NULL,
  `iletisimMesaj` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Tablo için tablo yapýsý `reyting`
--

CREATE TABLE `reyting` (
  `reytingId` int(11) NOT NULL,
  `ipAdresi` varchar(100) NOT NULL,
  `tarih` varchar(50) NOT NULL,
  `icerikId` int(11) NOT NULL,
  `saat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapýsý `scevapyorum`
--

CREATE TABLE `scevapyorum` (
  `scevapId` int(11) NOT NULL,
  `soruId` int(11) NOT NULL,
  `cevap` text NOT NULL,
  `uyeId` int(11) NOT NULL,
  `uyeAdSoyad` varchar(100) NOT NULL,
  `cevapTarih` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `scevapyorum`
--



-- --------------------------------------------------------

--
-- Tablo için tablo yapýsý `seokelimeler`
--

CREATE TABLE `seokelimeler` (
  `seoId` int(11) NOT NULL,
  `seo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `seokelimeler`
--


-- --------------------------------------------------------

--
-- Tablo için tablo yapýsý `sorucevap`
--

CREATE TABLE `sorucevap` (
  `uyeId` int(11) NOT NULL,
  `uyeAdSoyad` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `baslik` varchar(50) NOT NULL,
  `soru` text NOT NULL,
  `cevap` text NOT NULL,
  `soruId` int(11) NOT NULL,
  `turÝcerik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sorucevap`
--

CREATE TABLE `turler` (
  `turId` int(11) NOT NULL,
  `turÝcerik` varchar(100) NOT NULL,
  `turUrlseo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Tablo için tablo yapýsý `uyeler`
--

CREATE TABLE `uyeler` (
  `uyeId` int(11) NOT NULL,
  `uyeAdsoyad` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `sifre` varchar(50) NOT NULL,
  `uyeTarih` varchar(50) NOT NULL,
  `md5Id` varchar(50) NOT NULL,
  `uyeResimurl` varchar(50) NOT NULL,
  `tip` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uyeler`
--


CREATE TABLE `yorumlar` (
  `yorumId` int(11) NOT NULL,
  `yorum` text NOT NULL,
  `uyeId` int(11) NOT NULL,
  `yorumTarih` varchar(50) NOT NULL,
  `icerikId` int(11) NOT NULL,
  `uyeAdsoyad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yorumlar`
--


ALTER TABLE `aktiviteler`
  ADD PRIMARY KEY (`aktiviteId`);

--
-- Tablo için indeksler `icerikler`
--
ALTER TABLE `icerikler`
  ADD PRIMARY KEY (`icerikId`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`iletisimId`);

--
-- Tablo için indeksler `reyting`
--
ALTER TABLE `reyting`
  ADD PRIMARY KEY (`reytingId`);

--
-- Tablo için indeksler `scevapyorum`
--
ALTER TABLE `scevapyorum`
  ADD PRIMARY KEY (`scevapId`);

--
-- Tablo için indeksler `seokelimeler`
--
ALTER TABLE `seokelimeler`
  ADD PRIMARY KEY (`seoId`);

--
-- Tablo için indeksler `sorucevap`
--
ALTER TABLE `sorucevap`
  ADD PRIMARY KEY (`soruId`);

--
-- Tablo için indeksler `turler`
--
ALTER TABLE `turler`
  ADD PRIMARY KEY (`turId`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uyeId`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorumId`);

--
-- Dökümü yapýlmýþ tablolar için AUTO_INCREMENT deðeri
--

--
-- Tablo için AUTO_INCREMENT deðeri `aktiviteler`
--
ALTER TABLE `aktiviteler`
  MODIFY `aktiviteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
--
-- Tablo için AUTO_INCREMENT deðeri `icerikler`
--
ALTER TABLE `icerikler`
  MODIFY `icerikId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9049;
--
-- Tablo için AUTO_INCREMENT deðeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `iletisimId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT deðeri `reyting`
--
ALTER TABLE `reyting`
  MODIFY `reytingId` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT deðeri `scevapyorum`
--
ALTER TABLE `scevapyorum`
  MODIFY `scevapId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Tablo için AUTO_INCREMENT deðeri `seokelimeler`
--
ALTER TABLE `seokelimeler`
  MODIFY `seoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- Tablo için AUTO_INCREMENT deðeri `sorucevap`
--
ALTER TABLE `sorucevap`
  MODIFY `soruId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Tablo için AUTO_INCREMENT deðeri `turler`
--
ALTER TABLE `turler`
  MODIFY `turId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Tablo için AUTO_INCREMENT deðeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uyeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Tablo için AUTO_INCREMENT deðeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorumId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
