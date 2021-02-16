<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Answer;

use CauldronOverflow\Domain\Answer\Answer;
use Shared\Domain\Bus\Query\Response;

final class AnswersResponse implements Response
{
    /** @var AnswerResponse[] */
    private array $answersResponse;

    /**
     * @param AnswerResponse[] $answers
     */
    public function __construct(AnswerResponse ...$answers)
    {
        $this->answersResponse = $answers;
    }

    /**
     * @param Answer[] $answers
     */
    public static function fromAnswers(array $answers): self
    {
        $collection = [];
        foreach ($answers as $answer) {
            $collection[] = AnswerResponse::fromAnswer($answer);
        }
        return new self(... $collection);
    }

    public function answersResponse(): array
    {
        return $this->answersResponse;
    }
}
