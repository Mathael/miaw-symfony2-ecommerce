<?php

namespace sil13\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * Controller destiné à l'installation du projet.
     * Il est évident que pour une question de sécurité, cette route doit être désactivé/supprimée une fois l'installation effectuée.
     * @return Response
     */
    public function indexAction()
    {
        $path = realpath($this->get('kernel')->getRootDir() . '/../src/sil13/VitrineBundle/sql/sil13.sql');
        if(!empty($path))
        {
            $sql = file_get_contents($path);
            $stmt = $this->container->get('doctrine.orm.entity_manager')->getConnection()->prepare($sql);
            $stmt->execute();
        }

        return $this->redirectToRoute('article_index');
    }
}
