-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 1 月 05 日 16:28
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_kadai_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` varchar(128) NOT NULL,
  `comment` text DEFAULT NULL,
  `date` datetime NOT NULL,
  `deleteflag` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `url`, `comment`, `date`, `deleteflag`) VALUES
(1, 'テストkousin', 'http://www.xxx.co.jp', 'テストですテストですテストですテストですテストですvテストですテストですテストです', '2023-01-05 23:47:28', 0),
(3, 'だるまさんno', 'https://www.ehonnavi.net/ehon/17129/%E3%81%A0%E3%82%8B%E3%81%BE%E3%81%95%E3%82%93%E3%81%8C/', 'いつくが好きな本', '2023-01-05 01:39:53', 0),
(7, 'がちゃがちゃドンドン', 'https://www.fukuinkan.co.jp/book/?id=520', 'いつくがリピート', '2023-01-05 00:28:55', 0),
(11, 'test1', 'http://eee', 'aaa', '2023-01-05 02:09:49', 0),
(12, 'test2', 'http://eee', 'bbb', '2023-01-05 02:09:57', 0),
(13, 'test3', 'http://eee', 'ccc', '2023-01-05 02:10:03', 0),
(14, 'test4', 'http://eee', 'eee', '2023-01-05 02:10:11', 0),
(15, 'test5', 'http://eee', 'fff', '2023-01-05 02:10:25', 0),
(16, 'test6', 'http://eee', 'fafafa', '2023-01-05 02:10:38', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
