-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2025 at 11:47 AM
-- Server version: 11.8.3-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u823681742_Connecte`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(180) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `excrept` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `slug`, `excrept`, `content`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'Blog', 'blog', NULL, '<h1 id=\"️-comprendre-le-schéma--eloquent\" style=\"margin-top: 0.5rem; margin-bottom: 0.25em; font-weight: 300; line-height: 1.25; color: rgb(39, 38, 43); position: relative; font-family: system-ui, -apple-system, blinkmacsystemfont, &quot;Segoe UI&quot;, roboto, &quot;Helvetica Neue&quot;, arial, sans-serif, &quot;Segoe UI Emoji&quot;; font-size: 2.25rem !important;\">Comprendre le&nbsp;<span style=\"font-weight: bolder;\">schéma</span>&nbsp;&amp;&nbsp;<span style=\"font-weight: bolder;\">Eloquent</span></h1><p style=\"margin-bottom: 1em; color: rgb(92, 89, 98); font-family: system-ui, -apple-system, blinkmacsystemfont, &quot;Segoe UI&quot;, roboto, &quot;Helvetica Neue&quot;, arial, sans-serif, &quot;Segoe UI Emoji&quot;; font-size: 16px;\">Avant toute fonctionnalité, une application repose sur un&nbsp;<span style=\"font-weight: bolder;\">modèle de données solide</span>.<br>Cette autoformation vous apprend à&nbsp;<span style=\"font-weight: bolder;\">concevoir un schéma relationnel</span>&nbsp;(PK/FK, contraintes), à le&nbsp;<span style=\"font-weight: bolder;\">versionner avec des migrations</span>, à&nbsp;<span style=\"font-weight: bolder;\">définir les relations entre les entités</span>, à&nbsp;<span style=\"font-weight: bolder;\">générer des jeux de données</span>&nbsp;cohérents (factories/seeders), et à&nbsp;<span style=\"font-weight: bolder;\">manipuler ces données</span>&nbsp;via&nbsp;<span style=\"font-weight: bolder;\">Eloquent</span>&nbsp;(requêtes CRUD).</p><hr style=\"box-sizing: content-box; height: 1px; overflow: visible; margin-top: 2rem; margin-bottom: 2rem; padding: 0px; background-color: rgb(238, 235, 238); border-top: 0px; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; font-family: system-ui, -apple-system, blinkmacsystemfont, &quot;Segoe UI&quot;, roboto, &quot;Helvetica Neue&quot;, arial, sans-serif, &quot;Segoe UI Emoji&quot;; font-size: 16px;\"><h2 id=\"pourquoi-apprendre-ces-notions-\" style=\"margin-top: 1.5em; margin-bottom: 0.25em; font-weight: 500; line-height: 1.25; color: rgb(39, 38, 43); position: relative; font-family: system-ui, -apple-system, blinkmacsystemfont, &quot;Segoe UI&quot;, roboto, &quot;Helvetica Neue&quot;, arial, sans-serif, &quot;Segoe UI Emoji&quot;; font-size: 1.5rem !important;\"><a href=\"https://solicode-web-mobile.github.io/autoformation-mobile/schema-eloquent/#pourquoi-apprendre-ces-notions-\" class=\"anchor-heading\" aria-labelledby=\"pourquoi-apprendre-ces-notions-\" style=\"color: rgb(114, 83, 237); text-decoration: none; overflow: visible; text-overflow: ellipsis; position: absolute; right: auto; width: 1.5rem; height: 30px; padding-right: 0.25rem; padding-left: 0.25rem; left: -1.5rem;\"><svg viewBox=\"0 0 16 16\" aria-hidden=\"true\"><use xlink:href=\"#svg-link\"></use></svg></a>Pourquoi apprendre ces notions ?</h2><ul style=\"margin-top: 0.5em; padding-left: 1.5em; color: rgb(92, 89, 98); font-family: system-ui, -apple-system, blinkmacsystemfont, &quot;Segoe UI&quot;, roboto, &quot;Helvetica Neue&quot;, arial, sans-serif, &quot;Segoe UI Emoji&quot;; font-size: 16px;\"><li style=\"margin: 0.25em 0px;\"><span style=\"font-weight: bolder;\">Structurer correctement</span>&nbsp;les données : clés primaires/étrangères,&nbsp;<span style=\"font-weight: bolder;\">unicité</span>,&nbsp;<span style=\"font-weight: bolder;\">contraintes</span>.</li><li style=\"margin: 0.25em 0px;\"><span style=\"font-weight: bolder;\">Relier logiquement</span>&nbsp;les entités grâce aux&nbsp;<span style=\"font-weight: bolder;\">relations Eloquent</span>&nbsp;(1-n, n-n, pivot).</li><li style=\"margin: 0.25em 0px;\"><span style=\"font-weight: bolder;\">Automatiser la génération</span>&nbsp;de données avec des&nbsp;<span style=\"font-weight: bolder;\">seeders/factories</span>&nbsp;reproductibles.</li><li style=\"margin: 0.25em 0px;\"><span style=\"font-weight: bolder;\">Manipuler les données facilement</span>&nbsp;avec des&nbsp;<span style=\"font-weight: bolder;\">requêtes Eloquent standard</span>&nbsp;(<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: SFMono-Regular, menlo, consolas, monospace; font-size: 0.75em; line-height: 1.4; padding: 0.2em 0.15em; background-color: rgb(245, 246, 250); border-width: 1px; border-color: rgb(238, 235, 238); border-image: initial; border-radius: 4px;\">create</code>,&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: SFMono-Regular, menlo, consolas, monospace; font-size: 0.75em; line-height: 1.4; padding: 0.2em 0.15em; background-color: rgb(245, 246, 250); border-width: 1px; border-color: rgb(238, 235, 238); border-image: initial; border-radius: 4px;\">update</code>,&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: SFMono-Regular, menlo, consolas, monospace; font-size: 0.75em; line-height: 1.4; padding: 0.2em 0.15em; background-color: rgb(245, 246, 250); border-width: 1px; border-color: rgb(238, 235, 238); border-image: initial; border-radius: 4px;\">delete</code>,&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: SFMono-Regular, menlo, consolas, monospace; font-size: 0.75em; line-height: 1.4; padding: 0.2em 0.15em; background-color: rgb(245, 246, 250); border-width: 1px; border-color: rgb(238, 235, 238); border-image: initial; border-radius: 4px;\">where</code>, etc.).</li><li style=\"margin: 0.25em 0px;\"><span style=\"font-weight: bolder;\">Préparer la suite</span>&nbsp;: l’API, la pagination, les filtres et l’application mobile s’appuieront sur ces bases.</li></ul><hr style=\"box-sizing: content-box; height: 1px; overflow: visible; margin-top: 2rem; margin-bottom: 2rem; padding: 0px; background-color: rgb(238, 235, 238); border-top: 0px; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; font-family: system-ui, -apple-system, blinkmacsystemfont, &quot;Segoe UI&quot;, roboto, &quot;Helvetica Neue&quot;, arial, sans-serif, &quot;Segoe UI Emoji&quot;; font-size: 16px;\"><h2 id=\"-objectifs-de-lautoformation\" style=\"margin-top: 1.5em; margin-bottom: 0.25em; line-height: 1.25; color: rgb(39, 38, 43); position: relative; font-family: system-ui, -apple-system, blinkmacsystemfont, &quot;Segoe UI&quot;, roboto, &quot;Helvetica Neue&quot;, arial, sans-serif, &quot;Segoe UI Emoji&quot;; font-size: 1.5rem !important;\"><span style=\"font-weight: 500;\"><a href=\"https://solicode-web-mobile.github.io/autoformation-mobile/schema-eloquent/#-objectifs-de-lautoformation\" class=\"anchor-heading\" aria-labelledby=\"-objectifs-de-lautoformation\" style=\"color: rgb(114, 83, 237); text-decoration: none; overflow: visible; text-overflow: ellipsis; position: absolute; right: auto; width: 1.5rem; height: 30px; padding-right: 0.25rem; padding-left: 0.25rem; left: -1.5rem;\"><svg viewBox=\"0 0 16 16\" aria-hidden=\"true\"><use xlink:href=\"#svg-link\"></use></svg></a>🎯 </span><b>Objectifs de l’autoformation</b></h2><p style=\"margin-bottom: 1em; color: rgb(92, 89, 98); font-family: system-ui, -apple-system, blinkmacsystemfont, &quot;Segoe UI&quot;, roboto, &quot;Helvetica Neue&quot;, arial, sans-serif, &quot;Segoe UI Emoji&quot;; font-size: 16px;\">À la fin de cette unité, vous saurez :</p><ol style=\"margin-top: 0.5em; padding-left: 1.5em; counter-reset: step-counter 0; color: rgb(92, 89, 98); font-family: system-ui, -apple-system, blinkmacsystemfont, &quot;Segoe UI&quot;, roboto, &quot;Helvetica Neue&quot;, arial, sans-serif, &quot;Segoe UI Emoji&quot;; font-size: 16px;\"><li style=\"margin: 0.25em 0px; position: relative;\"><b>Modéliser</b>&nbsp;un mini-schéma (ex.&nbsp;<em>Article</em>,&nbsp;<em>Tag</em>,&nbsp;<em>User</em>) avec&nbsp;<span style=\"font-weight: bolder;\">PK/FK</span>&nbsp;et&nbsp;<span style=\"font-weight: bolder;\">contraintes</span>.</li><li style=\"margin: 0.25em 0px; position: relative;\"><b>Créer et exécuter des&nbsp;migrations&nbsp;pour structurer la base.</b></li><li style=\"margin: 0.25em 0px; position: relative;\">Déclarer les&nbsp;<span style=\"font-weight: bolder;\">relations Eloquent</span>&nbsp;entre modèles (1-n et n-n).</li><li style=\"margin: 0.25em 0px; position: relative;\">Générer des&nbsp;<span style=\"font-weight: bolder;\">jeux de données automatiques</span>&nbsp;via&nbsp;<span style=\"font-weight: bolder;\">factories</span>&nbsp;et&nbsp;<span style=\"font-weight: bolder;\">seeders</span>.</li><li style=\"margin: 0.25em 0px; position: relative;\">Exécuter des&nbsp;<span style=\"font-weight: bolder;\">requêtes CRUD</span>&nbsp;(Create, Read, Update, Delete) directement avec&nbsp;<span style=\"font-weight: bolder;\">Eloquent</span>.</li><li style=\"margin: 0.25em 0px; position: relative;\">Appliquer quelques&nbsp;<span style=\"font-weight: bolder;\">bonnes pratiques</span>&nbsp;(timestamps, soft deletes, cohérence des données).</li><li></li></ol>', 'published', '2025-11-27 10:05:09', '2025-11-27 10:05:44'),
(3, 2, 'title', 'title', NULL, '<p>hhhhhhhhhhhh</p>', 'draft', '2025-11-27 10:08:13', '2025-11-27 10:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`article_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL),
(3, 1, NULL, NULL),
(3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Technology', 'technology', '2025-11-27 09:53:50', '2025-11-27 09:53:50'),
(2, 'Programming', 'programming', '2025-11-27 09:53:50', '2025-11-27 09:53:50'),
(3, 'Web Development', 'web-development', '2025-11-27 09:53:51', '2025-11-27 09:53:51'),
(4, 'Laravel', 'laravel', '2025-11-27 09:53:51', '2025-11-27 09:53:51'),
(5, 'PHP', 'php', '2025-11-27 09:53:51', '2025-11-27 09:53:51'),
(6, 'JavaScript', 'javascript', '2025-11-27 09:53:51', '2025-11-27 09:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_17_122318_create_articles_table', 1),
(5, '2025_11_17_122334_create_tags_table', 1),
(6, '2025_11_17_122349_create_article_tag_table', 1),
(7, '2025_11_27_093719_add_status_to_articles_table', 1),
(8, '2025_11_27_093729_add_role_to_users_table', 1),
(9, '2025_11_27_093733_rename_article_tag_to_article_category_table', 1),
(10, '2025_11_27_093733_rename_tags_to_categories_table', 1),
(11, '2025_11_27_100359_rename_tag_id_to_category_id_in_article_category_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3qlRqK8H2jPUPxW658GEEsU5MAvJ4hmLaWVCfmgc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSjFqME9Wa2IwUnV6dlFFMzZCcmxySWpVR0wxSVZpNHFYVktDVkdmbyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcnRpY2xlcyI7czo1OiJyb3V0ZSI7czoxNDoiYXJ0aWNsZXMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1764243940);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', 'user', '2025-11-27 09:53:49', '$2y$12$dLKIVuRUPllee1iycvH6sePDNckaqudGoKjcRB4CLdbtxevP9R0mu', '1mmzo4vsv9', '2025-11-27 09:53:50', '2025-11-27 09:53:50'),
(2, 'Admin User', 'admin@example.com', 'admin', NULL, '$2y$12$NsuhuInPLXyK1pEIHOzNLOKCNZXiI6x.U3vQ0By6mxSlCwSVlUtZu', NULL, '2025-11-27 09:53:50', '2025-11-27 09:53:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_user_id_foreign` (`user_id`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`article_id`,`category_id`),
  ADD KEY `article_tag_tag_id_foreign` (`category_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article_category`
--
ALTER TABLE `article_category`
  ADD CONSTRAINT `article_tag_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_tag_tag_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
