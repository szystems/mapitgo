-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2022 a las 18:41:51
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
(41, 2, 2, '2022-01-20 17:23:18', 'Settings', 'Settings edited, Company: Map It Go!, Time Zone: America/Los_Angeles, Coin: $.'),
(42, 2, 2, '2022-01-21 08:29:19', 'Security', 'A new user was created, Name: Otto Szarata Cliente, Email: szotto18@hotmail.com, Document: -, Address: diagonal 2 32-22 zona 3, Phone: +50242153288, Type: CLIENT, Driver License Number: , Expiration day: 1970-01-01, SSN: '),
(43, 2, 2, '2022-01-21 08:30:27', 'Security', 'A new user was created, Name: ofsm, Email: szystems@hotmail.com, Document: -, Address: quetgo cerca de burguer, Phone: 8989898, Type: DRIVER, Driver License Number: , Expiration day: 1970-01-01, SSN: '),
(44, 2, 2, '2022-01-21 14:15:44', 'Works', 'A new work was edited, ID Work: C98HZ743YL'),
(45, 2, 2, '2022-01-21 14:16:26', 'Works', 'A new work was edited, ID Work: C98HZ743YL'),
(46, 2, 2, '2022-01-21 14:17:28', 'Works', 'A new work was edited, ID Work: C98HZ743YL'),
(47, 2, 2, '2022-01-21 14:21:26', 'Works', 'A new work was created, ID Work: JMZNUPTHW9'),
(48, 2, 2, '2022-01-21 14:46:56', 'Works', 'A new work was created, ID Work: BNCLOKIQDW'),
(49, 2, 2, '2022-01-21 14:56:12', 'Works', 'A new work was edited, ID Work: BNCLOKIQDW'),
(50, 2, 2, '2022-01-21 14:57:44', 'Works', 'A new work was edited, ID Work: BNCLOKIQDW'),
(51, 2, 2, '2022-01-21 14:58:50', 'Works', 'A new work was edited, ID Work: BNCLOKIQDW'),
(52, 2, 2, '2022-01-21 15:00:38', 'Works', 'A new work was edited, ID Work: BNCLOKIQDW'),
(53, 2, 2, '2022-01-21 15:03:43', 'Works', 'A new work was edited, ID Work: BNCLOKIQDW'),
(54, 2, 2, '2022-01-21 15:05:56', 'Works', 'A new work was edited, ID Work: BNCLOKIQDW'),
(55, 2, 2, '2022-01-21 15:06:33', 'Works', 'A new work was edited, ID Work: BNCLOKIQDW'),
(56, 2, 2, '2022-01-24 08:41:47', 'Works', 'A new work was edited, ID Work: BNCLOKIQDW'),
(57, 2, 2, '2022-01-24 08:42:55', 'Works', 'A new work was edited, ID Work: BNCLOKIQDW'),
(58, 2, 2, '2022-01-24 08:45:33', 'Works', 'A new work was edited, ID Work: BNCLOKIQDW'),
(59, 2, 2, '2022-01-24 08:45:57', 'Works', 'A new work was edited, ID Work: BNCLOKIQDW'),
(60, 2, 2, '2022-01-24 08:46:10', 'Works', 'A new work was edited, ID Work: BNCLOKIQDW'),
(61, 2, 2, '2022-01-24 08:46:30', 'Works', 'A new work was edited, ID Work: BNCLOKIQDW'),
(62, 2, 2, '2022-01-24 08:46:44', 'Works', 'A new work was edited, ID Work: BNCLOKIQDW'),
(63, 2, 2, '2022-01-24 10:12:01', 'Settings', 'Settings edited, Company: Map It Go!, Time Zone: America/Los_Angeles, Coin: $.'),
(64, 2, 2, '2022-01-25 14:53:34', 'Works', 'A new work was edited, ID Work: HOYN4ESJU1'),
(65, 2, 2, '2022-01-25 14:53:55', 'Works', 'A new work was edited, ID Work: HOYN4ESJU1'),
(66, 2, 2, '2022-01-25 14:54:15', 'Works', 'A new work was edited, ID Work: HOYN4ESJU1'),
(67, 2, 2, '2022-01-25 15:12:04', 'Works', 'A new work was edited, ID Work: HOYN4ESJU1'),
(68, 2, 2, '2022-01-25 15:13:03', 'Works', 'A new work was edited, ID Work: HOYN4ESJU1'),
(69, 2, 2, '2022-01-25 15:18:12', 'Works', 'A new work was edited, ID Work: C98HZ743YL'),
(70, 2, 2, '2022-01-25 15:19:59', 'Works', 'A new work was edited, ID Work: C98HZ743YL'),
(71, 2, 2, '2022-01-25 15:22:58', 'Works', 'A new work was edited, ID Work: C98HZ743YL'),
(72, 2, 2, '2022-01-25 15:23:28', 'Works', 'A new work was edited, ID Work: C98HZ743YL'),
(73, 2, 2, '2022-01-25 15:23:42', 'Works', 'A new work was edited, ID Work: C98HZ743YL'),
(74, 2, 2, '2022-01-25 15:25:08', 'Works', 'A new work was edited, ID Work: HOYN4ESJU1'),
(75, 2, 2, '2022-01-25 15:25:34', 'Works', 'A new work was edited, ID Work: HOYN4ESJU1'),
(76, 2, 2, '2022-01-25 15:28:50', 'Works', 'A new work was edited, ID Work: HOYN4ESJU1'),
(77, 2, 2, '2022-01-25 15:33:41', 'Works', 'A new work was edited, ID Work: HOYN4ESJU1'),
(78, 2, 2, '2022-01-25 15:34:25', 'Works', 'A new work was edited, ID Work: HOYN4ESJU1'),
(79, 2, 2, '2022-01-25 15:34:42', 'Works', 'A new work was edited, ID Work: HOYN4ESJU1'),
(80, 2, 2, '2022-01-25 15:41:40', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(81, 2, 2, '2022-01-25 15:42:25', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(82, 2, 2, '2022-01-25 15:44:47', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(83, 2, 2, '2022-01-25 15:49:54', 'Works', 'A new work was edited, ID Work: 8J6GUFV91B'),
(84, 2, 2, '2022-01-25 15:54:37', 'Works', 'A new work was edited, ID Work: 8J6GUFV91B'),
(85, 2, 2, '2022-01-27 08:22:42', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(86, 2, 2, '2022-01-27 08:23:12', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(87, 2, 2, '2022-01-27 14:07:05', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(88, 2, 2, '2022-01-27 14:07:34', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(89, 2, 2, '2022-01-27 14:07:48', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(90, 2, 2, '2022-01-27 14:08:08', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(91, 2, 2, '2022-01-27 14:08:19', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(92, 2, 2, '2022-01-27 14:08:26', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(93, 2, 2, '2022-01-27 14:08:50', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(94, 2, 2, '2022-01-27 14:09:13', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(95, 2, 2, '2022-01-27 14:09:20', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(96, 2, 2, '2022-01-27 14:38:51', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(97, 2, 2, '2022-01-27 14:45:01', 'Works', 'A new work was edited, ID Work: NQ301PDOVA'),
(98, 2, 2, '2022-02-02 09:29:56', 'Security', 'A new user was created, Name: Otto Szarata prueba correo, Email: szotto18@gmail.com, Document: -, Address: diagonal 2 32-22 zona 3, Phone: 42153288, Type: ADMIN, Driver License Number: , Expiration day: 2023-09-11, SSN: '),
(99, 2, 2, '2022-02-02 09:31:29', 'Security', 'A new user was created, Name: Otto Szarata prueba correo, Email: szotto18@gmail.com, Document: -, Address: diagonal 2 32-22 zona 3, Phone: 42153288, Type: ADMIN, Driver License Number: , Expiration day: 2023-09-11, SSN: '),
(100, 2, 2, '2022-02-02 09:34:14', 'Security', 'A new user was created, Name: Otto Szarata prueba correo, Email: szotto18@gmail.com, Document: -, Address: diagonal 2 32-22 zona 3, Phone: 42153288, Type: ADMIN, Driver License Number: , Expiration day: 2023-09-11, SSN: '),
(101, 2, 2, '2022-02-02 09:39:26', 'Security', 'A new user was created, Name: otto szarata email, Email: szotto18@gmail.com, Document: -, Address: , Phone: , Type: ADMIN, Driver License Number: , Expiration day: 2022-02-02, SSN: '),
(102, 2, 2, '2022-02-02 09:44:09', 'Security', 'A new user was created, Name: otto szarata email, Email: szotto18@gmail.com, Document: -, Address: , Phone: , Type: CLIENT, Driver License Number: , Expiration day: 1970-01-01, SSN: '),
(103, 2, 2, '2022-02-02 10:07:27', 'Works', 'A new work was created, ID Work: PLYKH10RQ3'),
(104, 2, 2, '2022-02-02 10:09:06', 'Works', 'A new work was created, ID Work: 9ZP751JUVG'),
(105, 2, 2, '2022-02-02 10:10:12', 'Works', 'A new work was created, ID Work: 3PI7YOZVU5'),
(106, 2, 2, '2022-02-02 10:12:01', 'Works', 'A new work was created, ID Work: 0SJFORM6IB'),
(107, 2, 2, '2022-02-02 15:15:00', 'Works', 'A new work was created, ID Work: Q18FO4PXL2'),
(108, 2, 2, '2022-02-02 15:15:32', 'Works', 'A new work was edited, ID Work: Q18FO4PXL2'),
(109, 2, 2, '2022-02-03 08:53:04', 'Works', 'A new work was edited, ID Work: Q18FO4PXL2'),
(110, 2, 2, '2022-02-03 09:50:29', 'Works', 'A new work was edited, ID Work: Q18FO4PXL2'),
(111, 2, 2, '2022-02-03 09:51:02', 'Works', 'A new work was edited, ID Work: Q18FO4PXL2'),
(112, 2, 2, '2022-02-03 14:59:31', 'Settings', 'Settings edited, Company: Map It Go!, Time Zone: America/Los_Angeles, Coin: $.'),
(113, 2, 2, '2022-02-03 15:09:33', 'Settings', 'Settings edited, Company: Map It Go!, Time Zone: America/Los_Angeles, Coin: $.'),
(114, 2, 2, '2022-02-07 09:37:51', 'Works', 'A work was canceled, ID Work: HOYN4ESJU1'),
(115, 2, 2, '2022-02-08 17:18:38', 'Works', 'A new vehicle was created, Number Vehicle: 7, Other ID: 4555456, Make: toyota, Model: tundra, Year: , Capacity: 50, Type: Trailer, Trailer or Unit Type: 53’ Reefer, Reefer Unit Number: 54654654, No. Plate: 65461654, Additional Licencing: wa, State: Enabled'),
(116, 2, 2, '2022-02-08 17:57:21', 'Works', 'A vehicle was edited, Number Vehicle: 4568, Other ID: 65484658, Make: Volvo8, Model: Wagen8, Year: , Capacity: 45x658, Type: Power Unit, Trailer or Unit Type: Daycab Tractor, No. Plate: 64654658, Additional Licencing: 888 org, State: Disabled'),
(117, 2, 2, '2022-02-08 14:25:06', 'Works', 'A new work was created, ID Work: IOCFQUXTRB'),
(118, 2, 2, '2022-02-08 14:45:59', 'Works', 'A new work was edited, ID Work: IOCFQUXTRB'),
(119, 2, 2, '2022-02-08 14:46:28', 'Works', 'A new work was edited, ID Work: IOCFQUXTRB'),
(120, 2, 2, '2022-02-08 14:46:43', 'Works', 'A new work was edited, ID Work: IOCFQUXTRB'),
(121, 2, 2, '2022-02-08 14:48:06', 'Works', 'A new work was edited, ID Work: IOCFQUXTRB'),
(122, 2, 2, '2022-02-08 14:48:21', 'Works', 'A new work was edited, ID Work: IOCFQUXTRB'),
(123, 2, 2, '2022-02-08 14:48:36', 'Works', 'A new work was edited, ID Work: IOCFQUXTRB'),
(124, 2, 2, '2022-02-09 07:52:21', 'Works', 'A new work was created, ID Work: 28J3W05TPR'),
(125, 2, 2, '2022-02-09 07:59:43', 'Works', 'A new work was edited, ID Work: 28J3W05TPR'),
(126, 2, 2, '2022-02-09 07:59:57', 'Works', 'A new work was edited, ID Work: 28J3W05TPR'),
(127, 2, 2, '2022-02-09 08:00:18', 'Works', 'A new work was edited, ID Work: 28J3W05TPR'),
(128, 2, 2, '2022-02-09 14:00:25', 'Security ', 'A user was edited, Name: ofsm, Email: szystems@hotmail.com, Document: -, Address: quetgo cerca de burguer, Phone: 8989898, Type: DRIVER, Driver License Number: , Expiration day: 1970-01-01, SSN: 444-55-6666'),
(129, 2, 2, '2022-02-09 14:03:07', 'Security ', 'A user was edited, Name: Otto Szarata, Email: ottoszarata@szystems.com, Document: -, Address: , Phone: , Type: ADMIN, Driver License Number: , Expiration day: 1970-01-01, SSN: 555-88-9658'),
(130, 2, 2, '2022-02-09 14:04:22', 'Security ', 'A user was edited, Name: Otto Szarata, Email: ottoszarata@szystems.com, Document: -, Address: , Phone: , Type: ADMIN, Driver License Number: , Expiration day: 1970-01-01, SSN: '),
(131, 2, 2, '2022-02-09 14:05:39', 'Security ', 'A user was edited, Name: Otto Szarata, Email: ottoszarata@szystems.com, Document: -, Address: , Phone: , Type: ADMIN, Driver License Number: , Expiration day: 1970-01-01, SSN: 456-88-4598'),
(132, 2, 2, '2022-02-10 09:57:27', 'Works', 'A new work was edited, ID Work: IOCFQUXTRB'),
(133, 2, 2, '2022-02-10 10:40:22', 'Works', 'A new work was created, ID Work: CL26PERF04'),
(134, 2, 2, '2022-02-10 10:52:51', 'Works', 'A new work was edited, ID Work: IOCFQUXTRB'),
(135, 2, 2, '2022-02-10 10:53:08', 'Works', 'A new work was edited, ID Work: IOCFQUXTRB'),
(136, 2, 2, '2022-02-10 10:58:54', 'Works', 'A new work was edited, ID Work: IOCFQUXTRB'),
(137, 2, 2, '2022-02-10 11:02:41', 'Works', 'A new work was edited, ID Work: IOCFQUXTRB'),
(138, 2, 2, '2022-02-10 14:48:30', 'Works', 'A new work was edited, ID Work: IOCFQUXTRB'),
(139, 2, 2, '2022-02-10 14:50:24', 'Works', 'A new work was edited, ID Work: IOCFQUXTRB');

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
('szystems@hotmail.com', '$2y$10$Aho/Sf0sw96h/1df61uDc.CqWT2iqA4ITkaSb47vIbabCPApiBXxu', '2022-02-11 05:07:37');

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
(2, 'Otto Szarata', 'ottoszarata@szystems.com', NULL, '$2y$10$HeSJ7./wqC/Vh/wPWIeIwe3bLRL9JyQtYvAJndNJkvNbL6MhH7otm', 'ZkTZtGES71Ssfphb8N5kXgVIli3mQsuHWG0NF285UT97BVZJORM1QJvZWEj7', 'Map It Go!', '2019-12-11 23:33:22', '2022-02-10 04:05:39', 2, NULL, NULL, '1970-01-01', NULL, '1970-01-01', NULL, NULL, NULL, '456-88-4598', '1643929773cabecera.png', 'ADMIN', 'America/Los_Angeles', '$.', 'YES', 'Enabled'),
(5, 'ofsm', 'szystems@hotmail.com', NULL, '$2y$10$awVlFezh2DkhkyALFa2DD.nrcGX42uf7UGsrbvltjVBakKSY3dKHm', 'KZDe5XZKmU6RlyIdZ9GsjPHHcbvMXhamcSWkWwwIJXIEQlWugPIfteD224NQ', 'Map It Go!', '2022-01-21 22:30:27', '2022-02-10 04:54:51', 2, '8989898', 'quetgo cerca de burguer', '1970-01-01', NULL, '1970-01-01', 'CA', 'FXELP3APD6cemaco 001.jpg', 'ALON22GSTEcemaco 002.png', '444-55-6666', '1643929773cabecera.png', 'DRIVER', 'America/Los_Angeles', '$.', 'NO', 'Enabled'),
(7, 'Otto Szarata Cliente', 'szotto18@hotmail.com', NULL, '$2y$10$WkI1zXAgXMNoJWshPHM/x.yQ2hXB2rUs/zQyJsGDjVvz6ZI9FIYda', '1nq29T52DMQ4BNwJBU5etMv9c4xhphREA7IBlj6gxcwM7ekqD4IgqYJvAsAw', 'Map It Go!', '2022-01-21 22:29:19', '2022-01-25 22:43:04', 2, '+50242153288', 'diagonal 2 32-22 zona 3', '1970-01-31', NULL, '1970-01-01', NULL, NULL, NULL, NULL, '1643929773cabecera.png', 'CLIENT', 'America/Los_Angeles', '$.', 'NO', 'Enabled'),
(14, 'otto szarata email', 'szotto18@gmail.com', NULL, '$2y$10$KybcS2geIza9MIaw43fP1eoYGr5FJEPnGsIrWX1tBxhvBfem8Gvw.', 'SdmmTJJEOcLGa9VICQlEGKBjX5LxsaBLDn3d9HU5qDCbzVNR5lReJIsuTU1l', 'Map It Go!', '2022-02-02 23:44:09', '2022-02-10 04:16:16', 2, NULL, NULL, '2022-02-02', NULL, '1970-01-01', NULL, NULL, NULL, NULL, '1643929773cabecera.png', 'CLIENT', 'America/Los_Angeles', '$.', 'NO', 'Enabled'),
(15, 'asdf', 'asdf@gmail.com', NULL, '$2y$10$EG.XMg8BtmdX5OXIUU7UgeN5Ka6qZ5PdAJxBH74gbaBlxUiSOOMO2', 'BJh0rAqbTOOiib1wTsHFZqWwNQD4Vkv30tbkg60nHH2GcIkYsSySCYOYJYgC', 'Map It Go!', '2022-02-10 04:37:53', '2022-02-10 04:37:53', 2, '64654', 'adsf asdf asdf adsf', '2022-02-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CLIENT', 'America/Los_Angeles', '$.', 'NO', NULL),
(16, 'cliente', 'cliente@hotmail.com', NULL, '$2y$10$QNof2tYScqDhF9O2ZewOwu.DBNhbYckrtI8oYvfLywPURgiv0I.VS', 'QtwPDAgOX1RsAq1AZsimRCklVJx50ZjhjLCYqjxlleZ8zwZh8JO11xo4fzRX', 'Map It Go!', '2022-02-11 05:19:06', '2022-02-11 05:19:06', 2, '45687454', NULL, '2022-02-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CLIENT', 'America/Los_Angeles', '$.', 'NO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicle`
--

CREATE TABLE `vehicle` (
  `idvehicle` int(11) NOT NULL,
  `number_vehicle` varchar(20) NOT NULL,
  `other_id` varchar(20) DEFAULT NULL,
  `make` varchar(500) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `capacity` varchar(20) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `trailer_or_unit_type` varchar(50) NOT NULL,
  `no_plate` varchar(20) DEFAULT NULL,
  `oregon_weight` varchar(50) DEFAULT NULL,
  `state_vehicle` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehicle`
--

INSERT INTO `vehicle` (`idvehicle`, `number_vehicle`, `other_id`, `make`, `model`, `year`, `capacity`, `type`, `trailer_or_unit_type`, `no_plate`, `oregon_weight`, `state_vehicle`, `state`) VALUES
(1, '4568', '65484658', 'Volvo8', 'Wagen8', 20218, '45x658', 'Power Unit', 'Daycab Tractor', '64654658', '888 org', 'Disabled', 'Enabled'),
(2, '7', '4555456', 'toyota', 'tundra', 2005, '50', 'Trailer', '53’ Reefer', '65461654', 'wa', 'Enabled', 'Enabled');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `work`
--

CREATE TABLE `work` (
  `idwork` int(11) NOT NULL,
  `idadmin` int(11) DEFAULT NULL,
  `idclient` int(11) NOT NULL,
  `iddriver` int(11) DEFAULT NULL,
  `idvehicle_power_unit` int(11) DEFAULT NULL,
  `idvehicle_trailer` int(11) DEFAULT NULL,
  `reefer_unit_number` varchar(50) DEFAULT NULL,
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
  `pickup_location_latitude` varchar(20) DEFAULT NULL,
  `pickup_location_longitude` varchar(20) DEFAULT NULL,
  `delivery_address` varchar(500) DEFAULT NULL,
  `delivery_contact` varchar(200) DEFAULT NULL,
  `delivery_phone` varchar(20) DEFAULT NULL,
  `delivery_datetime` datetime DEFAULT NULL,
  `delivery_location_latitude` varchar(20) DEFAULT NULL,
  `delivery_location_longitude` varchar(20) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `state_work` varchar(20) DEFAULT NULL,
  `accept_quote` varchar(10) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `work`
--

INSERT INTO `work` (`idwork`, `idadmin`, `idclient`, `iddriver`, `idvehicle_power_unit`, `idvehicle_trailer`, `reefer_unit_number`, `workid`, `date`, `days`, `salaryxday`, `wages`, `total_liabilities`, `total_driver`, `total_after_reduct`, `assets_gross`, `pickup_address`, `pickup_contact`, `pickup_phone`, `pickup_datetime`, `pickup_location_latitude`, `pickup_location_longitude`, `delivery_address`, `delivery_contact`, `delivery_phone`, `delivery_datetime`, `delivery_location_latitude`, `delivery_location_longitude`, `description`, `state_work`, `accept_quote`, `state`) VALUES
(3, 2, 7, 5, 1, NULL, NULL, 'LGEUNI61Q8', '2022-01-13', 3, '50.00', '150.00', '45.00', '150.00', '205.00', '400.00', 'cerca de la rotonde de burguer king', 'cerca de la rotonde de burguer king', '4544654654', NULL, NULL, NULL, 'cerca de la rotonda de tecun uman', 'cerca de la rotonda de tecun uman', '65465465', NULL, NULL, NULL, 'esto es una prueba', 'Active', NULL, 'Enabled'),
(5, 2, 7, 5, 1, NULL, NULL, 'C98HZ743YL', '2022-01-14', 4, '100.00', '400.00', '0.00', '400.00', '600.00', '1000.00', 'Cerca de la rotonda de burguer king8', 'Mau Wolff8', '65465465488', NULL, NULL, NULL, 'Cerca de la rotonda de tecun uman8', 'Sergio Ramos8', '646546574657488', NULL, '33.80232985639489', '-118.18229050659343', 'esto es una prueba de trabajo8', 'Active', NULL, 'Enabled'),
(6, 2, 7, 5, 1, NULL, NULL, 'JMZNUPTHW9', '2022-01-21', 4, '50.00', '200.00', '0.00', '200.00', '300.00', '500.00', 'cerca del parque central', 'Arturo abidal', '54654654', NULL, NULL, NULL, 'cerca del templo minerva', 'Arturo abidal hijo', '654654545', NULL, NULL, NULL, 'adf asdfadf adf asdf adfadf ad fadf adf adf', 'Active', NULL, 'Enabled'),
(7, 2, 7, 5, 1, NULL, NULL, 'BNCLOKIQDW', '2022-01-21', 5, '50.00', '250.00', '65.00', '250.00', '1185.00', '1500.00', 'adress pick', 'pick contact', '6546544', NULL, '14.854613203037262', '-91.53472444196734', 'address deli', 'deli contact', '65465454', NULL, '14.551476820807165', '-90.45514152841554', 'fgyf gh dfgh dgh dfgh dgh dgfh dfgh dgfh', 'Active', NULL, 'Enabled'),
(8, 2, 7, 5, 1, NULL, NULL, 'HOYN4ESJU1', '2022-01-25', 4, '50.00', '200.00', '50.00', '200.00', '750.00', '1000.00', '62M4+MM North Rim, Arizona, EE. UU., Arizona, North Rim', 'cerca de la rotonda de la marimba', '4658454', NULL, '36.234186981003894', '-111.99328362354017', '4H8M+X5 Florala, Alabama, EE. UU., Alabama, Florala', 'Cerca de burguer king las americas', '69746548', NULL, '31.117494017494085', '-86.41711174854017', 'este es un trabajo de prueba', 'Canceled', NULL, 'Deleted'),
(9, 2, 7, 5, 1, NULL, NULL, 'NQ301PDOVA', '2022-01-25', 4, '50.00', '200.00', '65.00', '200.00', '535.00', '800.00', '124 E Water St, Dover, DE 19903, EE. UU., Delaware, Dover', 'Ofsm8', '421532888', NULL, '39.15444453829643', '-75.51867424854017', 'J563+47 Rocky Ford, Georgia, EE. UU., Georgia, Rocky Ford', 'ofsm28', '4215328888', NULL, '32.61033691677623', '-81.84679924854017', 'fdg fdghfdg dfg fdg df gfdg d8', 'Active', NULL, 'Enabled'),
(10, 2, 7, NULL, NULL, NULL, NULL, '8J6GUFV91B', '2022-01-25', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Civic Center Park Newark 37.536491994709394, -122.03158996062588', 'ofsm1', '654654', NULL, '37.54969174757943', '-122.05029743308788', 'San jose 37.33276936634932, -121.88990004214443', 'ofsm2', '24541', NULL, NULL, NULL, 'vbgxcf xcf xzfxdf xcvxcv', 'Active', NULL, 'Enabled'),
(13, 2, 7, 5, 1, NULL, NULL, '3PI7YOZVU5', '2022-02-02', 3, '50.00', '150.00', '0.00', '150.00', '150.00', '300.00', '7CR8+59 Climax, OR, EE. UU., Oregon, Climax', NULL, NULL, NULL, '42.29040887045215', '-122.58410393604017', '59VR+J6 Johnstown, Wyoming, EE. UU., Wyoming, Johnstown', NULL, NULL, NULL, '43.194057619766085', '-108.60949456104017', 'example of create work', 'Active', NULL, 'Enabled'),
(14, 2, 14, 5, 1, NULL, NULL, '0SJFORM6IB', '2022-02-02', 3, '50.00', '150.00', '0.00', '150.00', '200.00', '350.00', 'HHG5+W9 Ravine, Pensilvania, EE. UU., Pensilvania, Ravine', NULL, NULL, NULL, '40.57734494902228', '-76.44152581104017', '14649 Belview Dr, Duncanville, AL 35456, EE. UU., Alabama, Duncanville', NULL, NULL, NULL, '33.06034934338676', '-87.33996331104017', 'exhgfh ukhg big  khjg', 'Active', NULL, 'Enabled'),
(15, 2, 14, 5, 1, NULL, NULL, 'Q18FO4PXL2', '2022-02-02', 4, '50.00', '200.00', '0.00', '200.00', '400.00', '600.00', 'GPXM+XP Cortland West, Nueva York, EE. UU., Nueva York, Cortland West', NULL, NULL, NULL, '42.5499380007237', '-76.26574456104017', 'CJJ4+RW Cottonwood, Texas, EE. UU., Texas, Cottonwood', NULL, NULL, NULL, '32.43201288268187', '-96.39269768604017', NULL, 'Finalized', NULL, 'Enabled'),
(16, 2, 7, NULL, NULL, NULL, NULL, 'K9V41XTSPH', '2022-02-03', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'CGW7+XR Geneva, OR, EE. UU., Oregon, Geneva', 'Contact 1', '797545', NULL, '44.447402820098766', '-121.48547112354017', '1504 County Rd 1590, Rush Springs, OK 73082, EE. UU., Oklahoma, Rush Springs', 'contact 2', '65465454', NULL, '34.71101832119789', '-97.84289299854017', 'example', 'Pending', NULL, 'Enabled'),
(17, 2, 7, 5, 1, 2, '6545454', 'IOCFQUXTRB', '2022-02-08', 4, '50.00', '200.00', '0.00', '200.00', '400.00', '600.00', '85M3578M+R6, undefined, undefined', NULL, NULL, NULL, '43.16701967677227', '-118.71691643604017', 'Q278+6X Willow, AZ, EE. UU., Arizona, Willow', NULL, NULL, NULL, '33.7630442874605', '-110.98254143604017', 'prueba', 'Active', 'Approved', 'Enabled'),
(18, 2, 7, 5, 1, 2, '2342234', '28J3W05TPR', '2022-02-09', 3, '100.00', '300.00', '0.00', '300.00', '200.00', '500.00', 'M6M4+PQ Kirk, OR, EE. UU., Oregon, Kirk', NULL, NULL, NULL, '42.68434736579311', '-121.79308831104017', '856R36RF+FQ, undefined, undefined', NULL, NULL, NULL, '34.09121528787817', '-103.77551018604017', 'ryrty dfghd fgh dfgh dfgh dgf h', 'Finalized', NULL, 'Enabled'),
(19, 2, 7, 5, 1, 2, NULL, 'CL26PERF04', '2022-02-10', 4, '25.00', '100.00', '0.00', '100.00', '300.00', '400.00', 'MG24+R7 Municipio de Rutland, Míchigan, EE. UU., Míchigan, Municipio de Rutland', NULL, NULL, NULL, '42.652034775223484', '-85.49426018604017', '1267 County Rd 1440, Ninnekah, OK 73067, EE. UU., Oklahoma, Ninnekah', NULL, NULL, NULL, '34.924103589446', '-97.88683831104017', NULL, 'Active', NULL, 'Enabled');

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

--
-- Volcado de datos para la tabla `work_files`
--

INSERT INTO `work_files` (`idfile`, `idwork`, `datetime`, `name`, `description`, `file`) VALUES
(15, 3, '2022-01-21 09:22:47', 'doc', 'lasjdflksdajfasd', 'LW7YUSYXF8cemaco 002.png'),
(18, 7, '2022-01-24 09:12:45', 'archivo 1', 'archivo de ejemplo', '3NFBKKEPANradiocuchitril.jpg'),
(19, 9, '2022-01-27 08:29:17', 'foto', 'foto de prueba', 'JBVGRel pinche gamerAVATAR.jpg');

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

--
-- Volcado de datos para la tabla `work_liabilities`
--

INSERT INTO `work_liabilities` (`idliability`, `datetime`, `idwork`, `type`, `name`, `description`, `total`) VALUES
(1, '2022-01-21 08:32:43', 3, 'Viatico', 'Dinner', 'Restaurant', '45.00'),
(2, '2022-01-24 09:03:09', 7, 'Viatico', 'Lounch', 'Restaurant Taco Bell', '15.00'),
(4, '2022-01-24 09:05:03', 7, 'Tax', 'peaje', 'peaje de xela a reu', '50.00'),
(7, '2022-01-25 14:54:43', 8, 'Viatico', 'peaje', 'reu a san marcos', '50.00'),
(8, '2022-01-27 08:24:50', 9, 'Viatico', 'Lounch', 'Restaurante waffles', '20.00'),
(9, '2022-01-27 08:26:27', 9, 'Tax', 'Peaje', 'Miami a orlando', '45.00');

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
-- Volcado de datos para la tabla `work_locations`
--

INSERT INTO `work_locations` (`idlocation`, `idwork`, `datetime`, `title`, `description`, `longitude`, `latitude`) VALUES
(1, 3, '2022-01-21 09:55:43', 'casa', 'Diagonal 2 32-22 zona 3', '-91.53500623365385', '14.854664207106385'),
(2, 3, '2022-01-21 09:56:23', 'Condado Santa Maria', 'Centro comercial ofibodegas', '-91.53518830803087', '14.85384292206605'),
(3, 3, '2022-01-21 10:44:37', 'Salcaja', 'Rotonda homenaje al migrante', '-91.45506240202504', '14.893747382804305'),
(4, 7, '2022-01-21 15:08:52', 'Mazatenango', 'dia 1', '-91.46579821737254', '14.568465044046938'),
(5, 7, '2022-01-21 15:09:45', 'Escuintla', 'dia 2', '-90.83133778064796', '14.273200471413809'),
(8, 5, '2022-01-25 15:15:28', 'Long beach', 'asdf asdf adsf adsf adsf', '-118.2583336941102', '33.89751057672141'),
(9, 8, '2022-01-25 15:30:12', 'Pickup Order', 'Cow Hollow\r\nSan Francisco, California 94123', '-122.43266796060838', '37.79672157496648'),
(15, 9, '2022-01-27 14:47:45', 'Pickup order', '46QH+R4 San José, California, EE. UU., California, San José', '-121.77216361309186', '37.13955570215851'),
(16, 9, '2022-02-02 16:18:04', 'posicion 1', '3108 Chestnut Ridge Rd, Blairsville, PA 15717, EE. UU., Pennsylvania, Blairsville', '-79.16613518604017', '40.430112759216534');

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
  MODIFY `idbitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `idvehicle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `work`
--
ALTER TABLE `work`
  MODIFY `idwork` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `work_files`
--
ALTER TABLE `work_files`
  MODIFY `idfile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `work_liabilities`
--
ALTER TABLE `work_liabilities`
  MODIFY `idliability` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `work_locations`
--
ALTER TABLE `work_locations`
  MODIFY `idlocation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
