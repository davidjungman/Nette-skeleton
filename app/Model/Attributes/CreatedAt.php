<?php declare(strict_types=1);

namespace App\Model\Attributes;

use DateTime;
use Exception;


trait CreatedAt
{
	/**
	 * @var DateTime
	 * @ORM\Column(type="datetime", nullable=TRUE)
	 */
	private $createdAt;

	public function getCreatedAt(): DateTime
	{
		return $this->createdAt;
	}

	/**
	 * @ORM\PrePersist
	 * @return self
	 * @throws Exception
	 */
	public function setCreatedAt(): self
	{
		$this->createdAt = new DateTime('now');
		return $this;
	}
}
