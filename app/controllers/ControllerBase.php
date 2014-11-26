<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	public function checkValidity($form)
	{
		if (!$form->isValid($_POST)) {
		    foreach ($form->getMessages() as $message) {
		        $this->flash->error($message);
		    }
		}
	}

}
