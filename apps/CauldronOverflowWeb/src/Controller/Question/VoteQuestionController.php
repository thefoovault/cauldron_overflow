<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller\Question;

use CauldronOverflow\Application\Question\QuestionResponse;
use CauldronOverflow\Application\Question\ShowOne\ShowOneQuestionQuery;
use CauldronOverflow\Application\Question\Vote\VoteQuestionCommand;
use Shared\Infrastructure\Symfony\Controller;
use Symfony\Component\HttpFoundation\Response;

final class VoteQuestionController extends Controller
{
    public function __invoke(string $slug, string $direction): Response
    {
        $this->dispatch(
            new VoteQuestionCommand(
                $slug,
                $direction
            )
        );

        /** @var QuestionResponse $response */
        $response = $this->ask(
            new ShowOneQuestionQuery(
                $slug
            )
        );

        return $this->json(
            [
                "votes" => $response->votes()
            ]
        );
    }
}
