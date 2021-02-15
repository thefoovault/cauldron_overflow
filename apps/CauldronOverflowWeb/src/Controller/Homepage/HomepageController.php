<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller\Homepage;

use CauldronOverflow\Application\Question\ShowAll\ShowQuestionsQuery;
use Shared\Infrastructure\Symfony\Controller;
use Symfony\Component\HttpFoundation\Response;

final class HomepageController extends Controller
{
    public function __invoke(): Response
    {
        $questions = $this->ask(
            new ShowQuestionsQuery()
        );

        return $this->render(
            'question/homepage.html.twig',
            [
                'questions' => $questions,
            ]
        );
    }
}
