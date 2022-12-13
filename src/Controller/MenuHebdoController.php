<?php

namespace App\Controller;

use App\Repository\RepasHebdoRepository;
use Doctrine\ORM\Mapping\OrderBy;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('menu')]
class MenuHebdoController extends AbstractController
{
    #[Route('/hebdo', name: 'app_menu_hebdo')]
    public function afficheMenu(RepasHebdoRepository $repasHebdoRepository): Response
    {
        $repasHebdo = $repasHebdoRepository->findBy([], ['debutSem' => 'ASC'], 1);
        return $this->render('menu_hebdo/index.html.twig', [
            'repasHebdo' => $repasHebdo,
        ]);
    }
}
