<?php

namespace App\Controller;

use App\Repository\PhotoGroupeRepository;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PhotoIndivController extends AbstractController
{
    #[Route('/photo/indiv', name: 'app_photo_indiv')]
    public function index(UsersRepository $usersRepository,PhotoGroupeRepository $photoGroupeRepository): Response
    {
        $user = $usersRepository->findby(['id' => $this->getUser()]);
        $photo = $photoGroupeRepository->findby (['parent' => $user] ,['id' => 'DESC']);
        return $this->render('photo_indiv/index.html.twig', [
            'photos' => $photo,
            'users' => $user,
        ]);
      
    }
}
