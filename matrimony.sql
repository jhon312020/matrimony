https://mysql.ord1-1.websitesettings.com/index.php?db=727033_matrimonial&server=134
Username : 727033_mmonial
Password : Matri@cc17
host : 140

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
  `religion` tinyint(1) NOT NULL DEFAULT '1',
  `location` tinyint(1) NOT NULL DEFAULT '1',
  `graduation` tinyint(1) NOT NULL DEFAULT '1',
  `occupation` tinyint(1) NOT NULL DEFAULT '1',
  `age` tinyint(1) NOT NULL DEFAULT '1',
  `star` tinyint(1) NOT NULL DEFAULT '1',
  `moon_sign` tinyint(1) NOT NULL DEFAULT '1',
  `zodiac_sign` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `search_limit_without_login` int(11) NOT NULL,
  `contact_us_email` varchar(255) NOT NULL,
  `smtp_username` varchar(250) NOT NULL,
  `smtp_host` varchar(250) NOT NULL,
  `smtp_password` varchar(250) NOT NULL,
  `fav_icon` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `payment_gateway_username` varchar(500) NOT NULL,
  `payment_gateway_password` varchar(500) NOT NULL,
  `payment_gateway_signature` varchar(500) NOT NULL,
  `payment_gateway_testmode` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


INSERT INTO `settings` (`id`, `title`, `religion`, `location`, `graduation`, `occupation`, `age`, `star`, `moon_sign`, `zodiac_sign`, `status`, `search_limit_without_login`, `contact_us_email`, `smtp_username`, `smtp_host`, `smtp_password`, `fav_icon`, `image`, `payment_gateway_username`, `payment_gateway_password`, `payment_gateway_signature`, `payment_gateway_testmode`, `created_at`, `updated_at`) VALUES
(1, 'Matrimony', 0, 0, 1, 1, 0, 1, 1, 0, 0, 12, 'jeeva@proisc.com', 'test@test.com', 'testhost', '9876', '1483539039_favicon.jpeg', '1483539039_logo.jpeg', '', '', '', '', '0000-00-00 00:00:00', '2017-01-05 04:38:18');


CREATE TABLE IF NOT EXISTS `members` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rand_id` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `avatar` varchar(500) NOT NULL,
  `gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `profile_rate` int(11) NOT NULL DEFAULT '20',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

#17-Jan-2017

CREATE TABLE IF NOT EXISTS `page_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `en_content` text NOT NULL,
  `tl_content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `members` ADD `remember_token` VARCHAR(500) NULL AFTER `profile_rate`;

#23-Jan-2017

CREATE TABLE IF NOT EXISTS `member_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `religion_id` int(11) NOT NULL,
  `caste_id` int(11) NOT NULL,
  `height` varchar(11) NOT NULL,
  `weight` varchar(11) NOT NULL,
  `status` int(11) NOT NULL,
  `children` varchar(50) NOT NULL,
  `body_type` varchar(50) NOT NULL,
  `complexion` varchar(50) NOT NULL,
  `mother_tongue` varchar(55) NOT NULL,
  `graduation_id` int(11) NOT NULL,
  `other_education` varchar(500) NOT NULL,
  `occupation` TEXT NOT NULL,
  `annual_income` varchar(500) NOT NULL,
  `hobbies` TEXT NOT NULL,
  `family_values` varchar(100) NOT NULL,
  `family_type` varchar(505) NOT NULL,
  `employedin` varchar(50) NOT NULL,
  `physical_status` varchar(50) NOT NULL,
  `district_id` varchar(50) NOT NULL,
  `package_payment` int(11) NOT NULL,
  `smoking_habits` varchar(500) NOT NULL,
  `drinking_habit` varchar(500) NOT NULL,
  `star_id` int(11) NOT NULL,
  `moonsign_id` varchar(500) NOT NULL,
  `familystatus` varchar(50) NOT NULL,
  `eating_habits` varchar(500) NOT NULL,
  `zodiacsign_id` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `state` varchar(500) NOT NULL,
  `district` varchar(500) NOT NULL,
  `college` varchar(500) NOT NULL,
  `education_in_detail` TEXT NOT NULL,
  `occupation_in_detail` TEXT NOT NULL,
  `fathers_status` TEXT NOT NULL,
  `mothers_status` TEXT NOT NULL,
  `no_of_brothers` int(11) NOT NULL,
  `brothers_married` varchar(10) NOT NULL,
  `no_of_sisters` int(11) NOT NULL,
  `sisters_married` varchar(10) NOT NULL,
  `about_my_family` TEXT NOT NULL,
  `facebook` varchar(500) DEFAULT NULL,
  `twitter` varchar(500) DEFAULT NULL,
  `google_plus` varchar(500) DEFAULT NULL,
  `upgrade_status` int(11) NOT NULL,
  `profile_strength` varchar(500) NOT NULL,
  `user_visibility` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `member_profile` ADD `about_myself` TEXT NOT NULL AFTER `user_visibility`, ADD `created_at` DATETIME NOT NULL AFTER `about_myself`, ADD `updated_at` DATETIME NOT NULL AFTER `created_at`;

ALTER TABLE `member_profile` CHANGE `status` `status_id` INT(11) NOT NULL;

# 28-Jan-2017
ALTER TABLE `member_profile` ADD `city` VARCHAR(255) NOT NULL AFTER `district`;

#30-Jan-2017
ALTER TABLE `member_profile`
  DROP `brothers_married`,
  DROP `sisters_married`;

ALTER TABLE `member_profil e` ADD `country_of_residency` VARCHAR(255) NOT NULL AFTER `country`;

ALTER TABLE `member_profile` ADD `partner_preference` TEXT NOT NULL AFTER `about_myself`;

ALTER TABLE `member_profile` DROP `district_id`;

DROP VIEW IF EXISTS `membersview`;
CREATE ALGORITHM=UNDEFINED VIEW `membersview` AS 
select `member_profile`.*,
       `members`.`rand_id`,
       `members`.`username`,
       `members`.`avatar`,
       `members`.`gender`,
       `members`.`email`,
       `members`.`phone_number`,
       `members`.`date_of_birth`,
       `members`.`is_active`,
       `members`.`profile_rate`,
       TIMESTAMPDIFF(YEAR,`members`.`date_of_birth`,CURDATE()) as `age`,
       `religions`.`name` as `religion`,
       `stars`.`name` as `star`,
       `moonsigns`.`name` as `moonsign`,
       `zodiacsigns`.`name` as `zodiacsign`,
       `castes`.`name` as `caste`,
       `status`.`name` as `status`,
       `graduations`.`name` as `graduation`
       from `member_profile` 
       LEFT JOIN `members` on `members`.`id` = `member_profile`.`member_id`
       LEFT JOIN `religions` on `religions`.`id` = `member_profile`.`religion_id`
       LEFT JOIN `stars` on `stars`.`id` = `member_profile`.`star_id`
       LEFT JOIN `moonsigns` on `moonsigns`.`id` = `member_profile`.`moonsign_id`
       LEFT JOIN `zodiacsigns` on `zodiacsigns`.`id` = `member_profile`.`zodiacsign_id`
       LEFT JOIN `castes` on `castes`.`id` = `member_profile`.`caste_id`
       LEFT JOIN `status` on `status`.`id` = `member_profile`.`status_id`
       LEFT JOIN `graduations` on `graduations`.`id` = `member_profile`.`graduation_id`;

CREATE TABLE IF NOT EXISTS `page_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `en_content` text NOT NULL,
  `ta_content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;


INSERT INTO `page_contents` (`id`, `name`, `en_content`, `ta_content`, `created_at`, `updated_at`) VALUES
(1, 'aboutUs', '<p>about us english content</p>\r\n', '<p><p>about us tamil content</p>', '2017-02-02 00:00:00', '2017-02-02 11:23:06'),
(2, 'contactus', '<p>contact us english content</p>\r\n', '<p>contact us tamil content</p>\r\n', '2017-02-15 00:00:00', '2017-02-01 13:56:06');
