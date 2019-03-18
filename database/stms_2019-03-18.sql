# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.22)
# Database: stms
# Generation Time: 2019-03-18 15:47:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table class_rooms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `class_rooms`;

CREATE TABLE `class_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `standard_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `room_id` varchar(20) NOT NULL,
  `strength` int(11) DEFAULT NULL,
  `incharge_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `room_id` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `class_rooms` WRITE;
/*!40000 ALTER TABLE `class_rooms` DISABLE KEYS */;

INSERT INTO `class_rooms` (`id`, `standard_id`, `division_id`, `room_id`, `strength`, `incharge_id`, `status`)
VALUES
	(2,16,6,'001',10,33,1);

/*!40000 ALTER TABLE `class_rooms` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table combinations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `combinations`;

CREATE TABLE `combinations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_room_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `combinations` WRITE;
/*!40000 ALTER TABLE `combinations` DISABLE KEYS */;

INSERT INTO `combinations` (`id`, `class_room_id`, `subject_id`, `teacher_id`, `status`)
VALUES
	(1,2,14,33,1);

/*!40000 ALTER TABLE `combinations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table divisions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `divisions`;

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `division_index` tinyint(4) NOT NULL,
  `division_name` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `division_index` (`division_index`),
  UNIQUE KEY `division_name` (`division_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `divisions` WRITE;
/*!40000 ALTER TABLE `divisions` DISABLE KEYS */;

INSERT INTO `divisions` (`id`, `division_index`, `division_name`, `status`)
VALUES
	(6,1,'1st Standard - A',1);

/*!40000 ALTER TABLE `divisions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table leaves
# ------------------------------------------------------------

DROP TABLE IF EXISTS `leaves`;

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `leave_date` date NOT NULL,
  `status` tinyint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table session_times
# ------------------------------------------------------------

DROP TABLE IF EXISTS `session_times`;

CREATE TABLE `session_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_index` tinyint(4) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `session_index` (`session_index`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `session_times` WRITE;
/*!40000 ALTER TABLE `session_times` DISABLE KEYS */;

INSERT INTO `session_times` (`id`, `session_index`, `from_time`, `to_time`, `status`)
VALUES
	(1,1,'09:00:00','10:00:00',1),
	(2,2,'10:00:00','11:00:00',1),
	(3,3,'11:00:00','12:00:00',1),
	(4,4,'12:00:00','13:00:00',1),
	(5,5,'13:00:00','14:00:00',1);

/*!40000 ALTER TABLE `session_times` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day_index` tinyint(4) NOT NULL,
  `session_index` tinyint(4) NOT NULL,
  `day_name` varchar(10) NOT NULL,
  `session_name` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;

INSERT INTO `sessions` (`id`, `day_index`, `session_index`, `day_name`, `session_name`, `status`)
VALUES
	(1,1,1,'Monday','Mo - 1',1),
	(2,1,2,'Monday','Mo - 2',1),
	(3,1,3,'Monday','Mo - 3',1),
	(4,1,4,'Monday','Mo - 4',1),
	(5,1,5,'Monday','Mo - 5',1),
	(6,2,1,'Tuesday','Tu - 1',1),
	(7,2,2,'Tuesday','Tu - 2',1),
	(8,2,3,'Tuesday','Tu - 3',1),
	(9,2,4,'Tuesday','Tu - 4',1),
	(10,2,5,'Tuesday','Tu - 5',1),
	(11,3,1,'Wednesday','We - 1',1),
	(12,3,2,'Wednesday','We - 2',1),
	(13,3,3,'Wednesday','We - 3',1),
	(14,3,4,'Wednesday','We - 4',1),
	(15,3,5,'Wednesday','We - 5',1),
	(16,4,1,'Thursday','Th - 1',1),
	(17,4,2,'Thursday','Th - 2',1),
	(18,4,3,'Thursday','Th - 3',1),
	(19,4,4,'Thursday','Th - 4',1),
	(20,4,5,'Thursday','Th - 5',1),
	(21,5,1,'Friday','Fr - 1',1),
	(22,5,2,'Friday','Fr - 2',1),
	(23,5,3,'Friday','Fr - 3',1),
	(24,5,4,'Friday','Fr - 4',1),
	(25,5,5,'Friday','Fr - 5',1);

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `working_days_in_week` tinyint(4) NOT NULL,
  `session_per_day` tinyint(4) NOT NULL,
  `time_table_status` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `working_days_in_week`, `session_per_day`, `time_table_status`, `status`)
VALUES
	(1,5,5,1,1);

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table standard_subject
# ------------------------------------------------------------

DROP TABLE IF EXISTS `standard_subject`;

CREATE TABLE `standard_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `standard_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `no_of_session_per_week` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `standard_subject` WRITE;
/*!40000 ALTER TABLE `standard_subject` DISABLE KEYS */;

INSERT INTO `standard_subject` (`id`, `standard_id`, `subject_id`, `no_of_session_per_week`)
VALUES
	(54,16,14,4);

/*!40000 ALTER TABLE `standard_subject` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table standards
# ------------------------------------------------------------

DROP TABLE IF EXISTS `standards`;

CREATE TABLE `standards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `standard_index` tinyint(4) NOT NULL,
  `standard_name` varchar(20) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `no_of_subjects` tinyint(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `standard_index` (`standard_index`),
  UNIQUE KEY `standard_name` (`standard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `standards` WRITE;
/*!40000 ALTER TABLE `standards` DISABLE KEYS */;

INSERT INTO `standards` (`id`, `standard_index`, `standard_name`, `level`, `no_of_subjects`, `status`)
VALUES
	(16,1,'1st Standard',1,5,1);

/*!40000 ALTER TABLE `standards` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table students
# ------------------------------------------------------------

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(50) NOT NULL,
  `class_room_id` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;

INSERT INTO `students` (`id`, `student_name`, `class_room_id`, `status`, `user_id`)
VALUES
	(1,'jugru_deleted',2,0,7),
	(2,'jugru',2,1,13);

/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table subjects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `category_id` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subject_name` (`subject_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;

INSERT INTO `subjects` (`id`, `subject_name`, `description`, `category_id`, `status`)
VALUES
	(14,'Science',NULL,2,1);

/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table substitutions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `substitutions`;

CREATE TABLE `substitutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `substitution_date` date NOT NULL,
  `leave_teacher_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `combination_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table teachers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teachers`;

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(50) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `no_of_session_per_week` tinyint(4) NOT NULL,
  `teacher_level` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;

INSERT INTO `teachers` (`id`, `teacher_name`, `category_id`, `description`, `no_of_session_per_week`, `teacher_level`, `status`, `user_id`)
VALUES
	(33,'Matt_deleted',1,NULL,5,4,0,NULL),
	(35,'Matt_deleted',2,NULL,5,3,0,2),
	(41,'Matt_deleted',2,NULL,5,3,0,6),
	(44,'Matt',2,NULL,5,3,1,12);

/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table timetable
# ------------------------------------------------------------

DROP TABLE IF EXISTS `timetable`;

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `combination_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) NOT NULL,
  `user_name` varchar(145) NOT NULL,
  `email` varchar(145) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `valid_till` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `password`, `role`, `remember_token`, `status`, `valid_till`, `updated_at`, `created_at`)
VALUES
	(1,'Mr. admin','admin','admin@sms.com','$2y$10$aksrUhUb45WJv.YsJijOKOzZkfL9pqCduz9ONB3Nt/OOVMcRdEnga',0,'Ix3s0wMZzjw5lKzTcJCBzsIzdgf00TcsaCvOHY7BjqlT2kqIse4pBvmcNzk0',1,NULL,'2019-02-18 23:28:37','2019-02-18 23:28:37'),
	(12,'Matt','matt','john@mathew.com','$2y$10$r.Hg5nD.R.tD10gR2ct3COBDrzuq8YOAkqsU73zCYQ3me00ztlJ0e',3,'Fc131EdQM7EDHrxuBweIy9ZSyyQnTd5G5ywqqNFmchE3aYXh11gIwz9oCiMf',1,NULL,'2019-03-16 12:57:09','2019-03-16 12:57:09'),
	(13,'jugru','jugru',NULL,'$2y$10$h1y1qurqZCnL4corfy3t0O69LmMVJd.0KATQGMdkCTkxvf7.oE1WC',4,'TcGHuW0KZSLfMTbyD1hmkekkO1KYCjkLruK6EcBhRRIZ4cyoFjdLY5nQLU2z',1,NULL,'2019-03-16 13:53:11','2019-03-16 13:53:11');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
