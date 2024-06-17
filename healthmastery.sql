-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2024 a las 22:10:26
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
-- Base de datos: `healthmastery`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diet`
--

CREATE TABLE `diet` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `goal` varchar(200) NOT NULL,
  `restrictions` varchar(100) NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `calories` varchar(200) NOT NULL,
  `protein` varchar(100) NOT NULL,
  `carbohydrates` varchar(100) NOT NULL,
  `fats` varchar(100) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `diet`
--

INSERT INTO `diet` (`id`, `name`, `description`, `goal`, `restrictions`, `registerDate`, `calories`, `protein`, `carbohydrates`, `fats`, `idUser`) VALUES
(4, 'DIETA MEDITERR&Aacute;NEA', 'Basada en la cocina tradicional de la cuenca mediterr&aacute;nea.', 'Menor incidencia de enfermedades cardiovasculares', 'Alimentos grasos', '2024-06-17 19:44:45', '1400', '70', '60', '40', 5),
(5, 'DIETA DETOX', 'Se centra en eliminar toxinas y depurar el organismo.', 'Ayuda a la desintoxicaci&oacute;n y mejora la digesti&oacute;n', 'Carne roja', '2024-06-17 19:45:45', '1550', '60', '56', '60', 5),
(6, 'DIETA VEGETARIANA', 'Excluye carne y pescado, pero permite otros alimentos de origen animal', 'Reducci&oacute;n del riesgo de enfermedades cr&oacute;nicas', 'Excluye carne y pescad', '2024-06-17 19:46:27', '1500', '70', '40', '60', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exercise`
--

CREATE TABLE `exercise` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `repetitions` int(11) NOT NULL,
  `series` varchar(100) NOT NULL,
  `exercisePhoto` varchar(100) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idSession` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `exercise`
--

INSERT INTO `exercise` (`id`, `name`, `description`, `repetitions`, `series`, `exercisePhoto`, `idUser`, `idSession`) VALUES
(8, 'SENTADILLA SIN PESO', 'Ejercicio de sentadilla con peso corporal', 20, '4', 'web/exercisePhoto/b1a2d8c434aaa7b87551f9c73fc56c69.jpg', 5, 8),
(9, 'ESCALERAS', 'Subida de escaleras al trote', 5, '4', 'web/exercisePhoto/62365a7323f02f21e48aa4a224a132cf.jpg', 5, 8),
(10, 'T&Eacute;CNICA DE CARRERA', 'T&eacute;cnica de carrera', 8, '4', 'web/exercisePhoto/6afef11ae7841084ebb5c14901b5d230.jpg', 5, 8),
(11, 'PLANCHA', 'Plancha para abdomen', 20, '4', 'web/exercisePhoto/cd8c97c2d5f6f446074df52d944abebf.jpg', 5, 9),
(12, 'ZANCADAS', 'Zancadas sin peso  alternando piernas', 20, '4', 'web/exercisePhoto/eec0b3dc0833d9930f0ccb6b7716a559.jpg', 5, 9),
(13, 'T&Eacute;CNICA DE CARRERA', 'T&eacute;cnica de carrera', 20, '4', 'web/exercisePhoto/240b03fdf27be767cc5a3d5a59e2ef01.jpeg', 5, 9),
(14, 'ESTIRAMIENTO DE ISQUIOTIBIALES', 'Estiramientos para isquiotibiales', 10, '3', 'web/exercisePhoto/59d25d3c3bb38684b69d563e1b1ca60e.jpg', 5, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exercisefavourite`
--

CREATE TABLE `exercisefavourite` (
  `id` int(11) NOT NULL,
  `idExercise` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `exercisefavourite`
--

INSERT INTO `exercisefavourite` (`id`, `idExercise`, `idUser`) VALUES
(11, 14, 6),
(12, 12, 6),
(13, 13, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meallogs`
--

CREATE TABLE `meallogs` (
  `id` int(11) NOT NULL,
  `mealType` varchar(100) NOT NULL,
  `food` varchar(100) NOT NULL,
  `quantity` float NOT NULL,
  `calories` float NOT NULL,
  `proteins` float NOT NULL,
  `carbs` float NOT NULL,
  `logDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `meallogs`
--

INSERT INTO `meallogs` (`id`, `mealType`, `food`, `quantity`, `calories`, `proteins`, `carbs`, `logDate`, `idUser`) VALUES
(23, 'almuerzo', 'pollo', 123, 293.97, 33.21, 0, '2024-06-04 19:55:25', 6),
(24, 'almuerzo', 'arroz', 400, 520, 9.6, 112, '2024-06-04 19:55:41', 6),
(25, 'cena', 'arroz', 100, 130, 2.4, 28, '2024-06-10 22:07:16', 6),
(26, 'almuerzo', 'avena', 500, 1945, 84.5, 330, '2024-06-10 22:08:25', 6),
(27, 'almuerzo', 'arroz', 400, 520, 9.6, 112, '2024-06-17 18:56:37', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ingredients` text NOT NULL,
  `prepTime` varchar(100) NOT NULL,
  `cookTime` varchar(100) NOT NULL,
  `difficulty` varchar(100) NOT NULL,
  `recipePhoto` varchar(100) NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `recipe`
--

INSERT INTO `recipe` (`id`, `title`, `description`, `ingredients`, `prepTime`, `cookTime`, `difficulty`, `recipePhoto`, `registerDate`, `created_by`, `idUser`) VALUES
(8, 'Prueba', 'pureba', 'prueba', '10 min', '10 min', 'avanzado', 'web/recipePhoto/b20b0a40b65a352b8035c4cb0ac9eb47.webp', '2024-06-17 08:51:37', 6, 6),
(9, 'prueba', 'prueba', 'prueba', '10 min', '10 min', 'intermedio', 'web/recipePhoto/41f5fff585a871fb502180a77c4b1a28.jpg', '2024-06-17 08:52:27', 6, 6),
(10, 'Receta de prueba', 'Receta de prueba', 'Receta de prueba', '20 min', '10 min', 'intermedio', 'web/recipePhoto/9dae7a1300f250d5345de9e6f4f71522.jpg', '2024-06-17 16:00:49', 9, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recipefavourite`
--

CREATE TABLE `recipefavourite` (
  `id` int(11) NOT NULL,
  `idRecipe` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `recipefavourite`
--

INSERT INTO `recipefavourite` (`id`, `idRecipe`, `idUser`) VALUES
(4, 9, 9),
(5, 10, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `sessionPhoto` varchar(200) NOT NULL,
  `idTraining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `session`
--

INSERT INTO `session` (`id`, `type`, `description`, `sessionPhoto`, `idTraining`) VALUES
(8, 'CARDIO AL AIRE LIBRE', 'Entrenamientos de cardio al aire libre', 'web/sessionPhoto/27f8b03051fe99d231dd9c4839467f25.webp', 9),
(9, 'CARDIO EN CASA', 'Entrenamientos de cardio en casa', 'web/sessionPhoto/73ee68811406e63eb3145a916d9369e0.jpeg', 9),
(10, 'CUERPO COMPLETO', 'Estiramientos para todo el cuerpo', 'web/sessionPhoto/9e307e1fb7f055ccc20a304a3d990839.jpg', 10),
(11, 'ESTIRAMIENTOS MATUTINOS', 'Estiramientos para realizar por las ma&ntilde;anas', 'web/sessionPhoto/e02ba5457d53f572850481da089c34ea.webp', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `difficultyLevel` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `trainingPhoto` varchar(200) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `training`
--

INSERT INTO `training` (`id`, `name`, `description`, `difficultyLevel`, `duration`, `category`, `trainingPhoto`, `idUser`) VALUES
(9, 'Rutina de Cardio', 'Rutina de cardio', 'AVANZADO', '50 min', 'CARDIO', 'web/trainingPhoto/2595897273bd78b8dc0c029bfdd868e6.png', 5),
(10, 'Rutina de Estiramientos', 'Rutina de Estiramientos', 'INTERMEDIO', '45 min', 'ESTIRAMIENTOS', 'web/trainingPhoto/9b054dfe23ca0c0640d998f86295f8c9.jpg', 5),
(14, 'Rutina de Fuerza', 'Rutina de fuerza', 'EXPERTO', '1:30 horas', 'FUERZA', 'web/trainingPhoto/b5192fd71562316065a1cc1ef473b43a.webp', 5),
(15, 'Rutina de HIIT', 'Rutina alta intensidad de Hiit', 'PRINCIPIANTE', '30 min', 'HIIT', 'web/trainingPhoto/326a4e6eff0fa806bc80d6d930852c75.webp', 5),
(16, 'Rutina de Yoga', 'Rutina de yoga', 'AVANZADO', '1 hora', 'YOGA', 'web/trainingPhoto/3841590ec17bd94a46efd74b958fb3e4.webp', 5),
(17, 'Rutina de Resistencia', 'Rutina de resistencia', 'AVANZADO', '50 min', 'CARDIO', 'web/trainingPhoto/4082a2b1ac0188383f8366f04bfae753.webp', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `dni` varchar(50) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `sid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `firstName`, `lastName`, `registerDate`, `dni`, `rol`, `sid`) VALUES
(5, 'admin', 'admin@admin.com', '$2y$10$C2wLVa11O0Lr9Q0tL7NNP.YEiX9Of25jnMVUk7qLkSaM.NASXOSsa', 'Javier', 'Ferrer Mariblanca', '2024-05-18 15:04:49', '70312435D', 'ADMIN', '157bfabdd5bda81c76c7a11f1f4ed0c819c1f31a'),
(6, 'ferman01', 'fernando@gmail.com', '$2y$10$upLtJliMGvs2LJmdjKCkaOzFVwmGErWyFDgAAvqj1SwVjmOoL5KIu', 'Fernando', 'Manzano Garc&iacute;a', '2024-05-18 15:06:02', '12345678T', 'CLIENTE', 'f3174b53e547d344886ecce60a8d44fdd32f083d'),
(9, 'jferrerm03', 'javier@gmail.com', '$2y$10$StYslMiNakN.9NtryOBuPOby0BKMXfS.S34aHajzBSYAur5WwaQ.K', 'Javier', 'Ferrer Martínez', '2024-06-17 08:54:12', '12345678T', 'CLIENTE', '39051acd91c16464f3d88ba3251102d5b1d78c64');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diet`
--
ALTER TABLE `diet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSession` (`idSession`);

--
-- Indices de la tabla `exercisefavourite`
--
ALTER TABLE `exercisefavourite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idExercise` (`idExercise`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `meallogs`
--
ALTER TABLE `meallogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idUser_2` (`idUser`);

--
-- Indices de la tabla `recipefavourite`
--
ALTER TABLE `recipefavourite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRecipe` (`idRecipe`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTraining` (`idTraining`);

--
-- Indices de la tabla `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `diet`
--
ALTER TABLE `diet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `exercisefavourite`
--
ALTER TABLE `exercisefavourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `meallogs`
--
ALTER TABLE `meallogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `recipefavourite`
--
ALTER TABLE `recipefavourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `diet`
--
ALTER TABLE `diet`
  ADD CONSTRAINT `diet_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `exercise`
--
ALTER TABLE `exercise`
  ADD CONSTRAINT `exercise_ibfk_1` FOREIGN KEY (`idSession`) REFERENCES `session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `exercisefavourite`
--
ALTER TABLE `exercisefavourite`
  ADD CONSTRAINT `exercisefavourite_ibfk_1` FOREIGN KEY (`idExercise`) REFERENCES `exercise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exercisefavourite_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `meallogs`
--
ALTER TABLE `meallogs`
  ADD CONSTRAINT `meallogs_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recipefavourite`
--
ALTER TABLE `recipefavourite`
  ADD CONSTRAINT `recipefavourite_ibfk_1` FOREIGN KEY (`idRecipe`) REFERENCES `recipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipefavourite_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`idTraining`) REFERENCES `training` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
