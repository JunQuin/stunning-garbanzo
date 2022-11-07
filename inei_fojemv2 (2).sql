-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2022 a las 10:38:32
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.2-1ubuntu2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "-07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inei_fojemv2`
--
CREATE DATABASE IF NOT EXISTS `inei_fojemv2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `inei_fojemv2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_jueces`
--

DROP TABLE IF EXISTS `admin_jueces`;
CREATE TABLE IF NOT EXISTS `admin_jueces` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `celular` (`celular`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `admin_jueces`
--

TRUNCATE TABLE `admin_jueces`;
--
-- Volcado de datos para la tabla `admin_jueces`
--

INSERT INTO `admin_jueces` (`id`, `nombre`, `apellido`, `email`, `celular`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Juanito', 'De la Barrera', 'juanito@gmail.com', '6871928374', 1, '2022-11-04 05:19:46', '2022-11-04 05:19:46'),
(2, 'Paquito', 'El Chato', 'paco@gmail.com', '6879871264', 1, '2022-11-04 05:41:19', '2022-11-04 05:41:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_proyecto_juez`
--

DROP TABLE IF EXISTS `admin_proyecto_juez`;
CREATE TABLE IF NOT EXISTS `admin_proyecto_juez` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `juez_id` bigint(20) NOT NULL,
  `proyecto_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `juez_id` (`juez_id`,`proyecto_id`),
  KEY `proyecto_id` (`proyecto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `admin_proyecto_juez`
--

TRUNCATE TABLE `admin_proyecto_juez`;
--
-- Volcado de datos para la tabla `admin_proyecto_juez`
--

INSERT INTO `admin_proyecto_juez` (`id`, `juez_id`, `proyecto_id`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `rol` tinyint(4) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`email`,`celular`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `admin_users`
--

TRUNCATE TABLE `admin_users`;
--
-- Volcado de datos para la tabla `admin_users`
--

INSERT INTO `admin_users` (`id`, `nombre`, `email`, `password`, `celular`, `rol`, `remember_token`, `status`, `updated_at`, `created_at`) VALUES
(1, 'JAVIER VILLA QUINTERO', 'javier@gmail.com', '$2y$10$.guI6TXrxlP1cux1GhGql.SnIYAQNY7KsyNxckPRXC0sPwBPSmbGe', '6871919431', 1, 'gdGp65TE481n6Hq2jQSTMWhZr0AChRDUavCufZpfIEiyaBHtsH3FWLsrYeyo', 1, NULL, NULL),
(7, 'Juanito De la Barrera', 'juanito@gmail.com', '$2y$10$a1bS86uaEbB6TFtpHamyT.6RvIngYJ6HUEu/z1RuDsFelCSaXq4qq', '6871928374', 2, NULL, 1, '2022-11-04 05:19:46', '2022-11-04 05:19:46'),
(8, 'Paquito El Chato', 'paco@gmail.com', '$2y$10$8bRoB9OiO0JNQaHgSq7gfu8nS2z4PWVubUAeeYFxirsQaVSHg87IW', '6879871264', 2, 'FNFv4A0nADgmMsChKL9BGmuKwwE9SBJijX53jadLwyg9Wtft8MrXVwSZTngp', 1, '2022-11-04 05:41:19', '2022-11-04 05:41:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
CREATE TABLE IF NOT EXISTS `calificaciones` (
  `id` int(11) NOT NULL,
  `proyecto_id` int(11) NOT NULL,
  `juez` int(11) NOT NULL,
  `cal1` int(11) NOT NULL,
  UNIQUE KEY `proyecto_id` (`proyecto_id`,`juez`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncar tablas antes de insertar `calificaciones`
--

TRUNCATE TABLE `calificaciones`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `categorias`
--

TRUNCATE TABLE `categorias`;
--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Divulgación Científica', '2022-09-15 06:30:58', '2022-09-15 06:30:58', 1),
(3, 'Cuento Científico', '2022-09-15 06:30:58', '2022-09-15 06:30:58', 1),
(4, 'Cortometraje', '2022-09-15 06:32:57', '2022-09-15 06:32:57', 1),
(5, 'Animación', '2022-09-15 06:33:20', '2022-09-15 06:33:20', 1),
(6, 'Robótica', '2022-09-15 06:35:45', '2022-09-15 06:35:53', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `dashboarddataview`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `dashboarddataview`;
CREATE TABLE IF NOT EXISTS `dashboarddataview` (
`pro_id` bigint(20) unsigned
,`pro_nombre` varchar(255)
,`pro_descripcion` text
,`asesorNombre` varchar(255)
,`asesorCelular` varchar(20)
,`asesorEmail` varchar(50)
,`pro_participado` tinyint(1)
,`pro_categoria` varchar(255)
,`pro_subcategoria` varchar(255)
,`par1_nombre` varchar(255)
,`par1_apellidos` varchar(255)
,`par1_telefono` varchar(255)
,`par1_correo` varchar(255)
,`par1_procedencia` varchar(255)
,`par1_niveleducativo` tinyint(4)
,`par1_playera` tinyint(4)
,`par2_nombre` varchar(255)
,`par2_apellidos` varchar(255)
,`par2_telefono` varchar(255)
,`par2_correo` varchar(255)
,`par2_procedencia` varchar(255)
,`par2_niveleducativo` tinyint(4)
,`par2_playera` tinyint(4)
,`status` tinyint(1)
,`documento` varchar(100)
,`video` varchar(150)
,`recibo` varchar(120)
,`bitacora` text
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `failed_jobs`
--

TRUNCATE TABLE `failed_jobs`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `migrations`
--

TRUNCATE TABLE `migrations`;
--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_20_134543_create_asesors_table', 1),
(6, '2022_05_23_155458_create_tipos_table', 1),
(7, '2022_05_23_155542_create_categorias_table', 1),
(8, '2022_05_23_155602_create_sub_categorias_table', 1),
(9, '2022_05_23_163051_update_users_table', 1),
(10, '2022_06_13_170242_update_users_table_fkbitacoras', 1),
(11, '2022_06_14_150037_update_users_table_add_documents_column', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `password_resets`
--

TRUNCATE TABLE `password_resets`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `personal_access_tokens`
--

TRUNCATE TABLE `personal_access_tokens`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_categorias`
--

DROP TABLE IF EXISTS `sub_categorias`;
CREATE TABLE IF NOT EXISTS `sub_categorias` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `sub_categorias`
--

TRUNCATE TABLE `sub_categorias`;
--
-- Volcado de datos para la tabla `sub_categorias`
--

INSERT INTO `sub_categorias` (`id`, `nombre`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Ciencias', '2022-09-15 06:37:04', '2022-09-15 06:37:04', 0),
(3, 'Tecnología', '2022-09-15 06:30:58', '2022-09-15 06:30:58', 1),
(4, 'Sociales y Culturales', '2022-09-15 06:37:04', '2022-09-15 06:37:04', 1),
(6, 'N/A', '2022-10-28 17:38:31', '2022-10-28 17:38:31', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `asesorNombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asesorCelular` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asesorEmail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participado` tinyint(1) NOT NULL,
  `categoria` bigint(20) UNSIGNED NOT NULL,
  `subcategoria` bigint(20) UNSIGNED DEFAULT NULL,
  `participante1_Nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participante1_Apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participante1_Telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participante1_Correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participante1_InstitucionProcedencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participante1_NivelEducativo` tinyint(4) NOT NULL,
  `participante1_TallaPlayera` tinyint(4) NOT NULL,
  `participante2_Nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'N/A',
  `participante2_Apellidos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'N/A',
  `participante2_Telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'N/A',
  `participante2_Correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'N/A',
  `participante2_InstitucionProcedencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'N/A',
  `participante2_NivelEducativo` tinyint(4) DEFAULT 0,
  `participante2_TallaPlayera` tinyint(4) DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bitacoras` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_categoria_foreign` (`categoria`),
  KEY `users_subcategoria_foreign` (`subcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `users`
--

TRUNCATE TABLE `users`;
--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `descripcion`, `asesorNombre`, `asesorCelular`, `asesorEmail`, `participado`, `categoria`, `subcategoria`, `participante1_Nombre`, `participante1_Apellidos`, `participante1_Telefono`, `participante1_Correo`, `participante1_InstitucionProcedencia`, `participante1_NivelEducativo`, `participante1_TallaPlayera`, `participante2_Nombre`, `participante2_Apellidos`, `participante2_Telefono`, `participante2_Correo`, `participante2_InstitucionProcedencia`, `participante2_NivelEducativo`, `participante2_TallaPlayera`, `remember_token`, `created_at`, `updated_at`, `status`, `file`, `document`, `link`, `payment`, `bitacoras`) VALUES
(3, 'Proyecto 2', 'juan@gmail.com', NULL, '$2y$10$lCt5twi4tg9V8I5P9PJXquB4vYgq0hR3NduYlx2GWgMPWCdyAMsjS', 'Este es mi segundo proyecto', 'Un asesor muy bueno', '6871234569', 'asesor2@gmail.com', 0, 6, 6, 'Juanito', 'Peralta', '6879876543', 'juan@gmail.com', 'INEI2', 3, 3, NULL, NULL, NULL, 'N/A', 'N/A', 0, 0, 'RsD3XTEQ4QESoAEUSRdqh5TeHnzWFqc0cjAej5qZRrKUyUaMVYaqbt3U6bjR', '2022-10-28 23:27:20', '2022-10-28 23:27:20', 1, '\r\n', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura para la vista `dashboarddataview`
--
DROP TABLE IF EXISTS `dashboarddataview`;

DROP VIEW IF EXISTS `dashboarddataview`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dashboarddataview`  AS SELECT `users`.`id` AS `pro_id`, `users`.`name` AS `pro_nombre`, `users`.`descripcion` AS `pro_descripcion`, `users`.`asesorNombre` AS `asesorNombre`, `users`.`asesorCelular` AS `asesorCelular`, `users`.`asesorEmail` AS `asesorEmail`, `users`.`participado` AS `pro_participado`, `categorias`.`nombre` AS `pro_categoria`, `sub_categorias`.`nombre` AS `pro_subcategoria`, `users`.`participante1_Nombre` AS `par1_nombre`, `users`.`participante1_Apellidos` AS `par1_apellidos`, `users`.`participante1_Telefono` AS `par1_telefono`, `users`.`participante1_Correo` AS `par1_correo`, `users`.`participante1_InstitucionProcedencia` AS `par1_procedencia`, `users`.`participante1_NivelEducativo` AS `par1_niveleducativo`, `users`.`participante1_TallaPlayera` AS `par1_playera`, `users`.`participante2_Nombre` AS `par2_nombre`, `users`.`participante2_Apellidos` AS `par2_apellidos`, `users`.`participante2_Telefono` AS `par2_telefono`, `users`.`participante2_Correo` AS `par2_correo`, `users`.`participante2_InstitucionProcedencia` AS `par2_procedencia`, `users`.`participante2_NivelEducativo` AS `par2_niveleducativo`, `users`.`participante2_TallaPlayera` AS `par2_playera`, `users`.`status` AS `status`, `users`.`document` AS `documento`, `users`.`link` AS `video`, `users`.`payment` AS `recibo`, `users`.`bitacoras` AS `bitacora` FROM ((`users` join `categorias` on(`users`.`categoria` = `categorias`.`id`)) join `sub_categorias` on(`users`.`subcategoria` = `sub_categorias`.`id`))  ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin_proyecto_juez`
--
ALTER TABLE `admin_proyecto_juez`
  ADD CONSTRAINT `admin_proyecto_juez_ibfk_1` FOREIGN KEY (`juez_id`) REFERENCES `admin_jueces` (`id`),
  ADD CONSTRAINT `admin_proyecto_juez_ibfk_2` FOREIGN KEY (`proyecto_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_categoria_foreign` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `users_subcategoria_foreign` FOREIGN KEY (`subcategoria`) REFERENCES `sub_categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
