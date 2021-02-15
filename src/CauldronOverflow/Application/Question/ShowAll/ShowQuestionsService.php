<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Question\ShowAll;

use CauldronOverflow\Domain\Question\Question;
use CauldronOverflow\Domain\Question\QuestionRepository;

final class ShowQuestionsService
{
    private QuestionRepository $repository;

    public function __construct(QuestionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Question[]
     */
    public function __invoke(): array
    {
        return $this->repository->findAllOrderedByNewest();
    }
}
