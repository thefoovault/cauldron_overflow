<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Symfony;

use Shared\Domain\Bus\Command\Command;
use Shared\Domain\Bus\Command\CommandBus;
use Shared\Domain\Bus\Query\Query;
use Shared\Domain\Bus\Query\QueryBus;
use Shared\Domain\Bus\Query\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class Controller extends AbstractController
{
    private QueryBus $queryBus;
    private CommandBus $commandBus;

    public function __construct(
        QueryBus $queryBus,
        CommandBus $commandBus
    ) {
        $this->queryBus = $queryBus;
        $this->commandBus = $commandBus;
    }

    protected function ask(Query $query): Response
    {
        return $this->queryBus->ask($query);
    }

    protected function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
