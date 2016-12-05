<?php
/**
 * Created by PhpStorm.
 * User: vivienvanderschooten
 * Date: 09/11/2016
 * Time: 17:23
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Publication;
use AppBundle\Form\PublicationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PublicationController extends Controller
{


    /**
     * @Route("/publication", name="publication")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addPublication(Request $request){

        $publication = new Publication();
        $form = $this->createForm(PublicationType::class,$publication);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($publication);
            $em->flush();

            return new Response("publication ajouté");
        }

        $formview = $form->createView();

        return $this->render("accueil.html.twig",array("form"=>$formview));

    }

}