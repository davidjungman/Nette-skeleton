<?php


namespace App\Model\Attributes;


trait Surname
{
	/**
	 * @ORM\Column(type="string", nullable=FALSE)
	 * @var $surname
	 */
	private $surname;

	public function getSurname(): string
	{
		return $this->surname;
	}

	public function setSurname(string $surname): self
	{
		$this->surname = $surname;
		return $this;
	}
}