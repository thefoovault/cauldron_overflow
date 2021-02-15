<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller\Answer;

use CauldronOverflow\Domain\Answer\Answer;
use CauldronOverflow\Domain\Answer\AnswerRepository;
use CauldronOverflow\Domain\Question\QuestionRepository;
use DateTime;
use Ramsey\Uuid\Uuid;
use Shared\Infrastructure\Symfony\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class NewAnswerController extends Controller
{
    public function __invoke(string $slug, Request $request, QuestionRepository $questionRepository, AnswerRepository $answerRepository): Response
    {
        $parameters = json_decode($request->getContent(), true);

        $question = $questionRepository->findBySlug($slug);

        $answer = new Answer(
            Uuid::uuid4()->serialize(),
            $parameters['answer'],
            $question,
            new DateTime()
        );

        $answerRepository->save($answer);

        return new Response(sprintf('Well hallo! The shiny answer is is id %s, which responds the question %s answering: %s',
            $answer->id(),
            $answer->question()->question(),
            $answer->answer()
        ));
    }
}
