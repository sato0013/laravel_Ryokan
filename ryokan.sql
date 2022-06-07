-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-06-07 16:45:44
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `ryokan`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `user_id` int(32) DEFAULT NULL,
  `name_id` int(32) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `goods`
--

INSERT INTO `goods` (`id`, `user_id`, `name_id`, `created_at`, `updated_at`) VALUES
(16, 3, 6, '2022-06-06 18:01:08', '2022-06-06 18:01:08'),
(45, 4, 7, '2022-06-07 19:30:23', '2022-06-07 19:30:23'),
(52, 4, 6, '2022-06-07 22:32:51', '2022-06-07 22:32:51');

-- --------------------------------------------------------

--
-- テーブルの構造 `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(32) DEFAULT NULL,
  `name_id` int(32) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `name_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 'いい宿です', '2022-06-03 16:24:11', '2022-06-03 16:25:59'),
(6, 3, 4, 'ええええ', '2022-06-03 19:30:23', '2022-06-03 19:30:23'),
(7, 3, 4, 'ｈｈ', '2022-06-03 20:28:47', '2022-06-03 20:28:47'),
(8, 3, 5, 'ｄｄｄ', '2022-06-03 20:29:42', '2022-06-03 20:29:42'),
(9, 4, 4, 'eee', '2022-06-03 20:31:03', '2022-06-03 20:31:03'),
(10, 4, 4, 'fsf', '2022-06-05 20:39:47', '2022-06-05 20:39:47'),
(11, 4, 6, 'あああ', '2022-06-06 01:57:28', '2022-06-06 01:57:28');

-- --------------------------------------------------------

--
-- テーブルの構造 `ryokans`
--

CREATE TABLE `ryokans` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `prefectures` varchar(128) DEFAULT NULL COMMENT '都道府県',
  `name` varchar(32) DEFAULT NULL COMMENT '旅館の名称',
  `description` varchar(255) DEFAULT NULL COMMENT '概要',
  `introduction` varchar(512) DEFAULT NULL COMMENT '紹介文',
  `access` varchar(255) DEFAULT NULL COMMENT 'アクセス',
  `image` varchar(255) DEFAULT NULL COMMENT '旅館の写真',
  `up_file1` varchar(255) NOT NULL COMMENT 'イメージ画像',
  `up_file2` varchar(255) NOT NULL COMMENT 'イメージ画像',
  `up_file3` varchar(255) NOT NULL COMMENT 'イメージ画像',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `ryokans`
--

INSERT INTO `ryokans` (`id`, `prefectures`, `name`, `description`, `introduction`, `access`, `image`, `up_file1`, `up_file2`, `up_file3`, `created_at`, `updated_at`) VALUES
(6, '福岡県', '二日市温泉　大丸別荘', 'テスト', 'テスト', 'テスト', 'hutukaithi.jpg', 'hutukaithi2.jpg', 'hutukaithi3.jpg', 'hutukaithi4.jpg', '2022-06-06 01:49:55', '2022-06-06 01:49:55'),
(7, '福岡県', '別府温泉', 'テスト', 'テスト', 'テスト', 'ryokan1.jpg', 'ryokan2.jpg', 'ryokan3.jpg', 'ryokan4.jpg', '2022-06-06 18:16:02', '2022-06-06 18:16:02');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(32) DEFAULT NULL COMMENT '名前',
  `email` varchar(32) DEFAULT NULL COMMENT 'メールアドレス',
  `password` varchar(128) DEFAULT NULL COMMENT 'パスワード',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT '更新日時',
  `role` int(32) NOT NULL DEFAULT 0 COMMENT 'ロール'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `role`) VALUES
(3, '佐藤', 'sa@co.jp', '$2y$10$MKPE5kySOF/gfXOXu3S6l.uLsxbSWJSZmcU.jdQnAcMtUVptTi1Cu', '2022-06-03 16:11:15', '2022-06-03 16:11:15', 0),
(4, 'テスト', 'test@co.jp', '$2y$10$ffNr/dAlDRhp2Vzcp67gFeClB7qktYMvhAJgQdAAopFF/LjFufoPK', '2022-06-03 20:30:25', '2022-06-03 20:30:25', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `ryokans`
--
ALTER TABLE `ryokans`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- テーブルの AUTO_INCREMENT `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `ryokans`
--
ALTER TABLE `ryokans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
