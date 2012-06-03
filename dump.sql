-- Create syntax for TABLE 'declarations'
CREATE TABLE `declarations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `declaration_1` tinyint(1) DEFAULT NULL,
  `declaration_2` tinyint(1) DEFAULT NULL,
  `declaration_3` tinyint(1) DEFAULT NULL,
  `declaration_4` tinyint(1) DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Create syntax for TABLE 'educations'
CREATE TABLE `educations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `qualification` text,
  `degree` varchar(100) DEFAULT NULL,
  `graduation` int(11) DEFAULT NULL,
  `college` text,
  `country` text,
  `date_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `notes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Create syntax for TABLE 'groups'
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Create syntax for TABLE 'personals'
CREATE TABLE `personals` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `country_of_residence` varchar(255) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `alternate_email` varchar(100) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobilephone` varchar(45) DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Create syntax for TABLE 'skills'
CREATE TABLE `skills` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `w_computer` varchar(45) DEFAULT NULL,
  `h_computer` varchar(45) DEFAULT NULL,
  `internet_cafe` varchar(45) DEFAULT NULL,
  `internet_work` varchar(45) DEFAULT NULL,
  `internet_home` varchar(45) DEFAULT NULL,
  `broadband_work` varchar(45) DEFAULT NULL,
  `broadband_home` varchar(45) DEFAULT NULL,
  `computer_courses` text,
  `language` varchar(45) DEFAULT 'English',
  `language_level` varchar(45) DEFAULT NULL,
  `language_other` varchar(45) DEFAULT NULL,
  `language_other_level` varchar(45) DEFAULT NULL,
  `ms_word` varchar(45) DEFAULT NULL,
  `ms_excel` varchar(45) DEFAULT NULL,
  `ms_project` varchar(45) DEFAULT NULL,
  `lotus_notes` varchar(45) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `myspace` varchar(45) DEFAULT NULL,
  `youtube` varchar(45) DEFAULT NULL,
  `photoshop` varchar(45) DEFAULT NULL,
  `google_docs` varchar(45) DEFAULT NULL,
  `google_calendar` varchar(45) DEFAULT NULL,
  `gmail` varchar(45) DEFAULT NULL,
  `hotmail` varchar(45) DEFAULT NULL,
  `skype` varchar(45) DEFAULT NULL,
  `other_apps` varchar(45) DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Create syntax for TABLE 'statements'
CREATE TABLE `statements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `benefits` text,
  `uses` text,
  `date_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Create syntax for TABLE 'submitted_forms'
CREATE TABLE `submitted_forms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` tinyint(8) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'ongoing',
  `date_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Create syntax for TABLE 'supervisors'
CREATE TABLE `supervisors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `w_phone` varchar(45) DEFAULT NULL,
  `h_phone` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `a_email` varchar(100) DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Create syntax for TABLE 'users'
CREATE TABLE `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` int(10) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Create syntax for TABLE 'users_groups'
CREATE TABLE `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Create syntax for TABLE 'works'
CREATE TABLE `works` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `sponsor` text,
  `other_sponsor` text,
  `sector` text,
  `role` text,
  `other_role` text,
  `years` int(11) DEFAULT '1',
  `supervised` int(11) DEFAULT '1',
  `experience` int(11) DEFAULT '1',
  `date_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;