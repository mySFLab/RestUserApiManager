<?php
/**
 * Created by PhpStorm.
 * User: laurentbrau
 * Date: 17/02/16
 * Time: 14:02
 */

namespace KnpLabRestApiBundle\Controller\Api;


use KnpLabRestApiBundle\Entity\Programmer;
use KnpLabRestApiBundle\Form\ProgrammerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Acl\Exception\Exception;


class ProgrammerController extends Controller {

    /**
     * @Route("/programmers/", name="programmer_list")
     * @Method("GET")
     */
    public function programmerLisAction()
    {
        $em = $this->getDoctrine()->getManager();
        $programmers = $em->getRepository("KnpLabRestApiBundle:Programmer")->findAll();
        if (empty($programmers)) {
            throw new NotFoundHttpException("Aucun résultat trouvé dans notre base");
        }
        $allProgrammers = ['programmer' => []];
        foreach ($programmers as $key => $programmer) {
            $data = [];
            $result = $this->fillArrayFromEntity($data, $programmer);
            if ($result) {
                $allProgrammers['programmer'][] = $data;
            } else {
                throw new \ErrorException('The Array filling has met a problem.');
            }
        }

        $reponse = new JsonResponse($allProgrammers);

        return $reponse;
    }

    /**
     * @Route("/programmers/", name="prog")
     * @Method("POST")
     */
    public function newAction(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data, true);
        $nickname = $data['nickname'];
        $avatarNumber = $data['avatarNumber'];
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("LabRestBundle:User")
                        ->findOneBy(array(
                            'id' => 1
                        ));

        $programmer = new Programmer();
        $programmer->setUser($user);
        $em->persist($programmer);
        $em->flush();

        $form = $this->createForm(new ProgrammerType(), $programmer);
//        $form->handleRequest($request);
        $form->submit($data);

        $response = new JsonResponse($data, 201);
        $response->headers->set('Location', '/users');

        return $response;
    }

    /**
     * @Route("/programmer/{nickname}", name="show_programmer")
     * @Method("GET")
     */
    public function showAction($nickname)
    {
        $em = $this->getDoctrine()->getManager();
        $programmer = $em->getRepository("KnpLabRestApiBundle:Programmer")->findOneBy(array('nickname' => $nickname));
        $dataProgrammer = [];
        if (!empty($programmer)) {
            // --- Fill the array return in json stream ---
            $this->fillArrayFromEntity($dataProgrammer, $programmer);
        } else {
            throw new NotFoundHttpException('Programmer not found');
        }

        // ==== Set the response return in json stream ====
        $response = new Response(json_encode($dataProgrammer), 200);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    private function fillArrayFromEntity(array &$data, Programmer $programmer)
    {
        if (empty($data)) {
            $data = [
                "nickname"       => $programmer->getNickname(),
                "avatarNumber"   => $programmer->getAvatarNumber(),
                "tagLine"        => $programmer->getTagLine(),
                "powerFullLevel" => $programmer->getPowerfulLevel()
            ];
        } else {
                throw new \NotFoundHttpException("This array is not empty");
        }

        return true;
    }
}