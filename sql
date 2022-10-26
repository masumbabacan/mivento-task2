-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 Eki 2022, 10:45:29
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mivento-task`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `employee_id` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `employee_id`, `phone`, `point`) VALUES
(274, 'Rina', 'Sweeney', 'urna.Nunc@Integertincidunt.com', '161711075760', '5306300252', 566),
(275, 'Vivien', 'Hall', 'faucibus.id@aliquetmetus.edu', '161905234439', '5304886681', 2829),
(276, 'Clark', 'Waters', 'at@loremvitaeodio.net', '168206271762', '5321711590', 3637),
(277, 'Kalia', 'Berg', 'a@vehicula.net', '160605173277', '5308408752', 4179),
(278, 'Aladdin', 'Hayden', 'Maecenas.mi@egetmollis.org', '162809279629', '5324387843', 3739),
(279, 'Kylynn', 'Macdonald', 'hendrerit.consectetuer@utlacusNulla.org', '165804230224', '5305287615', 2262),
(280, 'Prescott', 'Castro', 'leo.elementum@utnullaCras.com', '168101093386', '5301544982', 4017),
(281, 'Linus', 'Stein', 'sit.amet@Donec.net', '165112155022', '5304285436', 2081),
(282, 'Daphne', 'Giles', 'egestas.ligula@necenimNunc.ca', '161709208662', '5307662108', 533),
(283, 'Donovan', 'Hodge', 'Mauris.vestibulum.neque@CurabiturmassaVestibulum.com', '168002252180', '5328904203', 4354),
(284, 'Malik', 'Harrington', 'non@Quisqueornare.edu', '161004024541', '5302242891', 2580),
(285, 'Blair', 'Hicks', 'ornare.Fusce@diamatpretium.com', '162803048426', '5323146931', 91),
(286, 'Scarlet', 'Pate', 'orci.quis@sagittisplaceratCras.co.uk', '162106086701', '5328123221', 291),
(287, 'Hannah', 'Mcdowell', 'rutrum@tristiqueneque.org', '164207062391', '5324795456', 3170),
(288, 'Murphy', 'Kennedy', 'a.neque.Nullam@Incondimentum.co.uk', '168311281888', '5309437949', 3155),
(289, 'Felix', 'Newman', 'egestas@diam.edu', '161101204517', '5328005365', 2585),
(290, 'Caesar', 'Rojas', 'Praesent.interdum@acorci.co.uk', '167207091815', '5327325529', 2447),
(291, 'Octavius', 'Shaffer', 'ipsum@et.ca', '169305110687', '5323037164', 2446),
(292, 'Roanna', 'Kramer', 'ac.metus@arcuVestibulum.co.uk', '164603183205', '5305699006', 1862),
(293, 'Nathaniel', 'Wooten', 'lacus.vestibulum@vitaerisusDuis.ca', '165304233082', '5325625352', 80),
(294, 'Karen', 'Hill', 'facilisis@urna.edu', '164104042413', '5309634135', 4629),
(295, 'Marny', 'Warner', 'Donec.sollicitudin@blanditcongueIn.co.uk', '166910092086', '5309211317', 2619),
(296, 'Upton', 'Lynch', 'pede.Cum.sociis@nequeSedeget.edu', '167705054141', '5306292542', 3069),
(297, 'Xaviera', 'Barton', 'ultrices.Duis@tristique.org', '165810181346', '5323366890', 985),
(298, 'Hedwig', 'Benton', 'Vivamus@imperdiet.co.uk', '160601300767', '5327677142', 2434),
(299, 'Nolan', 'Bass', 'Aliquam@ipsumPhasellusvitae.com', '160005274485', '5324682431', 292),
(300, 'Armand', 'Hess', 'Proin@enim.org', '165905090972', '5325917179', 215),
(301, 'Catherine', 'Hammond', 'ut.lacus.Nulla@lorem.org', '166204119660', '5325716200', 4912),
(302, 'Thane', 'Stanley', 'arcu.et@aliquamadipiscing.edu', '169102266120', '5324588610', 1282),
(303, 'Yetta', 'Watson', 'neque.Sed@arcu.ca', '166803090411', '5309544240', 933),
(304, 'Oprah', 'Jacobs', 'odio@Donec.ca', '165505294909', '5301124051', 4828),
(305, 'Zia', 'Kirk', 'et.lacinia.vitae@leo.net', '164612196545', '5303972214', 2213),
(306, 'Hedy', 'Murray', 'quis.arcu.vel@acarcu.org', '160503214843', '5304112469', 4648),
(307, 'Christopher', 'Warren', 'mus@acmetus.co-uk', '164603260383', '5327551478', 3909);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`employee_id`,`phone`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
