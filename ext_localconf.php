<?php
if (!defined ("TYPO3_MODE")){
	die ("Access denied.");
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['tt_news']['extraItemMarkerHook'][] =  'EXT:news_embedded_content/class.tx_news_embedded_content.php:tx_news_embedded_content';

// here we register "tx_exampleextraevaluations_extraeval1"
$TYPO3_CONF_VARS['SC_OPTIONS']['tce']['formevals']['tx_news_embedded_content'] = 'EXT:news_embedded_content/class.tx_news_embedded_content.php';



