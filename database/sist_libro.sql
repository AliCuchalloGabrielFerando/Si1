-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2020 a las 20:48:52
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sist_libro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `monto` double(8,2) NOT NULL,
  `tipo` smallint(6) NOT NULL,
  `venta_id` bigint(20) UNSIGNED DEFAULT NULL,
  `compra_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_completo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id`, `nombre_completo`, `created_at`, `updated_at`) VALUES
(1, 'anonimo', '2020-09-18 18:54:42', '2020-09-18 18:54:42'),
(2, 'servas', '2020-09-18 18:54:48', '2020-09-18 18:54:48'),
(3, 'sebastian', '2020-09-18 18:54:55', '2020-09-18 18:54:55'),
(4, 'vacapinto', '2020-09-28 11:43:34', '2020-09-28 11:43:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '2020-09-18 17:08:49', '2020-09-18 17:08:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `carnet_identidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `carnet_identidad`, `nombre`, `apellido_paterno`, `apellido_materno`, `created_at`, `updated_at`) VALUES
(1, '885155', 'daniel', 'ali', 'cuchallo', '2020-09-26 20:45:52', '2020-09-26 20:45:52'),
(2, '8874454', 'veres', 'torres', 'aguilar', '2020-09-26 20:46:14', '2020-09-26 20:46:14'),
(3, '8874454', 'jose daniel', 'ali', 'cuchallo', '2020-09-28 11:45:47', '2020-09-28 11:45:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `monto_total` double(8,2) NOT NULL,
  `proveedor_id` bigint(20) UNSIGNED NOT NULL,
  `empleado_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `fecha`, `monto_total`, `proveedor_id`, `empleado_id`, `created_at`, `updated_at`) VALUES
(3, '2020-09-19 16:44:02', 230.00, 1, 2, '2020-09-20 00:44:02', '2020-09-20 20:26:48'),
(4, '2020-09-19 16:49:18', 0.00, 2, 2, '2020-09-19 20:49:18', '2020-09-19 20:49:18'),
(5, '2020-09-20 10:20:01', 0.00, 1, 2, '2020-09-20 14:20:01', '2020-09-20 14:20:01'),
(6, '2020-09-20 11:32:34', 0.00, 3, 2, '2020-09-20 15:32:34', '2020-09-20 15:32:34'),
(7, '2020-09-26 16:48:32', 0.00, 3, 2, '2020-09-26 20:48:32', '2020-09-26 20:48:32'),
(10, '2020-09-27 15:17:57', 0.00, 7, 2, '2020-09-27 19:17:57', '2020-09-27 19:17:57'),
(11, '2020-09-28 07:51:05', 150.00, 8, 2, '2020-09-28 11:51:05', '2020-09-28 11:52:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porcentaje_descuento` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`id`, `nombre`, `porcentaje_descuento`, `created_at`, `updated_at`) VALUES
(1, 'septiembre', 0.97, '2020-09-27 19:02:45', '2020-09-27 19:02:45'),
(2, 'agosto', 0.95, '2020-09-27 19:02:45', '2020-09-27 19:02:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(8,2) NOT NULL,
  `precio_unitario` double(8,2) NOT NULL,
  `compra_id` bigint(20) UNSIGNED NOT NULL,
  `libro_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `cantidad`, `precio`, `precio_unitario`, `compra_id`, `libro_id`, `created_at`, `updated_at`) VALUES
(7, 4, 80.00, 20.00, 3, 1, '2020-09-20 20:26:22', '2020-09-20 20:26:22'),
(8, 5, 150.00, 30.00, 3, 3, '2020-09-20 20:26:48', '2020-09-20 20:26:48'),
(9, 10, 150.00, 15.00, 11, 10, '2020-09-28 11:52:04', '2020-09-28 11:52:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(8,2) NOT NULL,
  `precio_unitario` double(8,2) NOT NULL,
  `venta_id` bigint(20) UNSIGNED NOT NULL,
  `libro_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `cantidad`, `precio`, `precio_unitario`, `venta_id`, `libro_id`, `created_at`, `updated_at`) VALUES
(6, 2, 90.00, 45.00, 5, 1, '2020-09-27 19:08:08', '2020-09-27 19:08:08'),
(9, 1, 25.00, 25.00, 2, 11, '2020-10-09 21:23:33', '2020-10-09 21:23:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle__autors`
--

CREATE TABLE `detalle__autors` (
  `libro_id` bigint(20) UNSIGNED NOT NULL,
  `autor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle__autors`
--

INSERT INTO `detalle__autors` (`libro_id`, `autor_id`, `created_at`, `updated_at`) VALUES
(2, 2, '2020-09-20 15:08:49', '2020-09-20 15:08:49'),
(3, 3, '2020-09-20 20:12:31', '2020-09-20 20:12:31'),
(4, 1, '2020-09-20 20:15:31', '2020-09-20 20:15:31'),
(6, 2, '2020-09-26 20:39:29', '2020-09-26 20:39:29'),
(7, 1, '2020-09-27 19:24:35', '2020-09-27 19:24:35'),
(7, 2, '2020-09-27 19:24:09', '2020-09-27 19:24:09'),
(10, 4, '2020-09-28 11:44:26', '2020-09-28 11:44:26'),
(11, 1, '2020-10-09 21:22:45', '2020-10-09 21:22:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'oceano', '2020-09-18 18:54:16', '2020-09-18 18:54:16'),
(2, 'pauro', '2020-09-18 18:54:24', '2020-09-18 18:54:24'),
(3, 'semilla', '2020-09-18 18:54:29', '2020-09-18 18:54:29'),
(4, 'oceass', '2020-09-18 18:55:07', '2020-09-18 18:55:07'),
(5, 'oceanas', '2020-09-18 18:55:15', '2020-09-18 18:55:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `carnet_identidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo_id` bigint(20) UNSIGNED NOT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `carnet_identidad`, `nombre`, `apellido_paterno`, `apellido_materno`, `telefono`, `cargo_id`, `estado_id`, `created_at`, `updated_at`) VALUES
(1, '786535425', 'root', 'Mercedez', 'Gomez', '723434', 1, 1, '2020-09-18 17:08:49', '2020-09-18 17:08:49'),
(2, '8461313', 'gabriel fernando', 'ali', 'cuchallo', '74545155', 1, 1, '2020-09-19 23:53:54', '2020-09-19 23:53:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Activo', '2020-09-18 17:07:51', '2020-09-18 17:07:51'),
(2, 'Inactivo', '2020-09-18 17:07:51', '2020-09-18 17:07:51'),
(3, 'Suspendido', '2020-09-18 17:07:51', '2020-09-18 17:07:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `edicion` smallint(6) NOT NULL,
  `edicion_año` int(11) NOT NULL,
  `editorial_id` bigint(20) UNSIGNED NOT NULL,
  `ibsn_10` int(11) DEFAULT NULL,
  `isbn_13` int(11) DEFAULT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `precio`, `edicion`, `edicion_año`, `editorial_id`, `ibsn_10`, `isbn_13`, `categoria_id`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'atlas mundial', 45.00, 1, 2000, 1, NULL, 43523425, 2, 49, '2020-09-20 14:26:20', '2020-09-28 11:48:38'),
(2, 'tarar', 45.00, 1, 1996, 1, NULL, 4343543, 2, 454, '2020-09-20 15:08:38', '2020-09-27 18:18:49'),
(3, 'atlas', 45.00, 2, 1996, 2, NULL, 45325244, 3, 61, '2020-09-20 20:12:26', '2020-09-20 20:26:48'),
(4, 'att', 20.00, 3, 2000, 3, NULL, 342535, 2, 10, '2020-09-20 20:15:27', '2020-09-20 20:15:42'),
(5, 'odisea', 34.00, 3, 1854, 3, NULL, 453425454, 2, 34, '2020-09-26 20:27:36', '2020-09-26 20:27:36'),
(6, 'el tren', 23.00, 3, 2002, 1, 123434254, 432554254, 4, 45, '2020-09-26 20:38:08', '2020-09-26 20:38:08'),
(7, 'diagrama', 50.00, 4, 2005, 3, NULL, 213652343, 3, 155, '2020-09-27 19:23:57', '2020-09-27 19:24:21'),
(8, 'att', 24.00, 3, 2000, 2, NULL, 452352435, 1, 13, '2020-09-27 19:44:29', '2020-09-27 19:45:39'),
(10, 'la llorona', 20.00, 1, 2000, 2, NULL, 12451255, 1, 40, '2020-09-28 11:44:16', '2020-09-28 11:52:04'),
(11, 'mundo', 25.00, 2, 2020, 2, NULL, NULL, 1, 19, '2020-10-09 21:22:40', '2020-10-09 21:23:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_11_002313_create_estados_table', 1),
(2, '2014_10_11_014354_create_cargos_table', 1),
(3, '2014_10_11_014621_create_empleados_table', 1),
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_08_15_003929_create_descuentos_table', 1),
(8, '2020_08_15_014716_create_clientes_table', 1),
(9, '2020_08_15_014746_create_ventas_table', 1),
(10, '2020_08_15_014820_create_editoriales_table', 1),
(11, '2020_08_15_014855_create_autores_table', 1),
(12, '2020_08_15_015108_create_temas_table', 1),
(13, '2020_08_15_015109_create_libros_table', 1),
(14, '2020_08_15_021346_create_detalle_venta_table', 1),
(15, '2020_08_15_021410_create_proveedores_table', 1),
(16, '2020_08_15_021426_create_compras_table', 1),
(17, '2020_08_15_021452_create_detalle_compra_table', 1),
(18, '2020_08_15_021513_create_actividades_table', 1),
(19, '2020_08_22_005105_create_detalle__autors_table', 1),
(20, '2020_08_22_014413_create_recibos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `telefono`, `estado_id`, `created_at`, `updated_at`) VALUES
(1, 'daniel', '74545155', 1, '2020-09-18 18:31:30', '2020-09-18 18:31:30'),
(2, 'daniela', '74545155', 1, '2020-09-19 23:52:58', '2020-09-19 23:52:58'),
(3, 'dante', '165611', 1, '2020-09-20 15:32:07', '2020-09-20 15:32:07'),
(4, 'luis daniel', '6251523', 1, '2020-09-26 20:49:37', '2020-09-26 20:49:37'),
(5, 'fernando animal', '15616131', 2, '2020-09-26 20:50:52', '2020-09-26 20:50:52'),
(6, 'dani', '2324324', 2, '2020-09-26 20:52:50', '2020-09-26 20:52:50'),
(7, 'manuel', '46156', 1, '2020-09-27 19:17:10', '2020-09-27 19:17:45'),
(8, 'alexander', '74545155', 1, '2020-09-28 11:50:09', '2020-09-28 11:50:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos`
--

CREATE TABLE `recibos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `monto` double(8,2) NOT NULL,
  `venta_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'terror', 'cosas dd terror', '2020-09-18 18:53:39', '2020-09-18 18:53:39'),
(2, 'comedia', 'cosas de comedia', '2020-09-18 18:53:53', '2020-09-18 18:53:53'),
(3, 'suspenso', 'cosas de suspenso', '2020-09-18 18:54:04', '2020-09-18 18:54:04'),
(4, 'historia', 'cosas del pasado', '2020-09-20 14:51:29', '2020-09-20 14:51:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empleado_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `empleado_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'root@root.com', NULL, '$2y$10$9bumdU.dUbYCH30xZ2yfsuG81XWmE023JUNqbhjUlDvcl6c4CrEyq', 1, NULL, '2020-09-18 17:08:50', '2020-09-18 17:08:50'),
(2, 'gabriel@gmail.com', NULL, '$2y$10$.HBo3BisnQSR371iYJktgeEaRrRQl2VQkZSEw8IPy.G7KGWNP9M9e', 2, NULL, '2020-09-19 23:54:13', '2020-09-28 11:42:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `monto_total` double(8,2) NOT NULL DEFAULT 0.00,
  `monto_descuento` double(8,2) NOT NULL DEFAULT 0.00,
  `monto_venta` double(8,2) NOT NULL DEFAULT 0.00,
  `oferta_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `empleado_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `monto_total`, `monto_descuento`, `monto_venta`, `oferta_id`, `cliente_id`, `empleado_id`, `created_at`, `updated_at`) VALUES
(2, 25.00, 0.00, 25.00, NULL, 1, 2, '2020-09-27 18:19:59', '2020-10-09 21:23:33'),
(5, 85.50, 4.50, 90.00, 2, 1, 2, '2020-09-27 19:07:56', '2020-09-27 19:08:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividades_venta_id_foreign` (`venta_id`),
  ADD KEY `actividades_compra_id_foreign` (`compra_id`);

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compras_proveedor_id_foreign` (`proveedor_id`),
  ADD KEY `compras_empleado_id_foreign` (`empleado_id`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_compra_compra_id_foreign` (`compra_id`),
  ADD KEY `detalle_compra_libro_id_foreign` (`libro_id`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_venta_venta_id_foreign` (`venta_id`),
  ADD KEY `detalle_venta_libro_id_foreign` (`libro_id`);

--
-- Indices de la tabla `detalle__autors`
--
ALTER TABLE `detalle__autors`
  ADD PRIMARY KEY (`libro_id`,`autor_id`),
  ADD KEY `detalle__autors_autor_id_foreign` (`autor_id`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleados_cargo_id_foreign` (`cargo_id`),
  ADD KEY `empleados_estado_id_foreign` (`estado_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `libros_editorial_id_foreign` (`editorial_id`),
  ADD KEY `libros_categoria_id_foreign` (`categoria_id`);

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
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proveedores_estado_id_foreign` (`estado_id`);

--
-- Indices de la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recibos_venta_id_foreign` (`venta_id`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_empleado_id_foreign` (`empleado_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ventas_oferta_id_foreign` (`oferta_id`),
  ADD KEY `ventas_cliente_id_foreign` (`cliente_id`),
  ADD KEY `ventas_empleado_id_foreign` (`empleado_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `recibos`
--
ALTER TABLE `recibos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_compra_id_foreign` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`),
  ADD CONSTRAINT `actividades_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `compras_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_compra_id_foreign` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalle_compra_libro_id_foreign` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_libro_id_foreign` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`),
  ADD CONSTRAINT `detalle_venta_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `detalle__autors`
--
ALTER TABLE `detalle__autors`
  ADD CONSTRAINT `detalle__autors_autor_id_foreign` FOREIGN KEY (`autor_id`) REFERENCES `autores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalle__autors_libro_id_foreign` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`),
  ADD CONSTRAINT `empleados_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `temas` (`id`),
  ADD CONSTRAINT `libros_editorial_id_foreign` FOREIGN KEY (`editorial_id`) REFERENCES `editoriales` (`id`);

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD CONSTRAINT `recibos_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `ventas_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `ventas_oferta_id_foreign` FOREIGN KEY (`oferta_id`) REFERENCES `descuentos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
