<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Answer\Create;

use CauldronOverflow\Application\Question\ShowBySlug\ShowQuestionBySlugService;
use CauldronOverflow\Domain\Answer\Answer;
use CauldronOverflow\Domain\Question\QuestionSlug;
use DateTime;
use Ramsey\Uuid\Uuid;
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
            Uuid::uuid4()->serialize(),
            $createAnswerCommand->answer(),
            $question,
            new DateTime()
        );

        $this->answerService->__invoke($answer);
    }
}
