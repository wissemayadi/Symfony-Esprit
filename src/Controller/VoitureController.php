<?php

namespace App\Controller;

use App\Entity\Club;
use App\Entity\Proprietaire;
use App\Entity\Voiture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoitureController extends AbstractController
{
    /**
     * @Route("/voiture", name="voiture")
     */
    public function index(): Response
    {
        return $this->render('voiture/index.html.twig', [
            'controller_name' => 'VoitureController',
        ]);
    }


    /**
     * @Route("/listvoiture", name="listvoiture")
     */
    public function listvoiture(){
        $voiture= $this->getDoctrine()->getRepository(Voiture::class)->findAll();
        return $this->render("voiture/list.html.twig",array("tabVoiture"=>$voiture
        ,"marqueVoiture"=>$voiture)
        );
    }
    /**
     * @Route("/deleteVoiture/{id}", name="deleteVoiture")
     */
    public function deleteVoiture($id){
        $em=$this->getDoctrine()->getManager();
        $prop=$this->getDoctrine()->getRepository(Voiture::class)->find($id);
        $em->remove($prop);
        $em->flush();

        return $this->redirectToRoute("listvoiture");
    }
    /**
     * @Route("/marqueVoiture", name="marqueVoiture")
     */
    public function marqueVoiture(){
        $marque=$this->getDoctrine()->getRepository(Voiture::class);
        return $this->render("voiture/marque.html.twig",array("marqueVoiture"=>$marque));
    }
}
