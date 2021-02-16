<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller\Question;

use CauldronOverflow\Application\Question\Create\CreateQuestionCommand;
use Shared\Infrastructure\Symfony\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CreateQuestionController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $parameters = json_decode($request->getContent(), true);

        $this->dispatch(
            new CreateQuestionCommand(
                $parameters['name'],
                $parameters['question'],
                $parameters['slug'],
            )
        );

        return new Response(
            null,
            Response::HTTP_CREATED
        );
    }
}
