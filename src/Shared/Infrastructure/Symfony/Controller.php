<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Symfony;

use Shared\Domain\Bus\Query\Query;
use Shared\Domain\Bus\Query\QueryBus;
use Shared\Domain\Bus\Query\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Controller extends AbstractController
{
    private QueryBus $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    protected function ask(Query $query): Response
    {
        return $this->queryBus->ask($query);
    }
}
