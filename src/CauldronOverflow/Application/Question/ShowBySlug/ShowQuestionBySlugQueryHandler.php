<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question\ShowBySlug;

use CauldronOverflow\Application\Answer\AnswersResponse;
use CauldronOverflow\Application\Answer\ShowAllByQuery\ShowAnswersByQuestionService;
use CauldronOverflow\Application\Question\QuestionResponse;
use Shared\Domain\Bus\Query\QueryHandler;

final class ShowQuestionBySlugQueryHandler implements QueryHandler
{
    private ShowQuestionBySlugService $questionBySlugService;
    private ShowAnswersByQuestionService $answersByQuestionService;

    public function __construct(
        ShowQuestionBySlugService $questionBySlugService,
        ShowAnswersByQuestionService $answersByQuestionService
    ) {
        $this->questionBySlugService = $questionBySlugService;
        $this->answersByQuestionService = $answersByQuestionService;
    }

    public function __invoke(ShowQuestionBySlugQuery $showQuestionBySlugQuery): ?ShowQuestionBySlugResponse
    {
        $question = $this->questionBySlugService->__invoke($showQuestionBySlugQuery->slug());

        if ($question === null) {
            return null;
        }

        $answers = $this->answersByQuestionService->__invoke($question);

        return new ShowQuestionBySlugResponse(
            QuestionResponse::fromQuestion($question),
            AnswersResponse::fromAnswers($answers)
        );
    }
}
