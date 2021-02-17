<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question\Create;

use CauldronOverflow\Domain\Question\Question;
use CauldronOverflow\Domain\Question\QuestionBody;
use CauldronOverflow\Domain\Question\QuestionId;
use CauldronOverflow\Domain\Question\QuestionName;
use CauldronOverflow\Domain\Question\QuestionSlug;
use CauldronOverflow\Domain\Question\QuestionVotes;
use Shared\Domain\Bus\Command\CommandHandler;
use Shared\Domain\ValueObject\Uuid;

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
            QuestionId::generate(),
            new QuestionName($createQuestionCommand->name()),
            new QuestionBody($createQuestionCommand->question()),
            new QuestionSlug($createQuestionCommand->slug()),
            new \DateTimeImmutable(),
            new QuestionVotes()
        );

        $this->service->__invoke($question);
    }
}
