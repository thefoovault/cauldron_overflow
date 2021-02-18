<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Answer\Create;

use CauldronOverflow\Application\Question\ShowBySlug\ShowQuestionBySlugService;
use CauldronOverflow\Domain\Answer\Answer;
use CauldronOverflow\Domain\Answer\AnswerBody;
use CauldronOverflow\Domain\Answer\AnswerId;
use CauldronOverflow\Domain\Answer\AnswerVotes;
use CauldronOverflow\Domain\Question\QuestionSlug;
use DateTimeImmutable;
use Shared\Domain\Bus\Command\CommandHandler;

final class CreateAnswerCommandHandler implements CommandHandler
{
    private CreateAnswerService $answerService;
    private ShowQuestionBySlugService $questionBySlugService;

    public function __construct(
        CreateAnswerService $answerService,
        ShowQuestionBySlugService $questionBySlugService
    ) {
        $this->answerService = $answerService;
        $this->questionBySlugService = $questionBySlugService;
    }

    public function __invoke(CreateAnswerCommand $createAnswerCommand): void
    {
        $question = $this->questionBySlugService->__invoke(
            new QuestionSlug($createAnswerCommand->slug())
        );

        $answer = new Answer(
            AnswerId::generate(),
            new AnswerBody($createAnswerCommand->answer()),
            $question->id(),
            new DateTimeImmutable(),
            new AnswerVotes()
        );

        $this->answerService->__invoke($answer);
    }
}
