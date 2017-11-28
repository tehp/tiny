SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tiny`
--

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `inbox_id` varchar(32) NOT NULL,
  `post_id` varchar(32) NOT NULL,
  `user_to` varchar(32) NOT NULL,
  `user_from` varchar(32) NOT NULL,
  `inbox_last_modified` varchar(32) NOT NULL,
  PRIMARY KEY (`inbox_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `inbox_messages`
--

CREATE TABLE IF NOT EXISTS `inbox_messages` (
  `inbox_message_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` varchar(32) NOT NULL,
  `inbox_message` varchar(1000) NOT NULL,
  `inbox_id` varchar(32) NOT NULL,
  `inbox_message_sent_time` datetime NOT NULL,
  PRIMARY KEY (`inbox_message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` varchar(32) NOT NULL,
  `user_id` varchar(32) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `post_description` varchar(1000) NOT NULL,
  `post_pickup_location` varchar(255) NOT NULL,
  `post_tag` varchar(255) NOT NULL,
  `post_date` datetime NOT NULL,
  `featured` int(8) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `post_image`
--

CREATE TABLE IF NOT EXISTS `post_image` (
  `post_id` varchar(32) NOT NULL,
  `post_image_url` varchar(2083) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(32) NOT NULL,
  `user_first` varchar(50) NOT NULL,
  `user_last` varchar(50) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `user_salt` varchar(32) NOT NULL,
  `user_join_date` datetime NOT NULL,
  `user_location` varchar(32) NOT NULL,
  `user_type` varchar(5) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Table structure for table `users_profile`
--

CREATE TABLE IF NOT EXISTS `users_profile` (
  `user_id` varchar(32) NOT NULL,
  `profile_description` varchar(500) NOT NULL,
  `profile_image_url` varchar(2083) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(32) NOT NULL,
  `session_hash` varchar(64) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=150 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
