<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class EmailController extends AbstractController {
    /**
     * @Route("/email/emailSender", name="email/emailSender")
     * @Method({"Post"})
     * @param Request $request
     * @return JsonResponse
     */
    public function emailSender(Request $request) {
        if ($request->isXmlHttpRequest()) {
            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            //$em = $this->getDoctrine()->getManager();
            //$posts = $em->getRepository('AppBundle:Post')->findAll();
            $posts = false;
            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'posts' => $serializer->serialize($posts, 'json')
            ));

            return $response;
        }
    }
}
