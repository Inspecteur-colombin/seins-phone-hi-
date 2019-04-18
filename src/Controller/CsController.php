<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\CollegeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\College;



class CsController extends AbstractController
{

    /**
     * @Route("/cs", name="cs")
     */
    public function index(Request $request, ObjectManager $manager)
    {


        
        
        $college = new College();


        $form = $this->createFormBuilder($college)
                    ->add('nom', EntityType::class, [

                        'class' => College::class,

                        'choice_label' => 'nom',
                    ])
                    ->getForm();
        
        
        $form->handleRequest($request);

        dump($college);




        return $this->render('cs/index.html.twig', [
            'controller_name' => 'CsController',
            'formCollege' => $form->createView()
        ]);
    }
}
