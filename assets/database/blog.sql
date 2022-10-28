-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 02:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Sports'),
(2, 'History'),
(3, 'Politics');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `visibility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `category_id`, `visibility`) VALUES
(1, 'how can it all work', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet ipsam iusto ullam placeat natus aliquid enim adipisci vitae sapiente, molestiae nemo praesentium, nulla non recusandae sit alias sunt cumque. Fugit, quo inventore dolore, ipsam eius nihil corporis repellendus non culpa, odio illum libero minima labore eveniet! Repudiandae debitis nam tempora minus nostrum voluptatum, ab tenetur veritatis corrupti perspiciatis dolore praesentium, eos unde veniam provident rerum? Cumque provident harum earum ea dicta ut tempore libero dolorem magni recusandae deserunt maiores quisquam nam eaque impedit explicabo quasi autem nemo pariatur, molestias porro! Ducimus voluptate modi repellat. Explicabo soluta ipsum rerum accusamus error consequatur asperiores aut perferendis doloribus, necessitatibus maiores odio quos, eum unde, sit cumque fugit facere vel. Omnis, doloremque? Repudiandae, temporibus labore facilis, velit ullam dignissimos quasi aperiam assumenda laborum ad provident ipsa veritatis facere libero sequi molestias odit illum! Eveniet sit, dolor eaque ullam rem culpa voluptate repudiandae et consectetur!', 'https://images.unsplash.com/photo-1517404215738-15263e9f9178?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8dXJsfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 2, 1),
(2, 'it all started from here', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet ipsam iusto ullam placeat natus aliquid enim adipisci vitae sapiente, molestiae nemo praesentium, nulla non recusandae sit alias sunt cumque. Fugit, quo inventore dolore, ipsam eius nihil corporis repellendus non culpa, odio illum libero minima labore eveniet! Repudiandae debitis nam tempora minus nostrum voluptatum, ab tenetur veritatis corrupti perspiciatis dolore praesentium, eos unde veniam provident rerum? Cumque provident harum earum ea dicta ut tempore libero dolorem magni recusandae deserunt maiores quisquam nam eaque impedit explicabo quasi autem nemo pariatur, molestias porro! Ducimus voluptate modi repellat. Explicabo soluta ipsum rerum accusamus error consequatur asperiores aut perferendis doloribus, necessitatibus maiores odio quos, eum unde, sit cumque fugit facere vel. Omnis, doloremque? Repudiandae, temporibus labore facilis, velit ullam dignissimos quasi aperiam assumenda laborum ad provident ipsa veritatis facere libero sequi molestias odit illum! Eveniet sit, dolor eaque ullam rem culpa voluptate repudiandae et consectetur!\r\n', 'https://images.unsplash.com/photo-1624555130581-1d9cca783bc0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8dXJsfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 1, 1),
(3, 'HOW HAS EVERYTHING START', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet ipsam iusto ullam placeat natus aliquid enim adipisci vitae sapiente, molestiae nemo praesentium, nulla non recusandae sit alias sunt cumque. Fugit, quo inventore dolore, ipsam eius nihil corporis repellendus non culpa, odio illum libero minima labore eveniet! Repudiandae debitis nam tempora minus nostrum voluptatum, ab tenetur veritatis corrupti perspiciatis dolore praesentium, eos unde veniam provident rerum? Cumque provident harum earum ea dicta ut tempore libero dolorem magni recusandae deserunt maiores quisquam nam eaque impedit explicabo quasi autem nemo pariatur, molestias porro! Ducimus voluptate modi repellat. Explicabo soluta ipsum rerum accusamus error consequatur asperiores aut perferendis doloribus, necessitatibus maiores odio quos, eum unde, sit cumque fugit facere vel. Omnis, doloremque? Repudiandae, temporibus labore facilis, velit ullam dignissimos quasi aperiam assumenda laborum ad provident ipsa veritatis facere libero sequi molestias odit illum! Eveniet sit, dolor eaque ullam rem culpa voluptate repudiandae et consectetur!', 'https://images.unsplash.com/photo-1617854818583-09e7f077a156?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80', 1, 1),
(4, 'HOW did EVERYTHING START', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet ipsam iusto ullam placeat natus aliquid enim adipisci vitae sapiente, molestiae nemo praesentium, nulla non recusandae sit alias sunt cumque. Fugit, quo inventore dolore, ipsam eius nihil corporis repellendus non culpa, odio illum libero minima labore eveniet! Repudiandae debitis nam tempora minus nostrum voluptatum, ab tenetur veritatis corrupti perspiciatis dolore praesentium, eos unde veniam provident rerum? Cumque provident harum earum ea dicta ut tempore libero dolorem magni recusandae deserunt maiores quisquam nam eaque impedit explicabo quasi autem nemo pariatur, molestias porro! Ducimus voluptate modi repellat. Explicabo soluta ipsum rerum accusamus error consequatur asperiores aut perferendis doloribus, necessitatibus maiores odio quos, eum unde, sit cumque fugit facere vel. Omnis, doloremque? Repudiandae, temporibus labore facilis, velit ullam dignissimos quasi aperiam assumenda laborum ad provident ipsa veritatis facere libero sequi molestias odit illum! Eveniet sit, dolor eaque ullam rem culpa voluptate repudiandae et consectetur!', 'https://images.unsplash.com/photo-1624555130581-1d9cca783bc0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8dXJsfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 3, 1),
(5, 'HOW EVERYTHING STARTED', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet ipsam iusto ullam placeat natus aliquid enim adipisci vitae sapiente, molestiae nemo praesentium, nulla non recusandae sit alias sunt cumque. Fugit, quo inventore dolore, ipsam eius nihil corporis repellendus non culpa, odio illum libero minima labore eveniet! Repudiandae debitis nam tempora minus nostrum voluptatum, ab tenetur veritatis corrupti perspiciatis dolore praesentium, eos unde veniam provident rerum? Cumque provident harum earum ea dicta ut tempore libero dolorem magni recusandae deserunt maiores quisquam nam eaque impedit explicabo quasi autem nemo pariatur, molestias porro! Ducimus voluptate modi repellat. Explicabo soluta ipsum rerum accusamus error consequatur asperiores aut perferendis doloribus, necessitatibus maiores odio quos, eum unde, sit cumque fugit facere vel. Omnis, doloremque? Repudiandae, temporibus labore facilis, velit ullam dignissimos quasi aperiam assumenda laborum ad provident ipsa veritatis facere libero sequi molestias odit illum! Eveniet sit, dolor eaque ullam rem culpa voluptate repudiandae et consectetur!', 'https://images.unsplash.com/photo-1587691592099-24045742c181?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8dXJsfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 1, 1),
(6, 'HOW IS EVERYTHING STARTED\n', 'everything started very simple and easy at the beginning so that everyone could do whatever he wanted whenever he wanted wherever he wanted and no one else could ever talk to him about that at all so that\'s why I\'m saying that it\'s one of the most important things that everyone', 'https://images.unsplash.com/photo-1517404215738-15263e9f9178?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8dXJsfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 2, 1),
(7, 'how everything all started', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet ipsam iusto ullam placeat natus aliquid enim adipisci vitae sapiente, molestiae nemo praesentium, nulla non recusandae sit alias sunt cumque. Fugit, quo inventore dolore, ipsam eius nihil corporis repellendus non culpa, odio illum libero minima labore eveniet! Repudiandae debitis nam tempora minus nostrum voluptatum, ab tenetur veritatis corrupti perspiciatis dolore praesentium, eos unde veniam provident rerum? Cumque provident harum earum ea dicta ut tempore libero dolorem magni recusandae deserunt maiores quisquam nam eaque impedit explicabo quasi autem nemo pariatur, molestias porro! Ducimus voluptate modi repellat. Explicabo soluta ipsum rerum accusamus error consequatur asperiores aut perferendis doloribus, necessitatibus maiores odio quos, eum unde, sit cumque fugit facere vel. Omnis, doloremque? Repudiandae, temporibus labore facilis, velit ullam dignissimos quasi aperiam assumenda laborum ad provident ipsa veritatis facere libero sequi molestias odit illum! Eveniet sit, dolor eaque ullam rem culpa voluptate repudiandae et consectetur!', 'https://images.unsplash.com/photo-1624555130581-1d9cca783bc0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8dXJsfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60', 2, 1),
(8, 'Blogs and how to store them', 'A blog (a truncation of \"weblog\")[1] is a discussion or informational website published on the World Wide Web consisting of discrete, often informal diary-style text entries (posts). Posts are typically displayed in reverse chronological order so that the most recent post appears first, at the top of the web page. Until 2009, blogs were usually the work of a single individual,[citation needed] occasionally of a small group, and often covered a single subject or topic. In the 2010s, \"multi-author blogs\" (MABs) emerged, featuring the writing of multiple authors and sometimes professionally edited. MABs from newspapers, other media outlets, universities, think tanks, advocacy groups, and similar institutions account for an increasing quantity of blog traffic. The rise of Twitter and other \"microblogging\" systems helps integrate MABs and single-author blogs into the news media. Blog can also be used as a verb, meaning to maintain or add content to a blog.', 'https://images.unsplash.com/photo-1617854818583-09e7f077a156?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `visibility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `visibility`) VALUES
(1, 'Muhanned', 'mohandhelall@gmail.com', '123456', 2, 1),
(2, 'Muhanned', 'mohandhelall@yahoo.com', '123456', 2, 1),
(3, 'admin', 'admin@admin.com', '123456', 1, 1),
(5, 'user', 'user@user.com', '123456', 2, 1),
(8, 'Ahmed Mostafa', 'ahmed@user.com', '123456', 2, 0),
(9, 'Mostafa Mohamed', 'mostafa@admin.com', '123456', 1, 1),
(10, 'one', 'a@a.a', '123456', 2, 0),
(11, 'b', 'b@b.b', '123456', 2, 0),
(12, 'c', 'c@c.c', '123456', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
