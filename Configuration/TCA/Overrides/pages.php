<?php

$addColumns = require(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath(
    't3ecom',
    'Resources/Private/PHP/TCA/Overrides/pages.php'
));

// Single fields that apply to pages table only (no language overlay / l10n merge)
$addColumns['tx_product_shipping'] = [
    'exclude' => 1,
    'l10n_mode' => 'exclude',
    'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_product_shipping',
    'config' => [
        'type' => 'check'
    ]
];
$addColumns['tx_product_discontinued'] = [
    'exclude' => 1,
    'l10n_mode' => 'exclude',
    'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_product_discontinued',
    'config' => [
        'type' => 'check'
    ]
];
$addColumns['tx_product_zone'] = [
    'exclude' => 1,
    'l10n_mode' => 'exclude',
    'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_product_zone',
    'config' => [
        'type' => 'select',
        'items' => [
            ['-', 'none'],
            ['0', 0],
            ['1', 1],
            ['2', 2],
            ['0/20', 3],
            ['1/21', 4],
            ['2/22', 5],
        ]
    ]
];
$addColumns['tx_product_division'] = [
    'exclude' => 1,
    'l10n_mode' => 'exclude',
    'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_product_division',
    'config' => [
        'type' => 'select',
        'items' => [
            ['-', 'none'],
            ['1', 1],
            ['2', 2],
        ]
    ]
];
$addColumns['tx_product'] = [
    'exclude' => 1,
    'l10n_mode' => 'exclude',
    'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_product',
    'config' => [
        'type' => 'select',
        'items' => [
            ['-', 0]
        ],
        'foreign_table' => 'tx_ecomproducttools_domain_model_product',
        'foreign_table_where' => ' AND tx_ecomproducttools_domain_model_product.sys_language_uid IN (-1,0) AND NOT tx_ecomproducttools_domain_model_product.deleted ORDER BY tx_ecomproducttools_domain_model_product.title'
    ]
];

// Custom Palettes
\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
    $GLOBALS['TCA']['pages']['palettes'],
    [
        'ecom_product_badges' => [
            'showitem' => 'tx_product_shipping, tx_product_discontinued, tx_product_custom_badge, --linebreak--, tx_product_zone, tx_product_division',
            'canNotCollapse' => 1
        ],
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $addColumns, true);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '--div--;LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:div.teaser,tx_teaser_headline, tx_teaser_text;;;richtext:rte_transform[flag=rte_enabled|mode=ts], tx_teaser_image, tx_teaser_link, tx_teaser_link_label, --div--;LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:div.product, tx_product,tx_product_image, --palette--;Badges;ecom_product_badges, --div--;LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:div.footer, tx_hide_footer_description, tx_footer_description;;;richtext:rte_transform[flag=rte_enabled|mode=ts]'
);

// Append subnav_title to title-palette
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'pages',
    'title',
    '--linebreak--, tx_subnavigation_title', 'after'
);
