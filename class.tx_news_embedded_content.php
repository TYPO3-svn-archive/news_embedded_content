<?php

/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Tomas Norre Mikkelsen <tomasnorre@gmail.com>
 *  All rights reserved
 *
 *  This script is part of the Typo3 project. The Typo3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

/**
 * Class 'tx_news_embedded_content' for the news_embedded_content extension.
 *
 * $Id:
 *
 */

/**
 * Class being included by TCEmain using a hook
 * 
 * @author Tomas Norre Mikkelsen <tomasnorre@gmail.com>
 * $pagages TYPO3
 */
class tx_news_embedded_content {

	/**
	 * extraItemMarkerProcessor, tt_news hook for additional markers.
	 * 
	 * @param array		$markerArray
	 * @param array		$row
	 * @param array		$conf
	 * @param object	$pObj
	 * @return array
	 */
	function extraItemMarkerProcessor($markerArray, $row, $conf, &$pObj) {
		
		if (strlen($row['tx_news_embedded_content']) > 0 ){
			$markers = $this->getMarkers($row['tx_news_embedded_content']);

			foreach($markers as $marker){
				$markerArray["###NEWS_CONTENT###"] = preg_replace('|(<p[^>]*>)?\s*'.$marker['marker'].'\s*(</p>)?|s', $marker['marker_content'], $markerArray["###NEWS_CONTENT###"]);
			}
			
		}
		
		return $markerArray;
	}
	
	/**
	 * getMarkers for given news-entry
	 *  
	 * @param string $markersUids
	 * @return result-set
	 */
	function getMarkers($markersUids){

		$rows = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
				'marker,marker_content',
				'news_embedded_content_markers',
				'deleted = 0 AND hidden = 0 AND uid IN ('.$markersUids.')'
				);
	
		return $rows;
	
		
	}
	

	/*
	 * Backend form validation JS
	 * http://docs.typo3.org/typo3cms/TCAReference/Reference/Columns/Input/Index.html
	 * 
	 */
	function returnFieldJS() {

		return "
				string = value.replace('#','');
				string = '###'+string+'###';
				return string;
                ";
	}

	/**
	 * Backend form validation JS
	 * http://docs.typo3.org/typo3cms/TCAReference/Reference/Columns/Input/Index.html
	 * 
	 * @param string $value
	 * @param string $is_in
	 * @param bolean $set
	 * @return string
	 */
	function evaluateFieldValue($value, $is_in, &$set) {

		$value = str_replace('#', '', $value);
		$value = '###' . $value . '###';

		return trim($value);
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/news_embedded_content/class.tx_news_embedded_content.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/news_embedded_content/class.tx_news_embedded_content.php']);
}