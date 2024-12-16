-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2024 a las 13:08:47
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
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carritos`
--

INSERT INTO `carritos` (`id`, `user_id`, `producto_id`, `cantidad`, `created_at`, `updated_at`) VALUES
(16, 1, 12, 3, '2024-12-16 07:07:37', '2024-12-16 08:42:57'),
(17, 1, 16, 1, '2024-12-16 07:08:03', '2024-12-16 07:08:03'),
(19, 4, 11, 1, '2024-12-16 07:45:28', '2024-12-16 07:45:28'),
(20, 4, 14, 1, '2024-12-16 07:45:38', '2024-12-16 07:45:38'),
(21, 3, 15, 1, '2024-12-16 07:50:39', '2024-12-16 07:50:39'),
(22, 3, 17, 1, '2024-12-16 07:50:54', '2024-12-16 07:50:54'),
(23, 1, 11, 1, '2024-12-16 08:10:45', '2024-12-16 08:10:45'),
(24, 1, 15, 1, '2024-12-16 08:42:26', '2024-12-16 08:42:26'),
(25, 3, 16, 2, '2024-12-16 08:53:27', '2024-12-16 08:55:27'),
(26, 2, 12, 2, '2024-12-16 13:05:43', '2024-12-16 13:06:14'),
(27, 2, 11, 1, '2024-12-16 13:32:45', '2024-12-16 13:32:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_cabeceras`
--

CREATE TABLE `carrito_cabeceras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_detalles`
--

CREATE TABLE `carrito_detalles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `carrito_cabecera_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_09_173630_create_categorias_table', 1),
(5, '2024_12_09_173632_create_productos_table', 1),
(6, '2024_12_09_173635_create_carrito_cabeceras_table', 1),
(7, '2024_12_09_173637_create_carrito_detalles_table', 1),
(8, '2024_12_13_155205_add_is_admin_to_users_table', 2),
(9, '2024_12_13_161244_add_role_to_users_table', 3),
(10, '2024_12_13_173604_add_imagen_to_productos_table', 4),
(11, '2024_12_13_200857_add_name_to_productos_table', 5),
(12, '2024_12_13_203935_add_timestamps_to_productos', 6),
(13, '2024_12_13_205603_add_timestamps_to_productos', 7),
(14, '2024_12_15_015514_create_carrito_table', 8),
(15, '2024_12_15_030207_add_user_id_to_carritos_table', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `categoria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `description`, `codigo`, `price`, `categoria_id`, `image`, `name`, `created_at`, `updated_at`) VALUES
(11, 'TF1700 ID es una innovadora solución para control de accesos. Es ideal para pequeñas, medianas y grandes empresas.', NULL, 235000.00, NULL, 'productos/IE0T9hyJMaAeHnUQX6kqXnfBF2RhISxWxIkMyQxT.jpg', 'Control de asistencia ZK-TF1700 ID', '2024-12-16 06:48:31', '2024-12-16 06:48:31'),
(12, 'Es una innovadora solución para control de personal y accesos de su empresa', NULL, 450000.00, NULL, 'productos/xK9vJuGQMvTj3z0SSo3sezcx4vnjCOeDuC9HoSCL.jpg', 'Control de asistencia K20', '2024-12-16 06:50:17', '2024-12-16 06:50:17'),
(14, 'K40 es un terminal de tiempo & asistencia y control de acessos simple con pantalla TFT de 2.8 pulgadas.', NULL, 340000.00, NULL, 'productos/iTnn01jcSYQZK2C7n9MW31Gv1z3OrbHW00lzVsYB.jpg', 'control asistencia ZK-K40', '2024-12-16 06:54:30', '2024-12-16 06:54:30'),
(15, 'Equipo de control de asistencia modelo LX14 de la marca ZkTeco tiene la capacidad de mostrar reportes en su propia pantalla.', NULL, 260000.00, NULL, 'productos/xDw1wMS8noA1S9bZuOoZxhyAArylbs8tg8h6E5TO.jpg', 'Control de Asistencia LX 14', '2024-12-16 06:56:10', '2024-12-16 06:56:10'),
(16, 'Equipo con pantalla mas grande, y mayor capacidad, Capacidad de huellas digitales: 8000 plantillas, Capacidad de la transacción: 200,000.', NULL, 560000.00, NULL, 'productos/uZamcoZoK3onrLoBvQkT6fXnQZnKrI7FiCh3WdpH.jpg', 'Control de asistencia - iClock 360', '2024-12-16 06:58:20', '2024-12-16 06:58:20'),
(17, 'Control de Acceso y Asistencia por Huella Digital y Tarjeta de Proximidad', NULL, 470000.00, NULL, 'productos/i6FSK405Kw9LGSaaSHyXBPTHnczdShSGgYvkIM6r.jpg', 'Control de asistencia iClock700', '2024-12-16 07:00:35', '2024-12-16 07:00:35'),
(18, 'Terminal Multi-Biométrico de Asistencia al Tiempo y Control de Acceso', NULL, 630000.00, NULL, 'productos/QpOodH7kAu5eblRQ7z0vIwZzgqG2G25mHdmhPOqB.jpg', 'Control de asistencia uface800', '2024-12-16 07:02:32', '2024-12-16 07:02:32'),
(19, 'LECTOR DE HUELLA DIGITAL + PIN + T. PROXIMIDAD PARA CONTROL DE ACCESO Y ASISTENCIA C/FUENTE', NULL, 870000.00, NULL, 'productos/dr9mWtfNgLHV6PBUKgmmKvy6giXviK80v2iXJpNY.png', 'Control de asistencia ZKSOFTWARE INO1A/USB/ID', '2024-12-16 07:05:32', '2024-12-16 07:05:32'),
(20, 'DS100 es una innovadora solución para control de tiempos y asistencias del personal con tecnologia de dual de huella digital.', NULL, 970000.00, NULL, 'productos/vLKxJVZ6TrrHWlIJsbfMw2DF6Dc8lFdFAFitdxiY.jpg', 'Control de asistencia ZK-DS100 ID', '2024-12-16 07:07:23', '2024-12-16 07:07:23'),
(21, 'Tk100-c es un innovador lector de huellas digitales biométrico para aplicaciones de presencia, que ofrece un rendimiento sin precedentes utilizando un algoritmo avanzado para la confiabilidad, precisión y velocidad de juego excelente.', NULL, 650000.00, NULL, 'productos/GEaCaX45GUdV1FmgwFq3doexxKGN8btxmr5GpFUV.png', 'Control de Asistencia ZK SOFTWARE TK-100-C', '2024-12-16 08:08:46', '2024-12-16 08:08:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('tcpJUL6P3DkCy3tW6dLDcSJBWOe4bQA9U2C2FV4n', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWDlHbmtnTUdDR01USm1nb2RnZm1hWldVQ3h1dXRaM2VUd0RqM1JnQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1734345309),
('YGyQdYgcKtdrOrMXi3ghMAp8kzaNQqJ6X0aMHu3s', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiU3NrbFp1T3hCcGc5UGk2M1BtUWQwUWJWV3lUZDE0bGNCYzdCdTBLRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9sb2NhbGhvc3QvTGFyYXZlbC9sYXJhdmVsZ3J1cG8yL3B1YmxpYyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzM0MzUwMDMyO319', 1734350033);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `role`) VALUES
(1, 'carlos', 'carlos@gmail.com', NULL, '$2y$12$Qebhr32HNsfVzeT7r8K3/OpmPC0LXtgyh4Zs4ujMhXIu59H4sq5cW', NULL, '2024-12-13 04:10:49', '2024-12-13 19:17:16', 1, 'admin'),
(2, 'pablo', 'pablo@gmail.com', NULL, '$2y$12$zJQiPyBnqIoV.I/OY/LxreDXuEZxIwhMWlkBnTU0zgcgPjMrzpJC.', NULL, '2024-12-13 19:23:51', '2024-12-13 19:23:51', 0, 'user'),
(3, 'Sofia', 'sofia@gmail.com', NULL, '$2y$12$uhns7Wd4kKGdKczVQ9KXKuCVrkPn8MwRdrcIOsef7N.hIVjVHGHgS', NULL, '2024-12-16 07:31:39', '2024-12-16 07:31:39', 0, 'user'),
(4, 'Hernan', 'hernan@gmail.com', NULL, '$2y$12$p4zDGg34JD7zb5YHrdVg5.oQ/TOfy2tEqylzkMJP2b.0hyz.Q1GnC', NULL, '2024-12-16 07:44:32', '2024-12-16 07:44:32', 0, 'user'),
(5, 'andres', 'andres@gmail.com', NULL, '$2y$12$Ui0SL590xSv9zSV1APuYAuby/lspGMZ.TNJsR.jK5T2ZWG3TXtNxK', NULL, '2024-12-16 13:52:21', '2024-12-16 13:52:21', 0, 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carritos_producto_id_foreign` (`producto_id`),
  ADD KEY `carritos_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `carrito_cabeceras`
--
ALTER TABLE `carrito_cabeceras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrito_cabeceras_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `carrito_detalles`
--
ALTER TABLE `carrito_detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrito_detalles_carrito_cabecera_id_foreign` (`carrito_cabecera_id`),
  ADD KEY `carrito_detalles_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorias_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productos_codigo_unique` (`codigo`),
  ADD KEY `productos_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `carrito_cabeceras`
--
ALTER TABLE `carrito_cabeceras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrito_detalles`
--
ALTER TABLE `carrito_detalles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `carritos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carritos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `carrito_cabeceras`
--
ALTER TABLE `carrito_cabeceras`
  ADD CONSTRAINT `carrito_cabeceras_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `carrito_detalles`
--
ALTER TABLE `carrito_detalles`
  ADD CONSTRAINT `carrito_detalles_carrito_cabecera_id_foreign` FOREIGN KEY (`carrito_cabecera_id`) REFERENCES `carrito_cabeceras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrito_detalles_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
