<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller\Question;

use CauldronOverflow\Domain\Question\Question;
use CauldronOverflow\Domain\Question\QuestionRepository;
use DateTime;
use Ramsey\Uuid\Uuid;
use Shared\Infrastructure\Symfony\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NewQuestionController extends Controller
{
    public function __invoke(Request $request, QuestionRepository $questionRepository): Response
    {
        $parameters = json_decode($request->getContent(), true);

        $question = new Question(
            Uuid::uuid4()->serialize(),
            $parameters['name'],
            $parameters['question'],
            $parameters['slug'],
            new DateTime()
        );

        $questionRepository->save($question);

        return new Response(sprintf('Well hallo! The shiny question is id %s, slug %s',
            $question->id(),
            $question->slug()
        ));
    }
}
