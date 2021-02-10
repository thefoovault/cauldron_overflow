<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller;

use CauldronOverflow\Domain\Question;
use CauldronOverflow\Domain\QuestionRepository;
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

    public function show($slug, QuestionRepository $questionRepository): Response
    {
        $question = $questionRepository->findBySlug($slug);

        if($question === null) {
            throw $this->createNotFoundException(sprintf('no question found for slug "%s"', $slug));
        }

        $answers = [
            'Make sure your cat is sitting `purrrfectly` still 🤣',
            'Honestly, I like furry shoes better than MY cat',
            'Maybe... try saying the spell backwards?',
        ];

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
}
