<?php

return [
	'tx_teaser_text' => [
		'exclude' => 1,
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_teaser_text',
		'config' => [
			'type' => 'text',
			'cols' => 48,
			'rows' => 5,
			'softref' => 'typolink_tag,images,email[subst],url',
			'wizards' => [
				'_PADDING' => 4,
				'RTE' => [
					'notNewRecords' => 1,
					'RTEonly' => 1,
					'type' => 'script',
					'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
					'icon' => 'wizard_rte2.gif',
					'script' => 'wizard_rte.php'
				]
			]
		]
	],
	'tx_footer_description' => [
		'exclude' => 1,
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_footer_description',
		'config' => [
			'type' => 'text',
			'cols' => 48,
			'rows' => 5,
			'softref' => 'typolink_tag,images,email[subst],url',
			'wizards' => [
				'_PADDING' => 4,
				'RTE' => [
					'notNewRecords' => 1,
					'RTEonly' => 1,
					'type' => 'script',
					'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
					'icon' => 'wizard_rte2.gif',
					'script' => 'wizard_rte.php'
				]
			]
		]
	],
	'tx_hide_footer_description' => [
		'exclude' => 1,
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_hide_footer_description',
		'config' => [
			'type' => 'check'
		]
	],
	'tx_teaser_headline' => [
		'exclude' => 1,
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_teaser_headline',
		'config' => [
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		]
	],
	'tx_teaser_image' => [
		'exclude' => 1,
		'l10n_mode' => 'mergeIfNotBlank',
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_teaser_image',
		'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			'tx_teaser_image',
			[
				'appearance' => [
					'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
				],
				'maxitems' => 1
			],
			$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
		)
	],
	'tx_product_image' => [
		'exclude' => 1,
		'l10n_mode' => 'mergeIfNotBlank',
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_product_image',
		'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			'tx_product_image',
			[
				'appearance' => [
					'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
				],
				'maxitems' => 1
			],
			$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
		)
	],
	'tx_product_discontinued' => [
		'exclude' => 1,
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_product_discontinued',
		'config' => [
			'type' => 'check'
		]
	],
	'tx_product_zone' => [
		'exclude' => 1,
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_product_zone',
		'config' => [
			'type' => 'select',
			'items' => [
				[ '-', 'none' ],
				[ '0', 0 ],
				[ '1', 1 ],
				[ '2', 2 ],
				[ '0/20', 3 ],
				[ '1/21', 4 ],
				[ '2/22', 5 ],
			]
		]
	],
	'tx_product_division' => [
		'exclude' => 1,
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_product_division',
		'config' => [
			'type' => 'select',
			'items' => [
				[ '-', 'none' ],
				[ '1', 1 ],
				[ '2', 2 ],
			]
		]
	],
	'tx_subnavigation_title' => [
		'exclude' => 1,
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_subnavigation_title',
		'config' => [
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		]
	],
	'tx_teaser_link' => [
		'exclude' => 1,
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_teaser_link',
		'config' => [
			'type' => 'input',
			'size' => '30',
			'max' => '256',
			'eval' => 'trim',
			'softref' => 'typolink',
			'wizards' => [
				'_PADDING' => 2,
				'link' => [
					'type' => 'popup',
					'title' => 'LLL:EXT:cms/locallang_ttc.xml:header_link_formlabel',
					'icon' => 'link_popup.gif',
					'script' => 'browse_links.php?mode=wizard',
					'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
				]
			]
		]
	],
	'tx_teaser_link_label' => [
		'exclude' => 1,
		'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_teaser_link_label',
		'config' => [
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		]
	]
];