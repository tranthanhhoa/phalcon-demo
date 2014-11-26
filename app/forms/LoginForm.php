<?php

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Validation\Validator\Email,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\StringLength;


class LoginForm extends BaseForm
{
	
	public function initialize()
	{
		// Email
		$email = new Text('email');
		$email->addValidator(new PresenceOf(array(
			'message' => 'Email is required'
		)));
		$email->addValidator(new Email(array(
			'message' => 'Email is not valid'
			)));

		$this->add($email);

		// Pin
		$pin = new Text('pin');
		$pin->addValidator(new PresenceOf(array(
			'message' => 'Pin is required !'
			)));
		$pin->addValidator(new StringLength(array(
			'min' => '4',
			'max' => '4',
			'message' => 'Pin must be 4 degits'
			)));
		$this->add($pin);

		$csrf = new Hidden('csrf');
		$this->add($csrf);

	}
}