<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// Add RootLine fields
$GLOBALS['TYPO3_CONF_VARS']['FE']['pageOverlayFields'] .= ',tx_teaser_text,tx_teaser_headline,tx_teaser_image,tx_product_image,tx_teaser_link,tx_teaser_link_label,tx_subnavigation_title,tx_footer_description, tx_product_custom_badge';
$GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'] .= ',tx_teaser_text,tx_teaser_headline,tx_teaser_image,tx_product_image,tx_teaser_link,tx_teaser_link_label,tx_subnavigation_title,tx_footer_description, tx_product_custom_badge';
