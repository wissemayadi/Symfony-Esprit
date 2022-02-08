<?php

namespace App\Controller;

use App\Entity\Club;
use App\Form\StudentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Student;
class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="student")
     */
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    /**
     * @Route("/listStudent",name="students")
     */
    public function listStudent()
    {
        $students= $this->getDoctrine()->getRepository(Student::class)->findAll();
        return $this->render("student/list.html.twig",array('tabStudents'=>$students));
    }
    /**
     * @Route("/showStudent/{id}", name="showStudent")
     */
    public function showStudent($id){
        $student=$this->getDoctrine()->getRepository(Student::class)->find($id);
        return $this->render("student/showStudent.html.twig",array("student"=>$student));
    }
    /**
     * @Route("/deleteStudent/{id}", name="deleteStudent")
     */
    public function deleteStudent($id){
      $em=$this->getDoctrine()->getManager();
      $student=$this->getDoctrine()->getRepository(Student::class)->find($id);
      $em->remove($student);
      $em->flush();
      return $this->redirectToRoute("students");
    }
    /**
     * @Route("/addStudent", name="addStudent")
     */
    public function addStudent(Request $request){
     $student=new Student();
     $form=$this->createForm(StudentType::class,$student);
     $form->handleRequest($request);
     if($form->isSubmitted()){
     $em=$this->getDoctrine()->getManager();
     $em->persist($student);
     $em->flush();
     return $this->redirectToRoute("students");
     }
   return $this->render("student/add.html.twig",array('formStudent'=>$form->createView()));
    }
}
