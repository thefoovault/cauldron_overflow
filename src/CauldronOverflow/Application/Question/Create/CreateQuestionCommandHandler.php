<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question\Create;

use CauldronOverflow\Domain\Question\Question;
use DateTime;
use Ramsey\Uuid\Uuid;
use Shared\Domain\Bus\Command\CommandHandler;

class CreateQuestionCommandHandler implements CommandHandler
{
    private CreateQuestionService $service;

    public function __construct(
        CreateQuestionService $service
    ) {
        $this->service = $service;
    }

    public function __invoke(CreateQuestionCommand $createQuestionCommand): void
    {
        $question = new Question(
            Uuid::uuid4()->serialize(),
            $createQuestionCommand->name(),
            $createQuestionCommand->question(),
            $createQuestionCommand->slug(),
            new DateTime()
        );

        $this->service->__invoke($question);
    }
}
