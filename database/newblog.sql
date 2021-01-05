-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 07:03 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `added_by`, `updated_by`) VALUES
(2, 'news', 'news', '2020-12-28 02:24:01', '2020-12-28 02:24:01', 1, NULL),
(3, 'sports', 'sports', '2020-12-28 02:24:52', '2020-12-28 02:24:52', 1, NULL),
(4, 'Movies', 'Movies', '2020-12-29 02:52:15', '2020-12-29 02:52:15', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_posts`
--

CREATE TABLE `category_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_posts`
--

INSERT INTO `category_posts` (`id`, `post_id`, `category_id`, `created_at`, `updated_at`, `added_by`) VALUES
(2, 36, 4, '2020-12-29 05:20:37', '2020-12-29 05:20:37', NULL),
(3, 37, 3, '2020-12-29 23:18:11', '2020-12-29 23:18:11', NULL),
(4, 38, 4, '2020-12-29 23:20:29', '2020-12-29 23:20:29', NULL),
(5, 39, 2, '2020-12-29 23:21:48', '2020-12-29 23:21:48', NULL),
(6, 40, 4, '2020-12-29 23:48:11', '2020-12-29 23:48:11', NULL),
(7, 41, 3, '2020-12-29 23:50:55', '2020-12-29 23:50:55', NULL),
(8, 42, 4, '2020-12-31 07:51:16', '2020-12-31 07:51:16', NULL),
(9, 43, 3, '2021-01-04 00:48:49', '2021-01-04 00:48:49', NULL),
(10, 44, 2, '2021-01-04 00:50:16', '2021-01-04 00:50:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `msg` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `subject`, `msg`, `created_at`, `updated_at`) VALUES
(2, 'john cena', 'maheshracharla7@gmail.com', 9657379318, 'Trying to send mail', 'Laravel makes connecting with databases and running queries extremely simple. The database configuration file is config/database.php. In this file you may define all of your database connections, as well as specify which connection should be used by default. Examples for all of the supported database systems are provided in this file.\r\n\r\nCurrently Laravel supports four database systems: MySQL, Postgres, SQLite, and SQL Server.', '2020-12-30 01:58:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `excel`
--

CREATE TABLE `excel` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` varchar(5) NOT NULL,
  `city` varchar(50) NOT NULL,
  `salary` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `excel`
--

INSERT INTO `excel` (`id`, `name`, `age`, `city`, `salary`, `created_at`, `updated_at`) VALUES
(1, 'Edward', '65', 'Viersel', 'dui nec urn', '2020-07-22 05:33:07', NULL),
(2, 'Wing', '38', 'Paiguano', 'Aliquam gra', '2021-11-03 22:37:48', NULL),
(3, 'Keegan', '39', 'Sinaai-Waas', 'urna. Ut ti', '2021-03-03 00:16:43', NULL),
(4, 'Aidan', '45', 'Rionero in Vulture', 'fringilla e', '2020-08-28 02:33:21', NULL),
(5, 'Caesar', '40', 'Daknam', 'ante', '2021-04-18 03:20:58', NULL),
(6, 'Raymond', '63', 'Bruderheim', 'facilisis, ', '2021-07-31 17:06:50', NULL),
(7, 'Brian', '62', 'Lake Cowichan', 'faucibus or', '2021-07-14 09:50:44', NULL),
(8, 'Craig', '47', 'Monghidoro', 'elit, phare', '2020-10-17 02:31:47', NULL),
(9, 'Lucius', '28', 'Lier', 'Sed et libe', '2020-08-01 06:33:40', NULL),
(10, 'Nathan', '41', 'Campofelice di Fitalia', 'pharetra se', '2021-07-27 07:14:44', NULL),
(11, 'Calvin', '55', 'Incourt', 'sit amet', '2020-04-15 22:32:16', NULL),
(12, 'Howard', '68', 'Retie', 'nunc sed li', '2021-12-09 12:02:32', NULL),
(13, 'Clarke', '47', 'Bras', 'eleifend ne', '2020-06-24 04:04:07', NULL),
(14, 'Michael', '26', 'Belsele', 'purus. Duis', '2020-08-11 05:01:10', NULL),
(15, 'Timothy', '29', 'Surendranagar', 'eu sem. Pel', '2021-01-17 14:58:13', NULL),
(16, 'Bert', '44', 'Norman Wells', 'cursus et, ', '2020-04-06 01:25:25', NULL),
(17, 'Cairo', '56', 'Putre', 'nisi. Aenea', '2020-01-23 02:57:29', NULL),
(18, 'Cyrus', '26', 'Angoulême', 'sollicitudi', '2021-07-07 09:01:39', NULL),
(19, 'Tanek', '28', 'Reims', 'Integer urn', '2021-05-09 23:01:53', NULL),
(20, 'Derek', '67', 'Calgary', 'mauris blan', '2020-08-24 03:42:25', NULL),
(21, 'Baker', '35', 'Mapiripana', 'commodo at,', '2021-11-02 02:56:10', NULL),
(22, 'Salvador', '66', 'Prince Albert', 'nec urna et', '2020-08-25 18:31:25', NULL),
(23, 'Rigel', '50', 'Piegaro', 'ullamcorper', '2020-11-05 16:10:50', NULL),
(24, 'Ezra', '33', 'Paradise', 'Praesent eu', '2021-03-17 06:50:42', NULL),
(25, 'Odysseus', '63', 'Lloydminster', 'ultrices, m', '2021-12-26 19:55:44', NULL),
(26, 'Russell', '45', 'Mohmand Agency', 'sit amet nu', '2021-07-24 07:18:42', NULL),
(27, 'Marsden', '62', 'Rhisnes', 'magna. Sed', '2020-08-24 23:36:44', NULL),
(28, 'Donovan', '51', 'Villata', 'tempor arcu', '2020-07-04 02:27:31', NULL),
(29, 'Holmes', '32', 'Zeist', 'mi eleifend', '2021-07-15 01:18:28', NULL),
(30, 'Jerome', '27', 'Shaftesbury', 'lorem, vehi', '2021-04-29 02:30:03', NULL),
(31, 'Jeremy', '26', 'Saint-Dizier', 'turpis vita', '2020-02-27 05:51:14', NULL),
(32, 'Graiden', '29', 'Mumbai', 'quis accums', '2021-02-18 02:44:49', NULL),
(33, 'Logan', '31', 'Salamanca', 'In', '2020-03-27 13:58:13', NULL),
(34, 'Keefe', '37', 'Ingolstadt', 'lacus pede ', '2020-03-01 13:48:50', NULL),
(35, 'Rajah', '28', 'Cargovil', 'Fusce feugi', '2020-01-21 07:02:20', NULL),
(36, 'Henry', '70', 'Millet', 'est, congue', '2021-10-08 01:59:58', NULL),
(37, 'Otto', '41', 'Cap-de-la-Madeleine', 'Donec egest', '2021-05-16 16:20:03', NULL),
(38, 'Roth', '34', 'Vottem', 'purus. Duis', '2021-03-21 14:42:51', NULL),
(39, 'William', '42', 'Valleyview', 'sociis nato', '2021-08-13 17:49:16', NULL),
(40, 'Calvin', '56', 'Lamorteau', 'tincidunt p', '2020-06-13 10:25:49', NULL),
(41, 'Neil', '47', 'Ulm', 'rutrum magn', '2020-07-03 22:02:23', NULL),
(42, 'Zachary', '26', 'Gorbea', 'egestas a, ', '2021-09-11 08:25:38', NULL),
(43, 'Steel', '47', 'Diksmuide', 'in molestie', '2021-03-21 18:11:26', NULL),
(44, 'Salvador', '44', 'Mattersburg', 'mauris ut m', '2021-01-03 23:35:13', NULL),
(45, 'Ian', '35', 'Barbania', 'lectus pede', '2021-11-07 11:46:10', NULL),
(46, 'Vaughan', '56', 'Laon', 'semper auct', '2020-06-30 22:07:27', NULL),
(47, 'Malik', '42', 'Quilpué', 'fringilla o', '2021-01-26 07:13:37', NULL),
(48, 'Brent', '29', 'Yahyalı', 'vitae', '2021-05-17 13:34:03', NULL),
(49, 'Andrew', '68', 'Senneville', 'sagittis au', '2021-06-10 02:51:08', NULL),
(50, 'Derek', '34', 'Airdrie', 'neque', '2020-12-28 19:03:43', NULL),
(51, 'Zane', '35', 'Brin-Navolok', 'ultricies l', '2020-07-01 16:48:03', NULL),
(52, 'Lucius', '25', 'Stevenage', 'purus, in m', '2021-02-23 07:43:44', NULL),
(53, 'Hall', '63', 'Gelsenkirchen', 'tempus eu, ', '2021-05-01 23:37:35', NULL),
(54, 'Avram', '55', 'Philadelphia', 'mi lorem, v', '2020-11-09 22:33:32', NULL),
(55, 'Mohammad', '48', 'Banjar', 'lobortis,', '2020-05-12 04:08:21', NULL),
(56, 'Wallace', '48', 'Juazeiro do Norte', 'Phasellus o', '2020-10-09 11:03:00', NULL),
(57, 'Keith', '32', 'Ferlach', 'nulla magna', '2021-11-24 19:29:12', NULL),
(58, 'Adam', '30', 'Florianópolis', 'risus a ult', '2021-08-24 11:34:37', NULL),
(59, 'Kane', '27', 'Kashira', 'tincidunt d', '2021-05-20 04:35:39', NULL),
(60, 'Demetrius', '42', 'Plancenoit', 'Phasellus o', '2021-11-29 16:04:19', NULL),
(61, 'Erasmus', '61', 'Santipur', 'cursus puru', '2021-06-11 05:01:16', NULL),
(62, 'Wayne', '38', 'Aalst', 'justo sit a', '2021-03-10 05:20:48', NULL),
(63, 'Lucian', '31', 'Chiny', 'sed', '2020-03-13 20:17:49', NULL),
(64, 'Elton', '30', 'Lutsel K\'e', 'lectus quis', '2020-10-22 00:03:48', NULL),
(65, 'Nigel', '40', 'Águas Lindas de Goiás', 'massa non a', '2021-02-09 17:39:52', NULL),
(66, 'Abel', '43', 'Balikpapan', 'magna. Sed ', '2020-01-26 15:37:21', NULL),
(67, 'Bruce', '48', 'Millet', 'Proin sed t', '2021-10-09 08:16:52', NULL),
(68, 'Ezekiel', '44', 'Thames', 'pellentesqu', '2020-11-23 10:25:15', NULL),
(69, 'Curran', '44', 'Veracruz', 'vel lectus.', '2020-10-30 22:05:24', NULL),
(70, 'Chase', '64', 'Bolzano/Bozen', 'Curae;', '2021-06-17 02:43:19', NULL),
(71, 'Jordan', '37', 'Gembloux', 'ultrices a,', '2021-05-09 11:06:14', NULL),
(72, 'Louis', '38', 'Gojal Upper Hunza', 'Etiam imper', '2020-10-26 23:37:33', NULL),
(73, 'Walker', '29', 'Amiens', 'lobortis au', '2020-10-02 09:13:44', NULL),
(74, 'Jerry', '25', 'Masterton', 'dictum mi, ', '2020-08-28 05:21:00', NULL),
(75, 'Jamal', '28', 'Lossiemouth', 'sagittis se', '2021-08-02 15:46:47', NULL),
(76, 'Alexander', '59', 'Pöttsching', 'ullamcorper', '2021-08-26 13:26:47', NULL),
(77, 'Chester', '39', 'Annapolis County', 'magna. Nam ', '2021-07-29 06:53:37', NULL),
(78, 'Brennan', '59', 'Vanier', 'nisi magna', '2021-11-29 00:00:13', NULL),
(79, 'Alan', '43', 'Rocca Massima', 'dictum mi, ', '2020-12-31 20:42:48', NULL),
(80, 'Ethan', '58', 'San Vito al Tagliamento', 'purus, in m', '2020-06-03 13:44:16', NULL),
(81, 'Kirk', '32', 'LaSalle', 'mi lacinia', '2020-05-25 00:38:52', NULL),
(82, 'Chester', '64', 'Bolinne', 'mauris eu e', '2020-05-11 10:13:09', NULL),
(83, 'Xavier', '38', 'Ukkel', 'Nunc pulvin', '2021-02-03 14:36:10', NULL),
(84, 'Perry', '44', 'Campofelice di Fitalia', 'blandit at,', '2020-12-14 00:33:09', NULL),
(85, 'Alden', '45', 'Cochrane', 'in magna. P', '2021-04-23 03:15:31', NULL),
(86, 'Edward', '64', 'Tambov', 'auctor odio', '2021-10-25 19:41:06', NULL),
(87, 'Hector', '32', 'Bocchigliero', 'rutrum eu, ', '2020-04-28 12:21:41', NULL),
(88, 'Cade', '55', 'Birecik', 'montes, nas', '2020-12-08 15:18:46', NULL),
(89, 'Marsden', '52', 'Dingwall', 'euismod in,', '2020-05-19 06:10:22', NULL),
(90, 'Allen', '56', 'Rimbey', 'ac urna. Ut', '2021-11-11 01:49:30', NULL),
(91, 'Asher', '70', 'Geest-GŽrompont-Petit-RosiŽre', 'Aliquam adi', '2020-08-30 08:07:20', NULL),
(92, 'Colin', '37', 'Fogo', 'Cras sed', '2021-01-19 06:59:49', NULL),
(93, 'Neil', '59', 'Devizes', 'non, egesta', '2020-08-31 18:42:54', NULL),
(94, 'Kasper', '67', 'Rewa', 'quis lectus', '2021-08-16 12:29:35', NULL),
(95, 'Jameson', '65', 'Zeya', 'ante, iacul', '2021-03-22 22:45:36', NULL),
(96, 'Tyrone', '27', 'Córdoba', 'mollis dui,', '2021-04-06 10:30:37', NULL),
(97, 'Nash', '48', 'Funtua', 'elit fermen', '2020-09-22 00:33:44', NULL),
(98, 'Emery', '65', 'Anderlues', 'a mi fringi', '2021-08-29 16:44:34', NULL),
(99, 'Fritz', '44', 'Kinross', 'eu enim. Et', '2020-12-29 22:58:13', NULL),
(100, 'Scott', '35', 'Beaumont', 'ipsum. Cura', '2020-02-28 04:24:09', NULL),
(101, 'Ram', '1', 'Viersel', 'dui nec urn', '2020-07-22 05:33:00', NULL),
(102, 'KK', '1', 'Paiguano', 'Aliquam gra', '2021-11-03 22:37:00', NULL),
(103, 'Karena', '1', 'Sinaai-Waas', 'urna. Ut ti', '2021-03-03 00:16:00', NULL),
(104, 'Prabhas', '1', 'Rionero in Vulture', 'fringilla e', '2020-08-28 02:33:00', NULL),
(105, 'Tiger', '1', 'Daknam', 'ante', '2021-04-18 03:20:00', NULL),
(106, 'Nitin', '1', 'Bruderheim', 'facilisis, ', '2021-07-31 17:06:00', NULL),
(107, 'Rana', '1', 'Lake Cowichan', 'faucibus or', '2021-07-14 09:50:00', NULL),
(108, 'Tarun', '1', 'Monghidoro', 'elit, phare', '2020-10-17 02:31:00', NULL),
(109, 'Sharath', '1', 'Lier', 'Sed et libe', '2020-08-01 06:33:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `post_id`, `image_path`, `added_by`, `created_at`, `updated_at`) VALUES
(9, '36', '936353444.jpg', 1, '2020-12-29 05:20:37', '2020-12-29 05:20:37'),
(10, '37', '894270997.jpg', 1, '2020-12-29 23:18:11', '2020-12-29 23:18:11'),
(11, '38', '1202454579.jpg', 1, '2020-12-29 23:20:29', '2020-12-29 23:20:29'),
(12, '39', '459233250.jpg', 1, '2020-12-29 23:21:48', '2020-12-29 23:21:48'),
(13, '40', '1897082344.jpg', 5, '2020-12-29 23:48:11', '2020-12-29 23:48:11'),
(14, '41', '879717633.jpg', 5, '2020-12-29 23:50:55', '2020-12-29 23:50:55'),
(15, '42', '1121631592.jpg', 1, '2020-12-31 07:51:16', '2020-12-31 07:51:16'),
(16, '43', '900360593.jpg', 1, '2021-01-04 00:48:49', '2021-01-04 00:48:49'),
(17, '44', '870093721.jpg', 1, '2021-01-04 00:50:16', '2021-01-04 00:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_12_26_080108_create_posts_table', 1),
(4, '2020_12_26_080537_create_tags_table', 1),
(5, '2020_12_26_080634_create_categories_table', 1),
(6, '2020_12_26_080733_create_category_posts_table', 1),
(7, '2020_12_26_080924_create_post_tags_table', 1),
(8, '2020_12_26_081139_create_admins_table', 1),
(9, '2020_12_26_081458_create_roles_table', 1),
(10, '2020_12_26_081606_create_admin_roles_table', 1),
(11, '2020_12_28_051507_create_admin_logins_table', 2),
(12, '2020_12_28_051725_create_users2_table', 2),
(13, '2020_12_28_082305_create_images_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `likes` int(11) DEFAULT NULL,
  `dislikes` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `subtitle`, `slug`, `body`, `status`, `posted_by`, `likes`, `dislikes`, `created_at`, `updated_at`) VALUES
(36, 'test 1 admin', 'sub title test 1', 'slug test1', '<p>mass</p>', 1, 1, NULL, NULL, '2020-12-29 05:20:37', NULL),
(37, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy', 'What is Lorem Ipsum?', '<p>\r\n\r\ntext of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n<br></p>', 1, 1, NULL, NULL, '2020-12-29 23:18:11', NULL),
(38, 'Why do we use it?', 'It is a long established fact that a reader', 'Why do we use it?', '<p>\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n<br></p>', 1, 1, NULL, NULL, '2020-12-29 23:20:29', NULL),
(39, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', 'Where does it come', '<p>\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\n<br></p>', 1, 1, NULL, NULL, NULL, '2020-12-29 23:22:09'),
(40, 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available,', 'Where can I get some', '<p>\r\n\r\nut the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n<br></p><p><img alt=\"\" src=\"https://www.google.com/url?sa=i&amp;url=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2Fimg&amp;psig=AOvVaw2Xn2tkheg9-mcan-fLHngg&amp;ust=1609391828534000&amp;source=images&amp;cd=vfe&amp;ved=0CAIQjRxqFwoTCPCxw4T69O0CFQAAAAAdAAAAABAD\"><br></p>', 1, 5, NULL, NULL, '2020-12-29 23:48:11', NULL),
(41, 'The standard Lorem Ipsum passage, used since the 1500s', '\"Lorem ipsum dolor sit amet, consectetur adipiscing eli, sed do eiusmod', 'The standard Lorem Ipsum passage, used since the 1500s', '<p>\r\n\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n\r\n<br></p>', 1, 5, NULL, NULL, '2020-12-29 23:50:54', NULL),
(42, 'testing news 1', 'testing news 1', 'testing news 1', '<p>hfkjghfkgh djhkd</p>', 1, 1, NULL, NULL, '2020-12-31 07:51:16', NULL),
(43, 'Ndsds', 'test sds', 'dcd', '<p>asas</p>', 1, 1, NULL, NULL, '2021-01-04 00:48:49', NULL),
(44, 'new abcd', 'xyz', 'abcd', '<p>testing</p>', 1, 1, NULL, NULL, NULL, '2021-01-04 00:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-12-26 05:37:19', NULL),
(2, 'User', '2020-12-26 05:37:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`, `added_by`, `updated_by`) VALUES
(2, 'mobiles', 'mobiles', '2020-12-28 02:37:49', '2020-12-28 02:37:49', 1, NULL),
(3, 'electro', 'electro', '2020-12-28 02:37:58', '2020-12-28 02:37:58', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `post` tinyint(1) NOT NULL DEFAULT 0,
  `category` tinyint(1) NOT NULL DEFAULT 0,
  `tag` tinyint(1) NOT NULL DEFAULT 0,
  `users` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`id`, `username`, `email`, `email_verified_at`, `password`, `role`, `status`, `created_at`, `updated_at`, `added_by`, `post`, `category`, `tag`, `users`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, 'roaH3a5VEAXGA', 1, 1, '2020-12-26 05:35:48', NULL, 1, 1, 1, 1, 1),
(4, 'nandu', 'nandu@gmail.com', NULL, 'roNJMEIcMPy4.', 2, 1, '2020-12-29 05:19:38', NULL, 1, 1, 0, 0, 0),
(5, 'kiran', 'kk@gmail.com', NULL, 'roXyrPyqv9wE2', 2, 1, '2020-12-29 05:32:49', NULL, 1, 1, 0, 0, 1),
(6, 'test1', 'test1@gmail.com', NULL, 'rodi.1q7UIqLc', 2, 1, '2020-12-31 07:53:37', NULL, 1, 1, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_posts`
--
ALTER TABLE `category_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excel`
--
ALTER TABLE `excel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users2_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_posts`
--
ALTER TABLE `category_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `excel`
--
ALTER TABLE `excel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
