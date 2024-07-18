-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 7 月 18 日 15:41
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `writes_proto`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `writeLong`
--

CREATE TABLE `writeLong` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `titleLong` text NOT NULL,
  `textLong` text NOT NULL,
  `bookLong` text NOT NULL,
  `createdLong` datetime NOT NULL,
  `updatedLong` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `writeLong`
--

INSERT INTO `writeLong` (`id`, `file_name`, `titleLong`, `textLong`, `bookLong`, `createdLong`, `updatedLong`) VALUES
(18, 'sukusho.png', 'momo！！！', '桃じゃない', '桃太郎', '2024-07-17 23:57:27', '2024-07-17 23:57:27'),
(19, '1681871762809.jpg', 'てすと', 'てすと', 'てすと', '2024-07-18 00:00:31', '2024-07-18 00:00:31'),
(20, 'kyouryu.png', 'Dinosaur', '恐竜復活ロマン', 'ジュラシックパーク', '2024-07-18 22:29:45', '2024-07-18 22:29:45'),
(21, 'sankaku.png', '三角錐のかたちの貝', 'おいしい', 'サンカクミナ', '2024-07-18 22:31:50', '2024-07-18 22:31:50');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `writeLong`
--
ALTER TABLE `writeLong`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `writeLong`
--
ALTER TABLE `writeLong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
