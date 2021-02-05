<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller;

use CauldronOverflow\Domain\Question;
use CauldronOverflow\Infrastructure\Services\MarkdownHelper;
use DateTime;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends AbstractController
{
    public function homepage(Connection $connection): Response
    {
        $connection->connect();
        return $this->render('question/homepage.html.twig');
    }

    public function show($slug, MarkdownHelper $markdownHelper): Response
    {
        $answers = [
            'Make sure your cat is sitting `purrrfectly` still 🤣',
            'Honestly, I like furry shoes better than MY cat',
            'Maybe... try saying the spell backwards?',
        ];

        $questionText = 'I\'ve been turned into a cat, any thoughts on how to turn back? While I\'m **adorable**, I don\'t really care for cat food.';

        $parsedQuestionText = $markdownHelper->parse($questionText);

        return $this->render('question/show.html.twig',
            [
                "question" => ucwords(str_replace('-', ' ', $slug)),
                "answers" => $answers,
                'questionText' => $parsedQuestionText,
            ]
        );
    }

    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $parameters = json_decode($request->getContent(), true);

        $question = new Question(
            Uuid::uuid4()->serialize(),
            $parameters['name'],
            $parameters['question'],
            $parameters['slug'],
            new DateTime()
        );

        $entityManager->persist($question);
        $entityManager->flush();

        return new Response(sprintf('Well hallo! The shiny question is id %s, slug %s',
            $question->id(),
            $question->slug()
        ));
    }
}
