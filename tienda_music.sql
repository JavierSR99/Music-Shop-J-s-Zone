-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2020 a las 12:20:01
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_music`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `cod_artista` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`cod_artista`, `nombre`, `descripcion`) VALUES
(1, 'Chris Brown', 'Born in May 5th, 1989. King of R&B'),
(2, 'Justin Bieber', 'Known as the new prince of pop. Canadian and blonde'),
(3, 'C. Tangana', 'Spanish trapper born in Madrid. A lot of autotune.'),
(4, 'Summer Walker', 'Appeared in 2019 and broke the inernet. Soft R&B'),
(5, 'Tyga', 'Also known as T-Raww. One of the greatest rappers of this century.'),
(6, 'Drake', 'Canadian rapper. In his feelings. Used to love Rihanna'),
(7, 'Kygo', 'Norwegian electronic producer who broke into mainstream in the 2010s with a tropical house sound'),
(8, 'Alter Ego', 'Anonymous jazz singer. I don\'t know anything about him so sorry :('),
(9, 'SFDK', 'Grupo de rap andaluz. Son un poco boomers'),
(10, 'El Canto Del Loco', 'Grupo ya separado de pop-rock español. Muy buenos.'),
(11, 'Billie Eilish', 'Very sinister and very young. Seems to be diabolic'),
(12, 'Swan Fyahbwoy', 'Conocido como el impulsor del reggae en España. Un referente.'),
(13, 'IZAL', 'Grupo de indie que cuyo viaje inició en 2010. Encabezados por Mikel Izal'),
(14, 'Justin Timberlake', 'The legendary Timberlake. Singer, dancer and actor. Great dad.'),
(15, 'Extremoduro', 'Grupo de rock español que inició su carrera en los años 80, liderados por Roberto Iniesta.'),
(16, 'Jhené Aiko', 'American R&B female singer. Very spiritual and chilled.'),
(17, 'Diego El Cigala', 'Spanish gitano very very famous. A legend.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `cod_cancion` int(11) NOT NULL,
  `nombre_pista` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_cd` int(11) NOT NULL,
  `numero` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`cod_cancion`, `nombre_pista`, `cod_cd`, `numero`) VALUES
(1, 'Indigo', 8, 1),
(2, 'Back To Love', 8, 2),
(3, 'Come Together (ft. H.E.R.)', 8, 3),
(4, 'Temporary Lover (ft. Lil Jon)', 8, 4),
(5, 'Emerald/Burgundy (ft. Juvenile & Juicy J)', 8, 5),
(6, 'Red', 8, 6),
(7, 'All I Want (ft. Tyga)', 8, 7),
(8, 'Wobble Up (ft. Nicki Minaj & G-Eazy)', 8, 8),
(9, 'Need A Stack (ft. Lil Wayne & Joyner Lucas)', 8, 9),
(10, 'Heat (ft. Gunna)', 8, 10),
(11, 'No Guidance (ft. Drake)', 8, 11),
(12, 'Girl Of My Dreams', 8, 12),
(13, 'Natural Disaster/Aura', 8, 13),
(14, 'Don\'t Check On Me (ft. Justin Bieber & Ink)', 8, 14),
(15, 'Sorry Enough', 8, 15),
(16, 'Juice', 8, 16),
(17, 'You Like That', 8, 17),
(18, 'Troubled Waters', 8, 18),
(19, 'Take A Risk', 8, 19),
(20, 'Trust Issues/Act In', 8, 21),
(21, 'Cheetah', 8, 22),
(22, 'Lurkin\' (ft. Tory Lanez)', 8, 20),
(23, 'Autoterapia', 18, 1),
(24, 'El Pozo', 18, 2),
(25, 'Ruido Blanco', 18, 3),
(26, 'Bill Murray', 18, 4),
(27, 'Pausa', 18, 5),
(28, 'Santa Paz', 18, 6),
(29, 'Canción para Nadie', 18, 7),
(30, 'La Increíble Historia Del Hombre Que Podía Volar Pero No sabía Cómo', 18, 8),
(31, 'El Temblor', 18, 9),
(32, 'Temas Amables', 18, 10),
(33, 'Variables', 18, 11),
(34, 'All Around Me', 5, 1),
(35, 'Habitual', 5, 2),
(36, 'Come Around Me', 5, 3),
(37, 'Intentions (ft. Quavo)', 5, 4),
(38, 'Yummy', 5, 5),
(39, 'Available', 5, 6),
(40, 'Forever (ft. Post Malone & Clever)', 5, 7),
(41, 'Running Over (ft. Lil Dicky)', 5, 8),
(42, 'Take It Out On Me', 5, 9),
(43, 'Second Emotion (ft. Travis Scott)', 5, 10),
(44, 'Get Me (ft. Kehlani)', 5, 11),
(45, 'E.T.A.', 5, 12),
(46, 'Changes', 5, 13),
(47, 'Confirmation', 5, 14),
(48, 'That\'s What Love Is', 5, 15),
(49, 'At Least For Now', 5, 16),
(50, 'Yummy - Summer Walker Remix', 5, 17),
(51, 'Deuces ft. Tyga & Kevin McCall)', 6, 1),
(52, 'Up To You', 6, 2),
(63, 'No BS (ft. Kevin McCall)', 6, 3),
(64, 'Look At Me Now (ft. Lil Wayne & Busta Rhymes)', 6, 4),
(65, 'She Ain\'t You', 6, 5),
(66, 'Say It With Me', 6, 6),
(67, 'Yeah 3x', 6, 7),
(68, 'Next To You', 6, 8),
(69, 'All Back', 6, 9),
(70, 'Wet The Bed (ft. Ludacris)', 6, 10),
(71, 'Oh My Love', 6, 11),
(72, 'Should\'ve Kissed You', 6, 12),
(73, 'Beautiful People (ft. Benny Benassi)', 6, 13),
(74, 'Bomb (ft. Wiz Khalifa)', 6, 14),
(75, 'Love The Girls (ft. Eva Simons)', 6, 15),
(76, 'Paper, Scissors, Rock (ft. Big Sean & Timbaland)', 6, 16),
(77, 'Beg For It', 6, 17),
(78, 'Champion (w/ Chip)', 6, 18),
(79, 'Turn Up The Music', 20, 1),
(80, 'Bassline', 20, 2),
(81, 'Till I Die (ft. Big Sean & Wiz Khalifa)', 20, 3),
(82, 'Mirage (feat. Nas)', 20, 4),
(83, 'Don\'t Judge Me', 20, 5),
(84, 'A fuego', 37, 1),
(85, 'La vereda de la puerta de atrás', 37, 2),
(86, 'Hoy te la meto hasta las orejas', 37, 3),
(87, 'Stand by', 37, 4),
(88, 'Menamoro', 37, 5),
(89, 'Luce la oscuridad', 37, 6),
(90, 'Cerca del suelo', 37, 7),
(91, 'P*ta', 37, 8),
(92, 'Buitre no come alpiste', 37, 9),
(93, 'La vieja (Canción sórdida)', 37, 10),
(94, '!!!!!!!!', 15, 1),
(95, 'bad guy', 15, 2),
(96, 'xanny', 15, 3),
(97, 'you should see me in a crown', 15, 4),
(98, 'all the good girls go to hell', 15, 5),
(99, 'wish you were gay', 15, 6),
(100, 'when the party\'s over', 15, 7),
(101, '8', 15, 8),
(102, 'my strange addiction', 15, 9),
(103, 'bury a friend', 15, 10),
(104, 'ilomilo', 15, 11),
(105, 'listen before i go', 15, 12),
(106, 'i love you', 15, 13),
(107, 'goodbye', 15, 14),
(108, 'Undecided', 8, 23),
(109, 'BP / No Judgement', 8, 24),
(110, 'Side Nigga', 8, 25),
(111, 'Throw It Back', 8, 26),
(112, 'All On Me', 8, 27),
(113, 'Sexy (ft. Trey Songz)', 8, 28),
(114, 'Early 2K (ft. Tank)', 8, 29),
(115, 'Dear God', 8, 30),
(116, 'Part Of The Plan', 8, 31),
(117, 'Play Catch Up', 8, 32),
(118, 'Tiempo', 9, 1),
(119, 'Inditex', 9, 2),
(120, 'De Pie', 9, 3),
(121, 'No Te Pegas', 9, 4),
(122, 'Intoxicao', 9, 5),
(123, 'Espabilao', 9, 6),
(124, 'Demasiado Tarde', 9, 7),
(125, 'Caballo Ganador', 9, 8),
(126, 'Mala Mujer', 9, 9),
(127, 'Otro Hombre', 9, 10),
(128, 'Pa Que Brille', 9, 11),
(129, 'Pop Ur Pussy', 9, 12),
(130, 'Never Let Go (ft. John Newman)', 11, 1),
(131, 'Sunrise (ft. Jason Walker)', 11, 2),
(132, 'Riding Shotgun (ft. Bonnie McKee)', 11, 3),
(133, 'Stranger Things (ft. OneRepublic)', 11, 4),
(134, 'With You (ft. Wrabel)', 11, 5),
(135, 'Kids In Love (ft. The Night Game)', 11, 6),
(136, 'Permanent (w/ JHart)', 11, 7),
(137, 'I See You (ft. Billy Raffoul)', 11, 8),
(138, 'Remind Me to Forget', 11, 9),
(139, 'Lotus (Intro)', 40, 1),
(140, 'Triggered (freestyle)', 40, 2),
(141, 'None of Your Concern', 40, 3),
(142, 'Speak', 40, 4),
(143, 'B.S. (ft. H.E.R.)', 40, 5),
(144, 'PU$$Y Fairy (OTW)', 40, 6),
(145, 'Hapiness Over Everything (H.O.E.) (ft. Future & Miguel)', 40, 7),
(146, 'One Way (ft. Ab-Soul)', 40, 8),
(147, 'Define Me (Interlude)', 40, 9),
(148, 'Surrender (ft. Dr. Chill)', 40, 10),
(149, 'Tryna Smoke', 40, 11),
(150, 'Born Tired', 40, 12),
(151, 'LOVE', 40, 13),
(152, '10k Hours (ft. Nas)', 40, 14),
(153, 'Summer 2020 (Interlude)', 40, 15),
(154, 'Mourning Doves', 40, 16),
(155, 'Pray For You', 40, 17),
(156, 'Lightning & Thunder (ft. John Legend)', 40, 18),
(157, 'Magic Hour', 40, 19),
(158, 'Party For Me (ft. Ty Dolla $ign)', 40, 20),
(159, 'Grass Ain\'t Greener', 22, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cd`
--

CREATE TABLE `cd` (
  `cod_cd` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_lanz` date NOT NULL,
  `portada` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `n_ventas` int(11) NOT NULL,
  `cod_artista` int(11) NOT NULL,
  `cod_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cd`
--

INSERT INTO `cd` (`cod_cd`, `titulo`, `fecha_lanz`, `portada`, `precio`, `n_ventas`, `cod_artista`, `cod_genero`) VALUES
(4, 'Purpose', '2015-11-13', 'img/portadas/purpose.jpg', '9.50', 1, 2, 5),
(5, 'Changes', '2020-02-14', 'img/portadas/changes.jpg', '14.50', 0, 2, 1),
(6, 'F.A.M.E.', '2011-03-22', 'img/portadas/fame.jpg', '8.00', 4, 1, 1),
(7, 'Legendary', '2019-06-07', 'img/portadas/legendary.jpg', '12.99', 1, 5, 2),
(8, 'Indigo', '2019-06-28', 'img/portadas/indigo.jpg', '14.50', 6, 1, 1),
(9, 'Ídolo', '2017-10-05', 'img/portadas/idolo.jpg', '7.50', 0, 3, 7),
(10, 'Scorpion', '2018-06-29', 'img/portadas/scorpion.jpg', '9.90', 0, 6, 2),
(11, 'Kids In Love', '2017-11-03', 'img/portadas/kids in love.jpg', '5.50', 2, 7, 6),
(12, 'We\'re here', '2018-02-07', 'img/portadas/were here.jpg', '4.00', 1, 8, 4),
(13, 'Sin miedo a vivir', '2014-12-06', 'img/portadas/sinmiedoavivir.jpg', '7.00', 0, 9, 8),
(14, 'Zapatillas', '2004-11-30', 'img/portadas/zapatillas.jpg', '5.50', 2, 10, 3),
(15, 'WHEN WE ALL FALL ASLEEP, WHERE DO WE GO?', '2019-03-29', 'img/portadas/whenwereasleep.jpg', '10.99', 0, 11, 3),
(16, 'F.Y.A.H.', '2018-03-23', 'img/portadas/fyah.jpg', '12.50', 0, 12, 9),
(17, 'Magia & Efectos Especiales', '2012-04-12', 'img/portadas/magiaefectos.jpg', '7.99', 2, 13, 10),
(18, 'Autoterapia', '2018-03-09', 'img/portadas/autoterapia.jpg', '14.99', 0, 13, 10),
(19, 'Chris Brown', '2004-11-30', 'img/portadas/chrisbrown.jpg', '3.99', 0, 1, 1),
(20, 'Fortune', '2012-07-03', 'img/portadas/fortune.jpg', '8.50', 0, 1, 1),
(21, 'Exclusive', '2007-11-06', 'img/portadas/exclusive.jpg', '5.99', 0, 1, 1),
(22, 'Heartbreak On A Full Moon', '2017-10-31', 'img/portadas/heartbreak.jpg', '12.99', 0, 1, 1),
(23, 'Royalty', '2015-12-18', 'img/portadas/royalty.jpg', '7.99', 0, 1, 1),
(32, 'Man Of The Woods', '2018-02-02', 'img/portadas/manofthewoods.jpg', '14.62', 1, 14, 5),
(36, 'X', '2014-09-08', 'img/portadas/x.jpg', '7.99', 0, 1, 1),
(37, 'Yo, Minoria Absoluta', '2002-03-01', 'img/portadas/yominoria.jpg', '5.95', 0, 15, 3),
(38, 'Graffiti', '2009-12-08', 'img/portadas/grafitti.jpg', '6.50', 0, 1, 1),
(39, 'If You\'re Reading This It\'s Too Late', '2015-02-12', 'img/portadas/ifyourereadingthis.jpg', '10.99', 1, 6, 2),
(40, 'Chilombo', '2020-03-06', 'img/portadas/chilombo.jpg', '10.99', 0, 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `cod_genero` int(11) NOT NULL,
  `nombre_genero` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`cod_genero`, `nombre_genero`) VALUES
(1, 'R&B'),
(2, 'Hip-Hop'),
(3, 'Rock'),
(4, 'Jazz'),
(5, 'Pop'),
(6, 'EDM'),
(7, 'Trap'),
(8, 'Rap'),
(9, 'Reggae'),
(10, 'Indie/Alternativa'),
(11, 'K-Pop');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `cod_user` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `saldo` decimal(5,2) NOT NULL,
  `n_cd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`cod_user`, `user`, `password`, `email`, `saldo`, `n_cd`) VALUES
(14, 'JavierSR99', '85a2c228694f408c48de03d62f26251b', 'javiersr11999@gmail.com', '3.89', 12),
(15, 'admin', '0192023a7bbd73250516f069df18b500', 'usuario_administrador@admin.com', '0.00', 0),
(16, 'PepeHD', '89be6148585bfb50d2f7535ec219dfaf', 'pepepepe@gmail.com', '4.00', 1),
(17, 'Javier', '74b87337454200d4d33f80c4663dc5e5', 'aaaaa@gmail.com', '0.00', 0),
(18, 'prueba', '8ace72535e8ea08b22681721a437a6f5', 'prueba@gmail.com', '0.00', 0),
(19, 'a', '0cc175b9c0f1b6a831c399e269772661', 'aaa@correo.es', '0.00', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`cod_artista`);

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`cod_cancion`),
  ADD KEY `cod_cd` (`cod_cd`);

--
-- Indices de la tabla `cd`
--
ALTER TABLE `cd`
  ADD PRIMARY KEY (`cod_cd`),
  ADD KEY `cod_artista` (`cod_artista`),
  ADD KEY `cod_genero` (`cod_genero`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`cod_genero`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`cod_user`,`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `cod_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `cod_cancion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT de la tabla `cd`
--
ALTER TABLE `cd`
  MODIFY `cod_cd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `cod_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `cod_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD CONSTRAINT `canciones_ibfk_1` FOREIGN KEY (`cod_cd`) REFERENCES `cd` (`cod_cd`);

--
-- Filtros para la tabla `cd`
--
ALTER TABLE `cd`
  ADD CONSTRAINT `cd_ibfk_1` FOREIGN KEY (`cod_genero`) REFERENCES `genero` (`cod_genero`),
  ADD CONSTRAINT `cd_ibfk_2` FOREIGN KEY (`cod_artista`) REFERENCES `artistas` (`cod_artista`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
