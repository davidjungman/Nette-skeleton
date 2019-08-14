<?php declare(strict_types=1);

namespace App\Service;

use App\Model\Entity\User;
use Exception;
use Nette\Security\IAuthenticator;
use Nette\Security\IIdentity;
use Nette\Security\Passwords;
use Nettrine\ORM\EntityManagerDecorator;
use Nette\Security\AuthenticationException;
use Nette\Security\Identity;

final class UserManager implements IAuthenticator
{
	/** @var EntityManagerDecorator */
	private $em;

	/** @var Passwords */
	private $passwords;


	/**
	 * UserManager constructor.
	 * @param EntityManagerDecorator $em
	 * @param Passwords              $passwords
	 */
	public function __construct(EntityManagerDecorator $em, Passwords $passwords)
	{
		$this->em = $em;
		$this->passwords = $passwords;
	}

	/**
	 * @param array $credentials
	 * @return IIdentity
	 * @throws AuthenticationException
	 */
	public function authenticate(array $credentials): IIdentity
	{
		[$email, $password] = $credentials;

		$repository = $this->em->getRepository(User::class);

		$user = $repository->findOneBy(["email" => $email]);

		if($user && $this->passwords->verify($password, $user->getPassword())){
			return new Identity(
				$user->getId(),
				$user->getRole(),
				['email' => $user->getEmail()]
			);
		}

		throw new AuthenticationException('Invalid password or username.');
	}

	/** Creates root for web provider
	 * @param string $password
	 * @return string
	 */
	public function createDefaultUser(string $password): string
	{
		$hash = $this->passwords->hash($password);

		try{
			$user = new User();
			$user->setName(constant("ROOT_NAME"))
				->setSurname(constant("ROOT_SURNAME"))
				->setEmail(constant("ROOT_EMAIL"))
				->setRole("admin")
				->setPassword($hash);

			$this->em->persist($user);
			$this->em->flush();
		}catch(Exception $e)
		{
			return $e->getMessage();
		}

		return "User was successfully created!";
	}
}