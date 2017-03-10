<?php
/**
 * @author LEBOC Philippe.
 * Date: 14/12/2016
 * Time: 10:51
 */
namespace sil13\VitrineBundle\Model;

class Cart
{
    /**
     * @var array []
     */
    private $container = [];

    /**
     * Cart constructor.
     */
    public function __construct(){}

    /**
     * @return array []
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Ajoute un article au panier avec la quantité. S'il est déjà présent, additionne la quantité
     * @param $articleId integer
     * @param $amount integer
     */
    public function add($articleId, $amount) {
        array_key_exists($articleId, $this->container) ? $this->container[$articleId] += $amount : $this->container[$articleId] = $amount;
    }

    /**
     * Retire une quantité précise d'un article identifié par son id unique
     * @param $articleId
     * @param $amount
     */
    public function sub($articleId, $amount) {
        if(array_key_exists($articleId, $this->container)) $this->container[$articleId] -= $amount;
    }

    /**
     * Supprime l'article du panier
     * @param $articleId
     */
    public function delete($articleId) {
        if(array_key_exists($articleId, $this->container)) unset($this->container[$articleId]);
    }

    /**
     * @return bool
     */
    public function isEmpty() {
        return $this->size() == 0;
    }

    /**
     * @return int
     */
    public function size() {
        return count($this->getContainer());
    }

    /**
     * Supprime toute les entrées du panier
     */
    public function clear() {
        $this->container = [];
    }
}