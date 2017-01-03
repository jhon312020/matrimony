CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

# 29-12-2016
CREATE TABLE IF NOT EXISTS `stars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;


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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `castes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

# 02-Jan-2017

ALTER TABLE `users` ADD `remember_token` VARCHAR(255) NOT NULL AFTER `is_active`;

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `locations` (`country`, `state`,`district`,`created_at`,`updated_at`) VALUES
('India','Tamilnadu','Chennai','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Salem','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Dindigul','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Ariyalur','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Coimbatore','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Cuddalore','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Dharmapuri','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Erode','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Kanchipuram','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Kanyakumari','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Karur','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Krishnagiri','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Madurai','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Nagapattinam','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Namakkal','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','The Nilgiris','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Perambalur','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Pudukkottai','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Ramanathapuram','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Salem','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Sivaganga','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Thanjavur','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Theni','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Thoothukudi','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Tamilnadu','Tiruchirappalli','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Kerala','Trivandrum','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Kerala','Kollam','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Kerala','Alappuzha','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('India','Kerala','Ernakulam','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('United States','California','Sonomo','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('United States','California','Inyo','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('United States','New York','SoHo','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('United States','New York','Chelsea','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Bagrami','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Char','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Asiab','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Deh','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Sabz','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Farza','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Guldara','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Istalif','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Kabul','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Kalakan','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Khaki','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Jabbar','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Mir','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Bacha','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Kot','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Mussahi','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Paghman','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Qarabagh','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Shakardara','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kabul','Surobi ','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kandahar','Arghandab','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kandahar','Arghistan','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Herat','Adraskan','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Herat','Farsi','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kunduz','Ali Abad','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Kunduz','Archi','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Taloqan','Baharak','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Taloqan','Bangi','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Jalalabad','Hisarak','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Jalalabad','Rodat','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Puli Khumri','Kahmard','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Puli Khumri','Dhusi','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Charikar','Bagram','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Charikar','Ghorband','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Sheberghan','Aqcha','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Sheberghan','Darzab','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Ghazni','Ab Band ','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Ghazni','Ajristan','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Sar-e Pol','Balkhab','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Sar-e Pol','Gosfandi','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Khost','Bak','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Khost','Gurbuz','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Chaghcharan','Tulak','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Chaghcharan','Saghar','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Farah','Anar Dara','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Farah','Bakwa','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Samangan','Aybak','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Samangan','Darah Sof Balla','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Lashkar Gah','Aynak','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Afghanistan','Lashkar Gah','Nava','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Albania','Berat','Leven','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Albania','Berat','Fier','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Albania','Delvine','Diber','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Albania','Delvine','Tirrana','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Albania','Devoll','puke','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Albania','Devoll','Skhoder','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Albania','Diber','Arras','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Albania','Diber','Lure','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Algeria','Adrar','Tit','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Algeria','Adrar','Tsabit','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Algeria','Chlef','Abou El Hassan','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Algeria','Chlef','Ain Merane','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Algeria','Laghouat','Aflou','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Algeria','Laghouat','AÃ¯n Mahdi','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Algeria','Oum el-Bouaghi',' Ain Beida','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Algeria','Oum el-Bouaghi','Ain Fakroun','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Algeria',' Batna','Ain Djasser','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Algeria',' Batna','Ain Touta','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('American Samoa','Tutulia','Western','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('American Samoa','Tutulia','Manu\'a','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('American Samoa','Colorado','Moffat','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('American Samoa','Colorado','Rouit','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Australia','Victoria','Altona ','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Australia','Victoria','Bass','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Australia','Queensland','Cairns','2017-01-02 13:37:25','2017-01-02 13:37:25'),
('Australia','Queensland','Dalrymple','2017-01-02 13:37:25','2017-01-02 13:37:25');

CREATE TABLE IF NOT EXISTS `moonsigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `zodiacsigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `graduations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `period` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

# 03-Jan-2017

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `religion` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `education` int(11) NOT NULL,
  `occupation` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `search_without_login` varchar(500) NOT NULL,
  `smtp_username` varchar(250) NOT NULL,
  `smtp_host` varchar(250) NOT NULL,
  `smtp_password` varchar(250) NOT NULL,
  `currency` varchar(500) NOT NULL,
  `fav_icon` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `payment_gateway_username` varchar(500) NOT NULL,
  `payment_gateway_password` varchar(500) NOT NULL,
  `payment_gateway_signature` varchar(500) NOT NULL,
  `payment_gateway_testmode` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


INSERT INTO `settings` (`id`, `title`, `religion`, `place`, `education`, `occupation`, `age`, `search_without_login`, `smtp_username`, `smtp_host`, `smtp_password`, `currency`, `fav_icon`, `image`, `payment_gateway_username`, `payment_gateway_password`, `payment_gateway_signature`, `payment_gateway_testmode`) VALUES
(1, 'Matrimony', 1, 1, 1, 1, 1, 'on', '', '', '', '$', '', '', '', '', '', '');
