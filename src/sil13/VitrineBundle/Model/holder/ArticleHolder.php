<?php
/**
 * User: LEBOC Philippe
 * Date: 12/01/2017
 * Time: 15:44
 */
namespace sil13\VitrineBundle\Model\holder;
use sil13\VitrineBundle\Entity\Article;

/**
 * Class ArticleHolder used to render the article informations and quantity associated.
 * @package sil13\VitrineBundle\Entity\holder
 */
class ArticleHolder
{
    /** @var $article Article */
    private $article;

    /** @var $quantity integer */
    private $quantity;

    public function __construct(){}

    /**
     * @return Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param Article $article
     * @return ArticleHolder
     */
    public function setArticle($article)
    {
        $this->article = $article;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return ArticleHolder
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }
}