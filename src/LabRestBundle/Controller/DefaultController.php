<?php

namespace LabRestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\Annotations\View;

class DefaultController extends Controller
{
    /**
     * @return array
     * @View()
     */
    public function getUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("LabRestBundle:User")->findAll();
        // replace this example code with whatever you need

        return array('users' => $users[0]);
//
//        $em = $this->getDoctrine()->getManager();
//        $users = $em->getRepository("LabRestBundle:User")->findAll();
//        // replace this example code with whatever you need
//        $view = $this->view($users, 200)
//            ->setTemplate("LabRestBundle:Default:index.html.twig")
//            ->setTemplateVar('users')
//            ->setFormat('json')
//        ;
//
//        return $this->handleView($view);
    }
}
