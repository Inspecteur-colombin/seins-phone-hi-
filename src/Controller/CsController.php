<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\CsSearch;
use App\Form\CsSearchType;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\CollegeRepository;
use Symfony\Component\HttpFoundation\Response;

class CsController extends AbstractController
{

    /**
     * @var CollegeRepository
     */
    private $repository;

    public function __construct(CollegeRepository $repository)
    {
        $this->repository = $repository; 
    }

    /**
     * @Route("/cs", name="cs")
     * @return Response
     */
    public function index(): Response
    {
        $search = new CsSearch();
        $form = $this->createForm(CsSearchType::class, $search);
        

        

        return $this->render('cs/index.html.twig', [
            'controller_name' => 'CsController',
            'form' => $form->createView()
        ]);
    }
}
