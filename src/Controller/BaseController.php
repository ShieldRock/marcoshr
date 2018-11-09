<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController {
    public function initialize() {
        $session = new Session();
        $session->start();

        if ($this->get('session')->get('postIts') == null) {
            $session->set('postIts',
                array(
                    "postit-news" => true,
                    "postit-twitter" => true,
                )
            );
        }

        return $session;
    }
}