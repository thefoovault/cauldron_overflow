<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question;

use CauldronOverflow\Domain\Question\Question;
use Shared\Domain\Bus\Query\Response;

class QuestionsResponse implements Response
{
    /** @var QuestionResponse[] */
    private array $questionsResponse;

    public function __construct(QuestionResponse...$questions)
    {
        $this->questionsResponse = $questions;
    }

    /**
     * @param Question[] $questions
     */
    public static function fromQuestions(array $questions): self
    {
        $collection = [];
        foreach ($questions as $question) {
            $collection[] = QuestionResponse::fromQuestion($question);
        }
        return new self(... $collection);
    }

    public function questionsResponse(): array
    {
        return $this->questionsResponse;
    }
}
