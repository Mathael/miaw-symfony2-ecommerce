<?php

namespace sil13\VitrineBundle\Controller;

use sil13\VitrineBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function myCartAction()
    {
        /** @var User $user */
        $user = $this->getUser();

        return $this->render('sil13VitrineBundle:user:my-cart.html.twig', [
            'buyOrders' => $user->getBuyOrders()
        ]);
    }
}
