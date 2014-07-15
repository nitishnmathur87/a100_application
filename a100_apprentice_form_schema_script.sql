-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2014 at 10:10 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `a100_apprentice_form_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_stack`
--

CREATE TABLE IF NOT EXISTS `application_stack` (
  `app_stack_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(250) DEFAULT NULL,
  `experience_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`app_stack_id`),
  KEY `experience_id_idx` (`experience_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `apprentice`
--

CREATE TABLE IF NOT EXISTS `apprentice` (
  `apprentice_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email_address` varchar(45) NOT NULL,
  `password` varchar(65) NOT NULL,
  `major` varchar(35) DEFAULT NULL,
  `graduation_date` varchar(20) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  `mobile_phone` varchar(45) DEFAULT '(###)###-###',
  `linkedin_profile` varchar(45) DEFAULT NULL,
  `online_portfolio` varchar(45) DEFAULT NULL,
  `work_status` char(4) DEFAULT NULL,
  `age` char(4) DEFAULT NULL,
  `commitments` varchar(250) DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` char(4) DEFAULT NULL,
  `Other` varchar(50) DEFAULT NULL,
  `path_id` int(11) DEFAULT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `cohort_id` int(11) DEFAULT NULL,
  `tech_id` int(11) DEFAULT NULL,
  `support_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`apprentice_id`),
  KEY `path_id_idx` (`path_id`),
  KEY `institution_id_idx` (`institution_id`),
  KEY `cohort_id_idx` (`cohort_id`),
  KEY `tech_id_idx` (`tech_id`),
  KEY `support_id_idx` (`support_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `apprentice`
--

INSERT INTO `apprentice` (`apprentice_id`, `first_name`, `last_name`, `email_address`, `password`, `major`, `graduation_date`, `address`, `city`, `state`, `zip_code`, `mobile_phone`, `linkedin_profile`, `online_portfolio`, `work_status`, `age`, `commitments`, `hours`, `created_date`, `active`, `Other`, `path_id`, `institution_id`, `cohort_id`, `tech_id`, `support_id`) VALUES
(5, 'Nitish', 'Mathur', 'mathur.nitish@gmail.com', '0965dca2c03012547feb28b39272c0fc51ca4dde5c3ea34a2e5225b402ef4f69', NULL, NULL, NULL, NULL, NULL, NULL, '(###)###-###', NULL, NULL, NULL, NULL, NULL, NULL, '2014-07-15 20:07:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cohort`
--

CREATE TABLE IF NOT EXISTS `cohort` (
  `cohort_id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`cohort_id`),
  UNIQUE KEY `id_UNIQUE` (`cohort_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `content_management_system`
--

CREATE TABLE IF NOT EXISTS `content_management_system` (
  `content_mgmt_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(250) DEFAULT NULL,
  `experience_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`content_mgmt_id`),
  KEY `experience_id_idx` (`experience_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `experience_level`
--

CREATE TABLE IF NOT EXISTS `experience_level` (
  `experience_id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `comments` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`experience_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `front_end_language`
--

CREATE TABLE IF NOT EXISTS `front_end_language` (
  `front_end_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(250) DEFAULT NULL,
  `experience_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`front_end_id`),
  KEY `experience_id_idx` (`experience_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE IF NOT EXISTS `institution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Table structure for table `mobile_app_develop`
--

CREATE TABLE IF NOT EXISTS `mobile_app_develop` (
  `mobile_app_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(250) DEFAULT NULL,
  `experience_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mobile_app_id`),
  KEY `experience_id_idx` (`experience_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `path_to_a100`
--

CREATE TABLE IF NOT EXISTS `path_to_a100` (
  `path_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(120) DEFAULT NULL,
  `value` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`path_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `programming_experience`
--

CREATE TABLE IF NOT EXISTS `programming_experience` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `none` tinyint(1) DEFAULT NULL,
  `three_course_same_language` tinyint(1) DEFAULT NULL,
  `own_projects` tinyint(1) DEFAULT NULL,
  `little_training_personal_project` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `supporting_materials`
--

CREATE TABLE IF NOT EXISTS `supporting_materials` (
  `support_id` int(11) NOT NULL AUTO_INCREMENT,
  `resume` blob NOT NULL,
  `cover_letter` blob,
  `other` varchar(250) DEFAULT NULL,
  `references` varchar(250) NOT NULL,
  PRIMARY KEY (`support_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `technical_experience`
--

CREATE TABLE IF NOT EXISTS `technical_experience` (
  `tech_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `front_end_id` int(11) NOT NULL,
  `content_mgmt_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  `app_stack_id` int(11) NOT NULL,
  `other` varchar(250) DEFAULT NULL,
  `mobile_app_id` int(11) NOT NULL,
  `job_title` varchar(45) DEFAULT 'N/A',
  PRIMARY KEY (`tech_id`),
  KEY `program_id_idx` (`program_id`),
  KEY `content_mgmt_id_idx` (`content_mgmt_id`),
  KEY `front_end_id_idx` (`front_end_id`),
  KEY `work_id_idx` (`work_id`),
  KEY `app_stack_id_idx` (`app_stack_id`),
  KEY `mobile_app_id_idx` (`mobile_app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE IF NOT EXISTS `work_experience` (
  `work_id` int(11) NOT NULL,
  `none` tinyint(1) DEFAULT NULL,
  `one_fulltime_office` tinyint(1) DEFAULT NULL,
  `one_parttime_office` tinyint(1) DEFAULT NULL,
  `one_partitme_any_kind` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application_stack`
--
ALTER TABLE `application_stack`
  ADD CONSTRAINT `experience_id` FOREIGN KEY (`experience_id`) REFERENCES `experience_level` (`experience_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apprentice`
--
ALTER TABLE `apprentice`
  ADD CONSTRAINT `cohort_id` FOREIGN KEY (`cohort_id`) REFERENCES `cohort` (`cohort_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id` FOREIGN KEY (`institution_id`) REFERENCES `institution` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `path_id` FOREIGN KEY (`path_id`) REFERENCES `path_to_a100` (`path_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `support_id` FOREIGN KEY (`support_id`) REFERENCES `supporting_materials` (`support_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tech_id` FOREIGN KEY (`tech_id`) REFERENCES `technical_experience` (`tech_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content_management_system`
--
ALTER TABLE `content_management_system`
  ADD CONSTRAINT `experience_id_cms` FOREIGN KEY (`experience_id`) REFERENCES `experience_level` (`experience_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `front_end_language`
--
ALTER TABLE `front_end_language`
  ADD CONSTRAINT `experience_id_front` FOREIGN KEY (`experience_id`) REFERENCES `experience_level` (`experience_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mobile_app_develop`
--
ALTER TABLE `mobile_app_develop`
  ADD CONSTRAINT `experience_id_mobile` FOREIGN KEY (`experience_id`) REFERENCES `experience_level` (`experience_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `technical_experience`
--
ALTER TABLE `technical_experience`
  ADD CONSTRAINT `app_stack_id` FOREIGN KEY (`app_stack_id`) REFERENCES `application_stack` (`app_stack_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `content_mgmt_id` FOREIGN KEY (`content_mgmt_id`) REFERENCES `content_management_system` (`content_mgmt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `front_end_id` FOREIGN KEY (`front_end_id`) REFERENCES `front_end_language` (`front_end_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_id` FOREIGN KEY (`program_id`) REFERENCES `programming_experience` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `work_id` FOREIGN KEY (`work_id`) REFERENCES `work_experience` (`work_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mobile_app_id` FOREIGN KEY (`mobile_app_id`) REFERENCES `mobile_app_develop` (`mobile_app_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
