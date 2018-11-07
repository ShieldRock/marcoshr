<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {
    /**
     * Function to return home view
     * @return Response
     * @throws \Exception
     * @Route("/", name="home")
     */
    public function home() {
        $numberList = [1, 2, 3, 4, 5];

        return $this->render('home/home.html.twig', [
            'numberList' => $numberList,
        ]);
    }
}
