-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 03:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasiabsensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_tanggal_terpisah`
--

CREATE TABLE `absensi_tanggal_terpisah` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` varchar(128) NOT NULL,
  `tahun` int(11) NOT NULL,
  `keterangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi_tanggal_terpisah`
--

INSERT INTO `absensi_tanggal_terpisah` (`id`, `id_pegawai`, `tanggal`, `bulan`, `tahun`, `keterangan`) VALUES
(63, 16, 1, 'April', 2022, 5),
(64, 16, 2, 'April', 2022, 5),
(65, 16, 3, 'April', 2022, 5),
(66, 16, 4, 'April', 2022, 5),
(67, 16, 5, 'April', 2022, 5),
(68, 16, 6, 'April', 2022, 5),
(69, 16, 7, 'April', 2022, 5),
(70, 16, 8, 'April', 2022, 5),
(71, 16, 9, 'April', 2022, 5),
(72, 16, 10, 'April', 2022, 5),
(73, 16, 11, 'April', 2022, 5),
(74, 16, 12, 'April', 2022, 5),
(75, 16, 13, 'April', 2022, 5),
(76, 17, 1, 'April', 2022, 5),
(77, 17, 2, 'April', 2022, 5),
(78, 17, 3, 'April', 2022, 5),
(79, 17, 4, 'April', 2022, 5),
(80, 17, 5, 'April', 2022, 5),
(81, 17, 6, 'April', 2022, 5),
(82, 17, 7, 'April', 2022, 5),
(83, 17, 8, 'April', 2022, 5),
(84, 17, 9, 'April', 2022, 5),
(85, 17, 10, 'April', 2022, 5),
(86, 17, 11, 'April', 2022, 5),
(87, 17, 12, 'April', 2022, 5),
(88, 17, 13, 'April', 2022, 5),
(89, 18, 1, 'April', 2022, 5),
(90, 18, 2, 'April', 2022, 5),
(91, 18, 3, 'April', 2022, 5),
(92, 18, 4, 'April', 2022, 5),
(93, 18, 5, 'April', 2022, 5),
(94, 18, 6, 'April', 2022, 5),
(95, 18, 7, 'April', 2022, 5),
(96, 18, 8, 'April', 2022, 5),
(97, 18, 9, 'April', 2022, 5),
(98, 18, 10, 'April', 2022, 5),
(99, 18, 11, 'April', 2022, 5),
(100, 18, 12, 'April', 2022, 5),
(101, 18, 13, 'April', 2022, 5),
(102, 16, 14, 'April', 2022, 1),
(103, 17, 14, 'April', 2022, 1),
(104, 18, 14, 'April', 2022, 1),
(105, 16, 16, 'April', 2022, 1),
(106, 17, 16, 'April', 2022, 1),
(107, 18, 16, 'April', 2022, 1),
(110, 16, 17, 'April', 2022, 2),
(111, 17, 17, 'April', 2022, 1),
(112, 18, 17, 'April', 2022, 1),
(113, 16, 15, 'April', 2022, 1),
(114, 17, 15, 'April', 2022, 1),
(115, 18, 15, 'April', 2022, 1),
(116, 19, 1, 'April', 2022, 5),
(117, 19, 2, 'April', 2022, 5),
(118, 19, 3, 'April', 2022, 5),
(119, 19, 4, 'April', 2022, 5),
(120, 19, 5, 'April', 2022, 5),
(121, 19, 6, 'April', 2022, 5),
(122, 19, 7, 'April', 2022, 5),
(123, 19, 8, 'April', 2022, 5),
(124, 19, 9, 'April', 2022, 5),
(125, 19, 10, 'April', 2022, 5),
(126, 19, 11, 'April', 2022, 5),
(127, 19, 12, 'April', 2022, 5),
(128, 19, 13, 'April', 2022, 5),
(129, 19, 14, 'April', 2022, 5),
(130, 19, 15, 'April', 2022, 5),
(131, 19, 16, 'April', 2022, 5),
(132, 19, 17, 'April', 2022, 5),
(133, 16, 18, 'April', 2022, 1),
(134, 17, 18, 'April', 2022, 2),
(135, 18, 18, 'April', 2022, 2),
(136, 19, 18, 'April', 2022, 1),
(137, 16, 18, 'April', 2022, 0),
(138, 17, 18, 'April', 2022, 0),
(139, 18, 18, 'April', 2022, 0),
(140, 19, 18, 'April', 2022, 0),
(141, 16, 18, 'April', 2022, 0),
(142, 17, 18, 'April', 2022, 0),
(143, 18, 18, 'April', 2022, 0),
(144, 19, 18, 'April', 2022, 0),
(145, 16, 18, 'April', 2022, 0),
(146, 17, 18, 'April', 2022, 0),
(147, 18, 18, 'April', 2022, 0),
(148, 19, 18, 'April', 2022, 0),
(149, 16, 18, 'April', 2022, 0),
(150, 17, 18, 'April', 2022, 0),
(151, 18, 18, 'April', 2022, 0),
(152, 19, 18, 'April', 2022, 0),
(153, 16, 19, 'April', 2022, 3),
(154, 17, 19, 'April', 2022, 1),
(155, 18, 19, 'April', 2022, 1),
(156, 19, 19, 'April', 2022, 1),
(157, 20, 1, 'April', 2022, 5),
(158, 20, 2, 'April', 2022, 5),
(159, 20, 3, 'April', 2022, 5),
(160, 20, 4, 'April', 2022, 5),
(161, 20, 5, 'April', 2022, 5),
(162, 20, 6, 'April', 2022, 5),
(163, 20, 7, 'April', 2022, 5),
(164, 20, 8, 'April', 2022, 5),
(165, 20, 9, 'April', 2022, 5),
(166, 20, 10, 'April', 2022, 5),
(167, 20, 11, 'April', 2022, 5),
(168, 20, 12, 'April', 2022, 5),
(169, 20, 13, 'April', 2022, 5),
(170, 20, 14, 'April', 2022, 5),
(171, 20, 15, 'April', 2022, 5),
(172, 20, 16, 'April', 2022, 5),
(173, 20, 17, 'April', 2022, 5),
(174, 20, 18, 'April', 2022, 5),
(175, 20, 19, 'April', 2022, 5),
(176, 16, 20, 'April', 2022, 1),
(177, 17, 20, 'April', 2022, 2),
(178, 18, 20, 'April', 2022, 1),
(179, 19, 20, 'April', 2022, 3),
(180, 16, 21, 'April', 2022, 1),
(181, 17, 21, 'April', 2022, 1),
(182, 18, 21, 'April', 2022, 1),
(183, 19, 21, 'April', 2022, 1),
(184, 21, 1, 'April', 2022, 5),
(185, 21, 2, 'April', 2022, 5),
(186, 21, 3, 'April', 2022, 5),
(187, 21, 4, 'April', 2022, 5),
(188, 21, 5, 'April', 2022, 5),
(189, 21, 6, 'April', 2022, 5),
(190, 21, 7, 'April', 2022, 5),
(191, 21, 8, 'April', 2022, 5),
(192, 21, 9, 'April', 2022, 5),
(193, 21, 10, 'April', 2022, 5),
(194, 21, 11, 'April', 2022, 5),
(195, 21, 12, 'April', 2022, 5),
(196, 21, 13, 'April', 2022, 5),
(197, 21, 14, 'April', 2022, 5),
(198, 21, 15, 'April', 2022, 5),
(199, 21, 16, 'April', 2022, 5),
(200, 21, 17, 'April', 2022, 5),
(201, 21, 18, 'April', 2022, 5),
(202, 21, 19, 'April', 2022, 5),
(203, 21, 20, 'April', 2022, 5),
(204, 21, 21, 'April', 2022, 5),
(205, 22, 1, 'April', 2022, 5),
(206, 22, 2, 'April', 2022, 5),
(207, 22, 3, 'April', 2022, 5),
(208, 22, 4, 'April', 2022, 5),
(209, 22, 5, 'April', 2022, 5),
(210, 22, 6, 'April', 2022, 5),
(211, 22, 7, 'April', 2022, 5),
(212, 22, 8, 'April', 2022, 5),
(213, 22, 9, 'April', 2022, 5),
(214, 22, 10, 'April', 2022, 5),
(215, 22, 11, 'April', 2022, 5),
(216, 22, 12, 'April', 2022, 5),
(217, 22, 13, 'April', 2022, 5),
(218, 22, 14, 'April', 2022, 5),
(219, 22, 15, 'April', 2022, 5),
(220, 22, 16, 'April', 2022, 5),
(221, 22, 17, 'April', 2022, 5),
(222, 22, 18, 'April', 2022, 5),
(223, 22, 19, 'April', 2022, 5),
(224, 22, 20, 'April', 2022, 5),
(225, 22, 21, 'April', 2022, 5),
(226, 23, 1, 'April', 2022, 5),
(227, 23, 2, 'April', 2022, 5),
(228, 23, 3, 'April', 2022, 5),
(229, 23, 4, 'April', 2022, 5),
(230, 23, 5, 'April', 2022, 5),
(231, 23, 6, 'April', 2022, 5),
(232, 23, 7, 'April', 2022, 5),
(233, 23, 8, 'April', 2022, 5),
(234, 23, 9, 'April', 2022, 5),
(235, 23, 10, 'April', 2022, 5),
(236, 23, 11, 'April', 2022, 5),
(237, 23, 12, 'April', 2022, 5),
(238, 23, 13, 'April', 2022, 5),
(239, 23, 14, 'April', 2022, 5),
(240, 23, 15, 'April', 2022, 5),
(241, 23, 16, 'April', 2022, 5),
(242, 23, 17, 'April', 2022, 5),
(243, 23, 18, 'April', 2022, 5),
(244, 23, 19, 'April', 2022, 5),
(245, 23, 20, 'April', 2022, 5),
(246, 23, 21, 'April', 2022, 5),
(247, 24, 1, 'April', 2022, 5),
(248, 24, 2, 'April', 2022, 5),
(249, 24, 3, 'April', 2022, 5),
(250, 24, 4, 'April', 2022, 5),
(251, 24, 5, 'April', 2022, 5),
(252, 24, 6, 'April', 2022, 5),
(253, 24, 7, 'April', 2022, 5),
(254, 24, 8, 'April', 2022, 5),
(255, 24, 9, 'April', 2022, 5),
(256, 24, 10, 'April', 2022, 5),
(257, 24, 11, 'April', 2022, 5),
(258, 24, 12, 'April', 2022, 5),
(259, 24, 13, 'April', 2022, 5),
(260, 24, 14, 'April', 2022, 5),
(261, 24, 15, 'April', 2022, 5),
(262, 24, 16, 'April', 2022, 5),
(263, 24, 17, 'April', 2022, 5),
(264, 24, 18, 'April', 2022, 5),
(265, 24, 19, 'April', 2022, 5),
(266, 24, 20, 'April', 2022, 5),
(267, 24, 21, 'April', 2022, 5),
(268, 25, 1, 'April', 2022, 5),
(269, 25, 2, 'April', 2022, 5),
(270, 25, 3, 'April', 2022, 5),
(271, 25, 4, 'April', 2022, 5),
(272, 25, 5, 'April', 2022, 5),
(273, 25, 6, 'April', 2022, 5),
(274, 25, 7, 'April', 2022, 5),
(275, 25, 8, 'April', 2022, 5),
(276, 25, 9, 'April', 2022, 5),
(277, 25, 10, 'April', 2022, 5),
(278, 25, 11, 'April', 2022, 5),
(279, 25, 12, 'April', 2022, 5),
(280, 25, 13, 'April', 2022, 5),
(281, 25, 14, 'April', 2022, 5),
(282, 25, 15, 'April', 2022, 5),
(283, 25, 16, 'April', 2022, 5),
(284, 25, 17, 'April', 2022, 5),
(285, 25, 18, 'April', 2022, 5),
(286, 25, 19, 'April', 2022, 5),
(287, 25, 20, 'April', 2022, 5),
(288, 25, 21, 'April', 2022, 5),
(289, 26, 1, 'April', 2022, 5),
(290, 26, 2, 'April', 2022, 5),
(291, 26, 3, 'April', 2022, 5),
(292, 26, 4, 'April', 2022, 5),
(293, 26, 5, 'April', 2022, 5),
(294, 26, 6, 'April', 2022, 5),
(295, 26, 7, 'April', 2022, 5),
(296, 26, 8, 'April', 2022, 5),
(297, 26, 9, 'April', 2022, 5),
(298, 26, 10, 'April', 2022, 5),
(299, 26, 11, 'April', 2022, 5),
(300, 26, 12, 'April', 2022, 5),
(301, 26, 13, 'April', 2022, 5),
(302, 26, 14, 'April', 2022, 5),
(303, 26, 15, 'April', 2022, 5),
(304, 26, 16, 'April', 2022, 5),
(305, 26, 17, 'April', 2022, 5),
(306, 26, 18, 'April', 2022, 5),
(307, 26, 19, 'April', 2022, 5),
(308, 26, 20, 'April', 2022, 5),
(309, 26, 21, 'April', 2022, 5),
(310, 27, 1, 'April', 2022, 5),
(311, 27, 2, 'April', 2022, 5),
(312, 27, 3, 'April', 2022, 5),
(313, 27, 4, 'April', 2022, 5),
(314, 27, 5, 'April', 2022, 5),
(315, 27, 6, 'April', 2022, 5),
(316, 27, 7, 'April', 2022, 5),
(317, 27, 8, 'April', 2022, 5),
(318, 27, 9, 'April', 2022, 5),
(319, 27, 10, 'April', 2022, 5),
(320, 27, 11, 'April', 2022, 5),
(321, 27, 12, 'April', 2022, 5),
(322, 27, 13, 'April', 2022, 5),
(323, 27, 14, 'April', 2022, 5),
(324, 27, 15, 'April', 2022, 5),
(325, 27, 16, 'April', 2022, 5),
(326, 27, 17, 'April', 2022, 5),
(327, 27, 18, 'April', 2022, 5),
(328, 27, 19, 'April', 2022, 5),
(329, 27, 20, 'April', 2022, 5),
(330, 27, 21, 'April', 2022, 5),
(331, 16, 22, 'April', 2022, 5),
(332, 17, 22, 'April', 2022, 5),
(333, 18, 22, 'April', 2022, 5),
(334, 19, 22, 'April', 2022, 5),
(339, 16, 23, 'April', 2022, 5),
(340, 17, 23, 'April', 2022, 5),
(341, 18, 23, 'April', 2022, 5),
(342, 19, 23, 'April', 2022, 5),
(363, 16, 24, 'April', 2022, 5),
(364, 17, 24, 'April', 2022, 5),
(365, 18, 24, 'April', 2022, 5),
(366, 19, 24, 'April', 2022, 5),
(405, 16, 25, 'April', 2022, 1),
(406, 17, 25, 'April', 2022, 1),
(407, 18, 25, 'April', 2022, 3),
(408, 19, 25, 'April', 2022, 3),
(409, 16, 26, 'April', 2022, 1),
(410, 17, 26, 'April', 2022, 1),
(411, 18, 26, 'April', 2022, 1),
(412, 19, 26, 'April', 2022, 3),
(413, 16, 27, 'April', 2022, 1),
(414, 17, 27, 'April', 2022, 2),
(415, 18, 27, 'April', 2022, 1),
(416, 19, 27, 'April', 2022, 1),
(417, 16, 28, 'April', 2022, 5),
(418, 17, 28, 'April', 2022, 5),
(419, 18, 28, 'April', 2022, 5),
(420, 19, 28, 'April', 2022, 5),
(421, 28, 1, 'April', 2022, 5),
(422, 28, 2, 'April', 2022, 5),
(423, 28, 3, 'April', 2022, 5),
(424, 28, 4, 'April', 2022, 5),
(425, 28, 5, 'April', 2022, 5),
(426, 28, 6, 'April', 2022, 5),
(427, 28, 7, 'April', 2022, 5),
(428, 28, 8, 'April', 2022, 5),
(429, 28, 9, 'April', 2022, 5),
(430, 28, 10, 'April', 2022, 5),
(431, 28, 11, 'April', 2022, 5),
(432, 28, 12, 'April', 2022, 5),
(433, 28, 13, 'April', 2022, 5),
(434, 28, 14, 'April', 2022, 5),
(435, 28, 15, 'April', 2022, 5),
(436, 28, 16, 'April', 2022, 5),
(437, 28, 17, 'April', 2022, 5),
(438, 28, 18, 'April', 2022, 5),
(439, 28, 19, 'April', 2022, 5),
(440, 28, 20, 'April', 2022, 5),
(441, 28, 21, 'April', 2022, 5),
(442, 28, 22, 'April', 2022, 5),
(443, 28, 23, 'April', 2022, 5),
(444, 28, 24, 'April', 2022, 5),
(445, 28, 25, 'April', 2022, 5),
(446, 28, 26, 'April', 2022, 5),
(447, 28, 27, 'April', 2022, 5),
(448, 28, 28, 'April', 2022, 5),
(449, 16, 29, 'April', 2022, 1),
(450, 17, 29, 'April', 2022, 1),
(451, 18, 29, 'April', 2022, 2),
(452, 19, 29, 'April', 2022, 1),
(453, 1, 1, 'May', 2022, 2),
(454, 2, 1, 'May', 2022, 3),
(455, 1, 1, 'May', 2022, 1),
(456, 2, 1, 'May', 2022, 1);

-- --------------------------------------------------------

--
-- Table structure for table `absen_harian`
--

CREATE TABLE `absen_harian` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` varchar(128) NOT NULL,
  `tahun` int(11) NOT NULL,
  `keterangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen_harian`
--

INSERT INTO `absen_harian` (`id`, `id_pegawai`, `tanggal`, `bulan`, `tahun`, `keterangan`) VALUES
(175, 6, 18, 'May', 2022, 5),
(179, 6, 19, 'May', 2022, 5),
(183, 6, 20, 'May', 2022, 5),
(197, 6, 21, 'May', 2022, 5),
(201, 6, 22, 'May', 2022, 5),
(202, 6, 1, 'May', 2022, 1),
(203, 6, 2, 'May', 2022, 1),
(204, 6, 3, 'May', 2022, 1),
(205, 6, 4, 'May', 2022, 1),
(206, 6, 5, 'May', 2022, 1),
(207, 6, 6, 'May', 2022, 5),
(208, 6, 7, 'May', 2022, 5),
(209, 6, 8, 'May', 2022, 5),
(210, 6, 9, 'May', 2022, 5),
(211, 6, 10, 'May', 2022, 5),
(212, 6, 11, 'May', 2022, 5),
(213, 6, 12, 'May', 2022, 5),
(214, 6, 13, 'May', 2022, 5),
(215, 6, 14, 'May', 2022, 5),
(216, 6, 15, 'May', 2022, 5),
(217, 6, 16, 'May', 2022, 5),
(218, 6, 17, 'May', 2022, 5),
(219, 6, 18, 'May', 2022, 5),
(220, 6, 19, 'May', 2022, 5),
(221, 6, 20, 'May', 2022, 5),
(222, 6, 21, 'May', 2022, 5),
(223, 6, 22, 'May', 2022, 5),
(224, 6, 23, 'May', 2022, 5),
(225, 6, 24, 'May', 2022, 5),
(226, 6, 25, 'May', 2022, 5),
(227, 6, 26, 'May', 2022, 5),
(228, 6, 27, 'May', 2022, 5),
(229, 6, 28, 'May', 2022, 5),
(230, 6, 29, 'May', 2022, 5),
(231, 6, 30, 'May', 2022, 5),
(232, 6, 31, 'May', 2022, 5),
(295, 5, 1, 'May', 2022, 1),
(296, 5, 2, 'May', 2022, 1),
(297, 5, 3, 'May', 2022, 1),
(298, 5, 4, 'May', 2022, 5),
(299, 5, 5, 'May', 2022, 5),
(300, 5, 6, 'May', 2022, 5),
(301, 5, 7, 'May', 2022, 5),
(302, 5, 8, 'May', 2022, 5),
(303, 5, 9, 'May', 2022, 5),
(304, 5, 10, 'May', 2022, 5),
(305, 5, 11, 'May', 2022, 1),
(306, 5, 12, 'May', 2022, 1),
(307, 5, 13, 'May', 2022, 1),
(308, 5, 14, 'May', 2022, 1),
(309, 5, 15, 'May', 2022, 5),
(310, 5, 16, 'May', 2022, 5),
(311, 5, 17, 'May', 2022, 5),
(312, 5, 18, 'May', 2022, 5),
(313, 5, 19, 'May', 2022, 5),
(314, 5, 20, 'May', 2022, 5),
(315, 5, 21, 'May', 2022, 5),
(316, 5, 22, 'May', 2022, 5),
(317, 5, 23, 'May', 2022, 5),
(318, 5, 24, 'May', 2022, 5),
(319, 5, 25, 'May', 2022, 5),
(320, 5, 26, 'May', 2022, 5),
(321, 5, 27, 'May', 2022, 5),
(322, 5, 28, 'May', 2022, 5),
(323, 5, 29, 'May', 2022, 1),
(324, 5, 30, 'May', 2022, 1),
(325, 5, 31, 'May', 2022, 1),
(326, 12, 1, 'April', 2022, 1),
(327, 12, 2, 'April', 2022, 1),
(328, 12, 3, 'April', 2022, 5),
(329, 12, 4, 'April', 2022, 5),
(330, 12, 5, 'April', 2022, 5),
(331, 12, 6, 'April', 2022, 5),
(332, 12, 7, 'April', 2022, 5),
(333, 12, 8, 'April', 2022, 5),
(334, 12, 9, 'April', 2022, 5),
(335, 12, 10, 'April', 2022, 5),
(336, 12, 11, 'April', 2022, 5),
(337, 12, 12, 'April', 2022, 5),
(338, 12, 13, 'April', 2022, 5),
(339, 12, 14, 'April', 2022, 5),
(340, 12, 15, 'April', 2022, 5),
(341, 12, 16, 'April', 2022, 5),
(342, 12, 17, 'April', 2022, 5),
(343, 12, 18, 'April', 2022, 5),
(344, 12, 19, 'April', 2022, 5),
(345, 12, 20, 'April', 2022, 5),
(346, 12, 21, 'April', 2022, 5),
(347, 12, 22, 'April', 2022, 5),
(348, 12, 23, 'April', 2022, 5),
(349, 12, 24, 'April', 2022, 5),
(350, 12, 25, 'April', 2022, 5),
(351, 12, 26, 'April', 2022, 5),
(352, 12, 27, 'April', 2022, 5),
(353, 12, 28, 'April', 2022, 5),
(354, 12, 29, 'April', 2022, 5),
(355, 12, 30, 'April', 2022, 5),
(356, 13, 1, 'April', 2022, 1),
(357, 13, 2, 'April', 2022, 2),
(358, 13, 3, 'April', 2022, 5),
(359, 13, 4, 'April', 2022, 5),
(360, 13, 5, 'April', 2022, 5),
(361, 13, 6, 'April', 2022, 5),
(362, 13, 7, 'April', 2022, 5),
(363, 13, 8, 'April', 2022, 5),
(364, 13, 9, 'April', 2022, 5),
(365, 13, 10, 'April', 2022, 5),
(366, 13, 11, 'April', 2022, 5),
(367, 13, 12, 'April', 2022, 5),
(368, 13, 13, 'April', 2022, 5),
(369, 13, 14, 'April', 2022, 5),
(370, 13, 15, 'April', 2022, 5),
(371, 13, 16, 'April', 2022, 5),
(372, 13, 17, 'April', 2022, 5),
(373, 13, 18, 'April', 2022, 5),
(374, 13, 19, 'April', 2022, 5),
(375, 13, 20, 'April', 2022, 5),
(376, 13, 21, 'April', 2022, 5),
(377, 13, 22, 'April', 2022, 5),
(378, 13, 23, 'April', 2022, 5),
(379, 13, 24, 'April', 2022, 5),
(380, 13, 25, 'April', 2022, 5),
(381, 13, 26, 'April', 2022, 5),
(382, 13, 27, 'April', 2022, 5),
(383, 13, 28, 'April', 2022, 5),
(384, 13, 29, 'April', 2022, 5),
(385, 13, 30, 'April', 2022, 5),
(386, 14, 1, 'April', 2022, 3),
(387, 14, 2, 'April', 2022, 1),
(388, 14, 3, 'April', 2022, 5),
(389, 14, 4, 'April', 2022, 5),
(390, 14, 5, 'April', 2022, 5),
(391, 14, 6, 'April', 2022, 5),
(392, 14, 7, 'April', 2022, 5),
(393, 14, 8, 'April', 2022, 5),
(394, 14, 9, 'April', 2022, 5),
(395, 14, 10, 'April', 2022, 5),
(396, 14, 11, 'April', 2022, 5),
(397, 14, 12, 'April', 2022, 5),
(398, 14, 13, 'April', 2022, 5),
(399, 14, 14, 'April', 2022, 5),
(400, 14, 15, 'April', 2022, 5),
(401, 14, 16, 'April', 2022, 5),
(402, 14, 17, 'April', 2022, 5),
(403, 14, 18, 'April', 2022, 5),
(404, 14, 19, 'April', 2022, 5),
(405, 14, 20, 'April', 2022, 5),
(406, 14, 21, 'April', 2022, 5),
(407, 14, 22, 'April', 2022, 5),
(408, 14, 23, 'April', 2022, 5),
(409, 14, 24, 'April', 2022, 5),
(410, 14, 25, 'April', 2022, 5),
(411, 14, 26, 'April', 2022, 5),
(412, 14, 27, 'April', 2022, 5),
(413, 14, 28, 'April', 2022, 5),
(414, 14, 29, 'April', 2022, 5),
(415, 14, 30, 'April', 2022, 5);

-- --------------------------------------------------------

--
-- Table structure for table `absen_jam`
--

CREATE TABLE `absen_jam` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `tanggal` int(11) DEFAULT NULL,
  `bulan` varchar(128) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `total_jam` int(11) DEFAULT NULL,
  `prodi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen_jam`
--

INSERT INTO `absen_jam` (`id`, `id_pegawai`, `tanggal`, `bulan`, `tahun`, `total_jam`, `prodi`) VALUES
(270, 5, 1, 'May', 2022, 0, 'MLLU'),
(271, 5, 2, 'May', 2022, 0, 'MLLU'),
(272, 5, 3, 'May', 2022, 0, 'MLLU'),
(273, 5, 4, 'May', 2022, 0, 'MLLU'),
(274, 5, 5, 'May', 2022, 0, 'MLLU'),
(275, 5, 6, 'May', 2022, 0, 'MLLU'),
(276, 5, 7, 'May', 2022, 0, 'MLLU'),
(277, 5, 8, 'May', 2022, 0, 'MLLU'),
(278, 5, 9, 'May', 2022, 0, 'MLLU'),
(279, 5, 10, 'May', 2022, 0, 'MLLU'),
(280, 5, 11, 'May', 2022, 0, 'MLLU'),
(281, 5, 12, 'May', 2022, 0, 'MLLU'),
(282, 5, 13, 'May', 2022, 5, 'MLLU'),
(283, 5, 14, 'May', 2022, 4, 'MLLU'),
(284, 5, 15, 'May', 2022, 0, 'MLLU'),
(285, 5, 16, 'May', 2022, 0, 'MLLU'),
(286, 5, 17, 'May', 2022, 10, 'MLLU'),
(287, 5, 18, 'May', 2022, 0, 'MLLU'),
(288, 5, 19, 'May', 2022, 0, 'MLLU'),
(289, 5, 20, 'May', 2022, 0, 'MLLU'),
(290, 5, 21, 'May', 2022, 0, 'MLLU'),
(291, 5, 22, 'May', 2022, 0, 'MLLU'),
(292, 5, 23, 'May', 2022, 0, 'MLLU'),
(293, 5, 24, 'May', 2022, 0, 'MLLU'),
(294, 5, 25, 'May', 2022, 0, 'MLLU'),
(295, 5, 26, 'May', 2022, 0, 'MLLU'),
(296, 5, 27, 'May', 2022, 0, 'MLLU'),
(297, 5, 28, 'May', 2022, 0, 'MLLU'),
(298, 5, 29, 'May', 2022, 0, 'MLLU'),
(299, 5, 30, 'May', 2022, 0, 'MLLU'),
(300, 5, 31, 'May', 2022, 0, 'MLLU'),
(332, 5, 1, 'May', 2022, 4, 'TLB'),
(333, 5, 2, 'May', 2022, 3, 'TLB'),
(334, 5, 3, 'May', 2022, 6, 'TLB'),
(335, 5, 4, 'May', 2022, 0, 'TLB'),
(336, 5, 5, 'May', 2022, 0, 'TLB'),
(337, 5, 6, 'May', 2022, 0, 'TLB'),
(338, 5, 7, 'May', 2022, 0, 'TLB'),
(339, 5, 8, 'May', 2022, 0, 'TLB'),
(340, 5, 9, 'May', 2022, 0, 'TLB'),
(341, 5, 10, 'May', 2022, 0, 'TLB'),
(342, 5, 11, 'May', 2022, 2, 'TLB'),
(343, 5, 12, 'May', 2022, 3, 'TLB'),
(344, 5, 13, 'May', 2022, 3, 'TLB'),
(345, 5, 14, 'May', 2022, 1, 'TLB'),
(346, 5, 15, 'May', 2022, 0, 'TLB'),
(347, 5, 16, 'May', 2022, 0, 'TLB'),
(348, 5, 17, 'May', 2022, 0, 'TLB'),
(349, 5, 18, 'May', 2022, 0, 'TLB'),
(350, 5, 19, 'May', 2022, 0, 'TLB'),
(351, 5, 20, 'May', 2022, 0, 'TLB'),
(352, 5, 21, 'May', 2022, 0, 'TLB'),
(353, 5, 22, 'May', 2022, 0, 'TLB'),
(354, 5, 23, 'May', 2022, 0, 'TLB'),
(355, 5, 24, 'May', 2022, 0, 'TLB'),
(356, 5, 25, 'May', 2022, 0, 'TLB'),
(357, 5, 26, 'May', 2022, 0, 'TLB'),
(358, 5, 27, 'May', 2022, 0, 'TLB'),
(359, 5, 28, 'May', 2022, 0, 'TLB'),
(360, 5, 29, 'May', 2022, 5, 'TLB'),
(361, 5, 30, 'May', 2022, 3, 'TLB'),
(362, 5, 31, 'May', 2022, 4, 'TLB'),
(363, 5, 29, 'april', 2022, 4, 'MLLU'),
(365, 12, 1, 'April', 2022, 4, 'TLB'),
(366, 12, 2, 'April', 2022, 4, 'TLB'),
(367, 12, 3, 'April', 2022, 0, 'TLB'),
(368, 12, 4, 'April', 2022, 0, 'TLB'),
(369, 12, 5, 'April', 2022, 0, 'TLB'),
(370, 12, 6, 'April', 2022, 0, 'TLB'),
(371, 12, 7, 'April', 2022, 0, 'TLB'),
(372, 12, 8, 'April', 2022, 0, 'TLB'),
(373, 12, 9, 'April', 2022, 0, 'TLB'),
(374, 12, 10, 'April', 2022, 0, 'TLB'),
(375, 12, 11, 'April', 2022, 0, 'TLB'),
(376, 12, 12, 'April', 2022, 0, 'TLB'),
(377, 12, 13, 'April', 2022, 0, 'TLB'),
(378, 12, 14, 'April', 2022, 0, 'TLB'),
(379, 12, 15, 'April', 2022, 0, 'TLB'),
(380, 12, 16, 'April', 2022, 0, 'TLB'),
(381, 12, 17, 'April', 2022, 0, 'TLB'),
(382, 12, 18, 'April', 2022, 0, 'TLB'),
(383, 12, 19, 'April', 2022, 0, 'TLB'),
(384, 12, 20, 'April', 2022, 0, 'TLB'),
(385, 12, 21, 'April', 2022, 0, 'TLB'),
(386, 12, 22, 'April', 2022, 0, 'TLB'),
(387, 12, 23, 'April', 2022, 0, 'TLB'),
(388, 12, 24, 'April', 2022, 0, 'TLB'),
(389, 12, 25, 'April', 2022, 0, 'TLB'),
(390, 12, 26, 'April', 2022, 0, 'TLB'),
(391, 12, 27, 'April', 2022, 0, 'TLB'),
(392, 12, 28, 'April', 2022, 0, 'TLB'),
(393, 12, 29, 'April', 2022, 0, 'TLB'),
(394, 12, 30, 'April', 2022, 0, 'TLB'),
(395, 13, 1, 'April', 2022, 3, 'MLLU'),
(396, 13, 2, 'April', 2022, 0, 'MLLU'),
(397, 13, 3, 'April', 2022, 0, 'MLLU'),
(398, 13, 4, 'April', 2022, 0, 'MLLU'),
(399, 13, 5, 'April', 2022, 0, 'MLLU'),
(400, 13, 6, 'April', 2022, 0, 'MLLU'),
(401, 13, 7, 'April', 2022, 0, 'MLLU'),
(402, 13, 8, 'April', 2022, 0, 'MLLU'),
(403, 13, 9, 'April', 2022, 0, 'MLLU'),
(404, 13, 10, 'April', 2022, 0, 'MLLU'),
(405, 13, 11, 'April', 2022, 0, 'MLLU'),
(406, 13, 12, 'April', 2022, 0, 'MLLU'),
(407, 13, 13, 'April', 2022, 0, 'MLLU'),
(408, 13, 14, 'April', 2022, 0, 'MLLU'),
(409, 13, 15, 'April', 2022, 0, 'MLLU'),
(410, 13, 16, 'April', 2022, 0, 'MLLU'),
(411, 13, 17, 'April', 2022, 0, 'MLLU'),
(412, 13, 18, 'April', 2022, 0, 'MLLU'),
(413, 13, 19, 'April', 2022, 0, 'MLLU'),
(414, 13, 20, 'April', 2022, 0, 'MLLU'),
(415, 13, 21, 'April', 2022, 0, 'MLLU'),
(416, 13, 22, 'April', 2022, 0, 'MLLU'),
(417, 13, 23, 'April', 2022, 0, 'MLLU'),
(418, 13, 24, 'April', 2022, 0, 'MLLU'),
(419, 13, 25, 'April', 2022, 0, 'MLLU'),
(420, 13, 26, 'April', 2022, 0, 'MLLU'),
(421, 13, 27, 'April', 2022, 0, 'MLLU'),
(422, 13, 28, 'April', 2022, 0, 'MLLU'),
(423, 13, 29, 'April', 2022, 0, 'MLLU'),
(424, 13, 30, 'April', 2022, 0, 'MLLU'),
(425, 14, 1, 'April', 2022, 0, 'MBU'),
(426, 14, 2, 'April', 2022, 4, 'MBU'),
(427, 14, 3, 'April', 2022, 0, 'MBU'),
(428, 14, 4, 'April', 2022, 0, 'MBU'),
(429, 14, 5, 'April', 2022, 0, 'MBU'),
(430, 14, 6, 'April', 2022, 0, 'MBU'),
(431, 14, 7, 'April', 2022, 0, 'MBU'),
(432, 14, 8, 'April', 2022, 0, 'MBU'),
(433, 14, 9, 'April', 2022, 0, 'MBU'),
(434, 14, 10, 'April', 2022, 0, 'MBU'),
(435, 14, 11, 'April', 2022, 0, 'MBU'),
(436, 14, 12, 'April', 2022, 0, 'MBU'),
(437, 14, 13, 'April', 2022, 0, 'MBU'),
(438, 14, 14, 'April', 2022, 0, 'MBU'),
(439, 14, 15, 'April', 2022, 0, 'MBU'),
(440, 14, 16, 'April', 2022, 0, 'MBU'),
(441, 14, 17, 'April', 2022, 0, 'MBU'),
(442, 14, 18, 'April', 2022, 0, 'MBU'),
(443, 14, 19, 'April', 2022, 0, 'MBU'),
(444, 14, 20, 'April', 2022, 0, 'MBU'),
(445, 14, 21, 'April', 2022, 0, 'MBU'),
(446, 14, 22, 'April', 2022, 0, 'MBU'),
(447, 14, 23, 'April', 2022, 0, 'MBU'),
(448, 14, 24, 'April', 2022, 0, 'MBU'),
(449, 14, 25, 'April', 2022, 0, 'MBU'),
(450, 14, 26, 'April', 2022, 0, 'MBU'),
(451, 14, 27, 'April', 2022, 0, 'MBU'),
(452, 14, 28, 'April', 2022, 0, 'MBU'),
(453, 14, 29, 'April', 2022, 0, 'MBU'),
(454, 14, 30, 'April', 2022, 0, 'MBU');

-- --------------------------------------------------------

--
-- Table structure for table `absen_jam_p`
--

CREATE TABLE `absen_jam_p` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` varchar(128) NOT NULL,
  `tahun` int(11) NOT NULL,
  `total_jam` int(11) NOT NULL,
  `prodi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen_jam_p`
--

INSERT INTO `absen_jam_p` (`id`, `id_pegawai`, `tanggal`, `bulan`, `tahun`, `total_jam`, `prodi`) VALUES
(1, 1, 12, 'May', 2022, 14, ''),
(2, 5, 1, 'May', 2022, 0, ''),
(3, 5, 2, 'May', 2022, 0, ''),
(4, 5, 3, 'May', 2022, 0, ''),
(5, 5, 4, 'May', 2022, 0, ''),
(6, 5, 5, 'May', 2022, 0, ''),
(7, 5, 6, 'May', 2022, 0, ''),
(8, 5, 7, 'May', 2022, 0, ''),
(9, 5, 8, 'May', 2022, 0, ''),
(10, 5, 9, 'May', 2022, 0, ''),
(11, 5, 10, 'May', 2022, 0, ''),
(12, 5, 11, 'May', 2022, 0, ''),
(13, 5, 12, 'May', 2022, 0, ''),
(14, 5, 13, 'May', 2022, 4, ''),
(15, 5, 14, 'May', 2022, 4, ''),
(16, 5, 15, 'May', 2022, 0, ''),
(17, 5, 16, 'May', 2022, 0, ''),
(18, 5, 17, 'May', 2022, 10, ''),
(19, 5, 18, 'May', 2022, 0, ''),
(20, 5, 19, 'May', 2022, 0, ''),
(21, 5, 20, 'May', 2022, 0, ''),
(22, 5, 21, 'May', 2022, 0, ''),
(23, 5, 22, 'May', 2022, 0, ''),
(24, 5, 23, 'May', 2022, 0, ''),
(25, 5, 24, 'May', 2022, 0, ''),
(26, 5, 25, 'May', 2022, 0, ''),
(27, 5, 26, 'May', 2022, 0, ''),
(28, 5, 27, 'May', 2022, 0, ''),
(29, 5, 28, 'May', 2022, 0, ''),
(30, 5, 29, 'May', 2022, 0, ''),
(31, 5, 30, 'May', 2022, 0, ''),
(32, 5, 31, 'May', 2022, 0, ''),
(33, 13, 1, 'April', 2022, 4, 'MLLU'),
(34, 13, 2, 'April', 2022, 0, 'MLLU'),
(35, 13, 3, 'April', 2022, 0, 'MLLU'),
(36, 13, 4, 'April', 2022, 0, 'MLLU'),
(37, 13, 5, 'April', 2022, 0, 'MLLU'),
(38, 13, 6, 'April', 2022, 0, 'MLLU'),
(39, 13, 7, 'April', 2022, 0, 'MLLU'),
(40, 13, 8, 'April', 2022, 0, 'MLLU'),
(41, 13, 9, 'April', 2022, 0, 'MLLU'),
(42, 13, 10, 'April', 2022, 0, 'MLLU'),
(43, 13, 11, 'April', 2022, 0, 'MLLU'),
(44, 13, 12, 'April', 2022, 0, 'MLLU'),
(45, 13, 13, 'April', 2022, 0, 'MLLU'),
(46, 13, 14, 'April', 2022, 0, 'MLLU'),
(47, 13, 15, 'April', 2022, 0, 'MLLU'),
(48, 13, 16, 'April', 2022, 0, 'MLLU'),
(49, 13, 17, 'April', 2022, 0, 'MLLU'),
(50, 13, 18, 'April', 2022, 0, 'MLLU'),
(51, 13, 19, 'April', 2022, 0, 'MLLU'),
(52, 13, 20, 'April', 2022, 0, 'MLLU'),
(53, 13, 21, 'April', 2022, 0, 'MLLU'),
(54, 13, 22, 'April', 2022, 0, 'MLLU'),
(55, 13, 23, 'April', 2022, 0, 'MLLU'),
(56, 13, 24, 'April', 2022, 0, 'MLLU'),
(57, 13, 25, 'April', 2022, 0, 'MLLU'),
(58, 13, 26, 'April', 2022, 0, 'MLLU'),
(59, 13, 27, 'April', 2022, 0, 'MLLU'),
(60, 13, 28, 'April', 2022, 0, 'MLLU'),
(61, 13, 29, 'April', 2022, 0, 'MLLU'),
(62, 13, 30, 'April', 2022, 0, 'MLLU'),
(63, 14, 1, 'April', 2022, 0, 'MBU'),
(64, 14, 2, 'April', 2022, 4, 'MBU'),
(65, 14, 3, 'April', 2022, 0, 'MBU'),
(66, 14, 4, 'April', 2022, 0, 'MBU'),
(67, 14, 5, 'April', 2022, 0, 'MBU'),
(68, 14, 6, 'April', 2022, 0, 'MBU'),
(69, 14, 7, 'April', 2022, 0, 'MBU'),
(70, 14, 8, 'April', 2022, 0, 'MBU'),
(71, 14, 9, 'April', 2022, 0, 'MBU'),
(72, 14, 10, 'April', 2022, 0, 'MBU'),
(73, 14, 11, 'April', 2022, 0, 'MBU'),
(74, 14, 12, 'April', 2022, 0, 'MBU'),
(75, 14, 13, 'April', 2022, 0, 'MBU'),
(76, 14, 14, 'April', 2022, 0, 'MBU'),
(77, 14, 15, 'April', 2022, 0, 'MBU'),
(78, 14, 16, 'April', 2022, 0, 'MBU'),
(79, 14, 17, 'April', 2022, 0, 'MBU'),
(80, 14, 18, 'April', 2022, 0, 'MBU'),
(81, 14, 19, 'April', 2022, 0, 'MBU'),
(82, 14, 20, 'April', 2022, 0, 'MBU'),
(83, 14, 21, 'April', 2022, 0, 'MBU'),
(84, 14, 22, 'April', 2022, 0, 'MBU'),
(85, 14, 23, 'April', 2022, 0, 'MBU'),
(86, 14, 24, 'April', 2022, 0, 'MBU'),
(87, 14, 25, 'April', 2022, 0, 'MBU'),
(88, 14, 26, 'April', 2022, 0, 'MBU'),
(89, 14, 27, 'April', 2022, 0, 'MBU'),
(90, 14, 28, 'April', 2022, 0, 'MBU'),
(91, 14, 29, 'April', 2022, 0, 'MBU'),
(92, 14, 30, 'April', 2022, 0, 'MBU');

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `golongan` varchar(11) NOT NULL,
  `jabatan_akademik` varchar(128) NOT NULL,
  `tp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id`, `nama`, `nip`, `golongan`, `jabatan_akademik`, `tp`) VALUES
(5, 'Marsya Anggun', 'H051181006', '3', 'Lektor', 'T'),
(6, 'Niniezt', 'H051181001', '2', 'Asisten ahli', 'T'),
(12, 'pegawai 1', 'H001', 'PTT', 'Asisten ahli', 'T'),
(13, 'pegawai 2', 'H002', '2', 'Lektor', 'P'),
(14, 'pegawai 3', 'H003', '4', 'Lektor kepala', 'T/P');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_bulanan`
--

CREATE TABLE `rekap_bulanan` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `tp` varchar(10) NOT NULL,
  `jabatan_akademik` varchar(128) NOT NULL,
  `golongan` varchar(11) NOT NULL,
  `kehadiran` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `cuti` int(11) NOT NULL,
  `alfa` int(11) NOT NULL,
  `jam_ajar` int(11) NOT NULL,
  `jam_ajar_p` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `gaji` int(11) NOT NULL,
  `bulan` varchar(128) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekap_bulanan`
--

INSERT INTO `rekap_bulanan` (`id`, `id_pegawai`, `nama`, `nip`, `tp`, `jabatan_akademik`, `golongan`, `kehadiran`, `sakit`, `izin`, `cuti`, `alfa`, `jam_ajar`, `jam_ajar_p`, `potongan`, `gaji`, `bulan`, `tahun`) VALUES
(1, 1, 'Ahmad ilham B', 'H071181008', 'T', '', 'PTT', 34, 0, 0, 0, 0, 45, 0, 150000, 4000000, 'Maret', 2022),
(2, 2, 'Marsya Anggun Prisila', 'H051181006', 'P', '', 'PTT', 34, 0, 0, 0, 0, 42, 4, 1000000, 4500000, 'Maret', 2022),
(5, 1, 'Ahmad ilham B', 'H071181008', 'T', 'Lektor', 'PTT', 22, 0, 0, 0, 0, 23, 0, 150000, 2000000, 'April', 2022),
(6, 2, 'Marsya Anggun Prisila', 'H051181006', 'P', 'Professor', 'PTT', 20, 0, 0, 0, 0, 32, 0, 50000, 2300000, 'April', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `birth` int(11) DEFAULT NULL,
  `hoby` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`id`, `name`, `birth`, `hoby`) VALUES
(1, 'ell', 22, 'Coding\r\n'),
(2, 'fatimah', 18, 'Mengaji'),
(16, 'Marsya', 22, 'Berenang'),
(17, 'Nasmah', 21, 'Coding'),
(20, 'Ell ganteng', 21, 'Coding'),
(21, 'Juni', 22, 'Mengeluh');

-- --------------------------------------------------------

--
-- Table structure for table `testing_bulan`
--

CREATE TABLE `testing_bulan` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(256) DEFAULT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `keterangan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing_bulan`
--

INSERT INTO `testing_bulan` (`id`, `nama_pegawai`, `tanggal`, `keterangan`) VALUES
(1, 'Ahmad ilham B', '01-Mar-2022', 1),
(2, 'Marsya Anggun Prisilla', '01-Mar-2022', 1),
(3, 'Naura Alfatiyya Arda', '01-Mar-2022', 1),
(4, 'Fitra Damayanti', '01-Mar-2022', 2),
(5, 'Juni Wahdaniah', '01-Mar-2022', 1),
(6, 'Abdul Jalil Saleh', '01-Mar-2022', 3),
(7, 'Ardi S', '01-Mar-2022', 4),
(8, 'Fuad Hamdi Bahar', '01-Mar-2022', 1),
(17, 'Ahmad ilham B', '02-Mar-2022', 1),
(18, 'Marsya Anggun Prisilla', '02-Mar-2022', 2),
(19, 'Naura Alfatiyya Arda', '02-Mar-2022', 1),
(20, 'Fitra Damayanti', '02-Mar-2022', 1),
(21, 'Juni Wahdaniah', '02-Mar-2022', 3),
(22, 'Abdul Jalil Saleh', '02-Mar-2022', 1),
(23, 'Ardi S', '02-Mar-2022', 3),
(24, 'Fuad Hamdi Bahar', '02-Mar-2022', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testing_nama_pegawai`
--

CREATE TABLE `testing_nama_pegawai` (
  `id` int(3) NOT NULL,
  `nama` varchar(256) DEFAULT NULL,
  `nip` varchar(128) NOT NULL,
  `golongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing_nama_pegawai`
--

INSERT INTO `testing_nama_pegawai` (`id`, `nama`, `nip`, `golongan`) VALUES
(16, 'ilham', 'H071181008', 2),
(17, 'Marsya', 'H051181006', 2),
(18, 'Juni bambang', 'H051181116', 4),
(19, 'Naura', 'H051181030', 1),
(31, 'Ell', 'H071181014', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `email`, `password`, `role`) VALUES
(1, 'super admin', 'superadmin@gmail.com', 'superadmin', 1),
(2, 'admin TLB', 'proditlb@gmail.com', 'proditlb', 2),
(3, 'admin pegawai', 'adminpegawai@gmail.com', 'adminpegawai', 3),
(4, 'admin MBU', 'prodimbu@gmail.com', 'prodimbu', 4),
(5, 'admin MLLU', 'prodimllu@gmail.com', 'prodimllu', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_tanggal_terpisah`
--
ALTER TABLE `absensi_tanggal_terpisah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absen_harian`
--
ALTER TABLE `absen_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absen_jam`
--
ALTER TABLE `absen_jam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absen_jam_p`
--
ALTER TABLE `absen_jam_p`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `rekap_bulanan`
--
ALTER TABLE `rekap_bulanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testing_bulan`
--
ALTER TABLE `testing_bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testing_nama_pegawai`
--
ALTER TABLE `testing_nama_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_tanggal_terpisah`
--
ALTER TABLE `absensi_tanggal_terpisah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=457;

--
-- AUTO_INCREMENT for table `absen_harian`
--
ALTER TABLE `absen_harian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=416;

--
-- AUTO_INCREMENT for table `absen_jam`
--
ALTER TABLE `absen_jam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=455;

--
-- AUTO_INCREMENT for table `absen_jam_p`
--
ALTER TABLE `absen_jam_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rekap_bulanan`
--
ALTER TABLE `rekap_bulanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `testing_bulan`
--
ALTER TABLE `testing_bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `testing_nama_pegawai`
--
ALTER TABLE `testing_nama_pegawai`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
