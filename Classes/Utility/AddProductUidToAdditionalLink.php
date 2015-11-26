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
		 * @param array $userArguments
		 *
		 * @return string
		 */
		public function main(array $tsConfig, $userArguments = [ ]) {
			$url = $tsConfig['url'];
			$regExpCurlyBraceOpen  = preg_quote(rawurlencode('{'), '@');
			$regExpCurlyBraceClose = preg_quote(rawurlencode('}'), '@');
			$pattern = "@{$regExpCurlyBraceOpen}product{$regExpCurlyBraceClose}@i";

			// Return if argument to be replaced is not set!
			if ( !preg_match($pattern, $url) ) {
				return $tsConfig['TAG'];
			}

			/** @var \TYPO3\CMS\Core\Database\DatabaseConnection $db */
			$db = $GLOBALS['TYPO3_DB'];
			/**
			 * <a href="' . $finalTagParts['url'] . '"' . $finalTagParts['targetParams'] . $finalTagParts['aTagParams'] . '>
			 * @see http://docs.typo3.org/typo3cms/TyposcriptReference/Functions/Typolink/Index.html
			 */
			$return = '<a href="%1$s"%2$s>';

			$product = false;
			// get necessary params to apply; replace in url
			if ( $page = $db->exec_SELECTgetSingleRow('tx_product', 'pages', 'uid=' . $GLOBALS['TSFE']->id) ) {
				if ( \TYPO3\CMS\Core\Utility\MathUtility::canBeInterpretedAsInteger($page['tx_product']) && \TYPO3\CMS\Core\Utility\MathUtility::convertToPositiveInteger($page['tx_product']) ) {
					$product = \TYPO3\CMS\Core\Utility\MathUtility::convertToPositiveInteger($page['tx_product']);
				}
			}

			/** @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $contentObject */
			$contentObject = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectRenderer');
			$url = str_ireplace($GLOBALS['TSFE']->baseUrl, '', $contentObject->getTypoLink_URL($userArguments['targetPid'], $product ? [ 'product' => $product ] : [ ]));

			return sprintf($return, $url, $tsConfig['targetParams'] . $tsConfig['aTagParams']);
		}

	}