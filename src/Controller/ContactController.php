<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController {
    /**
     * Function to return contact view
     * @return Response
     * @throws \Exception
     * @Route("/contact", name="contact")
     */
    public function contact() {
        return $this->render('contact/contact.html.twig');
    }

    /**
     * Function to return email view
     * @return Response
     * @throws \Exception
     * @Route("/email", name="email")
     */
    public function email() {
        return $this->render('email/email.html.twig');
    }

    /**
     * Function to send an email
     * @throws \Exception
     * @Route("/emailSender", name="emailSender")
     */
    public function emailSender() {

        //return $this->render('email/email.html.twig');
    }

    /**
     * Function to return blog slug view
     * @param $slug
     * @return Response
     * @Route("/blog/{slug<\d+>?1}", name="blog_show")
     */
    //public function show($slug) {
    //    // $slug will equal the dynamic part of the URL. e.g. at /blog/yay-routing, then $slug='yay-routing'
    //    return $this->render('lucky/number.html.twig', [
    //        'number' => $slug,
    //    ]);
    //}
}
