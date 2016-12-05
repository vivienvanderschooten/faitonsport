<?php
/**
 * Created by PhpStorm.
 * User: vivienvanderschooten
 * Date: 10/11/2016
 * Time: 14:08
 */

namespace AppBundle\Controller;


use AppBundle\Entity\UserAdmin;
use AppBundle\Form\RechercherAmisType;
use AppBundle\Form\UserAdminType;
use AppBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    /**
     *
     * @Route("/resultatRecherche", name="resultatRecherche")
     * @param Request $request
     *
     * @return Response
     */
    public function addAmisAction(Request $request){

        $amis = array();
        $formAmis = $this->createForm(RechercherAmisType::class,$amis);
        $formAmis->handleRequest($request);

        if($formAmis->isSubmitted()){
            $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:UserAdmin');
            $users = $repository->findByName($formAmis->getData()['recherche']);


            //$vivien = $this->getUser();
            return $this->render('rechercheAmis.html.twig', array('users' =>$users));
        }
        return $this->render('recherche.html.twig', array('form' => $formAmis->createView()));
    }


}