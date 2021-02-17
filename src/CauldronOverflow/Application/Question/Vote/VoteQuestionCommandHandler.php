<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question\Vote;

use CauldronOverflow\Application\Question\ShowBySlug\ShowQuestionBySlugService;
use CauldronOverflow\Domain\Question\QuestionSlug;
use Shared\Domain\Bus\Command\CommandHandler;

final class VoteQuestionCommandHandler implements CommandHandler
{
    private ShowQuestionBySlugService $questionBySlugService;
    private VoteQuestionService $voteQuestionService;

    public function __construct(
        ShowQuestionBySlugService $questionBySlugService,
        VoteQuestionService $voteQuestionService
    ) {
        $this->voteQuestionService = $voteQuestionService;
        $this->questionBySlugService = $questionBySlugService;
    }

    public function __invoke(VoteQuestionCommand $voteQuestionCommand): void
    {
        $question = $this->questionBySlugService->__invoke(
            new QuestionSlug($voteQuestionCommand->slug())
        );

        $this->voteQuestionService->__invoke(
            $question,
            $voteQuestionCommand->direction()
        );
    }
}
