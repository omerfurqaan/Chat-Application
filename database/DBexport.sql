--
-- MySQL 5.5.5
-- Mon, 18 May 2020 00:31:03 +0000
--

CREATE DATABASE `demo1` DEFAULT CHARSET utf8mb4;

USE `demo1`;

CREATE TABLE `log` (
   `Id` int(8) not null auto_increment,
   `User_name` varchar(100),
   `Log_in` varchar(10) not null,
   PRIMARY KEY (`Id`),
   UNIQUE KEY (`User_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;

-- [Table `log` is empty]

CREATE TABLE `request` (
   `User_id` int(10) not null auto_increment,
   `Sender` varchar(100),
   `Receiver` varchar(100),
   PRIMARY KEY (`User_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;

-- [Table `request` is empty]

CREATE TABLE `user_chat` (
   `msg_id` int(11) not null auto_increment,
   `sender_username` varchar(100),
   `receiver_username` varchar(100),
   `msg_content` varchar(255),
   `msg_status` text,
   `msg_date` timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
   PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;

-- [Table `user_chat` is empty]

CREATE TABLE `users` (
   `User_id` int(8) not null auto_increment,
   `User_name` varchar(100),
   `User_email` varchar(100),
   `User_profile` varchar(100),
   `User_number` varchar(100),
   `User_gender` text,
   `User_pass` varchar(100),
   `forgotten_answer` varchar(100),
   PRIMARY KEY (`User_id`),
   UNIQUE KEY (`User_name`),
   UNIQUE KEY (`User_email`),
   UNIQUE KEY (`User_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;

-- [Table `users` is empty]