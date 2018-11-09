<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController {
    /**
     * Function to return home view
     * @return Response
     * @throws \Exception
     * @Route("/", name="home")
     */
    public function home() {
        $session = new Session();
        $session->start();

        if ($this->get('session')->get('postIts') == null) {
            $this->get('session')->set('postIts',
                array(
                    "postit-news" => true,
                    "postit-twitter" => true,
                )
            );
        }

        return $this->render('home/home.html.twig',
            array(
                'postIts' => $this->get('session')->get('postIts'),
                'session' => $this->get('session'),
            )
        );
    }
}
