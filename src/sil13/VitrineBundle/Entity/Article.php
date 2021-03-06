<?php

namespace sil13\VitrineBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 */
class Article
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $marque;

    /**
     * @var integer
     */
    private $price;

    /**
     * @var string
     */
    private $imageName;

    /**
     * @var boolean
     */
    private $isSoldOut;

    /**
     * @var boolean
     */
    private $isDisabled;

    /**
     * @var Category
     */
    private $category;

    /**
     * @var ArrayCollection
     */
    private $orderLines;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setOrderLines(new ArrayCollection());
    }

    function __toString() {
        return $this->getName() . ' [' . $this->getId() . ']';
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
     * Set name
     *
     * @param string $name
     *
     * @return Article
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set marque
     *
     * @param string $marque
     *
     * @return Article
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Article
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return Article
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set isSoldOut
     *
     * @param boolean $isSoldOut
     *
     * @return Article
     */
    public function setIsSoldOut($isSoldOut)
    {
        $this->isSoldOut = $isSoldOut;

        return $this;
    }

    /**
     * Get isSoldOut
     *
     * @return boolean
     */
    public function getIsSoldOut()
    {
        return $this->isSoldOut;
    }

    /**
     * @return bool
     */
    public function isIsDisabled()
    {
        return $this->isDisabled;
    }

    /**
     * @param bool $isDisabled
     * @return Article
     */
    public function setIsDisabled($isDisabled)
    {
        $this->isDisabled = $isDisabled;
        return $this;
    }

    /**
     * Set category
     *
     * @param Category $category
     *
     * @return Article
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param ArrayCollection $orderLines
     * @return Article
     */
    private function setOrderLines($orderLines)
    {
        $this->orderLines = $orderLines;
        return $this;
    }

    /**
     * Add orderLine
     *
     * @param OrderLine $orderLine
     *
     * @return Article
     */
    public function addOrderLine(OrderLine $orderLine)
    {
        $this->orderLines[] = $orderLine;

        return $this;
    }

    /**
     * Remove orderLine
     *
     * @param OrderLine $orderLine
     */
    public function removeOrderLine(OrderLine $orderLine)
    {
        $this->orderLines->removeElement($orderLine);
    }

    /**
     * Get orderLines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderLines()
    {
        return $this->orderLines;
    }
}
