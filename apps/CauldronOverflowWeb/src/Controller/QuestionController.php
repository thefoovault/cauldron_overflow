<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends AbstractController
{
    public function homepage(): Response
    {
        return $this->render('question/homepage.html.twig');
    }

    public function show($slug, MarkdownParserInterface $markdownParser): Response
    {
        $answers = [
            'Make sure your cat is sitting `purrrfectly` still 🤣',
            'Honestly, I like furry shoes better than MY cat',
            'Maybe... try saying the spell backwards?',
        ];

        $questionText = 'I\'ve been turned into a cat, any thoughts on how to turn back? While I\'m **adorable**, I don\'t really care for cat food.';

        return $this->render('question/show.html.twig',
            [
                "question" => ucwords(str_replace('-', ' ', $slug)),
                "answers" => $answers,
                'questionText' => $markdownParser->transformMarkdown($questionText),
            ]
        );
    }
}
