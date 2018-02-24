-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 24-02-2018 a las 01:09:09
-- Versión del servidor: 5.6.35
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `fashionwow`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(200) NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `url`, `id_usuario`) VALUES
(11, 'https://i.imgur.com/4WGFKht.jpg', 102),
(14, 'https://i.imgur.com/7X9cjX4.jpg', 191),
(15, 'https://i.imgur.com/FskyCKe.jpg', 191);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id_item` int(10) UNSIGNED NOT NULL,
  `nombre_item` varchar(200) NOT NULL,
  `url_icono` varchar(300) NOT NULL,
  `id_casilla` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id_item`, `nombre_item`, `url_icono`, `id_casilla`) VALUES
(0, 'Casilla vacía', './assets/images/itemError.ico', 100),
(7997, 'Máscara de Defias roja', 'http://media.blizzard.com/wow/icons/56/inv_misc_bandana_03.jpg', 1),
(12700, 'Diseño: botas de placas imperiales', 'http://media.blizzard.com/wow/icons/56/inv_scroll_03.jpg', 0),
(14617, 'Camisa de matasanos', 'http://media.blizzard.com/wow/icons/56/inv_shirt_red_01.jpg', 4),
(23323, 'Corona del Festival del Fuego', 'http://media.blizzard.com/wow/icons/56/inv_helmet_96.jpg', 1),
(30027, 'Botas de valor sin fin', 'http://media.blizzard.com/wow/icons/56/inv_boots_chain_08.jpg', 8),
(30038, 'Cinturón de detonación', 'http://media.blizzard.com/wow/icons/56/inv_belt_13.jpg', 6),
(30152, 'Capucha de avatar', 'http://media.blizzard.com/wow/icons/56/inv_helmet_93.jpg', 1),
(31038, 'Bastón del redentor', 'http://media.blizzard.com/wow/icons/56/inv_staff_draenei_a_01.jpg', 17),
(32271, 'Falda de naturaleza inmortal', 'http://media.blizzard.com/wow/icons/56/inv_pants_leather_23.jpg', 7),
(32348, 'Cuchilla del alma', 'http://media.blizzard.com/wow/icons/56/inv_axe_60.jpg', 17),
(40254, 'Capa de crisis evitada', 'http://media.blizzard.com/wow/icons/56/inv_misc_cape_naxxramas_03.jpg', 16),
(40438, 'Cubrehombros de la Cámara del Consejo', 'http://media.blizzard.com/wow/icons/56/inv_shoulder_80.jpg', 3),
(44112, 'Protectores de hombros de concha titilante', 'http://media.blizzard.com/wow/icons/56/inv_shoulder_haremmatron_d_01.jpg', 3),
(45318, 'Mantón de enojo humeante', 'http://media.blizzard.com/wow/icons/56/inv_misc_cape_22.jpg', 16),
(65943, 'Hombros encogidos del enloquecido', 'http://media.blizzard.com/wow/icons/56/inv_shoulder_136v3.jpg', 3),
(96690, 'Mandiletes del médico brujo', 'http://media.blizzard.com/wow/icons/56/inv_glove_mail_raidshaman_m_01.jpg', 10),
(114812, 'Guantes de tejido de maleficio', 'http://media.blizzard.com/wow/icons/56/inv_cloth_draenorcrafted_d_01gloves.jpg', 10),
(118412, 'Espada magna del infierno', 'http://media.blizzard.com/wow/icons/56/inv_sword_2h_draenorchallenge_d_01.jpg', 17),
(124277, 'Cinturón de piel de demonio despellejado', 'http://media.blizzard.com/wow/icons/56/inv_leather_raidrogue_p_01belt.jpg', 6),
(124299, 'Falda de reflejo propio', 'http://media.blizzard.com/wow/icons/56/inv_robe_mail_raidshaman_p_01.jpg', 7),
(124304, 'Espaldares petraformados bastos', 'http://media.blizzard.com/wow/icons/56/inv_shoulder_mail_raidshaman_p_01.jpg', 3),
(124332, 'Yelmo de mirada demoníaca', 'http://media.blizzard.com/wow/icons/56/inv_helm_plate_raiddeathknight_p_01.jpg', 1),
(124775, 'Guardarrenes de destreza de Gladiador salvaje', 'http://media.blizzard.com/wow/icons/56/inv_belt_mail_raidshaman_p_01.jpg', 6),
(128819, 'Martillo Maldito', 'http://media.blizzard.com/wow/icons/56/inv_mace_1h_doomhammer.jpg', 21),
(138344, 'Cadenas para piernas Garra de Águila', 'http://media.blizzard.com/wow/icons/56/inv_pant_mail_raidhunter_q_01.jpg', 7),
(139208, 'Pechera con marcas de Colmillo Iracundo', 'http://media.blizzard.com/wow/icons/56/inv_chest_leather_raidmonk_q_01.jpg', 5),
(139673, 'Coselete del Señor de la Muerte', 'http://media.blizzard.com/wow/icons/56/inv_plate_deathknightclass_d_01chest.jpg', 5),
(139674, 'Grandes botas del Señor de la Muerte', 'http://media.blizzard.com/wow/icons/56/inv_plate_deathknightclass_d_01boot.jpg', 8),
(139675, 'Guanteletes del Señor de la Muerte', 'http://media.blizzard.com/wow/icons/56/inv_plate_deathknightclass_d_01glove.jpg', 10),
(139676, 'Yelmo del Señor de la Muerte', 'http://media.blizzard.com/wow/icons/56/inv_plate_deathknightclass_d_01helm.jpg', 1),
(139678, 'Manto del Señor de la Muerte', 'http://media.blizzard.com/wow/icons/56/inv_plate_deathknightclass_d_01shoulder.jpg', 3),
(147121, 'Pechera del guardián de tumbas', 'http://media.blizzard.com/wow/icons/56/inv_chest_plate_raiddeathknight_r_01.jpg', 5),
(147146, 'Guantes de la tempestad Arcana', 'http://media.blizzard.com/wow/icons/56/inv_glove_cloth_raidmage_r_01.jpg', 10),
(147182, 'Guantes diabólicos', 'http://media.blizzard.com/wow/icons/56/inv_glove_cloth_raidwarlock_r_01.jpg', 10),
(147230, 'Coselete Escama Tormentosa galvanizado', 'http://media.blizzard.com/wow/icons/56/inv_chest_leather_draenorlfr_c_01.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id_post` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` text,
  `fecha` datetime NOT NULL,
  `id_imagen_principal` bigint(20) UNSIGNED NOT NULL,
  `id_item_cabeza` int(10) UNSIGNED DEFAULT NULL,
  `id_item_hombros` int(10) UNSIGNED DEFAULT NULL,
  `id_item_capa` int(10) UNSIGNED DEFAULT NULL,
  `id_item_pecho` int(10) UNSIGNED DEFAULT NULL,
  `id_item_camisa` int(10) UNSIGNED DEFAULT NULL,
  `id_item_tabardo` int(10) UNSIGNED DEFAULT NULL,
  `id_item_brazales` int(10) UNSIGNED DEFAULT NULL,
  `id_item_manos` int(10) UNSIGNED DEFAULT NULL,
  `id_item_cinturon` int(10) UNSIGNED DEFAULT NULL,
  `id_item_piernas` int(10) UNSIGNED DEFAULT NULL,
  `id_item_pies` int(10) UNSIGNED DEFAULT NULL,
  `id_item_arma1` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id_post`, `id_usuario`, `titulo`, `descripcion`, `fecha`, `id_imagen_principal`, `id_item_cabeza`, `id_item_hombros`, `id_item_capa`, `id_item_pecho`, `id_item_camisa`, `id_item_tabardo`, `id_item_brazales`, `id_item_manos`, `id_item_cinturon`, `id_item_piernas`, `id_item_pies`, `id_item_arma1`) VALUES
(11, 102, 'ThunderArmor', 'Armadura inspirada en un set de tormenta de los tótem de piedra.', '2018-02-22 18:47:16', 11, 23323, 124304, 0, 147230, 0, 0, 0, 96690, 124775, 124299, 0, 128819),
(14, 191, 'GoldenMonk', 'Aspecto inspirado en los monjes pandaren del Monasterio de la Luz.', '2018-02-23 22:04:00', 14, 7997, 44112, 0, 147121, 14617, 0, 0, 114812, 124277, 138344, 0, 118412),
(15, 191, 'LightAngel', 'Priests are devoted to the spiritual, and express their unwavering faith by serving the people. For millennia they have left behind the confines of their temples and the comfort of their shrines so they can support their allies in war-torn lands. In the midst of terrible conflict, no hero questions the value of the priestly orders.', '2018-02-23 22:11:47', 15, 30152, 65943, 40254, 139208, 0, 0, 0, 147146, 0, 32271, 30027, 31038);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `nivel` enum('usuario','moderador','admin','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `password`, `nivel`) VALUES
(102, 'Administrador', 'c893bad68927b457dbed39460e6afd62', 'admin'),
(191, 'VagabondSoul', 'c6d0b723d166d42f59d8f7beb9255215', 'usuario'),
(193, 'Kuvadis', '81ac1ced3821541e1703e50673ec5273', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_item_hombros` (`id_item_hombros`,`id_item_capa`,`id_item_pecho`,`id_item_camisa`,`id_item_tabardo`,`id_item_brazales`,`id_item_manos`,`id_item_cinturon`,`id_item_piernas`,`id_item_pies`,`id_item_arma1`),
  ADD KEY `fk-arma1` (`id_item_arma1`),
  ADD KEY `fk-cabeza` (`id_item_cabeza`),
  ADD KEY `fk-pecho` (`id_item_pecho`),
  ADD KEY `fk-guantes` (`id_item_manos`),
  ADD KEY `fk-brazales` (`id_item_brazales`),
  ADD KEY `fk-tabardo` (`id_item_camisa`),
  ADD KEY `fk-cinturon` (`id_item_cinturon`),
  ADD KEY `fk-piernas` (`id_item_piernas`),
  ADD KEY `fk-pies` (`id_item_pies`),
  ADD KEY `fk-capa` (`id_item_capa`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_imagen_principal` (`id_imagen_principal`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `uniq_nombre_usuario` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk-arma1` FOREIGN KEY (`id_item_arma1`) REFERENCES `items` (`id_item`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-brazales` FOREIGN KEY (`id_item_brazales`) REFERENCES `items` (`id_item`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-cabeza` FOREIGN KEY (`id_item_cabeza`) REFERENCES `items` (`id_item`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-camisa` FOREIGN KEY (`id_item_camisa`) REFERENCES `items` (`id_item`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-capa` FOREIGN KEY (`id_item_capa`) REFERENCES `items` (`id_item`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-cinturon` FOREIGN KEY (`id_item_cinturon`) REFERENCES `items` (`id_item`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-guantes` FOREIGN KEY (`id_item_manos`) REFERENCES `items` (`id_item`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-hombros` FOREIGN KEY (`id_item_hombros`) REFERENCES `items` (`id_item`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-pecho` FOREIGN KEY (`id_item_pecho`) REFERENCES `items` (`id_item`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-piernas` FOREIGN KEY (`id_item_piernas`) REFERENCES `items` (`id_item`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-pies` FOREIGN KEY (`id_item_pies`) REFERENCES `items` (`id_item`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-tabardo` FOREIGN KEY (`id_item_camisa`) REFERENCES `items` (`id_item`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`id_imagen_principal`) REFERENCES `imagenes` (`id_imagen`) ON DELETE CASCADE ON UPDATE CASCADE;
