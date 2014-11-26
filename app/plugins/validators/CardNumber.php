<?php
use Phalcon\Validation\Validator,
    Phalcon\Validation\ValidatorInterface,
    Phalcon\Validation\Message;

class CardNumber extends Validator implements ValidatorInterface
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
        $value = $validator->getValue($attribute);
        $validationUtil = new ValidationUtil();

        if (!$validationUtil->validateCardNumber($value)) {

            $message = $this->getOption('message');
            if (!$message) {
                $message = 'Card number is not valid';
            }

            $validator->appendMessage(new Message($message, $attribute, 'Card number'));

            return false;
        }

        return true;
    }

}