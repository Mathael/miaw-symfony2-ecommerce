<?php

namespace sil13\VitrineBundle\Controller;

use sil13\VitrineBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Article controller.
 */
class ArticleController extends Controller
{
    /**
     * Lists all article entities.
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('sil13VitrineBundle:Article')->findAll();

        return $this->render('sil13VitrineBundle:article:index.html.twig', array(
            'articles' => $articles,
        ));
    }

    /**
     * Finds and displays a article entity.
     * @param Article $article
     * @return Response
     */
    public function showAction(Article $article)
    {
        return $this->render('sil13VitrineBundle:article:show.html.twig', array(
            'article' => $article,
        ));
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function searchAction(Request $request) {
        $str = $request->get('article-srch', null);

        if(empty($str)) return $this->redirectToRoute('article_index');

        $em = $this->getDoctrine()->getRepository('sil13VitrineBundle:Article');

        $articles = $em->findArticlesLikeName($str);

        return $this->render('sil13VitrineBundle:article:index.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @return Response
     */
    public function showMostWantedArticlesAction() {
        $em = $this->getDoctrine()->getRepository('sil13VitrineBundle:OrderLine');
        $data = $em->findMostWantedArticles();
        $articles = [];

        // C'est moche mais je suis mauvais en SQL ! =D
        foreach($data as $value) $articles[] = $value[0];

        return $this->render('sil13VitrineBundle:article:index.html.twig', [
            'articles' => $articles
        ]);
    }
}
