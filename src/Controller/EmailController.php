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
     * Function to return email view
     * @throws \Exception
     * @Route("/email", name="email")
     */
    public function emailView() {
        return $this->render('email/email.html.twig', array(
            'postIts' => $this->get('session')->get('postIts'),
        ));
    }

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
            $sendResult = false;

            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'result' => $serializer->serialize($sendResult, 'json'),
                'postIts' => $this->get('session')->get('postIts'),
            ));

            return $response;
        }
    }
}
