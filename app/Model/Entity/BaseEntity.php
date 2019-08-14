<?php


namespace App\Model\Entity;


abstract class BaseEntity
{
	public function __get($property)
	{
		if(property_exists($this,$property))
			return $this->$property;
	}

	public function __set($property, $value)
	{
		if(property_exists($this,$property))
			$this->$property = $value;
		return $this;
	}

	public function __construct()
	{
		if(property_exists($this, "createdAt"))
		{
			$this->createdAt = new \DateTimeImmutable();
		}
	}
}