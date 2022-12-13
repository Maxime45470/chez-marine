<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\PhotoGroupeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffichagePhotoGroupeController extends AbstractController
{
    #[Route('/affichage/photo/groupe', name: 'app_affichage_photo_groupe')]
    public function AfficherPhotoGroupe(PhotoGroupeRepository $photoGroupeRepository,Request $request,CategoriesRepository $categories): Response
    {
        // je recupere les photos de la base de données en fonction de la categorie
        $categ = $categories->findby(['id' => $request->get('id')]);
        $photoGroupe = $photoGroupeRepository->findby(['categories' => $categ]);
        return $this->render('affichage_photo_groupe/index.html.twig', [
            'photoGroupe' => $photoGroupe,
        
        ]);
    }
}
