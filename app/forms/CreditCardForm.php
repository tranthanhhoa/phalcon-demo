<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;


class CreditCardForm extends BaseForm
{
	public function initialize()
	{
		// Card number
		$card_number = new Text('card-number');
		$card_number->addValidator(new PresenceOf(array(
			'message' => 'Card number is required'
		)));

		$card_number->addValidator(new CardNumber(array(
			'message' => 'Card number is not valid'
		)));

		$this->add($card_number);

		// Card expiry
		$card_expiry = new Text('card-expiry');
		$card_expiry->addValidator(new PresenceOf(array(
			'message' => 'Card expiry is required'
		)));

		$this->add($card_expiry);

		// Card cvv
		$card_cvv = new Text('card-cvv');
		$card_cvv->addValidator(new PresenceOf(array(
			'message' => 'Card cvv is required'
		)));

		$this->add($card_cvv);

		$csrf = new Hidden('csrf');
		$this->add($csrf);
		
	}
}
