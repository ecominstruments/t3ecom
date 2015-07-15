<?php
$addColumns = [
	'tx_news_comments' => [
		'exclude' => 1,
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_news_comments',
		'config' => [
			'type' => 'check'
		]
	]
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_news_domain_model_news', $addColumns, TRUE);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_news_domain_model_news', 'tx_news_comments');