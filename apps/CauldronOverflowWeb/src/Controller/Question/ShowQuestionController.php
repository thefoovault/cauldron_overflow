<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller\Question;

use CauldronOverflow\Domain\Answer\AnswerRepository;
use CauldronOverflow\Domain\Question\QuestionRepository;
use Shared\Infrastructure\Symfony\Controller;
use Symfony\Component\HttpFoundation\Response;

class ShowQuestionController extends Controller
{
    public function __invoke($slug, QuestionRepository $questionRepository, AnswerRepository $answerRepository): Response
    {
        $question = $questionRepository->findBySlug($slug);

        if($question === null) {
            throw $this->createNotFoundException(sprintf('no question found for slug "%s"', $slug));
        }

        $answers = $answerRepository->findBy($question);

        return $this->render('question/show.html.twig',
            [
                "question" => $question,
                "answers" => $answers
            ]
        );
    }
}
