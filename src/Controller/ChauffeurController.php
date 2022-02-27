<?php

namespace App\Controller;

use App\Entity\Chauffeur;
use App\Entity\Voiture;
use App\Form\ChauffeurType;
use App\Form\ClubType;
use App\Repository\ChauffeurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChauffeurController extends AbstractController
{
    /**
     * @Route("/chauffeur", name="chauffeur")
     */
    public function index(): Response
    {
        return $this->render('chauffeur/index.html.twig', [
            'controller_name' => 'ChauffeurController',
        ]);
    }
    /**
     * @Route("/listchauffeur", name="chauffeur")
     */

   public function listChouffeur(){
       $chauffeur= $this->getDoctrine()->getRepository(Chauffeur::class)->findAll();
       return $this->render("chauffeur/list.html.twig",array("tabChauffeur"=>$chauffeur));
   }
    /**
     * @Route("/addchauffeur", name="addchauffeur")
     */
   public  function addChauffeur(\Symfony\Component\HttpFoundation\Request $request){
        $chauffeur=new Chauffeur();
        $form=$this->createForm(ChauffeurType::class);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($chauffeur);
            $em->flush();
            return $this->redirectToRoute("chauffeur");

        }
        return $this->render("chauffeur/add.html.twig",array('formulaireChauffeur'=>$form->createView()));
    }
    /**
     * @Route("/updatechauffeur/{id}", name="updateChauffeur")
     */
    public function updateChauffeur(ChauffeurRepository $repository ,$id, \Symfony\Component\HttpFoundation\Request $request){
        $chauffeur=$repository->find($id);
        $form=$this->createForm(ChauffeurType::class,$chauffeur);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("chauffeur");
        }

        return $this->render("chauffeur/update.html.twig",array('formulaireUpdate'=>$form->createView()));

    }
}
