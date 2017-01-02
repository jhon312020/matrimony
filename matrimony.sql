CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(500) NOT NULL,
  `password` text NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `avatar` varchar(500) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

# 29-12-2016
CREATE TABLE IF NOT EXISTS `stars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;


INSERT INTO `stars` (`id`, `name`) VALUES
(1, 'Aswathi'),
(2, 'Bharani'),
(3, 'Krithiga'),
(4, 'Rohini'),
(5, 'Makayiram'),
(6, 'Thiruvathira'),
(7, 'Punartham'),
(8, 'Pooyam'),
(9, 'Ayilyam'),
(10, 'Magam'),
(11, 'Pooram'),
(12, 'Uthram'),
(13, 'Atham'),
(14, 'Chithira'),
(15, 'Chothi'),
(16, 'Visakham'),
(17, 'Ketta'),
(18, 'Moolam'),
(19, 'Pooradam'),
(20, 'Uthiradam'),
(21, 'Thiruvonam'),
(22, 'Avittam'),
(23, 'Chadayam'),
(24, 'Pooruttathi'),
(25, 'Uthirattathi'),
(26, 'Revathi');

# 30-12-2016
CREATE TABLE IF NOT EXISTS `religions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `castes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;