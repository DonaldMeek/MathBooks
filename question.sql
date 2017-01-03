DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `qst_id` int unsigned NOT NULL,
  `qst_ctnt` varchar(500) NOT NULL DEFAULT '',
  `book_id` int unsigned DEFAULT '0',
  `pg_num` int unsigned DEFAULT '0',
  `ch_num` int unsigned DEFAULT '0',
  `sec_num` int unsigned DEFAULT '0',
  `qst_num` int unsigned DEFAULT '0',
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

ALTER TABLE `question` ADD PRIMARY KEY (`qst_id`);
ALTER TABLE `question` MODIFY `qst_id` int unsigned NOT NULL AUTO_INCREMENT;

