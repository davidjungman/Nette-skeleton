<?php


namespace App\Presenters;

use Nette\Application\UI\Form;
use Nette\Security\AuthenticationException;
use stdClass;
use Nette\Security\User;


class SignInPresenter extends BasePresenter
{
	public function renderDefault()
	{

	}

	protected function createComponentSignInForm(): Form
	{
		$form = new Form;
		$form->addText('email', 'Emailová adresa:');
		$form->addPassword('password','Heslo:');
		$form->addSubmit('login', 'Přihlásit se');
		$form->onSuccess[] = [$this, 'signInFormSucceeded'];
		return $form;
	}

	public function signInFormSucceeded(Form $form, stdClass $values): void
	{
		try
		{
			$values = get_object_vars($values);

			$user = $this->getUser();
			$user->login($values["email"], $values["password"]);
			$this->redirect('Homepage:');

		} catch(AuthenticationException $e)
		{
			$this->flashMessage('The Email or Password is incorrect', "danger");
		}
	}
}