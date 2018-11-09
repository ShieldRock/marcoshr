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

class UtilsController extends AbstractController {
    /**
     * @Route("/config/postit", name="config/postit")
     * @Method({"Post"})
     * @param Request $request
     * @return JsonResponse
     */
    public function configPostit(Request $request) {
        if ($request->isXmlHttpRequest()) {
            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            //$em = $this->getDoctrine()->getManager();
            //$posts = $em->getRepository('AppBundle:Post')->findAll();

            $result = array(
                "postit-news" => true,
                "postit-twitter" => true,
            );

            $result[$request->get("postItName")] = filter_var($request->get("isVisible"), FILTER_VALIDATE_BOOLEAN);
            $this->get('session')->set('postIts', $result);

            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array(
                'response' => 'success',
                'result' => $serializer->serialize($result, 'json'),
            ));

            return $response;
        }
    }
}