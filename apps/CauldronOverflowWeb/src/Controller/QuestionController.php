<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends AbstractController
{
    public function homepage(): Response
    {
        return new Response('Hello wold!');
    }

    public function show($slug)
    {
        $answers = [
            "First answer",
            "Second answer",
            "Third answer"
        ];
        return $this->render('question/show.html.twig',
            [
                "question" => ucwords(str_replace('-', ' ', $slug)),
                "answers" => $answers
            ]
        );
    }
}
