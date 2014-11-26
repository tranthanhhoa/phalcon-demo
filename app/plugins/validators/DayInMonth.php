<?php
use Phalcon\Validation\Validator,
    Phalcon\Validation\ValidatorInterface,
    Phalcon\Validation\Message;

class DayInMonth extends Validator implements ValidatorInterface
{
    

    /**
     * Executes the validation
     *
     * @param Phalcon\Validation $validator
     * @param string $attribute
     * @return boolean
     */
    public function validate($validator, $attribute)
    {
        $day = $validator->getValue($attribute);

        $monthOption = $this->getOption('month');
        $month = $validator->getValue($monthOption);

        $yearOption = $this->getOption('year');
        $year = $validator->getValue($yearOption);

        $validationUtil = new ValidationUtil();
        if(!isset($month) || !isset($year))
        {
            return false;
        }

        if (!$validationUtil->checkDate($month,$day,$year)) {

            $message = $this->getOption('message');
            if (!$message) {
                $message = 'Day is not valid';
            }

            $validator->appendMessage(new Message($message, $attribute, 'Day'));

            return false;
        }

        return true;
    }

}