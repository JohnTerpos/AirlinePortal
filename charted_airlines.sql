-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 13 Ιαν 2021 στις 15:18:45
-- Έκδοση διακομιστή: 10.4.14-MariaDB
-- Έκδοση PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `charted_airlines`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `customers`
--

CREATE TABLE `customers` (
  `CUSTOM_NO` int(4) NOT NULL,
  `SURNAME` varchar(30) NOT NULL,
  `NAME` varchar(25) NOT NULL,
  `CITIZENSHIP` varchar(15) NOT NULL,
  `BIRTHDATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `customers`
--

INSERT INTO `customers` (`CUSTOM_NO`, `SURNAME`, `NAME`, `CITIZENSHIP`, `BIRTHDATE`) VALUES
(10, 'CHRISTOY', 'CHRISTOS', 'GREEK', '2002-10-21'),
(20, 'GEORGIOY', 'GEORGE', 'ENGLISH', '1998-12-31'),
(30, 'GATES', 'BILL', 'AMERICAN', '1995-03-14'),
(40, 'TZORTZOGLOY', 'STRATOS', 'GREEK', '1991-08-02');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `flights`
--

CREATE TABLE `flights` (
  `FLIGHT_NO` int(11) NOT NULL,
  `DEPARTURE` varchar(20) NOT NULL,
  `ARRIVAL` varchar(20) NOT NULL,
  `TYPE` varchar(15) NOT NULL,
  `TOTAL_SEATS` int(11) NOT NULL,
  `AVAILABLE_SEATS` int(11) NOT NULL,
  `FLIGHTDATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `flights`
--

INSERT INTO `flights` (`FLIGHT_NO`, `DEPARTURE`, `ARRIVAL`, `TYPE`, `TOTAL_SEATS`, `AVAILABLE_SEATS`, `FLIGHTDATE`) VALUES
(1, 'ATHENS', 'LONDON', 'INTERNATIONAL', 70, 45, '2004-01-23'),
(2, 'LARISA', 'CANADA', 'INTERNATIONAL', 80, 30, '2004-01-06'),
(3, 'THESSALONIKI', 'ATHENS', 'DOMESTIC', 60, 20, '2004-11-15'),
(4, 'PAKISTAN', 'GERMANY', 'INTERNATIONAL', 50, 14, '2004-12-28');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `reservations`
--

CREATE TABLE `reservations` (
  `RESERVATION_NO` int(11) NOT NULL,
  `CUSTOM_NO` int(11) NOT NULL,
  `FLIGHT_NO` int(11) NOT NULL,
  `PRICE` float NOT NULL,
  `RESERVATIONS_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `reservations`
--

INSERT INTO `reservations` (`RESERVATION_NO`, `CUSTOM_NO`, `FLIGHT_NO`, `PRICE`, `RESERVATIONS_DATE`) VALUES
(1, 20, 4, 70, '2004-10-02'),
(2, 10, 4, 65, '2003-12-06'),
(3, 10, 1, 100, '2003-12-10'),
(4, 30, 2, 96.5, '2003-03-15'),
(5, 30, 3, 50, '2002-01-15'),
(6, 40, 3, 55.5, '2002-01-09'),
(7, 40, 1, 78.9, '2002-09-11'),
(8, 20, 2, 87.75, '2004-11-11'),
(9, 10, 3, 60, '2004-10-11'),
(10, 30, 4, 85, '2004-11-01');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CUSTOM_NO`);

--
-- Ευρετήρια για πίνακα `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`FLIGHT_NO`);

--
-- Ευρετήρια για πίνακα `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`RESERVATION_NO`,`CUSTOM_NO`,`FLIGHT_NO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
