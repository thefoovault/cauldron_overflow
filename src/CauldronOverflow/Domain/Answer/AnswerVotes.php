<?php

declare(strict_types=1);

namespace CauldronOverflow\Domain\Answer;

use Shared\Domain\ValueObject\IntegerValueObject;

class AnswerVotes extends IntegerValueObject
{
    public function __construct(int $value = 0)
    {
        parent::__construct($value);
    }
}
