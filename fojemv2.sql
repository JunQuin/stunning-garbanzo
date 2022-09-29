-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-09-2022 a las 13:38:13
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fojemv2`
--
CREATE DATABASE IF NOT EXISTS `fojemv2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fojemv2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesors`
--

DROP TABLE IF EXISTS `asesors`;
CREATE TABLE `asesors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `talla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `asesors`
--

INSERT INTO `asesors` (`id`, `nombre`, `password`, `apellidos`, `telefono`, `talla`, `email`, `sexo`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Javier', '', 'Villa Quintero', '6871919431', 'Grande', 'jun_quin@outlook.com', 'Masculino', '2022-06-13 17:13:45', '2022-06-13 17:13:45', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Tecnologia', '2022-06-13 17:17:08', '2022-06-13 17:17:08', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `dashboarddataview`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `dashboarddataview`;
CREATE TABLE `dashboarddataview` (
`pro_id` bigint(20) unsigned
,`pro_nombre` varchar(255)
,`pro_descripcion` text
,`pro_participado` tinyint(1)
,`pro_tipo` varchar(255)
,`pro_categoria` varchar(255)
,`pro_subcategoria` varchar(255)
,`par1_nombre` varchar(255)
,`par1_apellidos` varchar(255)
,`par1_telefono` varchar(255)
,`par1_correo` varchar(255)
,`par1_procedencia` varchar(255)
,`par1_niveleducativo` tinyint(4)
,`par2_nombre` varchar(255)
,`par2_apellidos` varchar(255)
,`par2_telefono` varchar(255)
,`par2_correo` varchar(255)
,`par2_procedencia` varchar(255)
,`par2_niveleducativo` tinyint(4)
,`asesor_nombre` varchar(255)
,`asesor_apellidos` varchar(255)
,`asesor_telefono` varchar(255)
,`asesor_correo` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, '2022_06_13_165836_create_bitacoras_table', 1),
(11, '2022_06_13_170242_update_users_table_fkbitacoras', 1),
(12, '2022_06_14_150037_update_users_table_add_documents_column', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_categorias`
--

DROP TABLE IF EXISTS `sub_categorias`;
CREATE TABLE `sub_categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sub_categorias`
--

INSERT INTO `sub_categorias` (`id`, `nombre`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Programación', '2022-06-13 17:18:01', '2022-06-13 17:18:01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

DROP TABLE IF EXISTS `tipos`;
CREATE TABLE `tipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `nombre`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Software', '2022-06-13 17:18:19', '2022-06-13 17:18:19', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `asesor` bigint(20) UNSIGNED NOT NULL,
  `participado` tinyint(1) NOT NULL,
  `tipo` bigint(20) UNSIGNED NOT NULL,
  `categoria` bigint(20) UNSIGNED NOT NULL,
  `subcategoria` bigint(20) UNSIGNED NOT NULL,
  `participante1_Nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participante1_Apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participante1_Telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participante1_Correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participante1_InstitucionProcedencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participante1_NivelEducativo` tinyint(4) NOT NULL,
  `participante1_TallaPlayera` tinyint(4) NOT NULL,
  `participante2_Nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participante2_Apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participante2_Telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participante2_Correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participante2_InstitucionProcedencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participante2_NivelEducativo` tinyint(4) NOT NULL,
  `participante2_TallaPlayera` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `bitacoras` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `descripcion`, `asesor`, `participado`, `tipo`, `categoria`, `subcategoria`, `participante1_Nombre`, `participante1_Apellidos`, `participante1_Telefono`, `participante1_Correo`, `participante1_InstitucionProcedencia`, `participante1_NivelEducativo`, `participante1_TallaPlayera`, `participante2_Nombre`, `participante2_Apellidos`, `participante2_Telefono`, `participante2_Correo`, `participante2_InstitucionProcedencia`, `participante2_NivelEducativo`, `participante2_TallaPlayera`, `remember_token`, `created_at`, `updated_at`, `status`, `bitacoras`, `document`, `link`, `payment`) VALUES
(1, 'Ciber Gamer', 'jun_quin@outlook.com', NULL, '$2y$10$3co5fcHaj2bthRHTyl.faev1bEfqhMFvOfaSltd4nHtFC9Jb1A1Ra', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque varius lectus ut ligula tempor, nec dapibus nibh blandit. Donec a nunc elit. Aliquam a massa massa. Curabitur volutpat ex vitae felis fermentum mollis. Mauris odio sem, pharetra sed efficitur vel, varius sit amet ex. Nulla facilisi. Donec eleifend ante eget egestas scelerisque. Maecenas fermentum libero orci, non tristique dolor accumsan sed. Suspendisse porttitor est vel lectus viverra, a ullamcorper ipsum venenatis. Nulla lacinia porttitor odio, eget tincidunt enim lobortis vitae. Maecenas rutrum sodales velit, vitae fringilla quam consequat vitae. Ut vel dignissim risus. In molestie, augue eu ultrices condimentum, sem dolor porttitor sem, a vestibulum ipsum velit in nulla. Praesent rhoncus nec arcu sed cursus.', 1, 0, 1, 1, 1, 'Javier', 'Quintero', '6871919431', 'jun_quin@outlook.com', 'INEI', 3, 3, 'Fake', 'Alumno', '6871910012', 'correo@gmail.com', 'FAKE INEI', 3, 1, 'Xk1JxH39CKE9WTaOUjLNX1jiJ6WGNeHMlYpkpKWRJ8oAYq5VL3BikKa8unYA', '2022-06-13 23:23:55', '2022-06-13 23:23:55', 1, '1655227492_INEINOMINADB.pdf', '1655227189_Doc1.pdf', 'https://www.youtube.com/watch?v=hwsXo6fsmso', '1655236862_Captura de pantalla (3).png'),
(2, 'Proyecto Numero 2', 'aaaa@gmail.com', NULL, '$2y$10$6bhfkiyhoAo//or1p5S5eeXZbtgGgUmWfsCHJfYSRxgXuWHaxB8bW', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 0, 1, 1, 1, 'Javier', 'Villa Quintero', '6871919431', 'aaaa@gmail.com', 'INEI', 3, 3, 'Victor', 'Soto', '89213792', 'asdasd@gmail.com', 'INEI', 3, 3, NULL, '2022-06-24 05:27:20', '2022-06-24 05:27:20', 1, '1656027032_FACTURA1798.pdf', '1656027123_PP_App_Inventor.pdf', 'https://www.youtube.com/watch?v=v3NH6kG-O3s', '1656027705_mexico.png');

-- --------------------------------------------------------

--
-- Estructura para la vista `dashboarddataview`
--
DROP TABLE IF EXISTS `dashboarddataview`;

DROP VIEW IF EXISTS `dashboarddataview`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dashboarddataview`  AS SELECT `users`.`id` AS `pro_id`, `users`.`name` AS `pro_nombre`, `users`.`descripcion` AS `pro_descripcion`, `users`.`participado` AS `pro_participado`, `tipos`.`nombre` AS `pro_tipo`, `categorias`.`nombre` AS `pro_categoria`, `sub_categorias`.`nombre` AS `pro_subcategoria`, `users`.`participante1_Nombre` AS `par1_nombre`, `users`.`participante1_Apellidos` AS `par1_apellidos`, `users`.`participante1_Telefono` AS `par1_telefono`, `users`.`participante1_Correo` AS `par1_correo`, `users`.`participante1_InstitucionProcedencia` AS `par1_procedencia`, `users`.`participante1_NivelEducativo` AS `par1_niveleducativo`, `users`.`participante2_Nombre` AS `par2_nombre`, `users`.`participante2_Apellidos` AS `par2_apellidos`, `users`.`participante2_Telefono` AS `par2_telefono`, `users`.`participante2_Correo` AS `par2_correo`, `users`.`participante2_InstitucionProcedencia` AS `par2_procedencia`, `users`.`participante2_NivelEducativo` AS `par2_niveleducativo`, `asesors`.`nombre` AS `asesor_nombre`, `asesors`.`apellidos` AS `asesor_apellidos`, `asesors`.`telefono` AS `asesor_telefono`, `asesors`.`email` AS `asesor_correo` FROM ((((`users` join `asesors` on((`users`.`asesor` = `asesors`.`id`))) join `categorias` on((`users`.`categoria` = `categorias`.`id`))) join `tipos` on((`users`.`tipo` = `tipos`.`id`))) join `sub_categorias` on((`users`.`subcategoria` = `sub_categorias`.`id`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesors`
--
ALTER TABLE `asesors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `asesors_email_unique` (`email`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_asesor_foreign` (`asesor`),
  ADD KEY `users_tipo_foreign` (`tipo`),
  ADD KEY `users_categoria_foreign` (`categoria`),
  ADD KEY `users_subcategoria_foreign` (`subcategoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asesors`
--
ALTER TABLE `asesors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sub_categorias`
--
ALTER TABLE `sub_categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_asesor_foreign` FOREIGN KEY (`asesor`) REFERENCES `asesors` (`id`),
  ADD CONSTRAINT `users_categoria_foreign` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `users_subcategoria_foreign` FOREIGN KEY (`subcategoria`) REFERENCES `sub_categorias` (`id`),
  ADD CONSTRAINT `users_tipo_foreign` FOREIGN KEY (`tipo`) REFERENCES `tipos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
