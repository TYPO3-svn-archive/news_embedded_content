<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$tempColumns = Array(
	'tx_news_embedded_content' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:news_embedded_content/locallang_db.xml:tt_news.embedded_content',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'news_embedded_content_markers',
			'maxitems' => 10,
			'appearance' => array(
				'collapseAll' => 1,
				'expandSingle' => 1,
			),
		),
	),
);

t3lib_div::loadTCA("tt_news");
t3lib_extMgm::addTCAcolumns("tt_news", $tempColumns, 1);
t3lib_extMgm::addToAllTCAtypes("tt_news", "tx_news_embedded_content;;;;1-1-1");



t3lib_extMgm::allowTableOnStandardPages('news_embedded_content_markers');

$TCA['news_embedded_content_markers'] = array (
    'ctrl' => array (
        'title'     => 'LLL:EXT:news_embedded_content/locallang_db.xml:tt_news.embedded_content_markers',        
        'label'     => 'marker',
		//'label_alt' => 'marker',
		//'label_userFunc' => '',
        'tstamp'    => 'tstamp',
        'crdate'    => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY crdate',    
        'delete' => 'deleted',    
        'enablecolumns' => array (        
            'disabled' => 'hidden',
        ),
        'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
        'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_news_embedded_content_markers.gif',
    ),
);