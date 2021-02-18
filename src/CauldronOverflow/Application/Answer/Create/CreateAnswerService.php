<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Answer\Create;

use CauldronOverflow\Domain\Answer\Answer;
use CauldronOverflow\Domain\Answer\AnswerBody;
use CauldronOverflow\Domain\Answer\AnswerId;
use CauldronOverflow\Domain\Answer\AnswerRepository;
use CauldronOverflow\Domain\Answer\AnswerVotes;
use CauldronOverflow\Domain\Question\QuestionId;

final class CreateAnswerService
{
    private AnswerRepository $answerRepository;

    public function __construct(
        AnswerRepository $answerRepository
    ) {
        $this->answerRepository = $answerRepository;
    }

    public function __invoke(
        AnswerId $answerId,
        AnswerBody $answerBody,
        QuestionId $questionId,
        \DateTimeImmutable $createdAt,
        AnswerVotes $answerVotes
    ): void
    {
        $this->answerRepository->save(
            new Answer(
                $answerId,
                $answerBody,
                $questionId,
                $createdAt,
                $answerVotes
            )
        );
    }
}
