<?php

namespace App\Controller;

use App\Entity\Club;
use App\Entity\Proprietaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProprietaireController extends AbstractController
{
    /**
     * @Route("/proprietaire", name="proprietaire")
     */
    public function index(): Response
    {
        return $this->render('proprietaire/index.html.twig', [
            'controller_name' => 'ProprietaireController',
        ]);
    }
    /**
     * @Route("/deleteProp/{id}", name="removeProp")
     */
    public function deletePro($id){
        $em=$this->getDoctrine()->getManager();
        $prop=$this->getDoctrine()->getRepository(Proprietaire::class)->find($id);
        $em->remove($prop);
        $em->flush();
        //return $this->redirectToRoute("removeProp");
       return $this->render("proprietaire/list.html.twig");
    }
    /**
     * @Route("/listProp/{id}", name="listeProp")
     */
   public function listProp(){

    }
}
