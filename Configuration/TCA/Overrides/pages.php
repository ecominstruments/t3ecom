<?php

$addColumns = require(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('t3ecom','Resources/Private/PHP/TCA/Overrides/pages.php'));

// Single fields that apply to pages table only (no language overlay / l10n merge)
$addColumns['tx_product_jumpmenu'] = [
    'l10n_mode' => 'exclude',
    'label' => 'Product Onepager - Jumpmenu (Menu in Fixed Header)',
    'config' => [
        'type' => 'flex',
        'ds' => array(
            'default' => 'FILE:EXT:t3ecom/Configuration/Flexforms/flexfield_product_jumpmenu.xml',
        )
    ]
];

$addColumns['tx_product_quickmenu'] = [
    'l10n_mode' => 'exclude',
    'label' => 'Product Grid - Quickmenu (separated by linebreak => ENTER)',
    'config' => [
        'type' => 'text',
        'cols' => 40,
        'rows' => 10,
        'wizards' => [
            '_PADDING' => 5,
            '_VERTICAL' => 1,
            'add' => [
                'type' => 'select',
                'title' => 'Add option to Quickmenu',
                'mode' => 'append',
                'items' => [
                    ['Inquiry (Overrides default Inquiry-Link)', "{PAGE_ID}, type:inquiry\n"],
                    ['Configurator', "{PAGE_ID}, type:config\n"],
                    ['Accessories', "{PAGE_ID}, type:accessories\n"],
                    ['Custom Option', "{PAGE_ID}, type:custom, icon:fa-xxx, {Name or Translation key}\n"],
                    ['Example 1', "55, type:custom, icon:fa-angle-right, Some Name\n"],
                    ['Example 2 with LLL', "55, type:custom, icon:fa-angle-right, LLL:comments (available keys from fileadmin/templates/translations/locallang.xfl)\n"],
                    ['Example 3 without name & icon', "55, type:custom (without a name set, the page title will be used & without icon set, the default will be used)\n"],
                ]
            ],
        ]
    ]
];
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
    '--div--;LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:div.teaser,tx_teaser_headline, tx_teaser_text;;;richtext:rte_transform[flag=rte_enabled|mode=ts], tx_teaser_image, tx_teaser_link, tx_teaser_link_label, --div--;LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:div.product, tx_product, tx_product_image, --palette--;Badges;ecom_product_badges, tx_product_quickmenu, tx_product_jumpmenu, --div--;LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:div.footer, tx_hide_footer_description, tx_footer_description;;;richtext:rte_transform[flag=rte_enabled|mode=ts]'
);

// Append subnav_title to title-palette
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'pages',
    'title',
    '--linebreak--, tx_subnavigation_title', 'after'
);
