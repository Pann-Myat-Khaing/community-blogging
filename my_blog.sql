-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2023 at 11:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `slug`, `name`, `image`, `description`, `user_id`, `category_id`) VALUES
(1, 'reactjs', 'First step to React Js ', 'assets/article/1.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing\n                                                                elit. Sit quaerat facilis at quidem natus deleniti\n                                                                consequatur fuga quo repellat, tenetur ipsam, voluptatum\n                                                                aliquam alias nostrum a recusandae eaque maxime cum?\n                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.\n                                                                At, iusto vel deleniti provident tenetur laborum enim\n                                                                fuga doloribus veniam optio numquam sunt quae. Quae ad\n                                                                distinctio, voluptatem ex facilis placeat.\n                                                                Lorem ipsum dolor sit amet, consectetur adipisicing\n                                                                elit. Sit quaerat facilis at quidem natus deleniti\n                                                                consequatur fuga quo repellat, tenetur ipsam, voluptatum\n                                                                aliquam alias nostrum a recusandae eaque maxime cum?\n                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.\n                                                                At, iusto vel deleniti provident tenetur laborum enim\n                                                                fuga doloribus veniam optio numquam sunt quae. Quae ad\n                                                                distinctio, voluptatem ex facilis placeat.', 1, 2),
(2, 'uiux', 'User Interface', 'assets/article/1.jpeg', 'desc', 2, 1),
(3, 'ux', 'Introduction to User Experience Design', 'assets/article/2.jpg', 'lorem text here', 1, 1),
(4, 'graphic-design', 'Color Theory', 'assets/article/photo_2022-10-13 09.11.04.jpeg', 'Color Theory blah blah . Lorem ipsum dolor sit amet, consectetur adipisicing\n                                                                elit. Sit quaerat facilis at quidem natus deleniti\n                                                                consequatur fuga quo repellat, tenetur ipsam, voluptatum\n                                                                aliquam alias nostrum a recusandae eaque maxime cum?\n                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.\n                                                                At, iusto vel deleniti provident tenetur laborum enim\n                                                                fuga doloribus veniam optio numquam sunt quae. Quae ad\n                                                                distinctio, voluptatem ex facilis placeat.\n                                                                Lorem ipsum dolor sit amet, consectetur adipisicing\n                                                                elit. Sit quaerat facilis at quidem natus deleniti\n                                                                consequatur fuga quo repellat, tenetur ipsam, voluptatum\n                                                                aliquam alias nostrum a recusandae eaque maxime cum?\n                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.\n                                                                At, iusto vel deleniti provident tenetur laborum enim\n                                                                fuga doloribus veniam optio numquam sunt quae. Quae ad\n                                                                distinctio, voluptatem ex facilis placeat.', 3, 3),
(5, 'next js', 'Revolution of js', 'assets/article/2.jpg', 'Js blah blah . Lorem ipsum dolor sit amet, consectetur adipisicing\n                                                                elit. Sit quaerat facilis at quidem natus deleniti\n                                                                consequatur fuga quo repellat, tenetur ipsam, voluptatum\n                                                                aliquam alias nostrum a recusandae eaque maxime cum?\n                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.\n                                                                At, iusto vel deleniti provident tenetur laborum enim\n                                                                fuga doloribus veniam optio numquam sunt quae. Quae ad\n                                                                distinctio, voluptatem ex facilis placeat.\n                                                                Lorem ipsum dolor sit amet, consectetur adipisicing\n                                                                elit. Sit quaerat facilis at quidem natus deleniti\n                                                                consequatur fuga quo repellat, tenetur ipsam, voluptatum\n                                                                aliquam alias nostrum a recusandae eaque maxime cum?\n                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.\n                                                                At, iusto vel deleniti provident tenetur laborum enim\n                                                                fuga doloribus veniam optio numquam sunt quae. Quae ad\n                                                                distinctio, voluptatem ex facilis placeat.', 3, 2),
(6, 'ui-ux', 'Design Thinking Practice', 'assets/article/maldives.jpg', 'Design thinking is a non-linear, iterative process that teams use to understand users, challenge assumptions, redefine problems and create innovative solutions to prototype and test. Involving five phases—Empathize, Define, Ideate, Prototype and Test—it is most useful to tackle problems that are ill-defined or unknown.', 1, 1),
(7, 'what-is-php?-1679400303', 'What is PHP?', 'assets/article/2.jpg', 'Some Description Here . . . ', 2, 2),
(13, 'zero-to-hero-web-development-1679400576', 'Zero to Hero Web Development', 'assets/article/2.jpg', 'Some heee', 2, 2),
(14, 'new-to-ui-ux-1679400864', 'New to Ui UX', 'assets/article/maldives.jpg', 'sdfasdgasgasgasg', 2, 1),
(15, 'hello-1679400951', 'Hello', 'assets/article/photo_2022-10-13 09.11.04.jpeg', 'dsfasdfasf', 2, 2),
(16, 'hello-1679400984', 'Hello', 'assets/article/2.jpg', 'dsfasdfasf', 2, 2),
(17, 'hello-1679401011', 'Hello', 'assets/article/2.jpg', 'dsfasdfasf', 2, 2),
(18, 'hello-1679401054', 'Hello', 'assets/article/maldives.jpg', 'dsfasdfasf', 2, 2),
(19, 'hello-1679401079', 'Hello', 'assets/article/maldives.jpg', 'dsfasdfasf', 2, 2),
(20, 'hey-1679401122', 'Hey', 'assets/article/2.jpg', 'asdfsafsfsf', 2, 2),
(21, 'empathy-mapping-1679401195', 'Empathy mapping', 'assets/article/2.jpg', 'sadfsafsf', 2, 1),
(22, 'typography-1679401242', 'Typography', 'assets/article/1.jpeg', 'fsadsfsf', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `article_comment`
--

CREATE TABLE `article_comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_comment`
--

INSERT INTO `article_comment` (`id`, `user_id`, `article_id`, `comment`) VALUES
(86, 2, 5, 'hello'),
(87, 2, 5, 'Nyoki'),
(88, 2, 5, 'hello'),
(89, 2, 5, 'Hi'),
(90, 2, 5, 'Broooo'),
(91, 4, 4, 'Broskii'),
(92, 4, 4, 'Nice Bro'),
(93, 2, 3, 'Nice Article'),
(94, 2, 13, 'Dude'),
(95, 2, 22, 'Good'),
(96, 2, 21, 'Brooo'),
(97, 3, 2, 'Nice Article'),
(98, 3, 21, 'Nice Article');

-- --------------------------------------------------------

--
-- Table structure for table `article_language`
--

CREATE TABLE `article_language` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_language`
--

INSERT INTO `article_language` (`id`, `article_id`, `language_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 2, 3),
(5, 3, 1),
(6, 3, 2),
(7, 4, 2),
(8, 5, 1),
(9, 10, 1),
(10, 11, 1),
(11, 12, 1),
(12, 13, 1),
(13, 14, 1),
(14, 18, 1),
(15, 18, 2),
(16, 18, 3),
(20, 20, 1),
(21, 20, 2),
(22, 20, 3),
(23, 21, 1),
(24, 21, 2),
(25, 21, 3),
(26, 22, 2),
(27, 22, 3);

-- --------------------------------------------------------

--
-- Table structure for table `article_like`
--

CREATE TABLE `article_like` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_like`
--

INSERT INTO `article_like` (`id`, `user_id`, `article_id`) VALUES
(46, 2, 3),
(47, 2, 1),
(49, 2, 5),
(50, 2, 6),
(53, 2, 4),
(55, 2, 22),
(58, 3, 2),
(59, 3, 3),
(61, 3, 21);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `name`) VALUES
(1, 'web-design', 'web design'),
(2, 'web-dev', 'web development'),
(3, 'graphic-design', 'graphic design');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `slug`, `name`) VALUES
(1, 'javascript', 'Javascript'),
(2, 'php', 'PHP'),
(3, 'python', 'python');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `slug`, `name`, `email`, `password`, `image`) VALUES
(1, 'aung-aung-303', 'Aung Aung', 'aungaung@gmail.com', '$2y$10$BzFa0JQFjBuqwGTU/6Kpf.w/ntN.VtYxRUZjP/B5uVgolPUCiO9VS', 'assets/user/3.jpg'),
(2, 'gary-yam-1679562690', 'Gary Yam', 'garyyam.programmer@gmail.com', '$2y$10$rIKxaWaPJSyXRSWA3je0suSYttQ1DH/Ui802bsATkJejBI8C3pm1e', 'assets/user/4.jpeg'),
(3, 'pan-pan-1679564612', 'Pan Pan', 'pmk@gmail.com', '$2y$10$MVDg2UpRfFYYdRrevTQkJeNwwOSNmBXlsr0zOQ0upo9TafkYrvAAa', 'assets/user/1.jpg'),
(4, 'wai-yan-1010', 'Wai Yan', 'waiyan@gmail.com', '$2y$10$hExEc/iWBg0mRo8EYLGqquDCY0W3iaFZP0hDPVPwTuURCRRaer3ii', 'assets/user/3.jpg'),
(5, 'mookie-khin-1679411105', 'Mookie khin', 'mookie@gmail.com', '$2y$10$M.ASEkAapGhqosghw5G7MePUeQ6lGMEgTVv2oUAgdThIbZSTz4GCq', 'assets/user/2.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_comment`
--
ALTER TABLE `article_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_language`
--
ALTER TABLE `article_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_like`
--
ALTER TABLE `article_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `article_comment`
--
ALTER TABLE `article_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `article_language`
--
ALTER TABLE `article_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `article_like`
--
ALTER TABLE `article_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
