-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-06-09 20:37:43
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `dbms_project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(3) NOT NULL,
  `m_name_ch` varchar(20) DEFAULT NULL,
  `m_name_en` varchar(60) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `order_time` int(20) DEFAULT NULL,
  `price` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`movie_id`, `m_name_ch`, `m_name_en`, `type`, `order_time`, `price`) VALUES
(1, '數碼寶貝', 'DIGIMON ADVENTURE LAST EVOLUTION KIZUNA', 'cartoon', 2, 250),
(2, '1/2的魔法', 'ONWARD', 'cartoon', 8, 250),
(3, '黑暗騎士：黎明昇起', 'THE DARK KNIGHT RISES', 'action', 5, 300),
(4, '蝙蝠俠：開戰時刻', 'BATMAN BEGINS', 'action', 6, 400),
(5, '現在，很想見你', 'Be With You', 'romantic', 2, 350),
(6, '謝謝你愛過我', 'Babyteeth', 'romantic', 7, 250);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
