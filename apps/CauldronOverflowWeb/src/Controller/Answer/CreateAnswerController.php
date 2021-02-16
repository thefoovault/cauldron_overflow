<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller\Answer;

use CauldronOverflow\Application\Answer\Create\CreateAnswerCommand;
use Shared\Infrastructure\Symfony\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CreateAnswerController extends Controller
{
    public function __invoke(string $slug, Request $request): Response
    {
        $parameters = json_decode($request->getContent(), true);

        $this->dispatch(
            new CreateAnswerCommand(
                $slug,
                $parameters['answer']
            )
        );

        return new Response(
            null,
            Response::HTTP_CREATED
        );
    }
}
