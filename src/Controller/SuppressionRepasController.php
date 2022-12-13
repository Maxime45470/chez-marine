<?php

namespace App\Controller;

use App\Entity\RepasHebdo;
use App\Repository\RepasHebdoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuppressionRepasController extends AbstractController
{
    #[Route('/suppression/repas', name: 'app_suppression_repas')]
    public function afficheMenu(RepasHebdoRepository $repasHebdoRepository): Response
    {
        $repasHebdo = $repasHebdoRepository->findAll();
        return $this->render('suppression_repas/index.html.twig', [
            'repasHebdo' => $repasHebdo,
        ]);
    }

    #[Route('/{id}', name: 'app_repas_hebdo_delete', methods: ['POST'])]
    public function delete(Request $request, RepasHebdo $repasHebdo, RepasHebdoRepository $repasHebdoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$repasHebdo->getId(), $request->request->get('_token'))) {
            $repasHebdoRepository->remove($repasHebdo, true);
        }

        return $this->redirectToRoute('app_suppression_repas', [], Response::HTTP_SEE_OTHER);
    }
}
