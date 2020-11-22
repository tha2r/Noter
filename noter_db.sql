

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `message` mediumtext,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL DEFAULT '',
  `code` varchar(50) NOT NULL DEFAULT '',
  `info` varchar(250) NOT NULL DEFAULT '',
  `text` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `editcode` varchar(50) NOT NULL DEFAULT '0',
  `dateline` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `code` (`code`),
  KEY `user_id` (`user_id`),
  KEY `editcode` (`editcode`),
  FULLTEXT KEY `text` (`text`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `setting` (`id`, `title`, `value`) VALUES
(1, 'url', 'http://localhost/'),
(2, 'title', 'Ù…Ø­Ù…Ø¯ Ø¹Ø³Ø§Ù ØŒ Ù…Ø­Ø¨ÙˆØ¨ Ø§Ù„Ø¹Ø±Ø¨'),
(3, 'onoff', '2'),
(4, 'message', 'Website Offline check back later'),
(5, 'description', 'Noter website'),
(6, 'keywords', 'noter,notes');

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `joindate` int(10) unsigned NOT NULL DEFAULT '0',
  `posts` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;


INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `joindate`, `posts`) VALUES
(1, 'Thaer Al-Hanafi', 'thaer', 'mr@tha2r.com', '24a3e31d81c2943d5c745dd25af5ec27', 1414123356, 13);
