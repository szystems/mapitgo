-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2022 a las 00:24:03
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbmapitgo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `idbitacora` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`idbitacora`, `idempresa`, `idusuario`, `fecha`, `tipo`, `descripcion`) VALUES
(1, 2, 2, '2019-12-11 11:48:54', 'Usuario ', 'Se edito un usuario, Nombre: Otto Szarata, Email: ottoszarata@szystems.com, Documento: -, Dirección: , Teléfono: , tipo: Administrador, Banco: , Nombre Cuenta: , Numero Cuenta: '),
(2, 2, 2, '2019-12-11 11:50:01', 'Configuración ', 'Se edito la configuración, Empresa: Szystems, Zona Horaria: America/Guatemala, Moneda: Q.'),
(3, 2, 2, '2021-11-18 18:55:58', 'Security', 'A new user was created, Name: Geronimo, Email: geronimo@gmail.com, Document: Social Security-6545465454-65454, Adress: us address, Phone: 4565454545, Type: ADMIN, Bank: Central Bank, Acount Name: Map It Go, Acount Number: 645-465454-465454'),
(4, 2, 2, '2021-11-18 18:58:11', 'Security ', 'A user was edited, Name: Geronimo, Email: geronimo@gmail.com, Document: Social Security-6545465454-65454, Adress: us address, Phone: 4565454545, Type: ADMIN, Bank: Central Bank, Acount Name: Map It Go, Acount Number: 645-465454-465454'),
(5, 2, 2, '2021-11-18 19:12:07', 'Settings', 'Settings edited, Company: Map It Go!!, Time Zone: America/Los_Angeles, Coin: $.'),
(6, 2, 2, '2021-11-18 17:14:31', 'Settings', 'Settings edited, Company: Map It Go!!, Time Zone: America/Los_Angeles, Coin: $.'),
(7, 2, 2, '2021-12-17 10:28:57', 'Security', 'A new user was created, Name: ofsm, Email: szotto18@hotmail.com, Document: -, Address: diagonal 2 32-22 zona 3, Phone: +50242153288, Type: ADMIN, Driver License Number: 64654654, Expiration day: 2024-08-18, SSN: 456-56-5652'),
(8, 2, 2, '2021-12-17 13:37:27', 'Security ', 'A user was edited, Name: ofsm, Email: szotto18@hotmail.com, Document: -, Address: , Phone: +50242153288, Type: ADMIN, Driver License Number: 64654654, Expiration day: 2024-08-18, SSN: 456-56-5652'),
(9, 2, 2, '2021-12-17 13:41:04', 'Security ', 'A user was edited, Name: ofsm8, Email: szotto18@hotmail.com, Document: -, Address: , Phone: +502421532888, Type: ADMIN, Driver License Number: 64654654, Expiration day: 2024-08-19, SSN: 456-56-56528'),
(10, 2, 2, '2021-12-17 13:42:09', 'Security ', 'A user was edited, Name: Banco Industrial Otto Szarata, Email: szotto18@hotmail.com, Document: -, Address: diagonal 2 32-22 zona 3 JLP, Phone: +50242153288, Type: ADMIN, Driver License Number: 64654654, Expiration day: 2024-08-19, SSN: 456-56-56528'),
(11, 2, 2, '2021-12-17 13:42:34', 'Security', 'A user was deleted, Name: Banco Industrial Otto Szarata'),
(12, 2, 2, '2021-12-17 13:46:51', 'Settings', 'Settings edited, Company: Map It Go!!, Time Zone: America/Los_Angeles, Coin: $.'),
(13, 2, 2, '2021-12-17 13:47:18', 'Settings', 'Settings edited, Company: Map It Go!!, Time Zone: America/Los_Angeles, Coin: $.'),
(14, 2, 2, '2021-12-20 08:57:09', 'Security ', 'A user was edited, Name: Otto Francisco Szarata Maldonado, Email: ottoszarata@szystems.com, Document: -, Address: diagonal 2 32-22 zona 3, Phone: 45153288, Type: ADMIN, Driver License Number: 46546854, Expiration day: 2024-08-18, SSN: 789456123'),
(15, 2, 2, '2021-12-20 09:58:50', 'Security', 'A new user was created, Name: Javier Maldonado, Email: jmaldonado@gmail.comq, Document: -, Address: 4ta calle 0-34 zona 2, Phone: 45885214, Type: DRIVER, Driver License Number: 4568754654, Expiration day: 2004-11-26, SSN: 456-45-7896'),
(16, 2, 2, '2021-12-20 09:59:38', 'Security ', 'A user was edited, Name: Javier Maldonado, Email: jmaldonado@gmail.comq, Document: -, Address: 4ta calle 0-34 zona 2, Phone: 45885214, Type: DRIVER, Driver License Number: 4568754654, Expiration day: 2004-11-26, SSN: 456-45-7896'),
(17, 2, 2, '2021-12-20 10:00:15', 'Security ', 'A user was edited, Name: Javier Maldonado, Email: jmaldonado@gmail.comq, Document: -, Address: 4ta calle 0-34 zona 2, Phone: 45885214, Type: DRIVER, Driver License Number: 4568754654, Expiration day: 2004-11-26, SSN: 456-45-7896'),
(18, 2, 2, '2021-12-20 10:00:59', 'Security ', 'A user was edited, Name: Javier Maldonado, Email: jmaldonado@gmail.comq, Document: -, Address: 4ta calle 0-34 zona 2, Phone: 45885214, Type: DRIVER, Driver License Number: 4568754654, Expiration day: 2004-11-26, SSN: 456-45-7896'),
(19, 2, 2, '2021-12-20 10:01:21', 'Security ', 'A user was edited, Name: Javier Maldonado, Email: jmaldonado@gmail.comq, Document: -, Address: 4ta calle 0-34 zona 8, Phone: 458852148, Type: DRIVER, Driver License Number: 4568754654, Expiration day: 2004-11-26, SSN: 456-45-7896'),
(20, 2, 2, '2021-12-20 14:26:20', 'Security', 'A new user was created, Name: Anibal Juarez, Email: ajuarez@gmail.com, Document: -, Address: Ca 12345 north 13 apartment, Phone: 645468545, Type: DRIVER, Driver License Number: 54654564, Expiration day: 2024-06-20, SSN: 456-87-5456'),
(21, 2, 2, '2021-12-20 14:28:52', 'Security', 'A new user was created, Name: Juan Marroquin, Email: jmarroquin@gmail.com, Document: -, Address: 4th. street 78-34 apt. 4, Phone: 96746545, Type: CLIENT, Driver License Number: 6454654, Expiration day: 2025-11-28, SSN: 456-89-5+654'),
(22, 2, 2, '2021-12-20 14:34:09', 'Security ', 'A user was edited, Name: Juan Marroquin, Email: jmarroquin@gmail.com, Document: -, Address: 4th. street 78-34 apt. 4, Phone: 96746545, Type: CLIENT, Driver License Number: 6454654, Expiration day: 2025-11-28, SSN: 456-89-5+654'),
(23, 2, 2, '2021-12-20 14:46:20', 'Security', 'A new user was created, Name: Arthur Greenwood, Email: green@gmail.com, Document: -, Address: , Phone: 4565456, Type: CLIENT, Driver License Number: , Expiration day: 1970-01-01, SSN: '),
(24, 2, 2, '2021-12-20 14:46:27', 'Security ', 'A user was edited, Name: Arthur Greenwood, Email: green@gmail.com, Document: -, Address: , Phone: 4565456, Type: CLIENT, Driver License Number: , Expiration day: 1970-01-01, SSN: '),
(25, 2, 2, '2022-01-05 23:39:03', 'Works', 'A vehicle was edited, Number Vehicle: 456, Other ID: 6548465, Make: Volvo, Model: Wagen, Year: , Capacity: 45x65, Type: 53’ Dry Van, No. Plate: 6465465, Additional Licencing: , State: Disabled'),
(26, 2, 2, '2022-01-05 23:46:08', 'Works', 'A vehicle was edited, Number Vehicle: 456, Other ID: 6548465, Make: Volvo, Model: Wagen, Year: , Capacity: 45x65, Type: 53’ Dry Van, No. Plate: 6465465, Additional Licencing: , State: Disabled'),
(27, 2, 2, '2022-01-05 23:46:19', 'Works', 'A vehicle was edited, Number Vehicle: 456, Other ID: 6548465, Make: Volvo, Model: Wagen, Year: , Capacity: 45x65, Type: 53’ Dry Van, No. Plate: 6465465, Additional Licencing: , State: Disabled'),
(28, 2, 2, '2022-01-05 23:47:28', 'Works', 'A vehicle was edited, Number Vehicle: 4568, Other ID: 65484658, Make: Volvo8, Model: Wagen8, Year: , Capacity: 45x658, Type: Sleeper Tractor, No. Plate: 64654658, Additional Licencing: 888 org, State: Disabled'),
(29, 2, 2, '2022-01-06 00:06:31', 'Works', 'A vehicle was edited, Number Vehicle: 4568, Other ID: 65484658, Make: Volvo8, Model: Wagen8, Year: , Capacity: 45x658, Type: Sleeper Tractor, No. Plate: 64654658, Additional Licencing: 888 org, State: Disabled'),
(30, 2, 2, '2022-01-06 00:10:24', 'Works', 'A vehicle was edited, Number Vehicle: 4568, Other ID: 65484658, Make: Volvo8, Model: Wagen8, Year: , Capacity: 45x658, Type: Sleeper Tractor, No. Plate: 64654658, Additional Licencing: 888 org, State: Disabled'),
(31, 2, 2, '2022-01-12 22:12:14', 'Works', 'A vehicle was edited, Number Vehicle: 4568, Other ID: 65484658, Make: Volvo8, Model: Wagen8, Year: , Capacity: 45x658, Type: Sleeper Tractor, No. Plate: 64654658, Additional Licencing: 888 org, State: Disabled'),
(32, 2, 2, '2022-01-12 22:13:09', 'Works', 'A vehicle was edited, Number Vehicle: 4568, Other ID: 65484658, Make: Volvo8, Model: Wagen8, Year: , Capacity: 45x658, Type: Sleeper Tractor, No. Plate: 64654658, Additional Licencing: 888 org, State: Disabled'),
(33, 2, 2, '2022-01-12 22:14:01', 'Works', 'A vehicle was edited, Number Vehicle: 4568, Other ID: 65484658, Make: Volvo8, Model: Wagen8, Year: , Capacity: 45x658, Type: Sleeper Tractor, No. Plate: 64654658, Additional Licencing: 888 org, State: Disabled'),
(34, 2, 2, '2022-01-13 23:03:01', 'Works', 'A new work was created, ID Work: HE0K3CP4G5'),
(35, 2, 2, '2022-01-13 23:03:38', 'Works', 'A new work was created, ID Work: AXW10JHETI'),
(36, 2, 2, '2022-01-13 23:13:21', 'Works', 'A new work was created, ID Work: LGEUNI61Q8'),
(37, 2, 2, '2022-01-14 22:16:14', 'Works', 'A new work was edited, ID Work: '),
(38, 2, 2, '2022-01-14 22:20:21', 'Works', 'A new work was created, ID Work: C98HZ743YL'),
(39, 2, 2, '2022-01-14 22:22:01', 'Works', 'A new work was edited, ID Work: C98HZ743YL'),
(40, 2, 2, '2022-01-14 22:25:42', 'Works', 'A new work was edited, ID Work: C98HZ743YL'),
(41, 2, 2, '2022-01-20 17:23:18', 'Settings', 'Settings edited, Company: Map It Go!, Time Zone: America/Los_Angeles, Coin: $.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ottoszarata@szystems.com', '$2y$10$CJb.qRdm0K0YbG0vP6Pue.COaMXl7hgQOeuSoSDUxEhUtGY2UrtHe', '2020-05-13 22:26:57'),
('szotto18@hotmail.com', '$2y$10$skg9ZlRZuHXbBTWTvvlq.emtetj/c59rnfONYaOu/M1JFm.RocjT6', '2021-12-22 17:39:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empresa` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idempresa` int(11) NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `driver_license_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration_day` date DEFAULT NULL,
  `issuing_state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_card_image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssn` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_zone` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coin` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `principal` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `empresa`, `created_at`, `updated_at`, `idempresa`, `phone`, `address`, `birthday`, `driver_license_number`, `expiration_day`, `issuing_state`, `license_image`, `medical_card_image`, `ssn`, `logo`, `user_type`, `time_zone`, `coin`, `principal`, `state`) VALUES
(2, 'Otto Szarata', 'ottoszarata@szystems.com', NULL, '$2y$10$HeSJ7./wqC/Vh/wPWIeIwe3bLRL9JyQtYvAJndNJkvNbL6MhH7otm', NULL, 'Map It Go!', '2019-12-11 23:33:22', '2021-10-20 23:28:39', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1630601297logolargo.png', 'ADMIN', 'America/Los_Angeles', '$.', 'SI', 'Enabled');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicle`
--

CREATE TABLE `vehicle` (
  `idvehicle` int(11) NOT NULL,
  `number_vehicle` int(11) NOT NULL,
  `other_id` varchar(20) DEFAULT NULL,
  `make` varchar(500) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `capacity` varchar(20) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `no_plate` varchar(20) DEFAULT NULL,
  `oregon_weight` varchar(50) DEFAULT NULL,
  `state_vehicle` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehicle`
--

INSERT INTO `vehicle` (`idvehicle`, `number_vehicle`, `other_id`, `make`, `model`, `year`, `capacity`, `type`, `no_plate`, `oregon_weight`, `state_vehicle`, `state`) VALUES
(1, 4568, '65484658', 'Volvo8', 'Wagen8', 20218, '45x658', 'Sleeper Tractor', '64654658', '888 org', 'Disabled', 'Enabled');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `work`
--

CREATE TABLE `work` (
  `idwork` int(11) NOT NULL,
  `idadmin` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `iddriver` int(11) NOT NULL,
  `idvehicle` int(11) NOT NULL,
  `workid` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `days` int(11) NOT NULL,
  `salaryxday` decimal(11,2) DEFAULT NULL,
  `wages` decimal(11,2) DEFAULT NULL,
  `total_liabilities` decimal(11,2) NOT NULL,
  `total_driver` decimal(11,2) NOT NULL,
  `total_after_reduct` decimal(11,2) NOT NULL,
  `assets_gross` decimal(11,2) NOT NULL,
  `pickup_address` varchar(500) DEFAULT NULL,
  `pickup_contact` varchar(200) DEFAULT NULL,
  `pickup_phone` varchar(20) DEFAULT NULL,
  `pickup_datetime` datetime DEFAULT NULL,
  `delivery_address` varchar(500) DEFAULT NULL,
  `delivery_contact` varchar(200) DEFAULT NULL,
  `delivery_phone` varchar(20) DEFAULT NULL,
  `delivery_datetime` datetime DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `state_work` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `work`
--

INSERT INTO `work` (`idwork`, `idadmin`, `idclient`, `iddriver`, `idvehicle`, `workid`, `date`, `days`, `salaryxday`, `wages`, `total_liabilities`, `total_driver`, `total_after_reduct`, `assets_gross`, `pickup_address`, `pickup_contact`, `pickup_phone`, `pickup_datetime`, `delivery_address`, `delivery_contact`, `delivery_phone`, `delivery_datetime`, `description`, `state_work`, `state`) VALUES
(3, 2, 7, 5, 1, 'LGEUNI61Q8', '2022-01-13', 3, '50.00', '150.00', '0.00', '150.00', '250.00', '400.00', 'cerca de la rotonde de burguer king', 'cerca de la rotonde de burguer king', '4544654654', NULL, 'cerca de la rotonda de tecun uman', 'cerca de la rotonda de tecun uman', '65465465', NULL, 'esto es una prueba', 'Active', 'Enabled'),
(5, 2, 7, 5, 1, 'C98HZ743YL', '2022-01-14', 4, '100.00', '400.00', '15.00', '400.00', '585.00', '1000.00', 'Cerca de la rotonda de burguer king8', 'Mau Wolff8', '654654654', NULL, 'Cerca de la rotonda de tecun uman8', 'Sergio Ramos8', '6465465746574', NULL, 'esto es una prueba de trabajo8', 'Active', 'Enabled');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `work_files`
--

CREATE TABLE `work_files` (
  `idfile` int(11) NOT NULL,
  `idwork` int(11) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `work_liabilities`
--

CREATE TABLE `work_liabilities` (
  `idliability` int(11) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `idwork` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `total` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `work_locations`
--

CREATE TABLE `work_locations` (
  `idlocation` int(11) NOT NULL,
  `idwork` int(11) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `longitude` varchar(20) NOT NULL,
  `latitude` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`idbitacora`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`idvehicle`);

--
-- Indices de la tabla `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`idwork`);

--
-- Indices de la tabla `work_files`
--
ALTER TABLE `work_files`
  ADD PRIMARY KEY (`idfile`);

--
-- Indices de la tabla `work_liabilities`
--
ALTER TABLE `work_liabilities`
  ADD PRIMARY KEY (`idliability`);

--
-- Indices de la tabla `work_locations`
--
ALTER TABLE `work_locations`
  ADD PRIMARY KEY (`idlocation`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `idbitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `idvehicle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `work`
--
ALTER TABLE `work`
  MODIFY `idwork` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `work_files`
--
ALTER TABLE `work_files`
  MODIFY `idfile` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `work_liabilities`
--
ALTER TABLE `work_liabilities`
  MODIFY `idliability` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `work_locations`
--
ALTER TABLE `work_locations`
  MODIFY `idlocation` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
