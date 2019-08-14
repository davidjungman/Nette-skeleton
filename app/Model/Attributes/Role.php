<?php


namespace App\Model\Attributes;


trait Role
{
	/**
	 * @ORM\Column(type="string", options={"default": "user"})
	 * @var $role
	 */
	private $role;

	public function getRole(): string
	{
		return $this->role;
	}

	public function setRole(string $role): self
	{
		$this->role = $role;
		return $this;
	}
}