<?php
namespace Ecom\T3ecom\Controller;

/**
 * Class ExtendedFormController
 */
class ExtendedFormController extends \In2code\Powermail\Controller\FormController {

	/**
	 * Checks if two email-addresses are equal
	 *
	 * @param \In2code\Powermail\Domain\Model\Mail                  $mail
	 * @param \In2code\Powermail\Domain\Validator\AbstractValidator $validator
	 */
	public function checkEmails(\In2code\Powermail\Domain\Model\Mail $mail, \In2code\Powermail\Domain\Validator\AbstractValidator $validator) {
		$checkEmailEqualFirstId = '';
		$checkEmailEqualSecondId = '';
		if ( $this->settings['checkEmailEqual'] && $this->settings['checkEmailEqualFirstId'] && $this->settings['checkEmailEqualSecondId'] ) {
			/** @var \In2code\Powermail\Domain\Model\Answer $answer */
			foreach ( $mail->getAnswers() as $answer ) {
				if ( $answer->getField()->getUid() == $this->settings['checkEmailEqualFirstId'] ) {
					$checkEmailEqualFirstId = $answer->getValue();
				} elseif ( $answer->getField()->getUid() == $this->settings['checkEmailEqualSecondId'] ) {
					$checkEmailEqualSecondId = $answer->getValue();
				}
			}
			if ( $checkEmailEqualFirstId !== $checkEmailEqualSecondId ) {
				$validator->setIsValid(FALSE);
			}
		}
	}

	/**
	 * Powermail saves all attachments in the session and they never get deleted.
	 * If you send a form with no file uploads, old attachments will still be
	 * sent, in case you previously filled out a form containing a file upload.
	 *
	 * This hook clears the session value for corresponding field in order to
	 * avoid this behavior.
	 */
	public function deleteAttachments() {
		\In2code\Powermail\Utility\Div::setSessionValue('upload', [ ], TRUE);
	}
}