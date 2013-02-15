#
# Table structure for table 'tt_news'
#
CREATE TABLE tt_news (
	tx_news_embedded_content text NOT NULL
);

#
# Table structure for table 'tx_news_embedded_content'
#
CREATE TABLE news_embedded_content_markers (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
    tstamp int(11) DEFAULT '0' NOT NULL,
    crdate int(11) DEFAULT '0' NOT NULL,
    cruser_id int(11) DEFAULT '0' NOT NULL,
    deleted tinyint(4) DEFAULT '0' NOT NULL,
    hidden tinyint(4) DEFAULT '0' NOT NULL,
    marker tinytext,
    marker_content text,
    
    PRIMARY KEY (uid),
    KEY parent (pid)
);