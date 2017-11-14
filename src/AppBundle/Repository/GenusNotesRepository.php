<?php

namespace AppBundle\Repository;


use AppBundle\Entity\Genus;
use Doctrine\ORM\EntityRepository;

class GenusNotesRepository extends EntityRepository
{
    public function findAllRecentNotesForGenus(Genus $genus)
    {
        return $this->createQueryBuilder('genus_notes')
            ->andWhere('genus_notes.genus = :genus')
            ->setParameter('genus', $genus)
            ->andWhere('genus_notes.createdAt > :recentDate')
            ->setParameter('recentDate', new \DateTime('-3 months'))
            ->getQuery()
            ->execute();
    }
}