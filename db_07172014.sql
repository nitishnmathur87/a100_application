-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2014 at 10:01 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `application_stack`
--

INSERT INTO `application_stack` (`app_stack_id`, `description`, `experience_id`) VALUES
(1, 'sdf', NULL),
(2, 'sdf', NULL);

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
  `graduation_date` date DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  `mobile_phone` varchar(45) DEFAULT '(###)###-###',
  `linkedin_profile` varchar(45) DEFAULT NULL,
  `online_portfolio` varchar(45) DEFAULT NULL,
  `work_status` varchar(4) DEFAULT NULL,
  `age` varchar(4) DEFAULT NULL,
  `commitments` varchar(250) DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` char(4) DEFAULT NULL,
  `Other` varchar(50) DEFAULT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `cohort_id` int(11) DEFAULT NULL,
  `tech_id` int(11) DEFAULT NULL,
  `support_id` int(11) DEFAULT NULL,
  `completed` tinyint(1) NOT NULL,
  PRIMARY KEY (`apprentice_id`),
  KEY `institution_id_idx` (`institution_id`),
  KEY `cohort_id_idx` (`cohort_id`),
  KEY `tech_id_idx` (`tech_id`),
  KEY `support_id_idx` (`support_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `apprentice`
--

INSERT INTO `apprentice` (`apprentice_id`, `first_name`, `last_name`, `email_address`, `password`, `major`, `graduation_date`, `address`, `city`, `state`, `zip_code`, `mobile_phone`, `linkedin_profile`, `online_portfolio`, `work_status`, `age`, `commitments`, `hours`, `created_date`, `active`, `Other`, `institution_id`, `cohort_id`, `tech_id`, `support_id`, `completed`) VALUES
(1, 'Nitish', 'Mathur', 'mathur.nitish@gmail.com', '0965dca2c03012547feb28b39272c0fc51ca4dde5c3ea34a2e5225b402ef4f69', 'CSE', '2014-05-10', '64 Cheney Drive', 'Storrs', 'Connecticut', '06268', '9082104013', 'https://www.linkedin.com/in/nitishnmathur', 'NA', 'yes', 'yes', NULL, NULL, '2014-07-17 00:27:56', NULL, 'NA', 2, 2, NULL, 5, 0),
(2, 'nitish', 'mathur', 'pin@gmail.com2', 'f30c1c6a0c1c7de456c417d50b37c4d795f8cde90984812038d39dd8b3b7e24d', 'Csa', '2011-03-22', 'sdvfvefv', 'storrs', 'Connecticut', '06268', '9082104013', 'xcv ', 'na', 'yes', 'yes', 'sd', 22, '2014-07-17 03:02:30', NULL, '', 5, 2, NULL, 5, 0),
(4, 'pinxia', 'l', 'pin@gmail.com2e3w', '1d6dd05848cd5ce5c06a92233d528c51914b19975ba78f90efd40294381517c0', 'CS', '2014-11-22', '8-3-678, Plot 24, 2nd Floor,\r\nPragatiNagar Co', 'Stamford', 'California', '06904', '12345567890', 'na', 'na', 'yes', 'no', 'yes there are a few', 22, '2014-07-17 03:25:59', NULL, '', 9, 3, NULL, 5, 0),
(6, 'Nitish', 'Mathur', 'mathur.nitish@gmail.com11', '0965dca2c03012547feb28b39272c0fc51ca4dde5c3ea34a2e5225b402ef4f69', '', '0000-00-00', '64 Cheney Drive', 'Storrs', 'Connecticut', '06268', '9082104013', '', '', 'yes', 'yes', 'd', 11, '2014-07-17 03:33:16', NULL, '', 3, 2, NULL, 5, 0),
(7, 'gfhjsdnglbwen', 'Mathur', 'mathur.nitish@gmail.com111', 'bae72313ccb38ef9476fcfceb15afb136dc7b0b0b17879941c5b20f2485bfc4b', 'aefwe', '2011-03-22', '64 Cheney Drive', 'Storrs', 'Connecticut', '06268', '9082104013', 'linkedin.com', 'na', 'yes', 'yes', 'dsf', 11, '2014-07-17 03:36:16', NULL, '', 3, 4, NULL, 5, 0),
(9, 'sdfve', 'asdfc', 'pin@gmail.com223y', '62e989f2bd08df78a98ef393f6def56048fd59e565496981ba6bd0cd4a729974', 'music', '2012-11-22', 'sdvfvefv', '', 'Connecticut', '06268', '918888575306', 'linkedin.com', 'na', 'yes', 'yes', 'dyth', 22, '2014-07-17 03:42:09', NULL, '', 7, 3, NULL, 5, 0),
(10, 'sdfve', 'asdfc', 'pin@gmail.com223ys', '62e989f2bd08df78a98ef393f6def56048fd59e565496981ba6bd0cd4a729974', 'music', '2012-11-22', 'sdvfvefv', '', 'Connecticut', '06268', '918888575306', 'linkedin.com', 'na', 'yes', 'yes', 'dyth', 22, '2014-07-17 03:43:42', NULL, '', 7, 3, NULL, 5, 0),
(11, 'anubhav', 'Narain', 'pin@gmail.com2121', '62e989f2bd08df78a98ef393f6def56048fd59e565496981ba6bd0cd4a729974', 'xv', '2011-03-22', 'AFcsxz', 'xcvsd', 'Indiana', '234', '1234567890', 'xcv ', 'xcv', 'yes', 'no', 'sdvs', 22, '2014-07-17 04:53:28', NULL, '', 4, 2, NULL, 5, 0),
(12, 'pinxia', 'l', 'pin@gmail.com2ey7', '62e989f2bd08df78a98ef393f6def56048fd59e565496981ba6bd0cd4a729974', '', '0000-00-00', '8-3-678, Plot 24, 2nd Floor,\r\nPragatiNagar Co', 'Stamford', 'Illinois', '06905', '12345567890', '', '', 'no', 'yes', '', 0, '2014-07-17 05:22:47', NULL, '', 4, 2, NULL, 6, 0),
(13, 'Nitnks', 'Narain', 'mathur.nitish@gmail.com113', 'bae72313ccb38ef9476fcfceb15afb136dc7b0b0b17879941c5b20f2485bfc4b', '', '0000-00-00', '', '', 'Connecticut', '', '', '', '', 'no', 'no', '43', 3, '2014-07-17 05:41:37', NULL, '', 2, 1, NULL, 7, 0),
(14, 'nitish', 'mathur', 'pin@gmail.com2e3ws', '62e989f2bd08df78a98ef393f6def56048fd59e565496981ba6bd0cd4a729974', '', '0000-00-00', 'sdvfvefv', 'storrs', 'Connecticut', '06268', '9082104013', '', '', 'yes', 'yes', '', 0, '2014-07-17 05:42:22', NULL, '', 3, 4, NULL, NULL, 0),
(15, 'nitish', 'mathur', 'pin@gmail.com24', '03f35471513bd73343e4f9ba89ef1a1c89c39f0bf80ed9986c0fbce3564ff327', '', '0000-00-00', 'sdvfvefv', 'storrs', 'Connecticut', '06268', '9082104013', '', '', 'yes', 'yes', '', 0, '2014-07-17 05:43:29', NULL, '', 3, 4, NULL, 8, 0),
(16, 'pinxia', 'l', 'pin@gmail.com21221', '62e989f2bd08df78a98ef393f6def56048fd59e565496981ba6bd0cd4a729974', '', '0000-00-00', '8-3-678, Plot 24, 2nd Floor,\r\nPragatiNagar Co', 'Stamford', 'Illinois', '06905', '12345567890', '', '', 'yes', 'yes', '', 0, '2014-07-17 05:44:46', NULL, '', 1, 1, NULL, 9, 0),
(17, 'pinxia', 'l', 'pin@gmail.com2122111', '62e989f2bd08df78a98ef393f6def56048fd59e565496981ba6bd0cd4a729974', '', '0000-00-00', '8-3-678, Plot 24, 2nd Floor,\r\nPragatiNagar Co', 'Stamford', 'Illinois', '06905', '12345567890', '', '', 'yes', 'yes', '', 0, '2014-07-17 06:36:30', NULL, '', 1, 1, 1, 10, 0),
(18, 'pinxia', 'l', 'pin@gmail.com21221114', '62e989f2bd08df78a98ef393f6def56048fd59e565496981ba6bd0cd4a729974', 'gjb', '2011-03-22', '8-3-678, Plot 24, 2nd Floor,\r\nPragatiNagar Co', 'Stamford', 'Illinois', '06905', '12345567890', 'asdf', 'sdf', 'yes', 'no', 'sdf', 3, '2014-07-17 06:38:32', NULL, 'dsf', 1, 1, 2, 11, 0),
(19, 'nitish', 'mathur', 'pin@gmail.com342234q4321', '62e989f2bd08df78a98ef393f6def56048fd59e565496981ba6bd0cd4a729974', 'wfd', '2011-03-22', 'sdvfvefv', 'storrs', 'Connecticut', '06268', '9082104013', 'linkedin.com', 'rghrt3h rtchrte', 'yes', 'yes', 'aqf', 222, '2014-07-17 07:22:20', NULL, '', 1, 2, 3, 12, 0),
(20, 'nitish', 'mathur', 'pin@gmail.com3422amshdb', '62e989f2bd08df78a98ef393f6def56048fd59e565496981ba6bd0cd4a729974', 'wfd', '2011-03-22', 'sdvfvefv', 'storrs', 'Connecticut', '06268', '9082104013', 'linkedin.com', 'rghrt3h rtchrte', 'yes', 'yes', 'aqf', 222, '2014-07-17 07:23:17', NULL, '', 1, 2, 4, 13, 0);

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

--
-- Dumping data for table `cohort`
--

INSERT INTO `cohort` (`cohort_id`, `schedule`) VALUES
(1, 'Cohort 2: Spring (Summer Internships)'),
(2, 'Cohort 3: Summer (Late Summer and Early Fall Internships)'),
(3, 'Cohort 3.5: Fall Internships (Hartford Area)'),
(4, 'Cohort 4: Fall (Late Fall and Early Winter Internships)');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `content_management_system`
--

INSERT INTO `content_management_system` (`content_mgmt_id`, `description`, `experience_id`) VALUES
(1, 'sdf', NULL),
(2, 'sdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `experience_level`
--

CREATE TABLE IF NOT EXISTS `experience_level` (
  `experience_id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `comments` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`experience_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `front_end_language`
--

INSERT INTO `front_end_language` (`front_end_id`, `description`, `experience_id`) VALUES
(1, 'gchjkmnbkvthb', NULL),
(2, 'sdvsdvs', NULL),
(3, 'xgchjv', NULL),
(4, 'sdgfsfdg', NULL),
(5, 'mbadfkl wf', NULL),
(6, 'asdnblk', NULL),
(7, 'asdnblk', NULL),
(8, 'asdnblka sncvwgfljw h;kwenwe l,hwe,hw.,fmwhe;lkwefnwre.,fnwe;,jfwre.j,hbew.,fjweh gp', NULL),
(9, 'sdfsdf', NULL),
(10, 'sdfsdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE IF NOT EXISTS `institution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `institution_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`id`, `institution_name`) VALUES
(1, 'Yale University'),
(2, 'University of Connecticut'),
(3, 'Wesleyan University'),
(4, 'Trinity University'),
(5, 'Central Connecticut State University'),
(6, 'Connecticut College'),
(7, 'Fairfield University'),
(8, 'University of Hartford'),
(9, 'University of Connecticut Health Center'),
(10, 'University of Bridgeport'),
(11, 'Mitchell College'),
(12, 'Southern Connecticut State University'),
(13, 'University of New Haven'),
(14, 'United States Coast Guard University'),
(15, 'Sacred Heart University'),
(16, 'Western Connecticut State University'),
(17, 'Eastern Connecticut State University'),
(18, 'Post University'),
(19, 'Albertus Magnus College'),
(20, 'University of Saint Joseph'),
(21, 'Charter Oak State College'),
(22, 'Goodwin College'),
(23, 'Lincoln College of New England'),
(24, 'Holy Apostles College and Seminary of'),
(25, 'University of Saint Joseph');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mobile_app_develop`
--

INSERT INTO `mobile_app_develop` (`mobile_app_id`, `description`, `experience_id`) VALUES
(1, 'erh', NULL),
(2, 'erh', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `path_link`
--

CREATE TABLE IF NOT EXISTS `path_link` (
  `apprentice_id` int(11) NOT NULL,
  `path_id` int(11) NOT NULL,
  KEY `app_id_idx` (`apprentice_id`),
  KEY `path_id_idx` (`path_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='intermediate table for path to a100';

--
-- Dumping data for table `path_link`
--

INSERT INTO `path_link` (`apprentice_id`, `path_id`) VALUES
(1, 2),
(1, 8),
(2, 4),
(2, 5),
(4, 2),
(4, 3),
(6, 7),
(7, 3),
(7, 7),
(9, 7),
(9, 8),
(10, 7),
(10, 8),
(11, 2),
(11, 3),
(12, 3),
(12, 4),
(13, 1),
(13, 2),
(14, 2),
(15, 2),
(18, 2),
(18, 3),
(18, 4),
(19, 1),
(19, 2),
(20, 1),
(20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `path_to_a100`
--

CREATE TABLE IF NOT EXISTS `path_to_a100` (
  `path_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`path_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `path_to_a100`
--

INSERT INTO `path_to_a100` (`path_id`, `description`) VALUES
(1, 'A100 Promo Video from Vimeo'),
(2, 'A100 Program Manager'),
(3, 'Career Fair'),
(4, 'Information Session'),
(5, 'Radio/TV Ad'),
(6, 'Search Engine'),
(7, 'On-Campus Flyer'),
(8, 'Fellow Student'),
(9, 'Professor/Teacher at my University/School'),
(10, 'Member of the Independent Software Team');

-- --------------------------------------------------------

--
-- Table structure for table `programming_experience`
--

CREATE TABLE IF NOT EXISTS `programming_experience` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `details` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `programming_experience`
--

INSERT INTO `programming_experience` (`program_id`, `details`) VALUES
(1, 'None'),
(2, 'I have taken ?3 courses that use the same programming language'),
(3, 'I have built several projects on my own time, not for school'),
(4, 'I have little formal training in programming, but have taught myself the essentials and have worked on personal projects.');

-- --------------------------------------------------------

--
-- Table structure for table `supporting_materials`
--

CREATE TABLE IF NOT EXISTS `supporting_materials` (
  `support_id` int(11) NOT NULL AUTO_INCREMENT,
  `resume` blob,
  `cover_letter` blob,
  `other` varchar(250) DEFAULT NULL,
  `references_field` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`support_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `supporting_materials`
--

INSERT INTO `supporting_materials` (`support_id`, `resume`, `cover_letter`, `other`, `references_field`) VALUES
(1, 0x72657475726e206c6162656c2e706466, NULL, NULL, 'asfdasf'),
(2, 0x6e65775f64625f3037313431342e706e67, NULL, '', ''),
(3, 0x496e7465726e6174696f6e616c20576f726b73686f702e646f6378, 0x72657475726e206c6162656c2e706466, 'gchjkl', 'chv b.'),
(4, 0x6e65775f64625f3037313431342e706e67, 0x72657475726e206c6162656c2e706466, 'gchjkl', 'chv b.'),
(5, 0x72657475726e206c6162656c2e706466, 0x72657475726e206c6162656c2e706466, 'sdvf', 'sdv'),
(6, 0x496e7465726e6174696f6e616c20576f726b73686f702e646f6378, NULL, 'vfgb', 'cvb'),
(7, 0x72657475726e206c6162656c2e706466, NULL, '', ''),
(8, 0x6e65775f64625f3037313431342e706e67, NULL, '', ''),
(9, 0x6e65775f64625f3037313431342e706e67, NULL, '', ''),
(10, 0x6e65775f64625f3037313431342e706e67, NULL, '', ''),
(11, 0x4f505420492d323020657874656e73696f6e2e706466, 0x6e65775f64625f3037313431342e706e67, 'erw,kmb', ',whfb jkwelg,mgmbk'),
(12, 0x72657475726e206c6162656c2e706466, 0x4f505420492d323020657874656e73696f6e2e706466, 'dhnwsb ergb', 'sdfgsdfg'),
(13, 0x6e65775f64625f3037313431342e706e67, 0x4269672d4f20416c676f726974686d20436f6d706c65786974792043686561742053686565742e706466, 'dhnwsb ergb', 'sdfgsdfg');

-- --------------------------------------------------------

--
-- Table structure for table `technical_experience`
--

CREATE TABLE IF NOT EXISTS `technical_experience` (
  `tech_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) DEFAULT NULL,
  `front_end_id` int(11) DEFAULT NULL,
  `content_mgmt_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `app_stack_id` int(11) DEFAULT NULL,
  `other` varchar(250) DEFAULT NULL,
  `mobile_app_id` int(11) DEFAULT NULL,
  `job_title` varchar(45) DEFAULT 'N/A',
  PRIMARY KEY (`tech_id`),
  KEY `program_id_idx` (`program_id`),
  KEY `content_mgmt_id_idx` (`content_mgmt_id`),
  KEY `front_end_id_idx` (`front_end_id`),
  KEY `work_id_idx` (`work_id`),
  KEY `app_stack_id_idx` (`app_stack_id`),
  KEY `mobile_app_id_idx` (`mobile_app_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `technical_experience`
--

INSERT INTO `technical_experience` (`tech_id`, `program_id`, `front_end_id`, `content_mgmt_id`, `work_id`, `app_stack_id`, `other`, `mobile_app_id`, `job_title`) VALUES
(1, NULL, 7, NULL, NULL, NULL, '', NULL, ''),
(2, NULL, 8, NULL, NULL, NULL, 'm,hgf jkweq fmwegflkmwegvkj', NULL, 'none yo'),
(3, NULL, 9, NULL, NULL, 1, 'wef', 1, 'sdf'),
(4, NULL, 10, 2, NULL, 2, 'wef', 2, 'sdf'),
(5, NULL, NULL, NULL, 3, NULL, NULL, NULL, 'N/A'),
(6, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE IF NOT EXISTS `work_experience` (
  `work_id` int(11) NOT NULL,
  `details` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`work_id`, `details`) VALUES
(1, 'None'),
(2, 'At least one full-time job in an office setting.'),
(3, 'At least one part-time job in an office setting.'),
(4, 'At least one part-time job of any other kind (retail, Starbucks, construction, etc.)');

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
-- Constraints for table `path_link`
--
ALTER TABLE `path_link`
  ADD CONSTRAINT `app_key` FOREIGN KEY (`apprentice_id`) REFERENCES `apprentice` (`apprentice_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `path_key` FOREIGN KEY (`path_id`) REFERENCES `path_to_a100` (`path_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `technical_experience`
--
ALTER TABLE `technical_experience`
  ADD CONSTRAINT `app_stack_id` FOREIGN KEY (`app_stack_id`) REFERENCES `application_stack` (`app_stack_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `content_mgmt_id` FOREIGN KEY (`content_mgmt_id`) REFERENCES `content_management_system` (`content_mgmt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `front_end_id` FOREIGN KEY (`front_end_id`) REFERENCES `front_end_language` (`front_end_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mobile_app_id` FOREIGN KEY (`mobile_app_id`) REFERENCES `mobile_app_develop` (`mobile_app_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_id` FOREIGN KEY (`program_id`) REFERENCES `programming_experience` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `work_id` FOREIGN KEY (`work_id`) REFERENCES `work_experience` (`work_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
