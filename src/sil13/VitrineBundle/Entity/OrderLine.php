<?php

namespace sil13\VitrineBundle\Entity;

/**
 * OrderLine
 */
class OrderLine
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var Integer
     */
    private $count;

    /**
     * @var Article
     */
    private $article;

    /**
     * @var BuyOrder
     */
    private $buyOrder;

    /**
     * @var Integer
     */
    private $price;

    /**
     * Constructor
     */
    public function __construct(){}

    public function __toString() {
        return $this->id . '';
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set count
     *
     * @param integer $count
     *
     * @return OrderLine
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set article
     *
     * @param Article $article
     *
     * @return OrderLine
     */
    public function setArticle(Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set buyOrder
     *
     * @param BuyOrder $buyOrder
     *
     * @return OrderLine
     */
    public function setBuyOrder(BuyOrder $buyOrder = null)
    {
        $this->buyOrder = $buyOrder;

        return $this;
    }

    /**
     * Get buyOrder
     *
     * @return BuyOrder
     */
    public function getBuyOrder()
    {
        return $this->buyOrder;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return OrderLine
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }
}
