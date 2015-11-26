<?php

$columns = [
	'ecom_toolbox_country' => [
		'exclude' => 1,
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:fe_users.ecom_toolbox_country',
		'config' => [
			'type' => 'select',
			'items' => [
				['']
			],
			'foreign_table' => 'tx_ecomtoolbox_domain_model_region',
			'foreign_table_where' => 'AND tx_ecomtoolbox_domain_model_region.type=0 AND tx_ecomtoolbox_domain_model_region.deleted=0 ORDER BY tx_ecomtoolbox_domain_model_region.title',
			'minitems' => 1
		]
	],
	'ecom_toolbox_state' => [
		'displayCond' => 'FIELD:ecom_toolbox_country:REQ:TRUE',
		'exclude' => 1,
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:fe_users.ecom_toolbox_state',
		'config' => [
			'type' => 'select',
			'items' => [
				[ '', 0 ]
			],
			'foreign_table' => 'tx_ecomtoolbox_domain_model_state',
			'foreign_table_where' => 'AND tx_ecomtoolbox_domain_model_state.country=###REC_FIELD_ecom_toolbox_country### AND tx_ecomtoolbox_domain_model_state.deleted=0 ORDER BY tx_ecomtoolbox_domain_model_state.title'
		]
	],
	'privacy_policy' => [
		'exclude' => 1,
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:fe_users.privacy_policy',
		'config' => [
			'type' => 'check',
			'default' => 1
		]
	]
];

$GLOBALS[ 'TCA' ][ 'fe_users' ][ 'ctrl' ][ 'requestUpdate' ] .= ',ecom_toolbox_country';
$GLOBALS[ 'TCA' ][ 'fe_users' ][ 'palettes' ][ 'femanagerextended' ] = [ 'showitem' => 'country' ] ;

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns( 'fe_users', $columns, true );
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes( 'fe_users', 'ecom_toolbox_country;;femanagerextended, ecom_toolbox_state, privacy_policy', '', 'replace:country' );