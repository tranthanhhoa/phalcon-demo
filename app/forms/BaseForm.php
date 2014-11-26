<?php 

use Phalcon\Forms\Form;
use Phalcon\Validation\Validator;

class BaseForm extends Form
{
	// This method returns the default value for field 'csrf'
	public function getCsrf(){
		return $this->security->getToken();
	}
	
	public function initialize()
	{

	}

	/**
     * Prints messages for a specific element
     */
    public function messages($name)
    {
        if ($this->hasMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                $this->flash->error($message);
            }
        }
    }

    /**
     * Prints class error for a specific element
     */
    public function getErrorClassFor($name)
    {
        $errorClass = "";
        if($this->hasMessagesFor($name)){
        	$errorClass = "has-error";
        } else{
        	$errorClass = "";
        }

        return $errorClass;
    }
}
