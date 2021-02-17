<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question\ShowOne;

use CauldronOverflow\Application\Question\QuestionResponse;
use CauldronOverflow\Application\Question\ShowBySlug\ShowQuestionBySlugService;
use CauldronOverflow\Domain\Question\QuestionSlug;
use Shared\Domain\Bus\Query\QueryHandler;

final class ShowOneQuestionQueryHandler implements QueryHandler
{
    private ShowQuestionBySlugService $questionBySlugService;

    public function __construct(
        ShowQuestionBySlugService $questionBySlugService
    ) {
        $this->questionBySlugService = $questionBySlugService;
    }

    public function __invoke(ShowOneQuestionQuery $showOneQuestionQuery): ?QuestionResponse
    {
        $question = $this->questionBySlugService->__invoke(
            new QuestionSlug($showOneQuestionQuery->slug())
        );
        if ($question === null) {
            return null;
        }

        return QuestionResponse::fromQuestion($question);
    }
}
