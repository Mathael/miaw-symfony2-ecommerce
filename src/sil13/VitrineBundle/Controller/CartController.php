<?php
/**
 * @author LEBOC Philippe.
 * Date: 12/12/2016
 * Time: 23:41
 */
namespace sil13\VitrineBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use sil13\VitrineBundle\Entity\Article;
use sil13\VitrineBundle\Entity\BuyOrder;
use sil13\VitrineBundle\Entity\OrderLine;
use sil13\VitrineBundle\Model\Cart;
use sil13\VitrineBundle\Model\holder\ArticleHolder;
use sil13\VitrineBundle\Repository\ArticleRepository;
use sil13\VitrineBundle\Utils\Constants;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    /**
     * @param Request $request
     * @param Boolean $small
     * @return Response
     */
    public function showAction(Request $request, $small) {
        $session = $request->getSession();

        $total = 0;
        /** @var Cart $cart */
        $cart = $session->get(Constants::CART, new Cart());
        /** @var ArticleHolder[] $cartRender */
        $articleHolder = [];

        if(!$cart->isEmpty()) {
            $em = $this->getDoctrine()->getRepository('sil13VitrineBundle:Article');

            foreach ($cart->getContainer() as $articleId => $quantity) {
                // Récupère l'article depuis la base de données
                /** @var Article $order */
                $article = $em->find($articleId);

                if ($article)
                {
                    // Ajout des informations de l'article et de sa quantité dans un tableau destiné à la vue
                    $holder = new ArticleHolder();
                    $holder
                        ->setArticle($article)
                        ->setQuantity($quantity);

                    $articleHolder[] = $holder;

                    // Calcul du coût total du panier courant
                    $total += $article->getPrice() * $quantity;
                }
            }
        }

        return $this->render($small ? '@sil13Vitrine/cart/cart_small.html.twig' : '@sil13Vitrine/cart/cart.html.twig', [
            'cart' => $articleHolder,
            'total' => $total
        ]);
    }

    /**
     * @param Request $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function removeAction(Request $request, Article $article) {
        $session = $request->getSession();

        /** @var Cart $cart */
        $cart = $session->get(Constants::CART, new Cart());

        if(!$cart->isEmpty()) {
            $cart->delete($article->getId());
            $session->set(Constants::CART, $cart);
        }

        return $this->redirectToRoute('show_cart');
    }

    /**
     * @param Request $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function addAction(Request $request, Article $article) {
        $quantity = $request->get('quantity', 1);

        $session = $request->getSession();

        /** @var Cart $cart */
        $cart = $session->get(Constants::CART, new Cart());
        $cart->add($article->getId(), $quantity);

        $session->set(Constants::CART, $cart);

        return $this->redirectToRoute('article_index');
    }

    /**
     * @param Request $request
     * @param Article $article
     * @param $quantity
     * @return RedirectResponse
     */
    public function removeAmountAction(Request $request, Article $article, $quantity) {
        $session = $request->getSession();

        /** @var Cart $cart */
        $cart = $session->get(Constants::CART, new Cart());

        if(!$cart->isEmpty()) {
            $cart->sub($article->getId(), $quantity);
            $session->set(Constants::CART, $cart);
        }

        return $this->redirectToRoute('article_index');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function validateAction(Request $request) {
        $session = $request->getSession();

        /** @var Cart $cart */
        $cart = $session->get(Constants::CART, new Cart());

        if($cart->isEmpty()) return $this->redirectToRoute('article_index');

        $em = $this->getDoctrine()->getManager();
        /** @var ArticleRepository $articleManager */
        $articleManager = $em->getRepository('sil13VitrineBundle:Article');

        // Create order with related informations
        $order = new BuyOrder();

        // Create all order lines
        $lines = new ArrayCollection();
        foreach ($cart->getContainer() as $articleId => $quantity) {
            /** @var Article $article */
            $article = $articleManager->find($articleId);
            if($article != null)
            {
                $orderLine = new OrderLine();
                $orderLine
                    ->setArticle($article)
                    ->setCount($quantity)
                    ->setBuyOrder($order)
                    ->setPrice($article->getPrice());

                $lines->add($orderLine);
            }
        }

        // Persist the BuyOrder
        $order
            ->setValidateDate(new \DateTime())
            ->setOrderLines($lines)
            ->setUser($this->getUser());

        $em->persist($order);
        $em->flush();

        // Reset cart
        $cart->clear();
        $session->set(Constants::CART, $cart);

        return $this->redirectToRoute('me_mycart');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function clearAction(Request $request) {
        $session = $request->getSession();
        $session->set(Constants::CART, new Cart());

        return $this->redirectToRoute('show_cart');
    }
}