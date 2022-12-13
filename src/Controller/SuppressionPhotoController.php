<?php

namespace App\Controller;

use App\Entity\PhotoGroupe;
use App\Repository\PhotoGroupeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/suppression/photo')]
class SuppressionPhotoController extends AbstractController
{
    #[Route('/affichage', name: 'app_suppression_photo')]
    public function AfficherPhotoGroupe(PhotoGroupeRepository $photoGroupeRepository): Response
    {
        $photoGroupe = $photoGroupeRepository->findAll();
        return $this->render('suppression_photo/index.html.twig', [
            'photoGroupe' => $photoGroupe,
        ]);
    }
    #[Route('/{id}', name: 'app_photo_delete', methods: ['POST'])]
    public function delete(Request $request, PhotoGroupe $photoGroupe, PhotoGroupeRepository $photoGroupeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$photoGroupe->getId(), $request->request->get('_token'))) {
            $photoGroupeRepository->remove($photoGroupe, true);
        }

        return $this->redirectToRoute('app_suppression_photo', [], Response::HTTP_SEE_OTHER);
    }
}
