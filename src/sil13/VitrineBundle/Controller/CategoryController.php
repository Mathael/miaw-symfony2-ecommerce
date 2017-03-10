<?php

namespace sil13\VitrineBundle\Controller;

use sil13\VitrineBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Category controller.
 */
class CategoryController extends Controller
{
    /**
     * Lists all category entities.
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('sil13VitrineBundle:Category')->findAll();

        return $this->render('sil13VitrineBundle:category:index.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * Finds and displays a category entity.
     * @param Category $category
     * @return Response
     */
    public function showAction(Category $category)
    {
        return $this->render('sil13VitrineBundle:article:index.html.twig', [
            'articles' => $category->getArticles(),
        ]);
    }
}
