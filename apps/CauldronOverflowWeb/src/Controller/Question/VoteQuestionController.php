<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller\Question;

use CauldronOverflow\Domain\Question\QuestionRepository;
use Shared\Infrastructure\Symfony\Controller;
use Symfony\Component\HttpFoundation\Response;

final class VoteQuestionController extends Controller
{
    public function __invoke(string $slug, string $direction, QuestionRepository $questionRepository): Response
    {
        $question = $questionRepository->findBySlug($slug);

        if ($direction === 'up') {
            $question->upVote();
        } else {
            $question->downVote();
        }

        $questionRepository->save($question);

        return $this->json(
            [
                "votes" => $question->formattedVotes()
            ]
        );
    }
}
