<?php

$addColumns = require(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('t3ecom', 'Resources/Private/PHP/TCA/Overrides/pages.php'));

// Custom Palettes
\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
	$GLOBALS['TCA']['pages_language_overlay']['palettes'],
	[
		'ecom_product_badges' => [ 'showitem' => 'tx_product_custom_badge', 'canNotCollapse' => 1 ],
	]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages_language_overlay', $addColumns, true);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages_language_overlay', '--div--;LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:div.teaser,tx_teaser_headline, tx_teaser_text;;;richtext:rte_transform[flag=rte_enabled|mode=ts], tx_teaser_image, tx_teaser_link, tx_teaser_link_label, --div--;LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:div.product,tx_product_image, --palette--;Badges;ecom_product_badges, --div--;LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:div.footer, tx_hide_footer_description, tx_footer_description;;;richtext:rte_transform[flag=rte_enabled|mode=ts]');

// Append subnav_title to title-palette
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
	'pages_language_overlay',
	'title',
	'--linebreak--, tx_subnavigation_title', 'after'
);