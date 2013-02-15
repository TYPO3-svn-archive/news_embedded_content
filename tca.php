<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$TCA['news_embedded_content_markers'] = array (
    'ctrl' => $TCA['news_embedded_content_markers']['ctrl'],
    'interface' => array (
        'showRecordFieldList' => 'hidden,marker,marker_content'
    ),
    'feInterface' => $TCA['news_embedded_content_markers']['feInterface'],
    'columns' => array (
        'hidden' => array (        
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config'  => array (
                'type'    => 'check',
                'default' => '0'
            )
        ),
        'marker' => array (        
            'exclude' => 0,        
            'label' => 'LLL:EXT:news_embedded_content/locallang_db.xml:tt_news.embedded_content_markers.marker',        
            'config' => array (
                'type' => 'input',    
                'size' => '30',    
                'eval' => 'required,trim,tx_news_embedded_content',
            )
        ),
        'marker_content' => array (        
            'exclude' => 0,        
            'label' => 'LLL:EXT:news_embedded_content/locallang_db.xml:tt_news.embedded_content_markers.marker_content',        
            'config' => array (
                'type' => 'text',
                'wrap' => 'OFF',
                'cols' => '30',    
                'rows' => '5',
            )
        ),
    ),
    'types' => array (
        '0' => array('showitem' => 'hidden;;1;;1-1-1, marker, marker_content')
    ),
    'palettes' => array (
        '1' => array('showitem' => '')
    )
);