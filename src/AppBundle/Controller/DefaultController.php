<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController;

class DefaultController extends FOSRestController
{
    /**
     * @Route("/test", name="homepage2")
     * @return array
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("LabRestBundle:User")->findAll();
        // replace this example code with whatever you need
        $view = $this->view($users, 200)
                        ->setTemplate("LabRestBundle:Default:index.html.twig")
                        ->setTemplateVar('users')
                        ->setFormat('json')
        ;

        return $this->handleView($view);
    }
}
