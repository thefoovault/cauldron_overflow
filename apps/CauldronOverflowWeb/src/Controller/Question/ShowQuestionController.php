<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller\Question;

use CauldronOverflow\Application\Question\ShowBySlug\ShowQuestionBySlugQuery;
use CauldronOverflow\Application\Question\ShowBySlug\ShowQuestionBySlugResponse;
use CauldronOverflow\Domain\Answer\AnswerRepository;
use CauldronOverflow\Domain\Question\QuestionRepository;
use Shared\Infrastructure\Symfony\Controller;
use Symfony\Component\HttpFoundation\Response;

final class ShowQuestionController extends Controller
{
    public function __invoke($slug, QuestionRepository $questionRepository, AnswerRepository $answerRepository): Response
    {
        /** @var ShowQuestionBySlugResponse $response */
        $response = $this->ask(
            new ShowQuestionBySlugQuery($slug)
        );

        return $this->render('question/show.html.twig',
            [
                "question" => $response->questionResponse(),
                "answers" => $response->answersResponse()
            ]
        );
    }
}
