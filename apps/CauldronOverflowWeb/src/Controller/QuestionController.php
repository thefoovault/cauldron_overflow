<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller;

use Symfony\Component\HttpFoundation\Response;

class QuestionController
{
    public function homepage(): Response
    {
        return new Response('Hello wold!');
    }

    public function show($slug): Response
    {
        return new Response(
            sprintf('Answer the question %s', $slug)
        );
    }
}
