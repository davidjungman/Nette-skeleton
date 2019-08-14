<?php


namespace App\Model\Attributes;


use Exception;


trait Email
{
	/**
	 * @ORM\Column(type="string", nullable=FALSE)
	 * @var $email
	 */
	private $email;

	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * @param string $email
	 * @return Email
	 * @throws Exception
	 */
	public function setEmail(string $email): self
	{
		if(filter_var($email,FILTER_VALIDATE_EMAIL))
			$this->email = $email;
			return $this;

		throw new Exception("Invalid e-mail address.");
	}
}