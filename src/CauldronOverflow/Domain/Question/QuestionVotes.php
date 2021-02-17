<?php

declare(strict_types=1);

namespace CauldronOverflow\Domain\Question;

use Shared\Domain\ValueObject\IntegerValueObject;

final class QuestionVotes extends IntegerValueObject
{
    public function __construct(int $value = 0)
    {
        parent::__construct($value);
    }
}
