<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller\Homepage;

use CauldronOverflow\Domain\Question\QuestionRepository;
use Shared\Infrastructure\Symfony\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomepageController extends Controller
{
    public function __invoke(QuestionRepository $questionRepository): Response
    {
        $questions = $questionRepository->findAllOrderedByNewest();
        return $this->render(
            'question/homepage.html.twig',
            [
                'questions' => $questions,
            ]
        );
    }
}
