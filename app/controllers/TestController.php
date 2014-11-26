<?php

class TestController extends ControllerBase
{
	public function indexAction()
	{
		
	}

	public function loginAction()
	{
		$login_form = new LoginForm();
		if ($this->request->isPost()) {
			$this->checkValidity($login_form);
		}
		$this->view->login_form = $login_form;

	}

	public function signupAction()
	{
		
		$form = new SignupForm();
		if($this->request->isPost())
		{
			$this->checkValidity($form);
		}
		$this->view->form = $form;
		
	}

	public function creditCardAction()
	{
		
		$form = new CreditCardForm();
		if($this->request->isPost())
		{

			$this->checkValidity($form);

		}
		$this->view->form = $form;
	}

	public function showDaysAction()
    {
       $this->view->disable();
       $month = $this->request->getPost('month','int');
       $year = $this->request->getPost('year','int');
       $lastOfMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
       $days = range(1, $lastOfMonth);
       echo json_encode($days);
    }
}