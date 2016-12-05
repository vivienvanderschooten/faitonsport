<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Publication;
use AppBundle\Form\PublicationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function Accueil(Request $request)
    {

        $publication = new Publication();
        $formPublication = $this->createForm(PublicationType::class,$publication);

        $formPublication->handleRequest($request);

        if($formPublication->isSubmitted()&& $formPublication->isValid()){

            $publication->setUser($this->getUser());
            $publication->setCreation($this->dateNow());
            $em = $this->getDoctrine()->getManager();
            $em->persist($publication);
            $em->flush();
            return $this->redirect($this->generateUrl('homepage'));
        }

        $formviewPublication = $formPublication->createView();
        
        $em = $this->getDoctrine()->getRepository('AppBundle:Publication');
        $publications = $em->findByUser($this->getUser()->getId(),array('creation' => 'DESC'));
        
        return $this->render("accueil.html.twig",array("formviewPublication"=>$formviewPublication,"publications"=>$publications));

    }


    public function dateNow(){
        $date = new \DateTime("now");
        return $date;
    }

}
