<?php declare(strict_types=1);

namespace App\Model\Attributes;

use DateTime;
use Exception;


trait UpdatedAt
{
	/**
	 * @var DateTime
	 * @ORM\Column(type="datetime", nullable=TRUE)
	 */
	private $updatedAt;

	public function getUpdatedAt(): DateTime
	{
		return $this->updatedAt;
	}

	/**
	 * @ORM\PrePersist
	 * @ORM\PreUpdate
	 *
	 * @return self
	 * @throws Exception
	 */
	public function setUpdatedAt(): self
	{
		$this->updatedAt = new DateTime('now');
		return $this;
	}
}
