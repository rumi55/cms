-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2013 at 05:28 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `createdby` varchar(255) NOT NULL,
  `content` longtext,
  `type` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `created`, `createdby`, `content`, `type`, `tags`, `url`) VALUES
(3, 'Homepage', '05/20/2013', 'Eric', '<p>My super duper homepage!</p>', 'homepage', 'homepage, eric, miller, media', 'homepage');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL DEFAULT '',
  `user_pass` varchar(60) NOT NULL DEFAULT '',
  `user_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_last_login` datetime DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_pass`, `user_date`, `user_modified`, `user_last_login`, `user_name`) VALUES
(1, 'ericmller29@gmail.com', '$2a$08$7wZa6EMT/WoMyE9pbMby0eSIm/7rOppnlAY50hdlr4vXO2obcYuIu', '2013-05-05 18:51:01', '2013-05-05 18:51:01', '2013-05-19 18:44:19', 'Eric');
