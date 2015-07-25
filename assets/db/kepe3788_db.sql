# Host: localhost  (Version: 5.6.21)
# Date: 2015-07-12 22:14:46
# Generator: MySQL-Front 5.3  (Build 4.191)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "article"
#

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `image_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `summary` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  FULLTEXT KEY `summary` (`summary`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Data for table "article"
#

/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (12,2,3,17,'The standard Lorem Ipsum','lorem, Ipsum','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.</p>','published','2015-04-13 16:17:54','2015-04-13 16:17:54',NULL),(13,1,3,18,'The standard Lorem Ipsum First','lorem, Ipsum','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.</p>','published','2015-05-20 17:22:29','2015-05-20 17:22:29',NULL),(14,3,3,19,'The standard Lorem Ipsum Second','lorem, Ipsum','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.</p>','published','2015-06-20 17:22:53','2015-06-20 17:23:20',NULL),(15,1,3,20,'The standard Lorem Ipsum Last','lorem, Ipsum','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.</p>','published','2015-06-20 17:22:53','2015-06-20 17:23:20',NULL);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

#
# Structure for table "article_blog"
#

DROP TABLE IF EXISTS `article_blog`;
CREATE TABLE `article_blog` (
  `artcle_blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL DEFAULT '0',
  `body` text,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`artcle_blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "article_blog"
#

/*!40000 ALTER TABLE `article_blog` DISABLE KEYS */;
INSERT INTO `article_blog` VALUES (1,12,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','2015-06-13 16:17:54',NULL,NULL),(2,12,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','2015-06-13 16:17:54',NULL,NULL),(3,12,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','2015-06-13 16:17:54',NULL,NULL),(4,13,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','2015-06-20 17:22:29',NULL,NULL),(5,13,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','2015-06-20 17:22:29',NULL,NULL),(6,14,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','2015-06-20 17:22:53',NULL,NULL),(7,14,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','2015-06-20 17:22:53',NULL,NULL);
/*!40000 ALTER TABLE `article_blog` ENABLE KEYS */;

#
# Structure for table "article_category"
#

DROP TABLE IF EXISTS `article_category`;
CREATE TABLE `article_category` (
  `article_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`article_category_id`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "article_category"
#

/*!40000 ALTER TABLE `article_category` DISABLE KEYS */;
INSERT INTO `article_category` VALUES (1,0,'Videografi','Videografi','2015-06-12 00:00:00','2015-06-12 00:00:00',NULL),(2,0,'Sinematografi','Sinematografi','2015-06-12 00:00:00','2015-06-12 00:00:00',NULL),(3,0,'Fotografi','Fotografi','2015-06-12 00:00:00','2015-06-12 00:00:00',NULL);
/*!40000 ALTER TABLE `article_category` ENABLE KEYS */;

#
# Structure for table "article_comment"
#

DROP TABLE IF EXISTS `article_comment`;
CREATE TABLE `article_comment` (
  `article_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL DEFAULT '0',
  `nick_name` varchar(255) NOT NULL DEFAULT '',
  `site` varchar(255) DEFAULT NULL,
  `body` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`article_comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "article_comment"
#

/*!40000 ALTER TABLE `article_comment` DISABLE KEYS */;
INSERT INTO `article_comment` VALUES (1,15,'Syahrul Ramadhan',NULL,'Dahsyat ...','published','2015-07-11 15:18:19',NULL),(2,15,'Herman Wahyudi',NULL,'Kalian semua luar biasa ... :D','published','2015-07-11 23:52:09',NULL);
/*!40000 ALTER TABLE `article_comment` ENABLE KEYS */;

#
# Structure for table "article_stat"
#

DROP TABLE IF EXISTS `article_stat`;
CREATE TABLE `article_stat` (
  `article_stat_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '',
  `user_agent` varchar(120) DEFAULT NULL,
  `request_time` varchar(255) DEFAULT NULL,
  `memory_usage` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`article_stat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "article_stat"
#

/*!40000 ALTER TABLE `article_stat` DISABLE KEYS */;
INSERT INTO `article_stat` VALUES (1,15,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436681152','1835008','2015-07-12 13:05:52'),(2,15,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436692445','1835008','2015-07-12 16:14:05'),(3,15,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436692447','1835008','2015-07-12 16:14:08');
/*!40000 ALTER TABLE `article_stat` ENABLE KEYS */;

#
# Structure for table "image"
#

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `tag` varchar(255) DEFAULT NULL,
  `body` text,
  `type` varchar(255) NOT NULL DEFAULT '',
  `size` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "image"
#

/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (1,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/slider/slider-1.jpg','2015-06-06 07:23:23','2015-06-06 07:23:23',NULL),(2,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/slider/slider-3.jpg','2015-06-06 08:21:22','2015-06-06 08:21:22',NULL),(3,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/slider/slider-2.jpg','2015-06-06 08:21:22','2015-06-06 08:21:22',NULL),(4,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/slider/slider-4.jpg','2015-06-06 08:21:22','2015-06-06 08:21:22',NULL),(5,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/video/img (1).jpg',NULL,NULL,NULL),(6,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/video/img (2).jpg',NULL,NULL,NULL),(7,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/video/img (3).jpg',NULL,NULL,NULL),(8,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/video/img (4).jpg',NULL,NULL,NULL),(9,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/video/img (5).jpg',NULL,NULL,NULL),(10,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/video/img (6).jpg',NULL,NULL,NULL),(11,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/video/img (7).jpg',NULL,NULL,NULL),(12,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/video/img (8).jpg',NULL,NULL,NULL),(13,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/video/img (9).jpg',NULL,NULL,NULL),(14,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/video/img (10).jpg',NULL,NULL,NULL),(15,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/video/img (11).jpg',NULL,NULL,NULL),(16,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/video/img (13).jpg',NULL,NULL,NULL),(17,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/article/img (1).jpg',NULL,NULL,NULL),(18,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/article/img (4).jpg',NULL,NULL,NULL),(19,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/article/img (10).jpg',NULL,NULL,NULL),(20,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/article/img (11).jpg',NULL,NULL,NULL),(21,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/news/img (3).jpg',NULL,NULL,NULL),(22,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/news/img (9).jpg',NULL,NULL,NULL),(23,'kepoabiscom',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','','','assets/img/news/img (13).jpg',NULL,NULL,NULL);
/*!40000 ALTER TABLE `image` ENABLE KEYS */;

#
# Structure for table "menu"
#

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '1',
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('unpublished','pending','published') CHARACTER SET latin1 DEFAULT 'pending',
  `active` int(2) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NULL DEFAULT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

#
# Data for table "menu"
#

INSERT INTO `menu` VALUES (1,0,1,'static_content','About Us','about-us','published',1,'2015-06-21 00:00:00',NULL,NULL),(2,0,1,'default','Portfolio','portfolio','published',1,'2015-06-21 00:00:00',NULL,NULL),(3,0,1,'default','Contact Us','contact-us','published',1,'2015-06-21 00:00:00',NULL,NULL);

#
# Structure for table "news"
#

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `image_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `tag` varchar(255) DEFAULT NULL,
  `summary` text,
  `body` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`news_id`),
  FULLTEXT KEY `summary` (`summary`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "news"
#

/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,1,3,21,'1914 translation by H. Rackham First','translation lorem, ipsum','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.</p>','<p>This blog post shows a few different types of content that\'s supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>\n\t\t<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\n\t\t<ul>\n\t\t\t<li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\n\t\t\t<li>Donec id elit non mi porta gravida at eget metus.</li>\n\t\t\t<li>Nulla vitae elit libero, a pharetra augue.</li>\n\t\t</ul>\n\t\t<p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>\n\t\t<ol>\n\t\t\t<li>Vestibulum id ligula porta felis euismod semper.</li>\n\t\t\t<li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>\n\t\t\t<li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>\n\t\t</ol>\n\t\t<p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>','published','2015-04-13 16:17:54','2015-04-13 16:17:54',NULL),(2,1,3,22,'1914 translation by H. Rackham Second','lorem, ipsum','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.</p>','<p>Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>\n\t\t\t\t<blockquote>\n\t\t\t\t  <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\n\t\t\t\t</blockquote>\n\t\t\t\t<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\n\t\t\t\t<p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>','published','2015-05-01 17:22:29','2015-05-01 17:22:29',NULL),(3,1,3,23,'1914 translation by H. Rackham Last','lorem, ipsum','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.</p>','<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\n\t\t\t\t<ul>\n\t\t\t\t  <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\n\t\t\t\t  <li>Donec id elit non mi porta gravida at eget metus.</li>\n\t\t\t\t  <li>Nulla vitae elit libero, a pharetra augue.</li>\n\t\t\t\t</ul>\n\t\t\t\t<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\n\t\t\t\t<p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>','published','2015-06-20 17:22:53','2015-06-20 17:23:20',NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

#
# Structure for table "news_category"
#

DROP TABLE IF EXISTS `news_category`;
CREATE TABLE `news_category` (
  `news_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`news_category_id`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "news_category"
#

/*!40000 ALTER TABLE `news_category` DISABLE KEYS */;
INSERT INTO `news_category` VALUES (1,0,'Event','Event','2015-06-12 00:00:00','2015-06-12 00:00:00',NULL);
/*!40000 ALTER TABLE `news_category` ENABLE KEYS */;

#
# Structure for table "news_comment"
#

DROP TABLE IF EXISTS `news_comment`;
CREATE TABLE `news_comment` (
  `news_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL DEFAULT '0',
  `nick_name` varchar(255) NOT NULL DEFAULT '',
  `site` varchar(255) DEFAULT NULL,
  `body` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`news_comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "news_comment"
#

/*!40000 ALTER TABLE `news_comment` DISABLE KEYS */;
INSERT INTO `news_comment` VALUES (1,3,'Syahrul Ramadhan',NULL,'Luar biasa ....','published','2015-07-11 15:19:31',NULL);
/*!40000 ALTER TABLE `news_comment` ENABLE KEYS */;

#
# Structure for table "news_stat"
#

DROP TABLE IF EXISTS `news_stat`;
CREATE TABLE `news_stat` (
  `news_stat_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '',
  `user_agent` varchar(120) DEFAULT NULL,
  `request_time` varchar(255) DEFAULT NULL,
  `memory_usage` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`news_stat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "news_stat"
#

/*!40000 ALTER TABLE `news_stat` DISABLE KEYS */;
INSERT INTO `news_stat` VALUES (1,3,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436680541','1835008','2015-07-12 12:55:41'),(2,3,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436680621','1835008','2015-07-12 12:57:01'),(3,3,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436681149','1835008','2015-07-12 13:05:49'),(4,3,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436681823','1835008','2015-07-12 13:17:03'),(5,3,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436714034','1835008','2015-07-12 22:13:55');
/*!40000 ALTER TABLE `news_stat` ENABLE KEYS */;

#
# Structure for table "registration"
#

DROP TABLE IF EXISTS `registration`;
CREATE TABLE `registration` (
  `registration_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` text,
  `interest` varchar(255) DEFAULT NULL,
  `flag` enum('true','false') DEFAULT 'true',
  `reason` text,
  PRIMARY KEY (`registration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "registration"
#


#
# Structure for table "setting"
#

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `description` text,
  `background_color` varchar(255) DEFAULT NULL,
  `contact_address` text,
  `contact_phone` varchar(255) DEFAULT NULL,
  `contact_phone_mobile_first` varchar(255) DEFAULT NULL,
  `contact_phone_mobile_second` varchar(255) DEFAULT NULL,
  `contact_fax` varchar(255) DEFAULT NULL,
  `contact_email_address_first` varchar(255) DEFAULT NULL,
  `contact_email_address_second` varchar(255) DEFAULT NULL,
  `contact_lat` varchar(255) DEFAULT NULL,
  `contact_long` varchar(255) DEFAULT NULL,
  `contact_city` varchar(255) DEFAULT NULL,
  `contact_state` varchar(255) DEFAULT NULL,
  `contact_zip` varchar(255) DEFAULT NULL,
  `contact_country` varchar(255) DEFAULT NULL,
  `contact_facebook` varchar(255) DEFAULT NULL,
  `contact_twitter` varchar(255) DEFAULT NULL,
  `contact_googleplus` varchar(255) DEFAULT NULL,
  `contact_youtube` varchar(255) DEFAULT NULL,
  `content_title` text,
  `content_body` text,
  `content_mission` text,
  `content_image` varchar(255) DEFAULT NULL,
  `created_year` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `footer` text,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "setting"
#

INSERT INTO `setting` VALUES (1,0,'KepoAbis.com','b7d6537d27b26a5878d476104cf70186.png','Always make you curious','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s. <strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s.</p>','#000000','Jalan Pelita RT 02/09 No. 69 Kel. Tengah, Kec. Kramat Jati','085697309204','','','23456','hi@kepoabis.com','contact@kepoabis.com','-6.290491','106.860785','Jakarta Timur','DKI Jakarta','13540','Indonesia','https://www.facebook.com/kepoabiscom','https://twitter.com/KepoAbisCom','https://plus.google.com/108330573883645796122','https://www.youtube.com/channel/UCjCQDSEsDTqq7wmth70khLQ','Kepoabis.com is a <strong>videography community</strong>. Our Focus is to create a creative videos which can inspiring people to aplicated to their live what we showed.','Kepoabis.com is a videography community based in Jakarta, Indonesia. The embryo of this community was created back in October 2013 by 4 co-founders, Haris Millah Muhammad, Ahmad Khairi, Syahrul Ramadhan, and Herman Wahyudi.\n<br>\n<br>\nOur Focus is to create a creative videos which can inspiring people to aplicated to their live what we showed. We also act as a media partner for any client who needs a creative documentation. We commit to give a full service that help our clients expand their digital reach. ','To shows an emerging social reality that we pack as a video.\n<br>To give various entertaining and unique info. \n<br>Insert a humour value in our video without eliminating the substance of video’s topic.','logo.png','2013','1.0.0','<p>© Copyright 2013 - 2015 Haamill Productions - All Rights reserved</p>');

#
# Structure for table "static_content"
#

DROP TABLE IF EXISTS `static_content`;
CREATE TABLE `static_content` (
  `static_content_Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `image_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `tag` varchar(255) DEFAULT NULL,
  `parameter` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `summary` text,
  `body` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`static_content_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "static_content"
#

INSERT INTO `static_content` VALUES (1,3,0,'About Us','about, us','about-us','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>','published','2015-06-20 17:22:53',NULL,NULL);

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_basic_id` int(11) NOT NULL DEFAULT '3',
  `nama_lengkap` varchar(25) NOT NULL DEFAULT '',
  `user_name` varchar(25) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` text,
  `phone_number` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `body` text,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (3,1,'Administrator','admin','25d55ad283aa400af464c76d713c07ad',NULL,NULL,'administrator@gmail.com',NULL,NULL,'d697cf246a144e1c5e56a1ed2d91d7fa.jpg',NULL,NULL,'2015-06-06 00:00:00','2015-06-20 16:43:01',NULL),(32,2,'Administrator','kepoabiscom','25d55ad283aa400af464c76d713c07ad',NULL,NULL,'hermanwahyudi@rocketmail.com',NULL,NULL,'4a91a49b776afda15919ce19e8a8e606.jpg',NULL,NULL,'2015-06-11 19:10:24','2015-06-20 11:02:44',NULL),(34,2,'Administrator','kepoabisdotcom','25d55ad283aa400af464c76d713c07ad',NULL,NULL,'sramadhan95@gmail.com',NULL,NULL,'78c6d5f7d9b7e79a17b4261867b9baac.jpg',NULL,NULL,'2015-06-20 11:02:25','2015-06-20 11:02:25',NULL),(35,3,'Haaris Millah Muhammad','haaris.millah.muhammad','3d4dd8af06196347d9df28537cc7160a','1992-10-07','Jakarta','swtsvntn@gmail.com','Jl. Pelita RT 02/09 No 69 Kramat Jati, Jakarta',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(36,3,'Ahmad Khairi Nawawi Lubis','ahmad.khairi.nawawi.lubis','3d4dd8af06196347d9df28537cc7160a','1991-08-13','Medan','ahmadkhairinl@gmail.com','Jl. Benda Timur 1c no. 9, Pamulang Permai 2, TangSel',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(37,3,'Farhan Rabbani','farhan.rabbani','3d4dd8af06196347d9df28537cc7160a','1991-10-12','Jakarta','haanrabbani@gmail.com','Jl. Seha II, Kebayoran Lama',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(38,3,'Syahrul Ramadhan','syahrul.ramadhan','3d4dd8af06196347d9df28537cc7160a','1991-04-13','Tangerang','sramadhan95@gmail.com','JL. Arimbi II, RT 002/002 No. 41, Tangerang Selatan',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(39,3,'Herman Wahyudi','herman.wahyudi','3d4dd8af06196347d9df28537cc7160a','1991-09-19','Jakarta','herman.wahyudi02@gmail.com','Jl Peningaran Timur II No. 45 RT03/09, Keb Lama',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(40,3,'Muhammad Iqbal Husein','muhammad.iqbal.husein','3d4dd8af06196347d9df28537cc7160a','1991-02-12','Tangerang','iqbalmohammed.1202@gmail.com','Komp. Kementrian Agama RT 04/007 Blok lV E3 Bambu Apus, Tangerang Selatan.',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(41,3,'Syarah Nabilah','syarah.nabilah','3d4dd8af06196347d9df28537cc7160a','1991-08-13','Tangerang ','belanabila1308@yahoo.co.id','Komp. Kompas II Jl. Ratu Bidadari 1 No.3 Rt.003 Rw 006 Ciputat Tangerang',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(42,3,'Mohammad Zulfikar Alfians','mohammad.zulfikar.alfians','3d4dd8af06196347d9df28537cc7160a','1997-10-04','Jakarta','zulfikar.alfi@gmail.com','Jl. Soka B3/36 Pamulang MA, Pamulang',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(43,3,'Izqadinda Nurhaliza','izqadinda.nurhaliza','3d4dd8af06196347d9df28537cc7160a','1997-07-27','Bogor','izqadinda@gmail.com','Jl. Niaga Hijau 8 No.23 Pondok Indah Jakarta Selatan.',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(44,3,'Ahmad Rayhan Addawa','ahmad.rayhan.addawa','3d4dd8af06196347d9df28537cc7160a','1998-04-25','Jakarta','ahmad.rayhangg@gmail.com','Jl. Cabe 3 Gg. H. Daman No. 6A RT 01/05',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(45,3,'Ja\'far Shadiq Alatas','ja\'far.shadiq.alatas','3d4dd8af06196347d9df28537cc7160a','1999-01-25','Bekasi','shadiq.alatas@yahoo.com','Gg. Poncol No.77, Batu Ampar, Kramat Jati, Jakarta Timur',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(46,3,'Adil Azka Dhiyaan Fadhlur','adil.azka.dhiyaan.fadhlur','3d4dd8af06196347d9df28537cc7160a','1999-04-03','Cirebon','azka.dhiyaan@gmail.com','Komplek Batan Indah L 60, Tangerang Selatan, Banten',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(47,3,'Muhammad Fatahillah Hendr','muhammad.fatahillah.hendr','3d4dd8af06196347d9df28537cc7160a','1999-06-22','Jakarta','fatah.hanif@gmail.com','Jl. Melina 3 no.15 Komp. Pertamina Ciputat, Tangerang Selatan, Banten',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(48,3,'Muhammad Zaidan Amir','muhammad.zaidan.amir','3d4dd8af06196347d9df28537cc7160a','1999-07-13','Jakarta','zaidan.amir@live.com','Jln. Dipenogoro blok C32 No 12 Sarua Permai, Benda Baru, Pamulang',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(49,3,'Muhammad Fadhlirahman','muhammad.fadhlirahman','3d4dd8af06196347d9df28537cc7160a','1998-10-01','Jakarta','fadhlirahman@live.com','Permata Bintaro, Taman Permata 1. Jl. Trulek XII Blok HG 26 no 14 Bintaro.',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(50,3,'Mashitha Trisha Helena','mashitha.trisha.helena','3d4dd8af06196347d9df28537cc7160a','1998-04-10','Jakarta','hellenamashita33@gmail.com','Jl. Gunung Raya RT 04/RW 03 No 3. Cirendeu-Ciputat Timur, Tangerang Selatan.',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(51,3,'Syifa Fauziah','syifa.fauziah','3d4dd8af06196347d9df28537cc7160a','1998-01-19','Jakarta','syifasyakh@gmail.com','Jl. Persahabatan, No 40 RT 06/02 Cinere, Depok',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(52,3,'Amadea Anna Rois','amadea.anna.rois','3d4dd8af06196347d9df28537cc7160a','1999-10-02','Solo','amadera.rois@yahoo.com','Jl. Asri 1  Blok B1 No. 15 Komp. Hankam, Bogor',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(53,3,'Annisa Sedjati','annisa.sedjati','3d4dd8af06196347d9df28537cc7160a','1999-03-20','Tangerang','Annisasedjati@gmail.com','Pamulang Permai 1 A13/13',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(54,3,'Lailaurieta Salsabila Mum','lailaurieta.salsabila.mum','3d4dd8af06196347d9df28537cc7160a','1999-10-26','Tangerang','olamumtaz@gmail.com','Jl. Palapa No. 94, Serua, Ciputat',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(55,3,'Muthia Anggita Ramadhani','muthia.anggita.ramadhani','3d4dd8af06196347d9df28537cc7160a','1999-12-19','Jakarta','ramadhanimuthia07@gmail.com','Cilandak Barat, Jakarta Selatan',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(56,3,'Sheilla Difa R','sheilla.difa.r','3d4dd8af06196347d9df28537cc7160a','1999-01-08','Tangerang','sheilladifa@gmail.com','Jl. Jawa 2 BJ4 No. 5, Nusa Loka, BSD City, Tangerang Selatan',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(57,3,'Lisa Alvianne Farastrie','lisa.alvianne.farastrie','3d4dd8af06196347d9df28537cc7160a','1999-06-19','Jakarta','lisaoffic@gmail.cm','Villa Dago Pamulang Alam Asri 3 J 11/2',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(58,3,'Adena Salsabila','adena.salsabila','3d4dd8af06196347d9df28537cc7160a','1999-12-30','Jakarta','adenasalsabila@gmail.com','Pondok Maharta B32 No. 14 RT 09/10 Pondok Aren Tangerang Selatan',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(59,3,'Faqihah Muharroroh Itsnai','faqihah.muharroroh.itsnai','3d4dd8af06196347d9df28537cc7160a','1999-07-12','Malang','faqihakiky@yahoo.com','Komplek Kampus IPDN Blok C No. 21 Jl. Ampera Raya, Cilandak Timur, Jakarta',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(60,3,'Alisya Salsabillah','alisya.salsabillah','3d4dd8af06196347d9df28537cc7160a','1998-11-28','Jakarta','alisya_salsabillah@yahoo.com','Jl. Musyawarah No. 5 RT 05/13 Kebun Jeruk, Jakarta Barat',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(61,3,'Nafira Salsabila','nafira.salsabila','3d4dd8af06196347d9df28537cc7160a','1999-05-19','Tangerang','nafirasalsabila44@gmail.com','Pamulang Villa BDE 4 No 23',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(62,3,'Vania Soraya Nadilaputri','vania.soraya.nadilaputri','3d4dd8af06196347d9df28537cc7160a','1998-08-04','Jakarta','vaniasoraya98@gmail.com','Taman Kedaung Jl. Mawar 12 D4 No. 26',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(63,3,'Nadiah Virra Azzahra','nadiah.virra.azzahra','3d4dd8af06196347d9df28537cc7160a','1999-10-22','Jakarta','nadiahvirraazzahra@gmail.com','Perumahan Griya Pamulang 2 BE1/20',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(64,3,'Okky Dayinna','okky.dayinna','3d4dd8af06196347d9df28537cc7160a','1999-05-18','Jakarta','okkydn18@gmail.com','Jl. HOS Cokroaminoto, Gg Sukarela, Komp Paninggilan Mutiara Cluster BA3 Ciledug',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(65,3,'Afridal Akhfillah Hakim','afridal.akhfillah.hakim','3d4dd8af06196347d9df28537cc7160a','1999-09-05','Jakarta','afridalakhfillahhakim05@gmail.com','Jl. H. Abdul Majid Dalam III No. 30 Komp. Deplu. Jakarta Selatan',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(66,3,'Muhammad Yaqzhan','muhammad.yaqzhan','3d4dd8af06196347d9df28537cc7160a','1997-11-26','Jakarta','myaqzhan49@gmail.com','Jl. Pemancingan No. 9A Srenseng, Kembangan, Jakarta Barat',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(67,3,'Hana Divani Zahra','hana.divani.zahra','3d4dd8af06196347d9df28537cc7160a','1998-02-11','Tangerang','','Jl. Pengasinan Raya No. 18 Sawangan Depok',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(68,3,'Naufal Yafiah Mahfudz','naufal.yafiah.mahfudz','3d4dd8af06196347d9df28537cc7160a','1999-11-11','Tangerang','yafimhfdz@gmail.com','Jl. Sastra Kencana 1 BV8/17 Sektor 12.5, Kencana Loka,  BSD',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(69,3,'Nadya Safira Almandiri','nadya.safira.almandiri','3d4dd8af06196347d9df28537cc7160a','1999-05-22','Jakarta','almandirisafira@yahoo.com','Graha Raya Bintaro, Jl. Anggrek Loka A4 No. 1',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(70,3,'Fajri Malik Amrullah','fajri.malik.amrullah','3d4dd8af06196347d9df28537cc7160a','2000-01-11','Tangerang','fajrimalik.912014@gmail.com','Jl. Kerosin Raya Blok K8/C14 Komplek Pertamina, Pondok Ranji',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(71,3,'Kintan Putri Salsabil','kintan.putri.salsabil','3d4dd8af06196347d9df28537cc7160a','1998-04-08','Jakarta','kintankins@yahoo.com','Jl. Masjid Al Huda RT002/17 No. 80 Jombang, Ciputat',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(72,3,'Nurul Amanah','nurul.amanah','3d4dd8af06196347d9df28537cc7160a','1998-11-06','Jakarta','nurulamanah06@yahoo.com','Jl. Cempaka 5 No. 48 Bintaro, Pesanggrahan, Jakarta Selatan',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(73,3,'Muhammad Al Faroby','muhammad.al.faroby','3d4dd8af06196347d9df28537cc7160a','1998-06-28','Pekanbaru','emailinijangandibuka@gmail.com','Oma Regency Jati Warna Jl. Hankam Raya BE8, Jatimelati, Bekasi',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(74,3,'Rahmaningtyas Nur Fitria ','rahmaningtyas.nur.fitria.','3d4dd8af06196347d9df28537cc7160a','1998-07-16','Tangerang','rahmaningtyasnfr@gmail.com','Komp. Mutiara Garuda BA8 No. 9, Kampung Melayu Timur, Tangerang',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL),(75,3,'Aldi Safirda Zulfikar','aldi.safirda.zulfikar','3d4dd8af06196347d9df28537cc7160a','1998-06-09','Tangerang','Aldi.safirda@yahoo.com','Jl. Ulujami Raya Gg. RW RT 04/01 Pesanggrahan, Jakarta Selatan',NULL,NULL,NULL,NULL,'2015-07-07 01:14:30',NULL,NULL);

#
# Structure for table "user_role_basic"
#

DROP TABLE IF EXISTS `user_role_basic`;
CREATE TABLE `user_role_basic` (
  `user_role_basic_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_name_alias` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(2) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_role_basic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

#
# Data for table "user_role_basic"
#

INSERT INTO `user_role_basic` VALUES (1,'superadmin','Super Administrator',1,'2015-06-20 07:35:20'),(2,'admin','Administrator',1,'2015-06-20 07:35:25'),(3,'crew','Crew',1,'2015-06-20 07:35:31');

#
# Structure for table "user_role_basic_grup"
#

DROP TABLE IF EXISTS `user_role_basic_grup`;
CREATE TABLE `user_role_basic_grup` (
  `user_role_basic_grup_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_basic_id` int(11) DEFAULT '0',
  `active` int(2) NOT NULL DEFAULT '1',
  `created_date` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_role_basic_grup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "user_role_basic_grup"
#


#
# Structure for table "user_role_grup"
#

DROP TABLE IF EXISTS `user_role_grup`;
CREATE TABLE `user_role_grup` (
  `user_role_grup_id` int(11) NOT NULL AUTO_INCREMENT,
  `grup_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(2) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_role_grup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

#
# Data for table "user_role_grup"
#


#
# Structure for table "user_role_item"
#

DROP TABLE IF EXISTS `user_role_item`;
CREATE TABLE `user_role_item` (
  `user_role_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_grup_id` int(11) NOT NULL,
  `role_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(2) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_role_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

#
# Data for table "user_role_item"
#


#
# Structure for table "video"
#

DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `video_category_id` varchar(50) NOT NULL DEFAULT '',
  `image_id` int(11) NOT NULL DEFAULT '0',
  `tag` text NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `story_ide` varchar(50) DEFAULT NULL,
  `screenwriter` varchar(50) DEFAULT NULL,
  `film_director` varchar(50) DEFAULT NULL,
  `cameramen` varchar(50) DEFAULT NULL,
  `artist` text,
  `url` varchar(255) NOT NULL DEFAULT '',
  `duration` varchar(8) NOT NULL DEFAULT '',
  `status` varchar(15) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`video_id`),
  FULLTEXT KEY `description` (`description`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "video"
#

/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (5,3,'2',8,'like, father, daughter','Like Father Like Daughter','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=lbYbFmG7eu0','01.39','published','2015-06-14 04:20:38','2015-06-20 07:57:01',NULL),(6,3,'7',12,'Intro, kepoAbis.com','Intro KepoAbis.com','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=TjBvuQ_Qj-0','02.12','published','2015-03-14 04:50:46','2015-03-14 04:50:46',NULL),(7,3,'3',5,'ace hardware, indonesia, video competition','Ace Hardware untuk Indonesia - ACE Hardware Video Competition','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=VjN4Xl3DN_I','01.22','published','2015-06-14 04:51:35','2015-06-20 07:55:50',NULL),(8,3,'1',7,'enjoy jakarta, enjoy your day, jakarta, kepo abis','Enjoy Jakarta Enjoy Your Day, Nikmati Caramu','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=dg_IomGAkmU','01.09','published','2015-03-14 04:50:46','2015-03-14 04:50:46',NULL),(9,34,'9',6,'duit kotor, kepo abis','Masih Mau Duit Kotor','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=LF0j-DMAxPw','01.09','published','2015-03-14 04:50:46','2015-03-14 04:50:46',NULL),(10,32,'4',9,'harta, tahta, wanita','Harta, Tahta, & Wanita','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=Y6wUbCjed00','01.09','published','2015-04-20 07:54:22','2015-04-20 07:54:22',NULL),(11,32,'1',13,'the youthpreneur your future, VirusWirausaha','The Youthpreneur Your future is your choice #VirusWirausaha','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwery','qwery','qwery','qwery','<p>qwery</p>','https://www.youtube.com/watch?v=icV2JZoqQtY','01.01','published','2015-04-20 07:54:22','2015-04-20 07:54:22',NULL),(12,32,'5',10,'impacting life, kepo abis','An Impacting Life','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=lkh8mi5phsU','09.57','published','2015-04-20 07:54:22','2015-04-20 07:54:22',NULL),(13,3,'8',14,'my active life, yamaha','This Is My Active Life - Yamaha','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=ycZwlD7cCus','00.57','published','2015-04-20 07:54:22','2015-04-20 07:54:22',NULL),(14,3,'6',11,'jeruji besi','Jeruji Besi','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=T0O-zde6U9I','11.35','published','2015-04-20 07:54:22','2015-04-20 07:54:22',NULL),(15,3,'11',15,'kuliner, takeya, japanese restaurant, bintro','Kepoin Kuliner - Takeya The Japanese Restaurant, Bintaro','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=_QbBXLBLRyw','05.10','published','2015-04-20 07:54:22','2015-04-20 07:54:22',NULL),(16,34,'7',0,'event, seminar, talk show, pra nikah, KTMU','Kepoin Event - Seminar & Talk Show Pra Nikah KTMU','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=w3Oth_jpEiA','05.06','published','2015-04-20 07:54:22','2015-04-20 07:54:22',NULL),(17,3,'1',0,'lebaran','Tips Bertamu Saat Lebaran','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=6uxLckdtomI','06.45','published','2015-05-20 14:07:41','2015-05-20 14:07:41',NULL),(18,34,'8',0,'tips, berpergian jauh','Tips Berpergian Jauh','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=WEKsZNOV0D4','01.57','published','2015-05-20 14:07:41','2015-05-20 14:07:41',NULL),(19,3,'1',0,'formasi 2015','FORMASI 2015','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=1rhDrHn-O_k','01.26','published','2015-05-20 14:07:41','2015-05-20 14:07:41',NULL),(20,3,'9',0,'promosi, formasi 2015','Video Promosi Formasi 2015 (ver.2)','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=82I_3faUhpc','01.20','published','2015-05-20 14:07:41','2015-05-20 14:07:41',NULL),(21,32,'10',16,'susu 18 pasang, intro, kepoabis.com, vlog','Susu 18 Pasang (Intro KepoAbis.com) - KepoinVlog #1','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=uz91JYDC6GE','03.51','published','2015-05-20 14:07:41','2015-05-20 14:07:41',NULL),(22,3,'10',0,'event, formasi 2015, MAN 4 Jakarta','Kepoin Event - FORMASI 2015 MAN 4 Jakarta','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=ADP679lVYsk','05.46','published','2015-05-20 14:07:41','2015-05-20 14:07:41',NULL),(23,3,'1',0,'promosi, kompas','Video Promosi KOMPAS','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=bUGZ1LG5T4s','00.47','published','2015-05-20 14:07:41','2015-05-20 14:07:41',NULL),(24,3,'11',0,'event, ragunan, zoo application','Kepoin Event - Ragunan Zoo Application','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=0gxSy7P0a5k','02.49','published','2015-06-20 14:12:26','2015-06-20 14:12:26',NULL),(25,34,'1',0,'event, N3TS School Exhibition','Kepoin Event - N3TS School Exhibition','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=eyTEU65RHf4','06.35','published','2015-06-20 14:13:08','2015-06-20 14:13:08',NULL),(26,34,'1',0,'travel, japan','Kepoin Travel - JAPAN','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,','qwerty','qwerty','qwerty','qwerty','<p>qwerty</p>','https://www.youtube.com/watch?v=w8-G0nISX9U','07.21','published','2015-06-21 20:04:36','2015-06-21 20:04:36',NULL);
/*!40000 ALTER TABLE `video` ENABLE KEYS */;

#
# Structure for table "video_category"
#

DROP TABLE IF EXISTS `video_category`;
CREATE TABLE `video_category` (
  `video_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`video_category_id`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "video_category"
#

/*!40000 ALTER TABLE `video_category` DISABLE KEYS */;
INSERT INTO `video_category` VALUES (1,0,'Documenter','Documenter','2015-06-13 00:00:00','2015-06-13 00:00:00',NULL),(2,0,'Serba-serbi','Serba-serbi','2015-06-13 00:00:00','2015-06-13 00:00:00',NULL),(3,0,'Vlog','Vlog','2015-06-13 00:00:00','2015-06-13 00:00:00',NULL),(4,0,'Commercial','Commercial','2015-06-13 00:00:00','2015-06-13 00:00:00',NULL),(5,0,'Education','Education','2015-06-13 00:00:00','2015-06-13 00:00:00',NULL),(6,0,'Entertainment','Entertainment','2015-06-13 00:00:00','2015-06-13 00:00:00',NULL),(7,0,'Experimental','Experimental','2015-06-13 00:00:00','2015-06-13 00:00:00',NULL),(8,0,'Promotion','Promotion','2015-06-13 00:00:00','2015-06-13 00:00:00',NULL),(9,0,'Public Service','Public Service','2015-06-13 00:00:00','2015-06-13 00:00:00',NULL),(10,0,'Opini Public','Opini Public','2015-06-13 00:00:00','2015-06-13 00:00:00',NULL),(11,0,'Travelling','Travelling','2015-06-13 00:00:00','2015-06-13 00:00:00',NULL);
/*!40000 ALTER TABLE `video_category` ENABLE KEYS */;

#
# Structure for table "video_comment"
#

DROP TABLE IF EXISTS `video_comment`;
CREATE TABLE `video_comment` (
  `video_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) DEFAULT NULL,
  `nick_name` varchar(255) NOT NULL DEFAULT '',
  `site` varchar(255) DEFAULT NULL,
  `body` text,
  `status` enum('unpublished','pending','published') DEFAULT 'pending',
  `created_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`video_comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "video_comment"
#

/*!40000 ALTER TABLE `video_comment` DISABLE KEYS */;
INSERT INTO `video_comment` VALUES (1,21,'Syahrul Ramadhan',NULL,'PertamaX ...','published','2015-07-11 15:21:54',NULL),(2,10,'Syahrul Ramadhan',NULL,'PertamaX gan ...','published','2015-07-11 23:31:37',NULL),(3,21,'Herman Wahyudi',NULL,'Kalian luar biasa sekali, tetap semangat kawand :D','published','2015-07-12 08:37:53',NULL),(4,21,'Ahmad Khairi Nawawi Lubis',NULL,'Yoo, lanjut video berikutnya ...','published','2015-07-12 08:38:33',NULL),(5,21,'Haaris Millah Muhammad',NULL,'Siap !!!','published','2015-07-12 08:45:46',NULL),(6,21,'Farhan Rabbani',NULL,'Belajar dari kesalahan sebelumnya untuk video berikutnya, jangan mengulangi kesalahan yang sama ... OK!','published','2015-07-12 08:46:40',NULL),(7,21,'Syahrul Ramadhan',NULL,'Sip ...','published','2015-07-12 08:47:01',NULL),(8,21,'Herman Wahyudi',NULL,'Siap kaka Farhan :D','published','2015-07-12 08:47:23',NULL),(9,21,'Ahmad Khairi Nawawi Lubis',NULL,'Inshaa Allah siap ...','published','2015-07-12 08:47:41',NULL);
/*!40000 ALTER TABLE `video_comment` ENABLE KEYS */;

#
# Structure for table "video_stat"
#

DROP TABLE IF EXISTS `video_stat`;
CREATE TABLE `video_stat` (
  `video_stat_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '',
  `user_agent` varchar(120) DEFAULT NULL,
  `request_time` varchar(255) DEFAULT NULL,
  `memory_usage` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`video_stat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

#
# Data for table "video_stat"
#

/*!40000 ALTER TABLE `video_stat` DISABLE KEYS */;
INSERT INTO `video_stat` VALUES (1,7,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436681144','1835008','2015-07-12 13:05:44'),(2,10,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682788','1835008','2015-07-12 13:33:08'),(3,21,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682804','1835008','2015-07-12 13:33:24'),(4,6,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682807','1835008','2015-07-12 13:33:27'),(5,8,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682813','1835008','2015-07-12 13:33:34'),(6,9,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682815','1835008','2015-07-12 13:33:35'),(7,7,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682821','1835008','2015-07-12 13:33:42'),(8,5,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682823','1835008','2015-07-12 13:33:43'),(9,11,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682832','1835008','2015-07-12 13:33:52'),(10,10,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682834','1835008','2015-07-12 13:33:54'),(11,12,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682843','1835008','2015-07-12 13:34:03'),(12,13,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682845','1835008','2015-07-12 13:34:05'),(13,14,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682854','1835008','2015-07-12 13:34:14'),(14,15,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682856','1835008','2015-07-12 13:34:16'),(15,21,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682872','1835008','2015-07-12 13:34:32'),(16,21,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682873','1835008','2015-07-12 13:34:33'),(17,21,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682874','1835008','2015-07-12 13:34:34'),(18,21,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682875','1835008','2015-07-12 13:34:36'),(19,21,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682876','1835008','2015-07-12 13:34:37'),(20,21,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682890','1835008','2015-07-12 13:34:50'),(21,21,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682891','1835008','2015-07-12 13:34:51'),(22,21,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682892','1835008','2015-07-12 13:34:53'),(23,21,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682894','1835008','2015-07-12 13:34:54'),(24,21,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682895','1835008','2015-07-12 13:34:55'),(25,21,'::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0','1436682896','1835008','2015-07-12 13:34:56');
/*!40000 ALTER TABLE `video_stat` ENABLE KEYS */;
