-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-11-2024 a las 20:40:41
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
-- Base de datos: `automax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `fuelType` varchar(10) NOT NULL,
  `mileage` int(11) NOT NULL,
  `power` int(4) NOT NULL,
  `transmission` varchar(10) NOT NULL,
  `nctExpiry` varchar(11) NOT NULL,
  `roadTax` int(4) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `insertionTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cars`
--

INSERT INTO `cars` (`id`, `userId`, `make`, `model`, `year`, `fuelType`, `mileage`, `power`, `transmission`, `nctExpiry`, `roadTax`, `price`, `image`, `views`, `insertionTime`) VALUES
(21, 1, 'Volkswagen', 'Golf', 2022, 'Diesel', 15000, 115, 'Automatic', '2027-12', 180, 23500, 'Volkswagen_Golf_1.jpeg', 0, '2023-12-20 13:33:34'),
(22, 2, 'Toyota', 'Corolla', 2021, 'Petrol', 50000, 110, 'Automatic', '2026-07', 180, 19500, 'Toyota_Corolla_2.jpeg', 0, '2023-12-20 13:34:33'),
(23, 2, 'BMW', '4-Series', 2020, 'Diesel', 50000, 150, 'Automatic', '2027-02', 180, 50000, 'BMW_4-Series_2.jpeg', 0, '2023-12-20 13:34:33'),
(26, 28, 'Volkswagen', 'Passat', 2019, 'Diesel', 46000, 160, 'Automatic', '2026-02', 190, 26500, 'Volkswagen_Passat_28.jpeg', 0, '2023-12-20 13:33:34'),
(31, 28, 'SEAT', 'Ibiza', 2018, 'Diesel', 25000, 95, 'Manual', '2025-10', 180, 12500, 'SEAT_Ibiza_28.jpeg', 0, '2023-12-20 12:36:16'),
(33, 28, 'SEAT', 'Leon', 2023, 'Diesel', 10, 215, 'Automatic', '2030-12', 50, 50000, 'SEAT_Leon_28.jpeg', 0, '2023-12-20 13:24:37'),
(34, 2, 'Toyota', 'C-HR', 2021, 'Diesel', 76500, 115, 'Manual', '2026-05', 190, 19500, 'Toyota_C-HR_2.jpeg', 0, '2023-12-20 14:02:13'),
(35, 1, 'Volkswagen', 'T-Roc', 2022, 'Petrol', 200000, 150, 'Automatic', '2025-07', 250, 15000, 'Volkswagen_T-Roc_1.jpeg', 0, '2023-12-20 18:41:44'),
(36, 28, 'BMW', 'X5', 2023, 'Petrol', 15000, 220, 'Automatic', '2028-08', 120, 49500, 'BMW_X5_28.jpeg', 0, '2023-12-20 14:04:42'),
(40, 1, 'Toyota', 'Corolla', 2020, 'Diesel', 50000, 120, 'Automatic', '2025-08', 190, 20000, 'Toyota_Corolla_1.jpeg', 0, '2023-12-20 18:43:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'julian', '338c23e8eafc19ec9236404deac0bef4'),
(28, 'johnsnel', '6a2dab541fff8a0553af833c4d96fd3a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`userId`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
