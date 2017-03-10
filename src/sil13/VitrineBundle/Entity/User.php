<?php
/**
 * @author LEBOC Philippe.
 * Date: 30/11/2016
 * Time: 09:16
 */
namespace sil13\VitrineBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

class User extends BaseUser
{
    protected $id;

    /**
     * @var ArrayCollection $buyOrders
     */
    private $buyOrders;

    public function __construct() {
        parent::__construct();
        $this->setBuyOrders(new ArrayCollection());
    }

    /**
     * @return ArrayCollection
     */
    public function getBuyOrders()
    {
        return $this->buyOrders;
    }

    /**
     * @param ArrayCollection $buyOrders
     * @return User
     */
    public function setBuyOrders($buyOrders)
    {
        $this->buyOrders = $buyOrders;
        return $this;
    }


}
