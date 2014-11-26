<?php

use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\InclusionIn;

class SignupForm extends BaseForm
{
	public function initialize()
	{
		// Select birth month
		$months         = [];
		for($i = 0;$i < 12;$i++){
			$month = date("F", mktime(0, 0, 0, $i+1, 1, 0, 0));
			array_push($months,$month);
		}
		$monthKeys = range(1,12);
		$monthValues = array_combine($monthKeys,$months);
		$birthday_month = new Select( 'birthMonth', $monthValues, array(
			'useEmpty'  => true,
			'emptyText' => '--Month--',
			'using'     => array( 'id', 'name' ),
			'class'     => 'form-control'
		) );
		$birthday_month->setLabel( 'Month' );
		$birthday_month->addValidators( array(
			new PresenceOf( array(
				'message' => 'Select month is required'
			) ),
			new InclusionIn(array(
				'message' => 'Month is not valid',
				'domain' => range(1,12)
			))
		) );

		$this->add( $birthday_month );

		// Select birth day
		$days = range(1,31);
		$birthday_day = new Select( 'birthDay', array_combine($days,$days), array(
			'useEmpty'  => true,
			'emptyText' => '--Day--',
			'using'     => array( 'id', 'name' ),
			'class'     => 'form-control'
		) );
		$birthday_day->setLabel( 'Day' );
		$birthday_day->addValidators( array(
			new PresenceOf( array(
				'message' => 'Select day is required'
			) ),
			new InclusionIn(array(
				'message' => 'Day is not valida',
				'domain' => $days
			)),
			new DayInMonth(array(
				'message' => 'Day is not valid',
				'month' => 'birthMonth',
				'year' => 'birthYear'
			))
		) );

		$this->add( $birthday_day );

		// Select birth year
		$years = range(1950, 2000);
		$birthday_year = new Select( 'birthYear', array_combine($years, $years), array(
			'useEmpty'  => true,
			'emptyText' => '--Year--',
			'using'     => array( 'id', 'name' ),
			'class'     => 'form-control'
		) );
		$birthday_year->setLabel( 'Year' );
		$birthday_year->addValidators( array(
			new PresenceOf( array(
				'message' => 'Select year is required'
			) )
		) );

		$this->add( $birthday_year );
		
	}
}
