<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PhotoGroupe;
use App\Form\PhotoGroupeType;

#[Route('/photo')]
class PhotoGroupeController extends AbstractController
{
    #[Route('/groupe', name: 'app_photo_groupe')]
    public function index( Request $request, EntityManagerInterface $entityManager): Response
    {
        $photoGroupe = new PhotoGroupe();
        $form = $this->createForm(PhotoGroupeType::class, $photoGroupe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // on recupere les photos
            $photo = $form->get('photo')->getData();
            // on genere un nouveau nom de fichier
            $fichier = md5(uniqid()) . '.' . $photo->guessExtension();
            // on copie le fichier dans le dossier uploads
            $photo->move(
                $this->getParameter('image_directory'),
                $fichier
            );
            // on stocke le nom de fichier (photo) en BDD (son nom)
            $photoGroupe->setPhoto($fichier);

            $entityManager->persist($photoGroupe);
            $entityManager->flush();
            return $this->redirectToRoute('app_photo_groupe');
        }
        return $this->render('photo_groupe/index.html.twig', [
            'photoGroupe' => $form->createView(),
        ]);
    }
}
