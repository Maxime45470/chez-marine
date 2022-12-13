<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffichageParentController extends AbstractController
{
    #[Route('/affichage/parent', name: 'app_affichage_parent')]
    public function index(UsersRepository $usersRepository): Response
    {
        return $this->render('/affichage_parent/index.html.twig', [
            'users' => $usersRepository->findAll(),
        ]);
    }
}
