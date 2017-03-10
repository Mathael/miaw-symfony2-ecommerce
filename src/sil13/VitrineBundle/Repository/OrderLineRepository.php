<?php

namespace sil13\VitrineBundle\Repository;
use Doctrine\ORM\EntityRepository;
use sil13\VitrineBundle\Entity\Article;

/**
 * OrderLineRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OrderLineRepository extends EntityRepository
{
    /**
     * @return Article[]
     */
    public function findMostWantedArticles() {
        $query = $this->getEntityManager()
            ->createQuery("SELECT article, sum(line.count) as quantity 
                            FROM sil13VitrineBundle:OrderLine line, sil13VitrineBundle:Article article
                            WHERE article.id = line.article
                            GROUP BY line.article ORDER BY quantity DESC")
            ->setMaxResults(10);
        return $query->getResult();
    }
}