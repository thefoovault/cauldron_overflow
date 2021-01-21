<?php

declare(strict_types=1);

namespace CauldronOverflowWeb\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends AbstractController
{
    public function commentVote($id, $direction, LoggerInterface $logger): Response
    {
        if ($direction === 'up') {
            $logger->info('Voted up');
            $currentVoteCount = rand(7,100);
        } else {
            $logger->info('Voted down');
            $currentVoteCount = rand(0,5);
        }

        return $this->json(
            [
                "votes" => $currentVoteCount
            ]
        );
    }
}
