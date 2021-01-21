<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends AbstractController
{
    public function commentVote($id, $direction): Response
    {
        if ($direction === 'up') {
            $currentVoteCount = rand(7,100);
        } else {
            $currentVoteCount = rand(0,5);
        }

        return $this->json(
            [
                "votes" => $currentVoteCount
            ]
        );
    }
}
