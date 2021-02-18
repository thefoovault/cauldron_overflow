<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Answer\ShowOne;

use CauldronOverflow\Application\Answer\AnswerResponse;
use CauldronOverflow\Domain\Answer\AnswerId;
use Shared\Domain\Bus\Query\QueryHandler;

final class ShowOneAnswerQueryHandler implements QueryHandler
{
    private ShowOneAnswerService $showOneAnswerService;

    public function __construct(
        ShowOneAnswerService $showOneAnswerService
    ) {
        $this->showOneAnswerService = $showOneAnswerService;
    }

    public function __invoke(ShowOneAnswerQuery $showOneAnswerQuery): AnswerResponse
    {
        $answer = $this->showOneAnswerService->__invoke(
            new AnswerId($showOneAnswerQuery->id())
        );
        return AnswerResponse::fromAnswer($answer);
    }
}
