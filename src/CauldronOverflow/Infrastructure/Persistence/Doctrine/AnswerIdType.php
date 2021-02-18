<?php

declare(strict_types=1);

namespace CauldronOverflow\Infrastructure\Persistence\Doctrine;

use CauldronOverflow\Domain\Answer\AnswerId;
use Shared\Infrastructure\Persistence\UuidType;

class AnswerIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return AnswerId::class;
    }
}
