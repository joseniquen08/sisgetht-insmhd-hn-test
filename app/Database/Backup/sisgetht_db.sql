-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sisgetht_db
-- Tiempo de generación: 30-01-2024 a las 16:23:34
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisgetht_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

CREATE TABLE `activities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `process_id` bigint UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `activities`
--

INSERT INTO `activities` (`id`, `name`, `process_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'EESI en ciudades del Perú', 1, NULL, NULL, NULL),
(2, 'EESM en Lima 2024', 1, NULL, NULL, NULL),
(3, 'Elaboración de investigaciones cuantitativas o cualitativas', 1, NULL, NULL, NULL),
(4, 'Publicación física y/o electrónica de investigaciones', 1, NULL, NULL, NULL),
(5, 'Pasantías en investigación', 2, NULL, NULL, NULL),
(6, 'Seminarios u otras actividades educativas', 2, NULL, NULL, NULL),
(7, 'Reuniones administrativas', 3, NULL, NULL, NULL),
(8, 'Fortalecimiento y estímulo a la producción científica', 3, NULL, NULL, NULL),
(9, 'Atención de pacientes', 4, NULL, NULL, NULL),
(10, 'Vacaciones', 5, NULL, NULL, NULL),
(11, 'Permisos s/goce', 5, NULL, NULL, NULL),
(12, 'Licencias por enfermedad', 5, NULL, NULL, NULL),
(13, 'Pago de haberes', 5, NULL, NULL, NULL),
(14, 'Actividad de prueba 1', 6, '2024-01-30 08:07:32', '2024-01-30 08:16:53', NULL),
(15, 'Actividad de prueba 2', 6, '2024-01-30 08:08:31', '2024-01-30 08:08:31', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(1, 1, 'admin', '2024-01-29 22:16:52'),
(2, 2, 'boss', '2024-01-29 22:21:39'),
(3, 3, 'worker', '2024-01-29 23:16:14'),
(4, 4, 'secretary', '2024-01-30 03:51:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_identities`
--

CREATE TABLE `auth_identities` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text,
  `force_reset` tinyint(1) NOT NULL DEFAULT '0',
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'email_password', NULL, 'admin@sisgetht.pe', '$2y$12$edB8XX7h5dJzVdWf/SRAzOdgdq9QeClOSu29fWNvRDIpgP6yQmHQm', NULL, NULL, 0, '2024-01-30 03:48:24', '2024-01-29 22:16:51', '2024-01-30 03:48:24'),
(2, 2, 'email_password', NULL, 'jefeprincipal@sisgetht.pe', '$2y$12$m3v218CLFApx.jyEPFfDb.8UlwJ.CQxj4aeWi5kl7Gv31NrPb1Xr.', NULL, NULL, 0, '2024-01-30 10:35:27', '2024-01-29 22:21:39', '2024-01-30 10:35:27'),
(3, 3, 'email_password', NULL, 'trabajador1@sisgetht.pe', '$2y$12$S4n3RzOJb6LWBsVF7qH4DuBayrbgGPhBOfhq41hnzVcZ4THmiBQfG', NULL, NULL, 0, '2024-01-30 10:20:16', '2024-01-29 23:16:14', '2024-01-30 10:20:16'),
(4, 4, 'email_password', NULL, 'secretaria1@sisgetht.pe', '$2y$12$KXuSfCDK62oKmdEmudPCa.fXC8qYO.sRXEOGRWwU5ZGn/1zDDNala', NULL, NULL, 0, '2024-01-30 10:14:05', '2024-01-30 03:51:14', '2024-01-30 10:14:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `user_agent`, `id_type`, `identifier`, `user_id`, `date`, `success`) VALUES
(1, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'email_password', 'admin@sisgetht.pe', 1, '2024-01-29 22:20:10', 1),
(2, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'email_password', 'admin@sisgetht.pe', 1, '2024-01-29 22:58:01', 1),
(3, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'email_password', 'admin@sisgetht.pe', NULL, '2024-01-29 22:59:03', 0),
(4, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'email_password', 'admin@sisgetht.pe', 1, '2024-01-29 23:00:11', 1),
(5, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'email_password', 'admin@sisgetht.pe', 1, '2024-01-29 23:03:27', 1),
(6, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'email_password', 'trabajador1@sisgetht.pe', 3, '2024-01-29 23:17:18', 1),
(7, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'email_password', 'admin@sisgetht.pe', 1, '2024-01-30 03:48:24', 1),
(8, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'email_password', 'trabajador1@sisgetht.pe', 3, '2024-01-30 03:50:11', 1),
(9, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'email_password', 'secretaria1@sisgetht.pe', 4, '2024-01-30 03:53:10', 1),
(10, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'email_password', 'jefeprincipal@sisgetht.pe', 2, '2024-01-30 08:40:59', 1),
(11, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'email_password', 'secretaria1@sisgetht.pe', 4, '2024-01-30 10:03:53', 1),
(12, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'email_password', 'jefeprincipal@sisgetht.pe', 2, '2024-01-30 10:08:42', 1),
(13, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'email_password', 'secretaria1@sisgetht.pe', 4, '2024-01-30 10:14:05', 1),
(14, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'email_password', 'trabajador1@sisgetht.pe', 3, '2024-01-30 10:20:16', 1),
(15, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'email_password', 'jefeprincipal@sisgetht.pe', 2, '2024-01-30 10:35:27', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_permissions_users`
--

CREATE TABLE `auth_permissions_users` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_remember_tokens`
--

CREATE TABLE `auth_remember_tokens` (
  `id` int UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_token_logins`
--

CREATE TABLE `auth_token_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hours_worked`
--

CREATE TABLE `hours_worked` (
  `id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `hours` int UNSIGNED NOT NULL,
  `minutes` int UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `hours_worked`
--

INSERT INTO `hours_worked` (`id`, `date`, `hours`, `minutes`, `description`, `user_id`, `task_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2024-01-29', 2, 15, 'Prueba', 3, 24, '2024-01-30 01:31:58', '2024-01-30 01:31:58', NULL),
(2, '2024-01-30', 1, 20, 'Prueba 2 con más texto', 3, 33, '2024-01-30 02:27:29', '2024-01-30 02:27:29', NULL),
(3, '2024-01-30', 3, 0, 'wvwevwev', 3, 18, '2024-01-30 03:08:07', '2024-01-30 03:08:07', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'CodeIgniter\\Shield', 1706555728, 1),
(2, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'CodeIgniter\\Settings', 1706555729, 1),
(3, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'default', 'CodeIgniter\\Settings', 1706555729, 1),
(4, '2024-01-28-234405', 'App\\Database\\Migrations\\CreatePeopleTable', 'default', 'App', 1706555729, 1),
(8, '2024-01-30-003804', 'App\\Database\\Migrations\\CreateProcessesTable', 'default', 'App', 1706576451, 2),
(9, '2024-01-30-004126', 'App\\Database\\Migrations\\CreateActivitiesTable', 'default', 'App', 1706576451, 2),
(10, '2024-01-30-004354', 'App\\Database\\Migrations\\CreateTasksTable', 'default', 'App', 1706576451, 2),
(11, '2024-01-30-061341', 'App\\Database\\Migrations\\CreateHoursWorkedTable', 'default', 'App', 1706595536, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `id` bigint UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `processes`
--

CREATE TABLE `processes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `processes`
--

INSERT INTO `processes` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'INVESTIGACIÓN', NULL, NULL, NULL),
(2, 'CAPACITACIÓN Y DOCENCIA 3', NULL, '2024-01-30 07:52:48', NULL),
(3, 'GESTIÓN', NULL, NULL, NULL),
(4, 'ASISTENCIAL', NULL, '2024-01-30 07:28:48', NULL),
(5, 'LABORALES', NULL, NULL, NULL),
(6, 'PRUEBA', '2024-01-30 08:01:10', '2024-01-30 08:01:10', NULL),
(7, 'PRUEBA 2', '2024-01-30 08:21:06', '2024-01-30 08:21:06', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `activity_id` bigint UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `activity_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Análisis estadístico', 1, NULL, NULL, NULL),
(2, 'Transcripción y tabulación de datos', 1, NULL, NULL, NULL),
(3, 'Elaboración y revisión de informe', 1, NULL, NULL, NULL),
(4, 'Elaboración de protocolo', 2, NULL, NULL, NULL),
(5, 'Elaboración de presupuesto', 2, NULL, NULL, NULL),
(6, 'Elaboración y diseño de la muestra', 2, NULL, NULL, NULL),
(7, 'Elaboración de programa para ingreso de datos', 2, NULL, NULL, NULL),
(8, 'Elaboración de artículo', 2, NULL, NULL, NULL),
(9, 'Elaboración de perfil de proyecto', 3, NULL, NULL, NULL),
(10, 'Reuniones de coordinación', 3, NULL, NULL, NULL),
(11, 'Elaboración de protocolos', 3, NULL, NULL, NULL),
(12, 'Elaboración de artículo científico', 3, NULL, NULL, NULL),
(13, 'Transcripción y tabulación de datos', 4, NULL, NULL, NULL),
(14, 'Control de calidad de datos', 4, NULL, NULL, NULL),
(15, 'Elaboración de informe', 4, NULL, NULL, NULL),
(16, 'Publicación (física y/o electrónica)', 4, NULL, NULL, NULL),
(17, 'Tutoría individual', 5, NULL, NULL, NULL),
(18, 'Tutoría individual', 6, NULL, NULL, NULL),
(19, 'Evaluación de residentes', 6, NULL, NULL, NULL),
(20, 'Tutoría colectiva', 6, NULL, NULL, NULL),
(21, 'Planeamiento y preparación de actividades educativas', 6, NULL, NULL, NULL),
(22, 'Otras actividades académicas u educativas', 6, NULL, NULL, NULL),
(23, 'Reuniones ordinarias', 7, NULL, NULL, NULL),
(24, 'Reuniones extraordinarias', 7, NULL, NULL, NULL),
(25, 'Reuniones del CEI', 7, NULL, NULL, NULL),
(26, 'Reuniones de otros Comités', 7, NULL, NULL, NULL),
(27, 'Seguimiento y monitoreo de proyectos de investigación', 8, NULL, NULL, NULL),
(28, 'Asesoría de redacción de documento científico', 8, NULL, NULL, NULL),
(29, 'Guardia diurna', 9, NULL, NULL, NULL),
(30, 'Atención Psiquiátrica', 9, NULL, NULL, NULL),
(31, 'Guardia nocturna', 9, NULL, NULL, NULL),
(32, 'Vacaciones', 10, NULL, NULL, NULL),
(33, 'Permisos s/goce', 11, NULL, NULL, NULL),
(34, 'Licencias por enfermedad', 12, NULL, NULL, NULL),
(35, 'Pago de haberes', 13, NULL, NULL, NULL),
(36, 'Tarea de prueba', 15, '2024-01-30 08:10:48', '2024-01-30 08:10:48', NULL),
(37, 'Tarea de prueba, actividad de prueba 1', 14, '2024-01-30 08:16:12', '2024-01-30 08:16:32', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', NULL, NULL, 1, '2024-01-30 03:48:44', '2024-01-29 22:16:51', '2024-01-29 22:16:52', NULL),
(2, 'jefeprincipal', NULL, NULL, 1, '2024-01-30 11:11:15', '2024-01-29 22:21:39', '2024-01-29 22:21:39', NULL),
(3, 'trabajador1', NULL, NULL, 1, '2024-01-30 10:22:51', '2024-01-29 23:16:13', '2024-01-29 23:16:13', NULL),
(4, 'secretaria1', NULL, NULL, 1, '2024-01-30 10:17:46', '2024-01-30 03:51:14', '2024-01-30 03:51:14', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_process_id_foreign` (`process_id`);

--
-- Indices de la tabla `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_secret` (`type`,`secret`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_permissions_users_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `auth_remember_tokens_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `hours_worked`
--
ALTER TABLE `hours_worked`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hours_worked_user_id_foreign` (`user_id`),
  ADD KEY `hours_worked_task_id_foreign` (`task_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `people_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `processes`
--
ALTER TABLE `processes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_activity_id_foreign` (`activity_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `auth_identities`
--
ALTER TABLE `auth_identities`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hours_worked`
--
ALTER TABLE `hours_worked`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `processes`
--
ALTER TABLE `processes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_process_id_foreign` FOREIGN KEY (`process_id`) REFERENCES `processes` (`id`);

--
-- Filtros para la tabla `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `hours_worked`
--
ALTER TABLE `hours_worked`
  ADD CONSTRAINT `hours_worked_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `hours_worked_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
