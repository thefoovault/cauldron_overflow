<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question\ShowBySlug;

use CauldronOverflow\Application\Answer\AnswersResponse;
use CauldronOverflow\Application\Question\QuestionResponse;
use Shared\Domain\Bus\Query\Response;

final class ShowQuestionBySlugResponse implements Response
{
    private QuestionResponse $questionResponse;
    private AnswersResponse $answersResponse;

    public function __construct(
        QuestionResponse $questionResponse,
        AnswersResponse $answersResponse
    ) {
        $this->questionResponse = $questionResponse;
        $this->answersResponse = $answersResponse;
    }

    public function questionResponse(): QuestionResponse
    {
        return $this->questionResponse;
    }

    public function answersResponse(): AnswersResponse
    {
        return $this->answersResponse;
    }
}
