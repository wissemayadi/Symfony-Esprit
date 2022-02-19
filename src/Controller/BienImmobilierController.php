<?php

namespace App\Controller;

use App\Entity\BienImmobilier;
use App\Entity\Club;
use App\Form\BienImmobilierType;
use App\Form\ClubType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BienImmobilierController extends AbstractController
{
    /**
     * @Route("/bien/immobilier", name="bien_immobilier")
     */
    public function index(): Response
    {
        return $this->render('bien_immobilier/index.html.twig', [
            'controller_name' => 'BienImmobilierController',
        ]);
    }
    /**
     * @Route("/addBien", name="bienimmobilier")
     */
    public  function addImmo(\Symfony\Component\HttpFoundation\Request $request){
        $bien=new BienImmobilier();
        $form=$this->createForm(BienImmobilierType::class,$bien->setEtat("disponible"));
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($bien);
            $em->flush();
            return $this->redirectToRoute("bienimmobilier");

        }
        return $this->render("bien_immobilier/add.html.twig",array('formulaireBien'=>$form->createView()));
    }

}
