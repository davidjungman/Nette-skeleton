<?php declare(strict_types=1);

namespace App\Model\Entity;

use App\Model\Attributes\Email;
use App\Model\Attributes\Id;
use App\Model\Attributes\CreatedAt;
use App\Model\Attributes\Name;
use App\Model\Attributes\Role;
use App\Model\Attributes\Surname;
use App\Model\Attributes\UpdatedAt;
use DateTime;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package App\Model\Entity
 * @ORM\Entity(repositoryClass="App\Model\Repository\UserRepository")
 * @ORM\Table(name="users")
 * @ORM\HasLifecycleCallbacks
 */
final class User extends BaseEntity
{
	use Id,
		CreatedAt,
		UpdatedAt,
		Name,
		Surname,
		Email,
		Role;

	/**
	 * @ORM\Column(type="string", nullable=FALSE)
	 * @var $password
	 */
	private $password;

	public function getPassword(): string
	{
		return $this->password;
	}

	public function setPassword(string $password): self
	{
		$this->password = $password;
		return $this;
	}
}