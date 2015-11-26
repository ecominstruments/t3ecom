<?php
namespace Ecom\T3ecom\Domain\Model;

class User extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser {

	/**
	 * ecomToolboxCountry
	 *
	 * @var \Ecom\EcomToolbox\Domain\Model\Region
	 */
	protected $ecomToolboxCountry = null;

	/**
	 * ecomToolboxState
	 *
	 * @var \Ecom\EcomToolbox\Domain\Model\State
	 */
	protected $ecomToolboxState = null;

	/**
	 * privacyPolicy
	 *
	 * @var boolean
	 */
	protected $privacyPolicy = false;

	/**
	 * @param string $username
	 * @param string $password
	 */
	public function __construct($username = '', $password = '') {
		parent::__construct($username, $password);
	}

	/**
	 * @return \Ecom\EcomToolbox\Domain\Model\Region $ecomToolboxCountry
	 */
	public function getEcomToolboxCountry() {
		return $this->ecomToolboxCountry;
	}

	/**
	 * @param \Ecom\EcomToolbox\Domain\Model\Region $ecomToolboxCountry
	 */
	public function setEcomToolboxCountry(\Ecom\EcomToolbox\Domain\Model\Region $ecomToolboxCountry = null) {
		$this->ecomToolboxCountry = $ecomToolboxCountry;
	}

	/**
	 * @return \Ecom\EcomToolbox\Domain\Model\State $ecomToolboxState
	 */
	public function getEcomToolboxState() {
		return $this->ecomToolboxState;
	}

	/**
	 * @param \Ecom\EcomToolbox\Domain\Model\State $ecomToolboxState
	 */
	public function setEcomToolboxState(\Ecom\EcomToolbox\Domain\Model\State $ecomToolboxState = null) {
		$this->ecomToolboxState = $ecomToolboxState;
	}

	/**
	 * @return boolean $privacyPolicy
	 */
	public function isPrivacyPolicy() {
		return $this->privacyPolicy;
	}

	/**
	 * @param boolean $privacyPolicy
	 */
	public function setPrivacyPolicy($privacyPolicy) {
		$this->privacyPolicy = $privacyPolicy;
	}

}
?>