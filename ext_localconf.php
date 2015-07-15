<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

	// Add hooks for powermail, checking email-confirmation and deleting attachments after form submit
/** @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher $signalSlotDispatcher */
$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\SignalSlot\\Dispatcher');
$signalSlotDispatcher->connect(
	'In2code\\Powermail\\Domain\\Validator\\CustomValidator', 'isValid',
	'Ecom\\T3ecom\\Controller\\ExtendedFormController', 'checkEmails'
);

$signalSlotDispatcher->connect(
	'In2code\\Powermail\\Controller\\FormController', 'createActionAfterSubmitView',
	'Ecom\\T3ecom\\Controller\\ExtendedFormController', 'deleteAttachments'
);

	// Add RootLine fields
$GLOBALS['TYPO3_CONF_VARS']['FE']['pageOverlayFields'] .= ',tx_teaser_text,tx_teaser_headline,tx_teaser_image,tx_product_image,tx_teaser_link,tx_teaser_link_label,tx_subnavigation_title,tx_footer_description';
$GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'] .= ',tx_teaser_text,tx_teaser_headline,tx_teaser_image,tx_product_image,tx_teaser_link,tx_teaser_link_label,tx_subnavigation_title,tx_footer_description';