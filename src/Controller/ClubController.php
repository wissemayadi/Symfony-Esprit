<?php

namespace App\Controller;

use App\Entity\Club;
use App\Form\ClubType;
use App\Repository\ClubRepository;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    /**
     * @Route("/club", name="club")
     */
    public function index(): Response
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }
    /**
     * @Route("/listclub", name="listclub")
     */
    public function listclub(){
        $clubs= $this->getDoctrine()->getRepository(Club::class)->findAll();
     return $this->render("club/listClub.html.twig",array("tabClub"=>$clubs));
    }
    /**
     * @Route("/showClub/{id}", name="showClub")
     */
    public function showClub($id){
    $club=$this->getDoctrine()->getRepository(Club::class)->find($id);
    return $this->render("club/showClub.html.twig",array("club"=>$club));
    }
    /**
     * @Route("/deleteClub/{id}", name="removeClub")
     */
    public function deleteClub($id){
        $em=$this->getDoctrine()->getManager();
        $club=$this->getDoctrine()->getRepository(Club::class)->find($id);
        $em->remove($club);
        $em->flush();
        return $this->redirectToRoute("listclub");
    }
    /**
     * @Route("/addclub", name="addClub")
     */
    public  function addClub(\Symfony\Component\HttpFoundation\Request $request){
        $club=new Club();
        $form=$this->createForm(ClubType::class,$club);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($club);
            $em->flush();
            return $this->redirectToRoute("listclub");

        }
        return $this->render("club/add.html.twig",array('formulaireClub'=>$form->createView()));
    }
    /**
     * @Route("/updateclub/{id}", name="updateClub")
     */
    public function updateClub(ClubRepository $repository ,$id, \Symfony\Component\HttpFoundation\Request $request){
        $club=$repository->find($id);
        $form=$this->createForm(ClubType::class,$club);
        $form->handleRequest($request);
     if($form->isSubmitted()){
         $em=$this->getDoctrine()->getManager();
         $em->flush();
         return $this->redirectToRoute("listclub");
     }

        return $this->render("club/update.html.twig",array('formulaireUpdate'=>$form->createView()));

    }
}
