-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 6 月 27 日 15:08
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
  `titleLong` text NOT NULL,
  `textLong` text NOT NULL,
  `bookLong` text NOT NULL,
  `createdLong` datetime NOT NULL,
  `updatedLong` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `writeLong`
--

INSERT INTO `writeLong` (`id`, `titleLong`, `textLong`, `bookLong`, `createdLong`, `updatedLong`) VALUES
(1, '桃！！！', 'おもしろい', '桃太郎', '2024-06-25 23:11:26', '2024-06-25 23:11:26'),
(2, 'あ', '最高', '桃太郎', '2024-06-25 23:15:36', '2024-06-25 23:15:36'),
(3, '斧', 'まさかり', '金太郎', '2024-06-25 23:16:37', '2024-06-25 23:16:37'),
(4, 'テスト', 'テスト', 'test', '2024-06-27 21:45:25', '2024-06-27 21:45:25'),
(5, '竹の中に', '女の子が', '竹取物語', '2024-06-27 21:57:04', '2024-06-27 21:57:04'),
(6, '海亀が', '竜宮城に', '浦島太郎', '2024-06-27 21:59:28', '2024-06-27 21:59:28'),
(7, 'test', 'test', 'test', '2024-06-27 22:00:41', '2024-06-27 22:00:41'),
(8, '鶴が', '機織り', 'ツルの恩返し', '2024-06-27 22:02:15', '2024-06-27 22:02:15'),
(9, 'むかしむかし', '鬼退治をする', '桃太郎', '2024-06-27 22:03:41', '2024-06-27 22:03:41'),
(10, '熊と', '相撲を取る', '金太郎', '2024-06-27 22:04:46', '2024-06-27 22:04:46'),
(11, 'むかしむかし', 'どんぶらこ', '桃太郎', '2024-06-27 22:05:15', '2024-06-27 22:05:15');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
