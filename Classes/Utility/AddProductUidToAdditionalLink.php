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
			$tag = rawurldecode($tsConfig['TAG']);
			if ( !preg_match('/\{product\}/i', $tag) ) {
				return $tsConfig['TAG'];
			}
			/** @var \TYPO3\CMS\Core\Database\DatabaseConnection $db */
			$db = $GLOBALS['TYPO3_DB'];
			if ( $page = $db->exec_SELECTgetSingleRow('tx_product', 'pages', 'uid=' . $GLOBALS['TSFE']->id) ) {
				if ( \TYPO3\CMS\Core\Utility\MathUtility::canBeInterpretedAsInteger($page['tx_product']) && \TYPO3\CMS\Core\Utility\MathUtility::convertToPositiveInteger($page['tx_product']) ) {
					$tag = preg_replace('/\{product\}/i', \TYPO3\CMS\Core\Utility\MathUtility::convertToPositiveInteger($page['tx_product']), $tag);
				}
			}

			$tag = preg_replace('/(\?|\&)([a-z0-9]+)\=\{product\}/i', '', $tag);

			return preg_replace('/href\=\"([a-z0-9\?\&\#\_\-])\"/i', rawurlencode('$1'), $tag);
		}

	}