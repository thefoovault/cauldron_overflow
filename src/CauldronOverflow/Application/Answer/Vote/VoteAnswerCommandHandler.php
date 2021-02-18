<?php

declare(strict_types=1);

namespace CauldronOverflow\Application\Answer\Vote;

use CauldronOverflow\Application\Answer\ShowOne\ShowOneAnswerService;
use CauldronOverflow\Domain\Answer\AnswerId;
use Shared\Domain\Bus\Command\CommandHandler;

class VoteAnswerCommandHandler implements CommandHandler
{
    private ShowOneAnswerService $showOneAnswerService;
    private VoteAnswerService $voteAnswerService;

    public function __construct(
        ShowOneAnswerService $showOneAnswerService,
        VoteAnswerService $voteAnswerService
    ) {
        $this->showOneAnswerService = $showOneAnswerService;
        $this->voteAnswerService = $voteAnswerService;
    }

    public function __invoke(VoteAnswerCommand $voteAnswerCommand): void
    {
        $answer = $this->showOneAnswerService->__invoke(
            new AnswerId($voteAnswerCommand->id())
        );

        $this->voteAnswerService->__invoke(
            $answer,
            $voteAnswerCommand->direction()
        );
    }
}
