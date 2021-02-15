<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller;

use CauldronOverflow\Domain\Answer\Answer;
use CauldronOverflow\Domain\Answer\AnswerRepository;
use CauldronOverflow\Domain\Question\Question;
use CauldronOverflow\Domain\Question\QuestionRepository;
use DateTime;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends AbstractController
{
    public function homepage(QuestionRepository $questionRepository): Response
    {
        $questions = $questionRepository->findAllOrderedByNewest();
        return $this->render(
            'question/homepage.html.twig',
            [
                'questions' => $questions,
            ]
        );
    }

    public function show($slug, QuestionRepository $questionRepository, AnswerRepository $answerRepository): Response
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

    public function new(Request $request, QuestionRepository $questionRepository): Response
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

    public function vote(string $slug, string $direction, QuestionRepository $questionRepository): Response
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

    public function newAnswer(string $slug, Request $request, QuestionRepository $questionRepository, AnswerRepository $answerRepository): Response
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
