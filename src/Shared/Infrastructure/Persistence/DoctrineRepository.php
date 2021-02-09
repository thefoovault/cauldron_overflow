<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Persistence;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Shared\Domain\Entity;

abstract class DoctrineRepository
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    protected function persist(Entity $entity): void
    {
        $this->entityManager()->persist($entity);
        $this->entityManager()->flush();
    }

    protected function entityManager(): EntityManager
    {
        return $this->entityManager;
    }

    protected function repository($entityClass): EntityRepository
    {
        return $this->entityManager()->getRepository($entityClass);
    }
}
