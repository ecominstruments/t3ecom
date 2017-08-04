<?php

$addColumns = [
    'tx_add_link' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_add_link',
        'config' => [
            'type' => 'input',
            'size' => '30',
            'max' => '256',
            'eval' => 'trim',
            'softref' => 'typolink',
            'wizards' => [
                'link' => [
                    'type' => 'popup',
                    'title' => 'LLL:EXT:cms/locallang_ttc.xml:header_link_formlabel',
                    'icon' => 'link_popup.gif',
                    'module' => [
                        'name' => 'wizard_element_browser',
                        'urlParameters' => [
                            'mode' => 'wizard'
                        ]
                    ],
                    'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
                ]
            ]
        ]
    ],
    'tx_add_link_label' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_add_link_label',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'trim'
        ]
    ],
    'tx_add_link_product' => [
        'exclude' => 1,
        'displayCond' => 'HIDE_FOR_NON_ADMINS',
        'label' => 'LLL:EXT:t3ecom/Resources/Private/Language/locallang_db.xlf:tx_add_link_product',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'trim'
        ]
    ],
    'spaceBefore' => [
        'exclude' => 1,
        'l10n_mode' => 'exclude',
        'label' => 'Top Margin',
        'config' => [
            'default' => 0,
            'type' => 'input',
            'eval' => 'int,trim',
            'size' => 5,
            'eval' => 'trim',
            'range' => [
                'lower' => 0
            ]
        ]
    ],
    'spaceAfter' => [
        'exclude' => 1,
        'l10n_mode' => 'exclude',
        'label' => 'Bottom Margin',
        'config' => [
            'default' => 0,
            'type' => 'input',
            'eval' => 'int,trim',
            'size' => 5,
            'eval' => 'trim',
            'range' => [
                'lower' => 0
            ]
        ]
    ]
];

$GLOBALS['TCA']['tt_content']['palettes']['frames']['showitem'] = 'spaceBefore, spaceAfter';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $addColumns, true);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    'tx_add_link;;;;1-1-1, tx_add_link_label, tx_add_link_product', 'textmedia', 'after:bodytext'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--palette--;Spacing;frames', '','after:layout'
);