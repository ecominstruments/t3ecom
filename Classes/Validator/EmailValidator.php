<?php
namespace Ecom\T3ecom\Validator;

use In2code\Powermail\Domain\Model\Mail;
use In2code\Powermail\Domain\Validator\AbstractValidator;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Extbase\Error\Result;
use TYPO3\CMS\Extbase\Error\Error;

/**
 * Class EmailValidator
 *
 * USAGE
 * Add to Typoscript:
 * * * * * * * * * * * * * * * * * * * * *
 *   plugin.tx_powermail.settings.setup.validators {
 *       1 {
 *           # Classname that should be called with method *Validator()
 *           class = Ecom\T3ecom\Validator\EmailValidator
 *
 *
 *           # optional: Add configuration for your PHP
 *           config {
 *               emailMarker = e_mail, log_e_mail
 *               emailConfirmMarker = confirme_mail, log_confirme_mail
 *           }
 *
 *
 *
 *           # optional: If file will not be loaded from autoloader, add path and it will be called with require_once
 *           #require = fileadmin/....php
 *       }
 *   }
 * * * * * * * * * * * * * * * * * * * * *
 * Validates E-Mail field with the confirm E-Mail field
 * @package Ecom\T3ecom\Validator
 */
class EmailValidator extends AbstractValidator
{
    /**
     * Email field to check (by marker, set in form and powermail.ts)
     *
     * @var array
     */
    protected $emailFieldMarkerArray = array();

    /**
     * Corresponding Confirm-Email field to check
     *
     * @var array
     */
    protected $confirmEmailFieldMarkerArray = array();

    /**
     * Validator configuration
     *
     * @var array
     */
    protected $configuration = array();

    /**
     * Validation process
     *
     * @param Mail $mail
     * @return Result
     */
    public function validate($mail)
    {
        $this->emailFieldMarkerArray = GeneralUtility::trimExplode(',', $this->configuration['emailMarker'], true);
        $this->confirmEmailFieldMarkerArray = GeneralUtility::trimExplode(',', $this->configuration['emailConfirmMarker'], true);
        $result = new Result();

        foreach ($mail->getAnswers() as $answer) {
            if (in_array($answer->getField()->getMarker(), $this->emailFieldMarkerArray)) {
                $emailMarker = $answer->getField()->getMarker();
                $email = $answer->getValue();
            }
            if (in_array($answer->getField()->getMarker(), $this->confirmEmailFieldMarkerArray)) {
                $confirmEmailMarker = $answer->getField()->getMarker();
                $confirmEmail = $answer->getValue();
            }
        }

        if ((($email && $confirmEmail && $emailMarker && $confirmEmailMarker)) && $email !== $confirmEmail) {
            $result->addError(new Error(LocalizationUtility::translate('validation_email_match', 't3ecom'), $confirmEmailMarker));
            $result->addError(new Error(LocalizationUtility::translate('validation_email_match', 't3ecom'), $emailMarker));
        }

        return $result;
    }
}