<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuppressionParentController extends AbstractController
{
    #[Route('/suppression/parent', name: 'app_suppression_parent')]
    public function affichage(UsersRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        return $this->render('suppression_parent/index.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/{id}', name: 'app_users_delete', methods: ['POST'])]
    public function suppression(Request $request,Users $user, UsersRepository $usersRepository): Response
   
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $usersRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_suppression_parent', [], Response::HTTP_SEE_OTHER);
    }
   

}

