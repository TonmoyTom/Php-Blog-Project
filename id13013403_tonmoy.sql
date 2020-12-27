-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 27, 2020 at 01:16 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13013403_tonmoy`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `name`, `status`) VALUES
(1, 'PHP', 1),
(2, 'JAVASCRIPT', 1),
(3, 'HTML', 1),
(4, 'RUBY', 1),
(5, 'REACT', 1),
(6, 'PHYTON', 1),
(14, 'MOBILEs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT -1,
  `name` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `submit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `parent_id`, `name`, `content`, `submit_date`) VALUES
(1, 1, -1, 'John Doe', 'Thank you for taking the time to write this article, I really enjoyed reading it!\r\n\r\nThank you, David!', '2020-07-22 08:35:15'),
(2, 1, 11, 'David Adams', 'It\'s good to hear that you enjoyed this article.', '2020-07-22 08:36:19'),
(3, 1, -1, 'Michael', 'I appreciate the time and effort you spent writing this article, good job!', '2020-07-22 08:37:43'),
(4, 24, -1, 'Babu', 'nice', '2020-11-15 12:41:55'),
(5, 24, 4, 'Author', 'tnx', '2020-11-15 12:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `csubject` varchar(255) NOT NULL,
  `cmessage` varchar(255) NOT NULL,
  `status` int(3) NOT NULL DEFAULT 0,
  `rfrom` varchar(255) DEFAULT NULL,
  `rsubject` varchar(255) DEFAULT NULL,
  `rmessage` varchar(1000) DEFAULT NULL,
  `rstauts` int(5) NOT NULL DEFAULT 2,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `cname`, `email`, `csubject`, `cmessage`, `status`, `rfrom`, `rsubject`, `rmessage`, `rstauts`, `date`) VALUES
(1, 'Tonmoy', 'Abuul@gmail.com', 'This is my New Web site', 'The next generation of our icon library + toolkit is coming with more icons, more styles, more services, and more awesome. Pre-order now to get early access and releases over the next year!', 1, 'Admin@gmail', 'Hlw How are You', 'asdadasdasdasdasdasdasdadasdasdsadasdasdasdadasdasdasdas', 4, '2020-11-05 13:15:23'),
(2, 'kamrul', 'Abuul@gmail.com', 'Now Brewing… Font Awesome 6!', 'The next generation of our icon library + toolkit is coming with more icons, more styles, more services, and more awesome. Pre-order now to get early access and releases over the next year!', 1, 'Admin@gmail.com', 'Hlw', 'ASDDASDSADSADASDSADASDAS', 4, '2020-11-05 12:38:44'),
(3, 'Babu', 'Babu@gmail.com', 'Please Chec your email', 'localhost/allfiles/phpBlog', 1, 'Admin@gmail', 'Accha', 'dasdsadasdasdadsa', 4, '2020-11-05 14:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo`) VALUES
(1, 'logo/d6ed0afec1.png');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(2555) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page`, `title`, `body`, `status`) VALUES
(2, 'Service', 'Using a Dynamic Multi-Select Drop-Down List', 'There&amp;#39;s an apprehension that Covid-19 pandemic might hit again, because many countries including Europe are suffering from this pandemic&nbsp;again. We all have to remain safe from now on,&amp;#34; she said at a programme&nbsp;where she handed-over the national standard to ten units and organisations of Bangladesh Army.She joined the programme, which took place in Savar Cantonment, virtually from her official residence Gono Bhaban.She said that the government has given a budget of Tk 568,000 crore for the 2020-21 fiscal, which was a very tough job due to the Covid-19 pandemic where many countries were suffering from severe economic constraints.&amp;#34;We&amp;#39;ve given the budget defying all odds, we said that everyone has to remain cautious regarding spending public money, because if coronavirus hits again massively then we&amp;#39;ll need a huge amount of money,', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_two` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `publish` int(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `cat_id`, `user_id`, `title`, `body`, `image`, `image_two`, `author`, `tag`, `publish`, `date`) VALUES
(5, '1,4', 1, 'Nest Protect: 5th Gen Smoke + CO Alarm', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.', 'uploads/small/blog-small-5.jpg', 'uploads/big/a4d7d7c5a402510.jpg', 'admins', 'phyton,css', 1, '2020-11-14 05:08:51'),
(6, '2,1', 1, 'Nest Protect: 6th Gen Smoke + CO Alarm', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.', 'uploads/small/blog-small-6.jpg', 'uploads/big/a4d7d7c5a402510.jpg', 'admins', 'phyton,javascript', 1, '2020-11-14 05:08:42'),
(7, '2,3', 1, 'Nest Protect: 7th Gen Smoke + CO Alarm', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.', 'uploads/small/blog-small-7.jpg', 'uploads/big/a4d7d7c5a402510.jpg', 'admins', 'html,javascript', 1, '2020-11-14 05:08:35'),
(8, '2,5', 1, 'Nest Protect: 8th Gen Smoke + CO Alarm', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.', 'uploads/small/blog-small-8.jpg', 'uploads/big/a4d7d7c5a402510.jpg', 'admins', 'javascript,css', 0, '2020-11-17 08:00:55'),
(20, '6,2', 3, 'Using a Dynamic Multi-Select Drop-Down List', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non auctor&nbsp;justo, sed volutpat odio. Pellentesque dictum, odio eget condimentum maximus, nibh ligula suscipit est, id semper nibh mi in neque. Integer dictum pretium enim sit amet ullamcorper. Mauris nec gravida urna. Mauris efficitur congue velit sit amet congue. Nulla sollicitudin felis eu metus egestas, in tempor odio suscipit. Pellentesque suscipit, purus vel consectetur elementum, dui turpis scelerisque ligula, nec finibus tortor odio id mi. Vestibulum aliquam augue ut urna pharetra faucibus. Sed commodo suscipit faucibus. Duis lacinia ullamcorper ligula quis volutpat. In hac habitasse platea dictumst. Morbi scelerisque ac orci at&nbsp;porttitor. Nulla facilisi.', 'uploads/small/a4d7d7c5a4.jpg', 'uploads/big/a4d7d7c5a402510.jpg', 'sakib', 'Html, php', 0, '2020-11-11 14:33:20'),
(24, '6,4', 2, 'Using a Dynamic Multi-Select Drop-Down List', 'Lorem ipsum, or lipsum as it is \r\nsometimes known, is dummy text used in laying out print, graphic or web \r\ndesigns. The passage is attributed to an unknown typesetter in the 15th \r\ncentury who is thought to have scrambled parts of Cicero&#39;s De Finibus \r\nBonorum et Malorum for use in a type specimen book.', 'uploads/small/40e064d7e6.jpg', 'uploads/big/40e064d7e6a52a0.jpg', 'Babu', 'PHP,JAVA', 1, '2020-11-11 14:33:39'),
(32, '3,2', 1, 'Don’t spend a single paisa of public money unnecessarily:', 'There&#39;s an apprehension that Covid-19 pandemic might hit again, \r\nbecause many countries including Europe are suffering from this pandemic\r\n again. We all have to remain safe from now on,&#34; she said at a programme\r\n where she handed-over the national standard to ten units and \r\norganisations of Bangladesh Army.\r\nShe joined the programme, which took place in Savar Cantonment, virtually from her official residence Gono Bhaban.\r\nShe said that the government has given a budget of Tk 568,000 crore \r\nfor the 2020-21 fiscal, which was a very tough job due to the Covid-19 \r\npandemic where many countries were suffering from severe economic \r\nconstraints.\r\n&#34;We&#39;ve given the budget defying all odds, we said that everyone has \r\nto remain cautious regarding spending public money, because if \r\ncoronavirus hits again massively then we&#39;ll need a huge amount of money,', 'uploads/small/3fa3370194.jpg', 'uploads/big/3fa3370194fe888.jpg', 'admins', 'PHP,JAVA', 1, '2020-11-11 14:31:03'),
(33, '4,3', 1, 'Scope for massive scale-up of investment in mental health', 'World Mental Health Day is observed on 10 October every year, with \r\nthe overall objective of raising awareness of mental health issues \r\naround the world and mobilising efforts in support of mental health.\r\nMental health is one of the most neglected areas of public health. \r\nClose to 1 billion people are living with a mental disorder, 3 million \r\npeople die every year from the harmful use of alcohol and one person \r\ndies every 40 seconds by suicide. And now, billions of people around the\r\n world have been affected by the COVID-19 pandemic, which is having a \r\nfurther impact on people&#39;s mental health.\r\nYet, relatively few people around the world have access to quality \r\nmental health services. In low- and middle-income countries, more than \r\n75% of people with mental, neurological and substance use disorders \r\nreceive no treatment for their condition at all. Furthermore, stigma, \r\ndiscrimination, punitive legislation and human rights abuses are still \r\nwidespread.', 'uploads/small/a59b8609e1.jpg', 'uploads/big/a59b8609e19769a.jpg', 'admins', 'PHP,JAVA', 0, '2020-11-11 14:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(2555) NOT NULL,
  `twitter` varchar(2555) NOT NULL,
  `youtube` varchar(2555) NOT NULL,
  `behance` varchar(2555) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `facebook`, `twitter`, `youtube`, `behance`, `status`) VALUES
(1, 'https://www.facebook.com/KamrulZamanTonmoy/', 'https://www.twitter.com/KamrulZamanTonmoy/', 'https://www.youtube.com/KamrulZamanTonmoy/', 'https://www.facebook.com/KamrulZamanTonmoy/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 4,
  `approve` int(10) NOT NULL DEFAULT 1,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `approve`, `status`) VALUES
(1, 'admins', 'Admin@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 1, 2, 2),
(2, 'Babu', 'Babu@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 4, 1, 1),
(3, 'sakib', 'Kamrulzamantonmoy@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 4, 2, 2),
(4, 'Tonmoy', 'Kamrulzamantonmoy@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 3, 2, 2),
(5, 'pagol', 'Kamrulzamantonmoy@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 4, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
