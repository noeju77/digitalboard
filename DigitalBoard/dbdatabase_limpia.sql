-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-01-2020 a las 10:48:00
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbdatabase`
--
CREATE DATABASE IF NOT EXISTS `dbdatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbdatabase`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course`
--

CREATE TABLE `course` (
  `idCourse` int(11) NOT NULL,
  `idDegree` int(11) NOT NULL,
  `nivel` varchar(45) NOT NULL,
  `anyoAcademico` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `course`
--

INSERT INTO `course` (`idCourse`, `idDegree`, `nivel`, `anyoAcademico`) VALUES
(1, 1, '1', '20192020'),
(2, 2, '2', '20192020'),
(3, 3, '3', '20192020'),
(4, 1, '4', '20192020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `degree`
--

CREATE TABLE `degree` (
  `idDegree` int(11) NOT NULL,
  `idTypeDegree` int(11) NOT NULL,
  `idFaculty` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `degree`
--

INSERT INTO `degree` (`idDegree`, `idTypeDegree`, `idFaculty`, `name`) VALUES
(1, 1, 1, 'ingenieria informatica'),
(2, 2, 1, 'ingeniera informatica y administracion de emp'),
(3, 3, 1, 'big data');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluation`
--

CREATE TABLE `evaluation` (
  `idEvaluation` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL,
  `idTypeEvaluation` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `visibility` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evaluation`
--

INSERT INTO `evaluation` (`idEvaluation`, `idSubject`, `idTypeEvaluation`, `name`, `visibility`) VALUES
(1, 1, 1, 'epd calculo', 0),
(2, 2, 2, 'final estadisticas', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faculty`
--

CREATE TABLE `faculty` (
  `idFaculty` int(11) NOT NULL,
  `idUniversity` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `faculty`
--

INSERT INTO `faculty` (`idFaculty`, `idUniversity`, `name`, `email`, `location`, `phone`) VALUES
(1, 1, 'Escuela Politecnica Superior', 'eps@upo.es', 'Montequinto', '650259632');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `idNews` int(11) NOT NULL,
  `idTypeNews` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `publication` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`idNews`, `idTypeNews`, `idUsers`, `idSubject`, `title`, `content`, `publication`) VALUES
(1, 1, 2, 0, 'Parada del Aula Virtual', 'Durante este fin de semana se realizara una parada del Aula Virtual.', '2020-01-20 23:00:00'),
(2, 1, 1, 0, 'Abierto el plazo de ayudas para el comedor', 'Desde hoy 23 de Enero se puede solicitar la ayuda al comedor para el 2020.', '2020-01-20 23:00:00'),
(3, 1, 2, 0, 'Concierto de Cuarteto de Cuerda OREMUS en el paraninfo', 'El viernes 24 es el concierto de la Orquesta de la UPO, el acceso es gratis hasta completar aforo.', '2020-01-20 23:00:00'),
(4, 1, 2, 0, 'Jornada de Teatro en el paraninfo', 'El martes 28 es la obra La Casa de Bernarda Alba, el acceso es gratis hasta completar aforo.', '2020-01-20 23:00:00'),
(11, 2, 14, 21, 'Notas Examen Final', 'Se ha publicado en el apartado Notas, el listado de los alumnos con sus  respectivas calificaciones.', '2029-01-19 23:00:00'),
(13, 2, 16, 23, 'Entrega EPD1', 'Se pospone la entrega de la EPD1 dos semans.', '2029-01-19 23:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resources`
--

CREATE TABLE `resources` (
  `idResources` int(11) NOT NULL,
  `idTypeResources` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL,
  `uploadDate` date DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `visibility` int(1) NOT NULL,
  `folder` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `results`
--

CREATE TABLE `results` (
  `idResults` int(11) NOT NULL,
  `idEvaluation` int(11) NOT NULL,
  `score` double NOT NULL,
  `visibility` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `results`
--

INSERT INTO `results` (`idResults`, `idEvaluation`, `score`, `visibility`) VALUES
(1, 1, 4.95, ''),
(2, 2, 7.25, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subject`
--

CREATE TABLE `subject` (
  `idSubject` int(11) NOT NULL,
  `idCourse` int(11) NOT NULL,
  `idTypeSubjects` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `subject`
--

INSERT INTO `subject` (`idSubject`, `idCourse`, `idTypeSubjects`, `name`) VALUES
(21, 1, 1, 'CÃ¡lculo'),
(22, 1, 1, 'Fundamentos de ProgramaciÃ³n'),
(23, 1, 1, 'Ãlgebra'),
(24, 2, 2, 'DiseÃ±o de Base de Datos'),
(25, 2, 2, 'AlgorÃ­tmica 1'),
(26, 2, 2, 'Sistemas Operativos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typedegree`
--

CREATE TABLE `typedegree` (
  `idTypeDegree` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `typedegree`
--

INSERT INTO `typedegree` (`idTypeDegree`, `name`, `description`) VALUES
(1, 'grado', 'ingenieria informatica'),
(2, 'doble grado', 'ingenieria informatica y administracion de em'),
(3, 'master', 'big data');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typeevaluation`
--

CREATE TABLE `typeevaluation` (
  `idTypeEvaluation` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `typeevaluation`
--

INSERT INTO `typeevaluation` (`idTypeEvaluation`, `name`, `description`) VALUES
(1, 'parcial', 'evaluacion durante del curso '),
(2, 'final', 'examen final');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typenews`
--

CREATE TABLE `typenews` (
  `idTypeNews` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `typenews`
--

INSERT INTO `typenews` (`idTypeNews`, `name`, `description`) VALUES
(1, 'sistema', 'fallo sistema'),
(2, 'asignatura', 'examen parcial notas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typeresources`
--

CREATE TABLE `typeresources` (
  `idTypeResources` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `typeresources`
--

INSERT INTO `typeresources` (`idTypeResources`, `name`, `description`) VALUES
(1, 'documento', 'documento pdf '),
(2, 'multimedia', 'videos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typesubjects`
--

CREATE TABLE `typesubjects` (
  `idTypeSubjects` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `typesubjects`
--

INSERT INTO `typesubjects` (`idTypeSubjects`, `name`, `description`) VALUES
(1, 'basica', 'asignatura parte basica'),
(2, 'obligatoria', 'asignatura parte obligatoria'),
(3, 'optativa', 'asignatura optativa'),
(4, 'tfg', 'trabajo fin de grado'),
(5, 'tfm', 'trabajo fin de master');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typeusers`
--

CREATE TABLE `typeusers` (
  `idTypeUsers` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `typeusers`
--

INSERT INTO `typeusers` (`idTypeUsers`, `name`) VALUES
(1, 'admin'),
(2, 'profesor'),
(3, 'alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `university`
--

CREATE TABLE `university` (
  `idUniversity` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `ubicacion` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `university`
--

INSERT INTO `university` (`idUniversity`, `name`, `ubicacion`, `email`, `phone`) VALUES
(1, 'Pablo Olavide', 'Montequinto', 'pabloOlavide@upo.es', '954525108');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `idTypeUsers` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surnames` varchar(255) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `state` varchar(45) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUsers`, `idTypeUsers`, `name`, `surnames`, `phone`, `email`, `password`, `state`, `image`) VALUES
(3, 1, 'Mari Carmen', 'Lozano', '955555556', 'mclozesp@admin.upo.es', 'a76654d8e3550e9a2d67a0eeb6c67b220e5885eddd3fde135806e601', '0', '1580288625_mari_foto.jpeg'),
(12, 1, 'Juan Alberto', 'GarcÃ­a Barroso', '955555555', 'jagarbar@admin.upo.es', 'a76654d8e3550e9a2d67a0eeb6c67b220e5885eddd3fde135806e601', '0', '1580288896_Retrato_JAGB.jpg'),
(13, 1, 'Andrea', 'GarcÃ­a Castillo', '955555557', 'agarcas@admin.upo.es', 'a76654d8e3550e9a2d67a0eeb6c67b220e5885eddd3fde135806e601', '0', '1580288686_andrea_foto.jpeg'),
(14, 2, 'Andrea', 'GarcÃ­a Castillo', '', 'agarcas@prof.upo.es', '99fb2f48c6af4761f904fc85f95eb56190e5d40b1f44ec3a9c1fa319', '0', 'default.jpeg'),
(15, 2, 'Mari Carmen', 'Lozano Espejo', '', 'mclozesp@prof.upo.es', '99fb2f48c6af4761f904fc85f95eb56190e5d40b1f44ec3a9c1fa319', '0', 'default.jpeg'),
(16, 2, 'Juan Alberto', 'GarcÃ­a Barroso', '', 'jagarbar@prof.upo.es', '99fb2f48c6af4761f904fc85f95eb56190e5d40b1f44ec3a9c1fa319', '0', 'default.jpeg'),
(17, 3, 'Andrea', 'GarcÃ­a Castillo', '', 'agarcas@alu.upo.es', '99fb2f48c6af4761f904fc85f95eb56190e5d40b1f44ec3a9c1fa319', '0', 'default.jpeg'),
(18, 3, 'Mari Carmen', 'Lozano Espejo', '', 'mclozesp@alu.upo.es', '99fb2f48c6af4761f904fc85f95eb56190e5d40b1f44ec3a9c1fa319', '0', 'default.jpeg'),
(19, 3, 'Juan Alberto', 'GarcÃ­a Barroso', '', 'jagarbar@alu.upo.es', '99fb2f48c6af4761f904fc85f95eb56190e5d40b1f44ec3a9c1fa319', '0', 'default.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_has_subject`
--

CREATE TABLE `users_has_subject` (
  `idUsershasSubject` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users_has_subject`
--

INSERT INTO `users_has_subject` (`idUsershasSubject`, `idUsers`, `idSubject`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 1, 3),
(5, 2, 6),
(6, 3, 3),
(7, 1, 16),
(8, 1, 19),
(9, 11, 19),
(10, 1, 20),
(11, 11, 20),
(12, 2, 20),
(13, 17, 21),
(14, 18, 21),
(15, 19, 21),
(16, 14, 21),
(17, 17, 22),
(18, 18, 22),
(19, 19, 22),
(20, 15, 22),
(21, 17, 23),
(22, 18, 23),
(23, 19, 23),
(24, 16, 23),
(25, 17, 24),
(26, 18, 24),
(27, 19, 24),
(28, 14, 24),
(29, 17, 25),
(30, 18, 25),
(31, 19, 25),
(32, 15, 25),
(33, 17, 26),
(34, 18, 26),
(35, 19, 26),
(36, 16, 26);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`idCourse`),
  ADD UNIQUE KEY `idCourse_UNIQUE` (`idCourse`),
  ADD KEY `fk_Course_Degree1_idx` (`idDegree`);

--
-- Indices de la tabla `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`idDegree`),
  ADD UNIQUE KEY `idDegree_UNIQUE` (`idDegree`),
  ADD KEY `fk_Degree_TypeDegree1_idx` (`idTypeDegree`),
  ADD KEY `fk_Degree_Faculty1_idx` (`idFaculty`);

--
-- Indices de la tabla `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`idEvaluation`),
  ADD UNIQUE KEY `idEvaluation_UNIQUE` (`idEvaluation`),
  ADD KEY `fk_Evaluation_Subject1_idx` (`idSubject`),
  ADD KEY `fk_Evaluation_TypeEvaluation1_idx` (`idTypeEvaluation`);

--
-- Indices de la tabla `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`idFaculty`),
  ADD UNIQUE KEY `idFaculty_UNIQUE` (`idFaculty`),
  ADD KEY `fk_Faculty_University1_idx` (`idUniversity`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idNews`),
  ADD UNIQUE KEY `idNews_UNIQUE` (`idNews`),
  ADD KEY `fk_News_TypeNews1_idx` (`idTypeNews`),
  ADD KEY `fk_News_Users1_idx` (`idUsers`);

--
-- Indices de la tabla `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`idResources`),
  ADD UNIQUE KEY `idResources_UNIQUE` (`idResources`),
  ADD KEY `fk_Resources_TypeResources1_idx` (`idTypeResources`),
  ADD KEY `fk_Resources_Subject1_idx` (`idSubject`);

--
-- Indices de la tabla `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`idResults`),
  ADD UNIQUE KEY `idResults_UNIQUE` (`idResults`),
  ADD KEY `fk_Results_Evaluation1_idx` (`idEvaluation`);

--
-- Indices de la tabla `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`idSubject`),
  ADD UNIQUE KEY `idSubject_UNIQUE` (`idSubject`),
  ADD KEY `fk_Subject_Course1_idx` (`idCourse`),
  ADD KEY `fk_TypeSubjects_idx` (`idTypeSubjects`);

--
-- Indices de la tabla `typedegree`
--
ALTER TABLE `typedegree`
  ADD PRIMARY KEY (`idTypeDegree`),
  ADD UNIQUE KEY `idType_UNIQUE` (`idTypeDegree`);

--
-- Indices de la tabla `typeevaluation`
--
ALTER TABLE `typeevaluation`
  ADD PRIMARY KEY (`idTypeEvaluation`),
  ADD UNIQUE KEY `idType_UNIQUE` (`idTypeEvaluation`);

--
-- Indices de la tabla `typenews`
--
ALTER TABLE `typenews`
  ADD PRIMARY KEY (`idTypeNews`),
  ADD UNIQUE KEY `idTypeNews_UNIQUE` (`idTypeNews`);

--
-- Indices de la tabla `typeresources`
--
ALTER TABLE `typeresources`
  ADD PRIMARY KEY (`idTypeResources`),
  ADD UNIQUE KEY `idType_UNIQUE` (`idTypeResources`);

--
-- Indices de la tabla `typesubjects`
--
ALTER TABLE `typesubjects`
  ADD PRIMARY KEY (`idTypeSubjects`),
  ADD UNIQUE KEY `idTypeSubjects_UNIQUE` (`idTypeSubjects`);

--
-- Indices de la tabla `typeusers`
--
ALTER TABLE `typeusers`
  ADD PRIMARY KEY (`idTypeUsers`),
  ADD UNIQUE KEY `idTypeUsers_UNIQUE` (`idTypeUsers`);

--
-- Indices de la tabla `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`idUniversity`),
  ADD UNIQUE KEY `idUniversity_UNIQUE` (`idUniversity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`),
  ADD UNIQUE KEY `idUsers_UNIQUE` (`idUsers`),
  ADD KEY `fk_Users_TypeUsers_idx` (`idTypeUsers`);

--
-- Indices de la tabla `users_has_subject`
--
ALTER TABLE `users_has_subject`
  ADD PRIMARY KEY (`idUsershasSubject`),
  ADD UNIQUE KEY `idUsershasSubject_UNIQUE` (`idUsershasSubject`),
  ADD KEY `fk_Users_has_Subject_Subject1_idx` (`idSubject`),
  ADD KEY `fk_Users_has_Subject_Users1_idx` (`idUsers`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `course`
--
ALTER TABLE `course`
  MODIFY `idCourse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `degree`
--
ALTER TABLE `degree`
  MODIFY `idDegree` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `idEvaluation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `faculty`
--
ALTER TABLE `faculty`
  MODIFY `idFaculty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `idNews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `resources`
--
ALTER TABLE `resources`
  MODIFY `idResources` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `results`
--
ALTER TABLE `results`
  MODIFY `idResults` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `subject`
--
ALTER TABLE `subject`
  MODIFY `idSubject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `typedegree`
--
ALTER TABLE `typedegree`
  MODIFY `idTypeDegree` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `typeevaluation`
--
ALTER TABLE `typeevaluation`
  MODIFY `idTypeEvaluation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `typenews`
--
ALTER TABLE `typenews`
  MODIFY `idTypeNews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `typeresources`
--
ALTER TABLE `typeresources`
  MODIFY `idTypeResources` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `typesubjects`
--
ALTER TABLE `typesubjects`
  MODIFY `idTypeSubjects` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `typeusers`
--
ALTER TABLE `typeusers`
  MODIFY `idTypeUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `university`
--
ALTER TABLE `university`
  MODIFY `idUniversity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `users_has_subject`
--
ALTER TABLE `users_has_subject`
  MODIFY `idUsershasSubject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_Course_Degree1` FOREIGN KEY (`idDegree`) REFERENCES `degree` (`idDegree`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `degree`
--
ALTER TABLE `degree`
  ADD CONSTRAINT `fk_Degree_Faculty1` FOREIGN KEY (`idFaculty`) REFERENCES `faculty` (`idFaculty`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Degree_TypeDegree1` FOREIGN KEY (`idTypeDegree`) REFERENCES `typedegree` (`idTypeDegree`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `fk_Evaluation_Subject1` FOREIGN KEY (`idSubject`) REFERENCES `subject` (`idSubject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Evaluation_TypeEvaluation1` FOREIGN KEY (`idTypeEvaluation`) REFERENCES `typeevaluation` (`idTypeEvaluation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `fk_Faculty_University1` FOREIGN KEY (`idUniversity`) REFERENCES `university` (`idUniversity`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_News_TypeNews1` FOREIGN KEY (`idTypeNews`) REFERENCES `typenews` (`idTypeNews`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_News_Users1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `fk_Resources_Subject1` FOREIGN KEY (`idSubject`) REFERENCES `subject` (`idSubject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Resources_TypeResources1` FOREIGN KEY (`idTypeResources`) REFERENCES `typeresources` (`idTypeResources`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `fk_Results_Evaluation1` FOREIGN KEY (`idEvaluation`) REFERENCES `evaluation` (`idEvaluation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `fk_Subject_Course1` FOREIGN KEY (`idCourse`) REFERENCES `course` (`idCourse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_Users_TypeUsers` FOREIGN KEY (`idTypeUsers`) REFERENCES `typeusers` (`idTypeUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users_has_subject`
--
ALTER TABLE `users_has_subject`
  ADD CONSTRAINT `fk_Users_has_Subject_Subject1` FOREIGN KEY (`idSubject`) REFERENCES `subject` (`idSubject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Users_has_Subject_Users1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
