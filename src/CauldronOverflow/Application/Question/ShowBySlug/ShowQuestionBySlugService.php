<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question\ShowBySlug;

use CauldronOverflow\Domain\Question\Question;
use CauldronOverflow\Domain\Question\QuestionRepository;

final class ShowQuestionBySlugService
{
    private QuestionRepository $questionRepository;

    public function __construct(
        QuestionRepository $questionRepository
    ) {
        $this->questionRepository = $questionRepository;
    }

    public function __invoke(string $slug): ?Question
    {
        return $this->questionRepository->findBySlug($slug);
    }
}
