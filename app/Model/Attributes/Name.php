<?php


namespace App\Model\Attributes;


trait Name
{
	/**
	 * @ORM\Column(type="string", nullable=FALSE)
	 * @var $name
	 */
	private $name;

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): self
	{
		$this->name = $name;
		return $this;
	}
}