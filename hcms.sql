-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2021 a las 16:54:38
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

use hcms;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hcms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogposts`
--

CREATE TABLE `blogposts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `comments_enabled` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `blogposts`
--

INSERT INTO `blogposts` (`id`, `title`, `slug`, `summary`, `text`, `category_id`, `comments_enabled`, `author_id`, `image`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Welcome to HorizontCMS!', 'welcome-to-horizontcms', 'Your very first post.', '<p>Blog</p>\r\n\r\n<p>&lt;html&gt;</p>\r\n\r\n<p>&lt;form action=\"/action_page.php\"&gt;<br>\r\n  &lt;label for=\"fname\"&gt;First name:&lt;/label&gt;&lt;br&gt;<br>\r\n  &lt;input type=\"text\" id=\"fname\" name=\"fname\" value=\"John\"&gt;&lt;br&gt;<br>\r\n  &lt;label for=\"lname\"&gt;Last name:&lt;/label&gt;&lt;br&gt;<br>\r\n  &lt;input type=\"text\" id=\"lname\" name=\"lname\" value=\"Doe\"&gt;&lt;br&gt;&lt;br&gt;<br>\r\n  &lt;input type=\"submit\" value=\"Submit\"&gt;<br>\r\n&lt;/form&gt; </p>\r\n\r\n<p>&lt;/html&gt;</p>\r\n\r\n<p>{[GoogleMaps]}</p>', 1, 1, 1, '', '2021-11-02 20:18:15', '2021-12-07 00:00:50', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogpost_categories`
--

CREATE TABLE `blogpost_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `blogpost_categories`
--

INSERT INTO `blogpost_categories` (`id`, `name`, `author_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'default', 1, '', '2021-11-02 20:18:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogpost_comments`
--

CREATE TABLE `blogpost_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `blogpost_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `google_maps`
--

CREATE TABLE `google_maps` (
  `id` int(10) UNSIGNED NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `header_images`
--

CREATE TABLE `header_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `header_images`
--

INSERT INTO `header_images` (`id`, `title`, `image`, `order`) VALUES
(1, 'default', 'abovethecity.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_10_12_000000_create_users_table', 1),
(2, '2016_10_12_100000_create_password_resets_table', 1),
(3, '2016_10_19_000000_create_blogposts_table', 1),
(4, '2016_10_20_000000_create_blogpost_category_table', 1),
(5, '2016_10_20_000000_create_blogpost_comment_table', 1),
(6, '2016_10_20_000000_create_header_images_table', 1),
(7, '2016_10_20_000000_create_page_table', 1),
(8, '2016_10_20_000000_create_settings_table', 1),
(9, '2016_10_20_000000_create_system_upgrade_table', 1),
(10, '2016_10_20_000000_create_user_roles_table', 1),
(11, '2016_10_20_000000_create_visits_table', 1),
(12, '2016_12_14_000000_create_plugins_table', 1),
(13, '2016_12_14_000000_create_schedules_table', 1),
(14, '2016_10_12_000000_google_maps_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `visibility` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `queue` int(11) NOT NULL,
  `language` varchar(255) NOT NULL DEFAULT 'en',
  `page` text DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `url`, `visibility`, `parent_id`, `queue`, `language`, `page`, `author_id`, `image`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Home', 'home', NULL, 1, NULL, 0, 'en', '<p>home</p>', 1, '', '2021-11-02 20:18:15', '2021-12-08 10:02:28', 1),
(2, 'Blog', 'blog', 'blog.php', 1, NULL, 1, 'en', '<p>blog</p>', 1, '', '2021-11-02 20:18:15', '2021-11-29 11:15:41', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plugins`
--

CREATE TABLE `plugins` (
  `id` int(10) UNSIGNED NOT NULL,
  `root_dir` varchar(255) NOT NULL COMMENT 'Plugin context',
  `area` int(11) DEFAULT NULL,
  `permission` int(11) DEFAULT NULL,
  `tables` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `command` varchar(255) NOT NULL,
  `arguments` varchar(255) DEFAULT NULL,
  `frequency` varchar(255) NOT NULL,
  `ping_before` varchar(255) DEFAULT NULL,
  `ping_after` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting` varchar(255) NOT NULL COMMENT 'Key',
  `value` varchar(4000) DEFAULT NULL COMMENT 'Value',
  `more` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `setting`, `value`, `more`) VALUES
(1, 'title', 'Your title', 1),
(2, 'site_name', 'Your site', 1),
(3, 'slogan', 'Your awesome slogan', 1),
(4, 'favicon', '', 1),
(5, 'scroll_text', '', 1),
(6, 'default_email', '', 1),
(7, 'contact', '', 1),
(8, 'theme', 'TheWright', 1),
(9, 'language', 'en', 1),
(10, 'date_format', 'Y.m.d H:i:s', 1),
(11, 'home_page', '1', 1),
(12, 'website_down', '0', 1),
(13, 'logo', '', 1),
(14, 'favicon', '', 1),
(15, 'admin_logo', '', 1),
(16, 'website_debug', '0', 1),
(17, 'admin_debug', '0', 1),
(18, 'admin_broadcast', '', 1),
(19, 'website_type', 'website', 1),
(20, 'blogposts_on_page', '5', 1),
(21, 'default_user_role', '2', 1),
(22, 'auto_upgrade_check', '1', 1),
(23, 'use_https', '0', 1),
(24, 'social_link_facebook', 'https://www.facebook.com/jagreen.lern', 1),
(25, 'social_link_youtube', 'https://www.youtube.com/channel/UCQs2RLwN_jLg5lWzrxsK-uw', 1),
(26, 'social_link_twitter', 'https://twitter.com/jagreenlernx', 1),
(27, 'social_link_instagram', 'https://www.instagram.com/devcodela2/', 1),
(28, 'social_link_google', NULL, 1),
(29, 'social_link_linkedin', NULL, 1),
(30, 'social_link_github', NULL, 1),
(31, 'social_link_gitlab', NULL, 1),
(32, 'social_link_spotify', NULL, 1),
(33, 'social_link_soundcloud', NULL, 1),
(34, 'social_link_steam', NULL, 1),
(35, 'social_link_reddit', NULL, 1),
(36, 'custom_css_the_wright', NULL, 1),
(37, 'custom_css_jagreen', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_upgrades`
--

CREATE TABLE `system_upgrades` (
  `id` int(10) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `importance` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `system_upgrades`
--

INSERT INTO `system_upgrades` (`id`, `version`, `nickname`, `importance`, `description`, `created_at`, `updated_at`) VALUES
(1, '1.0.0-beta.3', 'Core', 'Fresh install', 'welcome!', '2021-11-02 20:18:16', '2021-11-02 20:18:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `visits` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `slug`, `password`, `email`, `role_id`, `visits`, `image`, `remember_token`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Administrator', 'admin', 'admin', '$2y$10$ttUYIUsGuggR0kw41S7MUeBdj9aPx3RJgk/ydYMa.FRDVM129E1Cq', 'jagreenlern@gmail.com', 6, 46, NULL, NULL, '2021-11-02 20:18:16', '2021-12-09 12:45:11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `permission` int(11) DEFAULT NULL,
  `rights` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `permission`, `rights`) VALUES
(1, 'Public', 0, NULL),
(2, 'User', 1, NULL),
(3, 'Member', 2, NULL),
(4, 'Editor', 3, '[\"admin_area\",\"blogpost\",\"blogpostcategory\",\"blogpostcomment\",\"user\",\"page\",\"filemanager\",\"headerimage\",\"search\"]'),
(5, 'Manager', 4, '[\"admin_area\",\"blogpost\",\"blogpostcategory\",\"blogpostcomment\",\"user\",\"userrole\",\"page\",\"plugin\",\"filemanager\",\"headerimage\",\"search\"]'),
(6, 'Admin', 5, '[\"admin_area\",\"blogpost\",\"blogpostcategory\",\"blogpostcomment\",\"user\",\"userrole\",\"page\",\"theme\",\"plugin\",\"filemanager\",\"headerimage\",\"search\",\"settings\"]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visits`
--

CREATE TABLE `visits` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(25) NOT NULL,
  `time` varchar(255) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `host_name` varchar(255) NOT NULL,
  `client_browser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `visits`
--

INSERT INTO `visits` (`id`, `date`, `time`, `ip`, `host_name`, `client_browser`) VALUES
(1, '2021-11-02', '21:25:46', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36'),
(14, '2021-11-07', '21:17:35', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36'),
(16, '2021-11-11', '19:02:55', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36'),
(21, '2021-11-12', '14:12:16', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36'),
(36, '2021-11-13', '22:32:43', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36'),
(37, '2021-11-14', '19:50:20', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36'),
(38, '2021-11-16', '18:45:48', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36'),
(40, '2021-11-18', '20:25:58', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36'),
(47, '2021-11-19', '13:55:46', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36'),
(48, '2021-11-20', '22:06:25', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36'),
(75, '2021-11-23', '08:28:53', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36'),
(76, '2021-11-23', '21:26:35', '127.0.0.1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36'),
(79, '2021-11-24', '13:41:23', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36'),
(81, '2021-11-25', '10:54:03', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36'),
(82, '2021-11-29', '11:56:58', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36'),
(152, '2021-11-30', '10:49:11', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36'),
(156, '2021-12-04', '14:47:46', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36'),
(159, '2021-12-05', '12:12:31', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36'),
(163, '2021-12-06', '14:31:09', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36'),
(182, '2021-12-07', '00:02:41', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36'),
(229, '2021-12-08', '10:59:11', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36'),
(292, '2021-12-09', '13:45:55', '::1', 'LAPTOP-SH9B4NN1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blogposts`
--
ALTER TABLE `blogposts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `blogpost_categories`
--
ALTER TABLE `blogpost_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `blogpost_comments`
--
ALTER TABLE `blogpost_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `google_maps`
--
ALTER TABLE `google_maps`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `header_images`
--
ALTER TABLE `header_images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plugins_root_dir_unique` (`root_dir`);

--
-- Indices de la tabla `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `system_upgrades`
--
ALTER TABLE `system_upgrades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visits_date_ip_unique` (`date`,`ip`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blogposts`
--
ALTER TABLE `blogposts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `blogpost_categories`
--
ALTER TABLE `blogpost_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `blogpost_comments`
--
ALTER TABLE `blogpost_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `google_maps`
--
ALTER TABLE `google_maps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `header_images`
--
ALTER TABLE `header_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `system_upgrades`
--
ALTER TABLE `system_upgrades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
