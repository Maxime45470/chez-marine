<?php

namespace App\Controller;

use App\Repository\EvenementRepository;
use App\Repository\InfoRepository;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function AffichageEvenement(EvenementRepository $evenementRepository,InfoRepository $infoRepository, UsersRepository $usersRepository): Response
    {
        $user = $usersRepository->findby(['id' => $this->getUser()]);
        $info = $infoRepository->findby (['info' => $user] ,['id' => 'DESC'], 1);
        $evenement = $evenementRepository->findAll();
        return $this->render('accueil/index.html.twig', [
            'evenement' => $evenement,
            'info' => $info,
            'users' => $user,
        ]);
    }
}