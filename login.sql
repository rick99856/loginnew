-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2015-10-20: 13:49:34
-- 伺服器版本: 5.6.24
-- PHP 版本： 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `s13113241`
--

-- --------------------------------------------------------

--
-- 資料表結構 `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `NO` int(6) NOT NULL,
  `username` char(20) CHARACTER SET utf8 NOT NULL,
  `passwd` char(50) CHARACTER SET utf8 NOT NULL,
  `tel` char(12) CHARACTER SET utf8 NOT NULL,
  `adds` varchar(20) CHARACTER SET utf8 NOT NULL,
  `other` varchar(20) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `key` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `login`
--

INSERT INTO `login` (`NO`, `username`, `passwd`, `tel`, `adds`, `other`, `status`, `email`, `key`) VALUES
(18, 's13113241', '511b791399e91c3db0aff3511580f965', '0912345678', '123', '456', 1, '', ''),
(46, 'admin', 'ee10c315eba2c75b403ea99136f5b48d', '123456', 'assq', 'aa', 1, '', ''),
(70, '7', '8f14e45fceea167a5a36dedd4bea2543', '7', '7', '7', 1, 'valoso36667@yahoo.com.tw', '28dd2c7955ce926456240b2ff0100bde'),
(71, '44', 'f7177163c833dff4b38fc8d2872f1ec6', '44', '44', '44', 0, 'rick7320@gmail.com', 'dbc4d84bfcfe2284ba11beffb853a8c4');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`NO`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `login`
--
ALTER TABLE `login`
  MODIFY `NO` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
