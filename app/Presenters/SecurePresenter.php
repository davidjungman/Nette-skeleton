<?php


namespace App\Presenters;

abstract class SecurePresenter extends BasePresenter
{
	public function beforeRender()
	{
		if($this->getUser() === null ||  !$this->getUser()->isLoggedIn())
		{
			$this->redirect("SignIn:");
		}
	}
}