<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends AbstractController
{
    public function homepage(): Response
    {
        return $this->render('question/homepage.html.twig');
    }

    public function show($slug): Response
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
