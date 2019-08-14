<?php

namespace App\Console;

use App\Service\UserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class CreateUserCommand extends Command
{
	protected static $defaultName = 'user:create';

	/** @var UserManager */
	private $userManager;

	public function __construct(string $name = NULL, UserManager $userManager)
	{
		parent::__construct($name);
		$this->userManager = $userManager;
	}

	protected function configure()
	{
		$this->addArgument('password', InputArgument::REQUIRED, 'The password of the user');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		try
		{
			$result = $this->userManager->createDefaultUser($input->getArgument('password'));
			$output->writeln($result);
		} catch(\Exception $e)
		{
			$output->writeln($e->getMessage());
		}
	}
}