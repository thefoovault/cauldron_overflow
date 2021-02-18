<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller\Answer;

use CauldronOverflow\Application\Answer\AnswerResponse;
use CauldronOverflow\Application\Answer\ShowOne\ShowOneAnswerQuery;
use CauldronOverflow\Application\Answer\Vote\VoteAnswerCommand;
use Shared\Infrastructure\Symfony\Controller;
use Symfony\Component\HttpFoundation\Response;

final class VoteAnswerController extends Controller
{
    public function __invoke($id, $direction): Response
    {
        $this->dispatch(
            new VoteAnswerCommand(
                $id,
                $direction
            )
        );

        /** @var AnswerResponse $answer */
        $answer = $this->ask(
            new ShowOneAnswerQuery($id)
        );

        return $this->json(
            [
                "votes" => $answer->votes()
            ]
        );
    }
}
