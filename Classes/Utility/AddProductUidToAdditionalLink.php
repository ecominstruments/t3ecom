<?php
	/**
	 * Created by PhpStorm.
	 * User: S3b0
	 * Date: 22/07/15
	 * Time: 10:34 AM
	 */

	namespace Ecom\T3ecom\Utility;

	/**
	 * Class AddProductUidToAdditionalLink
	 * @package Ecom\T3ecom\Utility
	 */
	class AddProductUidToAdditionalLink {

		/**
		 * @param array $tsConfig
		 *
		 * @return string
		 */
		public function main(array $tsConfig) {
			$urlParts = parse_url($tsConfig['url']);
			parse_str($urlParts['query'], $parameters);
			if ( !$urlParts['query'] || (is_array($parameters) && !array_key_exists('product', $parameters)) ) {
				return $tsConfig['TAG'];
			}
			/** @var \TYPO3\CMS\Core\Database\DatabaseConnection $db */
			$db = $GLOBALS['TYPO3_DB'];
			$dropProductParam = TRUE;
			if ( $page = $db->exec_SELECTgetSingleRow('tx_product', 'pages', 'uid=' . $GLOBALS['TSFE']->id) ) {
				if ( \TYPO3\CMS\Core\Utility\MathUtility::canBeInterpretedAsInteger($page['tx_product']) && \TYPO3\CMS\Core\Utility\MathUtility::convertToPositiveInteger($page['tx_product']) ) {
					$parameters['product'] = \TYPO3\CMS\Core\Utility\MathUtility::convertToPositiveInteger($page['tx_product']);
					$dropProductParam = FALSE;
				}
			}
			if ( $dropProductParam ) {
				unset($parameters['product']);
			}
			$targetPid = $parameters['id'];
			unset($parameters['id']);
			/** @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $contentObject */
			$contentObject = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectRenderer');
			$url = $contentObject->getTypoLink_URL($targetPid, $parameters);

			return '<a href="' . $url . '"' . $tsConfig['targetParams'] . $tsConfig['aTagParams'] . '>';
		}

	}