<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('compte')]
class MonCompteController extends AbstractController
{
    #[Route('/mon/compte', name: 'app_mon_compte')]
    public function index(UsersRepository $usersRepository): Response
    {
        return $this->render('/mon_compte/index.html.twig', [
            'users' => $usersRepository->findAll(),
        ]);
    }
    #[Route('/{id}', name: 'app_delete', methods: ['POST'])]
    public function delete(Request $request, Users $user, UsersRepository $usersRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $usersRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_au_revoir', [], Response::HTTP_SEE_OTHER);
    }
}
