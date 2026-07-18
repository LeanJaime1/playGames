-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2026 a las 22:06:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `playgames_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `importe` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombre`) VALUES
(1, 'Acción'),
(2, 'Acción RPG'),
(3, 'Aventura'),
(4, 'Carreras'),
(5, 'Deportes'),
(6, 'FPS'),
(7, 'Hack and Slash'),
(8, 'Mundo-abierto'),
(9, 'Plataformas'),
(10, 'RPG'),
(11, 'Sigilo'),
(12, 'Simulación'),
(13, 'Shooter'),
(14, 'Survival-Horror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero_x_juego`
--

CREATE TABLE `genero_x_juego` (
  `id` int(10) UNSIGNED NOT NULL,
  `juego_id` int(10) UNSIGNED NOT NULL,
  `genero_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero_x_juego`
--

INSERT INTO `genero_x_juego` (`id`, `juego_id`, `genero_id`) VALUES
(1, 1, 14),
(2, 1, 1),
(3, 1, 3),
(4, 2, 1),
(5, 2, 3),
(6, 2, 7),
(7, 3, 8),
(8, 3, 1),
(9, 3, 3),
(10, 4, 2),
(11, 4, 3),
(12, 4, 7),
(13, 5, 3),
(14, 5, 1),
(15, 5, 8),
(16, 6, 9),
(17, 6, 1),
(18, 6, 3),
(19, 7, 10),
(20, 7, 1),
(21, 7, 7),
(22, 8, 12),
(23, 8, 4),
(24, 8, 5),
(25, 9, 5),
(26, 9, 12),
(27, 10, 1),
(28, 10, 3),
(29, 10, 14),
(33, 12, 6),
(34, 12, 1),
(35, 12, 13),
(36, 13, 7),
(37, 13, 1),
(38, 13, 3),
(39, 14, 9),
(40, 14, 3),
(41, 14, 1),
(42, 15, 1),
(43, 15, 3),
(44, 15, 11),
(45, 16, 1),
(46, 16, 13),
(47, 16, 12),
(48, 17, 1),
(49, 17, 10),
(50, 17, 3),
(51, 18, 14),
(52, 18, 1),
(106, 11, 1),
(107, 11, 11),
(108, 11, 13),
(122, 19, 5),
(123, 19, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_x_compra`
--

CREATE TABLE `item_x_compra` (
  `id` int(10) UNSIGNED NOT NULL,
  `compra_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `exclusivo_de_ps` tinyint(4) NOT NULL,
  `lanzamiento` year(4) NOT NULL,
  `plataforma_id` int(10) UNSIGNED NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `img` varchar(256) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`id`, `titulo`, `exclusivo_de_ps`, `lanzamiento`, `plataforma_id`, `precio`, `img`, `descripcion`) VALUES
(1, 'The Last of Us Part II', 1, '2020', 1, 65000.00, 'the_last_of_us_2.jpg', 'Cinco años después de su peligroso viaje a través de unos Estados Unidos postpandémicos, Ellie y Joel se han asentado in Jackson, Wyoming. Vivir en una próspera comunidad de supervivientes les ha proporcionado estabilidad, a pesar de la amenaza constante que suponen los infectados y otros supervivientes más desesperados. Tras un violento acontecimiento que rompe esa paz, Ellie se embarca en un viaje implacable para hacer justicia y pasar página.'),
(2, 'God of War Ragnarök', 1, '2022', 2, 55000.00, 'ragnarok.jpg', 'Kratos y Atreus deben viajar a cada uno de los nueve reinos en busca de respuestas mientras las fuerzas de Asgard se preparan para la batalla profetizada que supondrá el fin del mundo. Por el camino, explorarán paisajes míticos e increíbles, y se enfrentarán a temibles enemigos, como dioses nórdicos y monstruos. La amenaza del Ragnarök está cada vez más cerca y ambos deberán elegir entre su propia seguridad y la seguridad de los reinos.'),
(3, 'Horizon Forbidden West', 1, '2022', 2, 52000.00, 'horizon.jpg', 'Acompaña a Aloy en su aventura por las tierras del Oeste Prohibido, una frontera majestuosa aunque peligrosa donde se ocultan nuevas y misteriosas amenazas. Explora tierras lejanas, enfréntate a máquinas más grandes e imponentes y descubre tribus asombrosas en tu regreso al futuro lejano y postapocalíptico de Horizon. La tierra se muere y tormentas de una furia implacable asuelan lo poco que queda de la humanidad.'),
(4, 'Black Myth: Wukong', 1, '2024', 1, 95000.00, 'wukong.jpg', 'Black Myth: Wukong es un RPG de acción inspirado en la mitología china y la novela clásica \'Viaje al Oeste\'. Te embarcarás en el papel del Destinado y te adentrarás en un world fascinante lleno de maravillas y desafíos. Deberás dominar diversas técnicas de bastón y habilidades mágicas para derrotar a enemigos formidables y jefes épicos, mientras descubres la verdad oculta tras las leyendas del pasado en una experiencia visualmente deslumbrante.'),
(5, 'Spider-Man', 1, '2023', 2, 62000.00, 'spiderman.jpg', 'Los Spider-Men Peter Parker y Miles Morales regresan para una nueva y emocionante aventura en la aclamada franquicia. Balancéate, salta y utiliza las nuevas alitas de telaraña para recorrer la Nueva York de Marvel, alternando rápidamente entre Peter y Miles para experimentar distintas historias y nuevos poderes épicos. El icónico villano Venom amenaza con destruir sus vidas, su ciudad y a sus seres queridos en una batalla sin precedentes.'),
(6, 'Ratchet & Clank: Rift Apart', 1, '2021', 1, 78000.00, 'ratched_&_clank.jpg', 'Salta de dimensión en dimensión con Ratchet y Clank mientras se enfrentan a un emperador malvado de otra realidad. Viaja a través de mundos llenos de acción y más allá a velocidades vertiginosas gracias al almacenamiento SSD de la consola PlayStation 5. Disfruta de una aventura intergaláctica visualmente increíble, con un arsenal de armas disparatadas y la incorporación de Rivet, una luchadora de la resistencia Lombax de otra dimensión.'),
(7, 'Final Fantasy XVI', 1, '2024', 1, 92000.00, 'final_fantasy.jpg', 'Una épica de fantasía oscura ambientada en el mundo de Valisthea, donde la paz se tambalea debido a la propagación de las Tierras Estigias. El destino de la nation está en manos de los Eikons, poderosas y temibles criaturas, y de sus Dominantes, seres humanos con la capacidad de canalizar su power. Clive Rosfield, un guerrero al que se le ha concedido el título de \'Primer Escudo de Rosaria\', se verá envuelto en una tragedia y jurará venganza contra el Eikon Oscuro Ifrit.'),
(8, 'F1 25', 0, '2025', 1, 115000.00, 'f1.jpg', 'La máxima expresión del automovilismo virtual llega con F1 25. Experimenta el nuevo sistema de suspensión dinámica que cambia radicalmente la forma en que los neumáticos interactúan con la pista, ofreciendo un realismo sin precedentes. Esta edición incluye la alineación completa de pilotos y circuitos de la temporada 2025, un modo Carrera totalmente rediseñado con integración de telemetría real y mejoras visuales de trazado de rayos (ray tracing) que aprovechan al máximo la potencia de la nueva generación.'),
(9, 'TopSpin 2K25', 0, '2024', 2, 68000.00, 'top_spin.jpg', 'La aclamada franquicia de simulación de tenis regresa con una experiencia visual y jugable de primer nivel. Entrena con John McEnroe en la TopSpin Academy para perfeccionar tus golpes antes de saltar a las canchas del Grand Slam. Compite en Roland-Garros, Wimbledon o el US Open contra leyendas como Roger Federer y Serena Williams, o crea tu propio jugador para alcanzar el número uno del ranking mundial en el modo MyCAREER.'),
(10, 'The Last of Us Part I', 1, '2022', 1, 85000.00, 'the_last_of_us.jpg', 'Revive el viaje que lo cambió todo, reconstruido desde cero para la consola PlayStation 5. En una civilización devastada, donde infectados y supervivientes corren desenfrenados, Joel, un protagonista cansado, es hired para sacar a escondidas a Ellie, una niña de 14 años, de una zona de cuarentena militar. Sin embargo, lo que comienza como un pequeño trabajo pronto se transforma en un brutal viaje por todo el país que pondrá a prueba su humanidad.'),
(11, 'Sniper Elite 5', 0, '2022', 2, 49000.00, '1781913484.jpg', 'La galardonada serie regresa con una mecánica de francotirador inigualable, combate táctico en tercera persona y una cámara de muerte mejorada. Lucha en los mapas más inmersivos hasta la fecha, con many ubicaciones del mundo real capturadas con un detalle impresionante, y un sistema de desplazamiento mejorado que te permite explorar más de ellos que nunca. Únete a la resistencia francesa en una operation secreta para detener el Proyecto Kraken en la Francia de 1944.'),
(12, 'Call of Duty: Modern Warfare III', 0, '2023', 1, 89000.00, 'call_of_dutty.jpg', 'En la secuela directa del éxito de ventas Modern Warfare II, el capitán Price y la Fuerza operativa 141 se enfrentan a la threat definitiva. El criminal de guerra ultranacionalista Vladimir Makarov está extendiendo su dominio por todo el mundo, lo que obliga a la Fuerza operativa 141 a luchar como nunca antes. Disfruta de una experiencia de multijugador masiva con mapas modernizados de clásicos anteriores y una nueva experiencia de Zombies en mundo abierto.'),
(13, 'Devil May Cry HD Collection', 0, '2018', 2, 35000.00, 'devil_may_cry.jpg', 'Revive los orígenes del cazador de demonios más carismático de los videojuegos. Esta colección incluye las versiones remasterizadas en alta definición de Devil May Cry, Devil May Cry 2 y Devil May Cry 3 Special Edition. Domina el arte del combate elegante combinando espadas y pistolas mientras te enfrentas a hordas de seres infernales y jefes finales memorables en una de las sagas de acción más influyentes de la historia.'),
(14, 'Astro Bot', 1, '2024', 1, 98000.00, 'astrobot.jpg', 'Acompaña a Astro en una gigantesca aventura espacial totalmente nueva. Tras la destrucción de la nave nodriza PS5, Astro y su tripulación han quedado dispersos por todas las galaxias. Explora más de 50 planetas llenos de peligros, sorpresas y cameos de personajes icónicos de la historia de PlayStation. Aprovecha las funciones del DualSense para sentir cada salto, golpe y textura en una de las experiencias de plataformas más creativas de los últimos años.'),
(15, 'Assassin\'s Creed Mirage', 0, '2023', 2, 58000.00, 'assasins.jpg', 'Experimenta la historia de Basim, un astuto ladrón callejero con visiones pesadillescas que busca respuestas y justicia en las bulliciosas calles del Bagdad del siglo IX. A través de una antigua y misteriosa organización conocida como los Ocultos, se convertirá en un Maestro Asesino letal y cambiará su destino de una forma que nunca habría imaginado. Mirage es un homenaje al título original, ofreciendo un retorno moderno a la jugabilidad clásica de sigilo, parkour y asesinatos que definió a la franquicia durante más de quince años.'),
(16, 'Daemon X Machina', 0, '2025', 1, 110000.00, 'daemon.jpg', 'Conviértete en el guerrero de alta tecnología definitivo en una nueva entrega de la serie Daemon X Machina llena de acción. Pilota tu Arsenal personalizado en combates vertiginosos mientras exploras un mundo abierto peligroso tanto por tierra como por aire. Recoge armas y equipo de tus enemigos caídos y mejora tus habilidades para expandir tus opciones en el campo de batalla en una épica aventura de ciencia ficción diseñada para la nueva generación.'),
(17, 'Hogwarts Legacy', 0, '2023', 1, 55000.00, 'hogwarts.jpg', 'Vive lo oculto en el Hogwarts del siglo XIX. Tu personaje es un alumno que tiene la clave de un antiguo secreto que amenaza con destruir el mundo mágico. Podrás tomar el control de la acción y ser el centro de tu propia aventura en el mundo mágico. Forja alianzas, lucha contra magos oscuros y decide el destino del mundo mágico. Tu legado es lo que tú hagas de él. Vive lo que no está escrito.'),
(18, 'Resident Evil Requiem', 0, '2026', 1, 128000.00, 'resident_evil.jpg', 'La pesadilla alcanza un nuevo nivel de realismo en Resident Evil Requiem. Tras los eventos de las entregas anteriores, esta nueva historia nos sumerge en una atmósfera de terror psicológico y supervivencia extrema utilizando las capacidades completas del motor RE Engine. Explora escenarios asfixiantes, gestiona recursos limitados y enfréntate a criaturas deformes en una narrativa que redefine los límites del horror. El destino de la humanidad vuelve a pender de un hilo en esta experiencia cinematográfica aterradora.'),
(19, 'EA Sports FC 25', 0, '2024', 2, 65000.00, 'fc_25.jpg', 'EA SPORTS FC 25 te ofrece las ligas, competiciones y estrellas más grandes del mundo, con más de 19,000 futbolistas con licencia oficial en cada partido. Disfruta de una experiencia futbolística inigualable en PlayStation 4 con modos de juego clásicos y mejoras en el sistema de animaciones. Construye el equipo de tus sueños en Ultimate Team, lleva a tu club a la gloria en el Modo Carrera y experimenta la autenticidad del deporte rey con una jugabilidad refinada y actualizada a la temporada actual.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`id`, `nombre`) VALUES
(1, 'PS5'),
(2, 'PS4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(256) NOT NULL,
  `nombre_usuario` varchar(256) NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `rol` enum('superadmin','admin','usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre_usuario`, `nombre_completo`, `password`, `rol`) VALUES
(1, 'leandro_jaime@davinci.edu.ar', 'leandro_jaime', 'Leandro Jaime', '$2y$10$YjCxWdFl2Ykkw/w7cqLlQeRF43sfhMrcJPeC66EO1QkVuuCabKLpm', 'superadmin'),
(2, 'lean_jaime@davinci.edu.ar', 'lean_jaime', 'Lean Jaime', '$2y$10$4becqYJZXDjedcy.gKy56.fd8tF4k/o1y7WqNRSD0oSZhaKzyyYOG', 'admin'),
(3, 'l_jaime@davinci.edu.ar', 'l_jaime', 'L Jaime', '$2y$10$sJkEDBz0tOQ2w5PHbXPWH.Ke5FJO53OzqjO7JniYOmiXkgf0kChvG', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistas`
--

CREATE TABLE `vistas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `restringida` tinyint(4) NOT NULL,
  `activa` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vistas`
--

INSERT INTO `vistas` (`id`, `nombre`, `titulo`, `restringida`, `activa`) VALUES
(1, 'home', 'Bienvenidos a PlayStation', 0, 1),
(2, 'quienes_somos', '¿Quiénes somos?', 0, 1),
(3, 'autor', 'Autor', 0, 1),
(4, 'juegos', 'Juegos', 0, 1),
(5, '404', 'Página no encontrada', 0, 1),
(6, 'plataforma', 'Juegos de Playstation', 0, 1),
(7, 'genero', 'Juegos por género', 0, 1),
(8, 'producto', 'Detalle del juego', 0, 1),
(9, 'novedades', 'Novedades', 0, 1),
(10, 'exclusivos', 'Exclusivos de Playstation', 0, 1),
(12, 'dashboard', 'Panel de Administración', 2, 1),
(13, 'admin_juegos', 'Administración de Juegos', 2, 1),
(14, 'admin_plataforma', 'Administración de Plataforma', 2, 1),
(15, 'admin_genero', 'Administración de Genero', 2, 1),
(16, 'add_juego', 'Creación de Juego', 2, 1),
(17, 'add_genero', 'Creación de género', 2, 1),
(19, 'add_plataforma', 'Creación de Plataforma', 2, 1),
(20, 'edit_juego', 'Edición para el Juego', 2, 1),
(21, 'delete_juego', 'Eliminación de Juego', 2, 1),
(22, 'edit_genero', 'Editor para el Género', 2, 1),
(23, 'delete_genero', 'Eliminación de Género', 2, 1),
(24, 'edit_plataforma', 'Edición de Plataforma', 2, 1),
(25, 'delete_plataforma', 'Eliminación de Plataforma', 2, 1),
(26, 'login', 'Ingrese sus credenciales', 0, 1),
(27, '403', 'Página restringida', 0, 1),
(28, 'carrito', 'Carrito de compras', 0, 1),
(29, 'contacto', 'Contacto', 0, 1),
(30, 'finalizar_pago', 'Finalizar Pago', 1, 1),
(31, 'panel_usuario', 'Panel de Usuario', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero_x_juego`
--
ALTER TABLE `genero_x_juego`
  ADD PRIMARY KEY (`id`),
  ADD KEY `juego_id` (`juego_id`),
  ADD KEY `genero_id` (`genero_id`);

--
-- Indices de la tabla `item_x_compra`
--
ALTER TABLE `item_x_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `compra_id` (`compra_id`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plataforma_id` (`plataforma_id`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `vistas`
--
ALTER TABLE `vistas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `genero_x_juego`
--
ALTER TABLE `genero_x_juego`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `item_x_compra`
--
ALTER TABLE `item_x_compra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vistas`
--
ALTER TABLE `vistas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `genero_x_juego`
--
ALTER TABLE `genero_x_juego`
  ADD CONSTRAINT `genero_x_juego_ibfk_1` FOREIGN KEY (`juego_id`) REFERENCES `juego` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `genero_x_juego_ibfk_2` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `item_x_compra`
--
ALTER TABLE `item_x_compra`
  ADD CONSTRAINT `item_x_compra_ibfk_1` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `item_x_compra_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `juego` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `juego`
--
ALTER TABLE `juego`
  ADD CONSTRAINT `juego_ibfk_1` FOREIGN KEY (`plataforma_id`) REFERENCES `plataforma` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
