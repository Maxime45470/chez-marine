<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuppressionCompteController extends AbstractController
{
    #[Route('/suppression/compte', name: 'app_suppression_compte')]
    public function index(): Response
    {
        return $this->render('suppression_compte/index.html.twig', [
            'controller_name' => 'SuppressionCompteController',
        ]);
    }
}
