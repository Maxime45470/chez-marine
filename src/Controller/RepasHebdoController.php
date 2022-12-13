<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\RepasHebdo;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Form\RepasHebdoType;
use Doctrine\Persistence\ManagerRegistry;

class RepasHebdoController extends AbstractController
{
    #[Route('/repas/hebdo', name: 'app_repas_hebdo')]
    public function createAction(ManagerRegistry $doctrine, Request $request, EntityManagerInterface $entityManager): Response
    {
        $repasHebdo = new RepasHebdo();
        $form = $this->createForm(RepasHebdoType::class, $repasHebdo);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($repasHebdo);
            $entityManager->flush();
            return $this->redirectToRoute('app_accueil');
        }
        return $this->render('repas_hebdo/index.html.twig', [
            'repasHebdo' => $form->createView(),
        ]);
    }
    
   

        
}
