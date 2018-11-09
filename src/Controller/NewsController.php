<?php

namespace App\Controller;

use App\Model\News;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends AbstractController {
    /**
     * Function to return blog list view
     * @return Response
     * @throws \Exception
     * @Route("/news", name="news_list")
     */
    public function list() {
        $newsTemplate = new News('Título De Noticia ', null, 'Mensaje que aparece en la previsualización de la noticia', '/');
        $newsTemplate->setIndex(0);

        return $this->render('news/news-template.html.twig', [
            'newsTemplate' => $newsTemplate,
            'postIts' => $this->get('session')->get('postIts'),
        ]);
    }
}
