<?php

namespace App\Controller;

use App\Entity\Info;
use App\Form\InfoType;
use App\Repository\InfoRepository;
use App\Repository\UsersRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/info')]
class InfoController extends AbstractController
{
    #[Route('/', name: 'app_info_index', methods: ['GET'])]
    public function index(InfoRepository $infoRepository, UsersRepository $usersRepository): Response
    {
        return $this->render('info/index.html.twig', [
            'infos' => $infoRepository->findAll(),
            'users' => $usersRepository->findAll(),
        ]);
    }
    

    #[Route('/new', name: 'app_info_new', methods: ['GET', 'POST'])]
    public function new(Request $request, InfoRepository $infoRepository,MailerInterface $mailer): Response
    {
        $info = new Info();
        $form = $this->createForm(InfoType::class, $info);
        $form->handleRequest($request);
    

        if ($form->isSubmitted() && $form->isValid()) {
            $infoRepository->add($info, true);
            $email = (new TemplatedEmail())
            ->from('marine.henry718@orange.fr')
            ->to($form->get('info')->getData())
            ->subject('Bienvenue sur le site de Marine Henry')
            ->htmlTemplate('email/info.html.twig')
            ->context([
                ])
                ;
                $mailer->send($email);
                return $this->redirectToRoute('app_info_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('info/new.html.twig', [
            'info' => $info,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_info_show', methods: ['GET'])]
    public function show(Info $info): Response
    {
        return $this->render('info/show.html.twig', [
            'info' => $info,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_info_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Info $info, InfoRepository $infoRepository): Response
    {
        $form = $this->createForm(InfoType::class, $info);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $infoRepository->add($info, true);

            return $this->redirectToRoute('app_info_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('info/edit.html.twig', [
            'info' => $info,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_info_delete', methods: ['POST'])]
    public function delete(Request $request, Info $info, InfoRepository $infoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$info->getId(), $request->request->get('_token'))) {
            $infoRepository->remove($info, true);
        }

        return $this->redirectToRoute('app_info_index', [], Response::HTTP_SEE_OTHER);
    }
}
