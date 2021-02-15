<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question\Show;

use CauldronOverflow\Application\Question\QuestionsResponse;
use Shared\Domain\Bus\Query\QueryHandler;

class ShowQuestionsQueryHandler implements QueryHandler
{
    private ShowQuestionsService $service;

    public function __construct(ShowQuestionsService $service)
    {
        $this->service = $service;
    }

    public function __invoke(ShowQuestionsQuery $query): QuestionsResponse
    {
        $questions = $this->service->__invoke();

        return QuestionsResponse::fromQuestions($questions);
    }
}
