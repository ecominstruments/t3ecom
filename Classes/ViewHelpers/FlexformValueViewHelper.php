<?php
namespace Ecom\T3ecom\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class FlexformValueViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    /**
     * @param string $value Flexform Value String
     * @param string $as
     * @return mixed
     */
    public function render($value = null, $as)
    {
        if ($value == null) {
            return false;
        }

        $FlexValueArray = $this->cleanFlexformToArray($value);

        $this->templateVariableContainer->add($as, $FlexValueArray);
        $output = $this->renderChildren();
        $this->templateVariableContainer->remove($as);

        return $output;
    }

    /**
     * @param string $xmlString
     * @return array
     */
    protected function cleanFlexformToArray($xmlString)
    {
        $flexArray = GeneralUtility::xml2array($xmlString);
        if (!is_array($flexArray)) {
            return [];
        }

        $returnArray = [];
        if (is_array($flexArray['data']['sDEF']['lDEF'])) {
            foreach ($flexArray['data']['sDEF']['lDEF'] as $fieldName => $valueSet) {
                $returnArray[$fieldName] = $valueSet['vDEF'];
            }
        }

        return $returnArray;
    }
}
