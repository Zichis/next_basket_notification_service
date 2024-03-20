<?php

namespace App\MessageHandler;

use App\Message\UserCreated;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class UserCreatedHandler
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {
    }

    public function __invoke(UserCreated $userCreated): void
    {
        $userData = $userCreated->getData();
        $stringData = "Email: " . $userData['email'] . " Name: " . $userData['firstName'] . " " . $userData['lastName'];

        $this->logger->warning('USER CREATED: ' . $stringData);
    }
}
