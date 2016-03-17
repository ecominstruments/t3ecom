<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'ecom TYPO3 customs',
    'description' => 'Extends various tables/models with new fields/properties.',
    'category' => 'plugin',
    'author' => 'Sebastian Iffland, NicolasScheidler',
    'author_email' => 'sebastian.iffland@ecom-ex.com, nicolas.scheidler@ecom-ex.com',
    'author_company' => 'ecom instruments GmbH',
    'shy' => '',
    'dependencies' => '',
    'conflicts' => '',
    'priority' => '',
    'module' => '',
    'state' => 'excludeFromUpdates',
    'internal' => '',
    'uploadfolder' => 0,
    'createDirs' => '',
    'modify_tables' => 'pages,pages_language_overlay,tt_content,tx_news_domain_model_news',
    'clearCacheOnLoad' => 0,
    'lockType' => '',
    'version' => '1.1.3',
    'constraints' => [
        'depends' => [
            'typo3' => '6.2.10-7.6.99',
            'powermail' => '2.0.0-2.99.99'
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    '_md5_values_when_last_written' => '',
    'suggests' => [
    ],
];
