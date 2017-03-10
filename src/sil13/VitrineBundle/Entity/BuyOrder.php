<?php

namespace sil13\VitrineBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * BuyOrder
 */
class BuyOrder
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $validateDate;

    /**
     * @var Collection
     */
    private $orderLines;

    /**
     * @var User
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderLines = new ArrayCollection();
    }

    function __toString() {
        return $this->getId() . ' [' . count($this->getOrderLines()) . ' lignes de commande]';
    }

    function getTotalPrice() {
        $total = 0;
        /** @var OrderLine $line */
        foreach ($this->getOrderLines() as $line){
            $total += $line->getPrice();
        }
        return $total;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set validateDate
     *
     * @param \DateTime $validateDate
     *
     * @return BuyOrder
     */
    public function setValidateDate($validateDate)
    {
        $this->validateDate = $validateDate;

        return $this;
    }

    /**
     * Get validateDate
     *
     * @return \DateTime
     */
    public function getValidateDate()
    {
        return $this->validateDate;
    }

    /**
     * Add orderLine
     *
     * @param OrderLine $orderLine
     *
     * @return BuyOrder
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
     * @return Collection
     */
    public function getOrderLines()
    {
        return $this->orderLines;
    }

    /**
     * @param Collection $orderLines
     * @return BuyOrder
     */
    public function setOrderLines($orderLines)
    {
        $this->orderLines = $orderLines;
        return $this;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return BuyOrder
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
