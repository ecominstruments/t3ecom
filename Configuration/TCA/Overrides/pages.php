<?php

$addColumns = require(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('t3ecom', 'Resources/Private/PHP/TCA/Overrides/pages.php'));
	// Single field that applies to pages table only (no overlay)
$addColumns['tx_product'] = [
	'exclude' => 1,
	'l10n_mode' => 'exclude',
	'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_product',
	'config' => [
		'type' => 'select',
		'items' => [
			[ '-', 0 ]
		],
		'foreign_table' => 'tx_ecomproducttools_domain_model_product',
		'foreign_table_where' => ' AND tx_ecomproducttools_domain_model_product.sys_language_uid IN (-1,0) AND NOT tx_ecomproducttools_domain_model_product.deleted ORDER BY tx_ecomproducttools_domain_model_product.title'
	]
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $addColumns, TRUE);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages', '--div--;LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:div.teaser,tx_teaser_headline, tx_teaser_text;;;richtext:rte_transform[flag=rte_enabled|mode=ts], tx_teaser_image, tx_teaser_link, tx_teaser_link_label, --div--;LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:div.product, tx_product,tx_product_image, tx_product_discontinued, tx_product_zone, tx_product_division, --div--;LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:div.footer, tx_hide_footer_description, tx_footer_description;;;richtext:rte_transform[flag=rte_enabled|mode=ts]');

// Append subnav_title to title-palette
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
	'pages',
	'title',
	'--linebreak--, tx_subnavigation_title', 'after'
);