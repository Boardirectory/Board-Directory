SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `boards` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `groups` (`group_id`, `group_name`) VALUES
(1, 'Administrators');

CREATE TABLE IF NOT EXISTS `group_users` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `group_id` (`group_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `group_users` (`group_id`, `user_id`) VALUES
(1, 1);

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_start` int(11) NOT NULL,
  `session_time` int(11) NOT NULL,
  `session_ip` varchar(45) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sessions` (`session_id`, `user_id`, `session_start`, `session_time`, `session_ip`) VALUES
('02vh9mfjrm1bohagb9gbt54m13', 1, 1364503996, 1364503996, '127.0.0.1'),
('1eat6ggmsj4f8im17nc9dvi7r5', 1, 1364503996, 1364504721, '127.0.0.1'),
('3dcuh8d9r6ee5rku9e24ea80j0', 1, 1364503996, 1364503996, '127.0.0.1'),
('8akt3bqnji2lir5auqsq0oklm4', 1, 1364503995, 1364503996, '127.0.0.1'),
('98cnrb5kodb1bl69mfb0pu98q2', 1, 1364503996, 1364503996, '127.0.0.1'),
('e12gepnvcgpq2o68qtdj09c220', 1, 1364503996, 1364503996, '127.0.0.1'),
('efngh0vsaeiba16r9oun8a7kv7', 1, 1364503995, 1364503995, '127.0.0.1'),
('m4aqe1897lrck0dol4g5ht29d4', 1, 1364503995, 1364503995, '127.0.0.1'),
('qprjjitdbkvdb0mo0hk734ko37', 1, 1364503995, 1364503995, '127.0.0.1');

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phpbb_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_phpbb_id` (`user_phpbb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`user_id`, `user_name`, `user_phpbb_id`) VALUES
(1, 'admin', 2);


ALTER TABLE `group_users`
  ADD CONSTRAINT `group_users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
