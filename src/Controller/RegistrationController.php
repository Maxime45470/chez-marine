<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegistrationFormType;
use App\Security\UsersAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\Mailer\MailerInterface;

class RegistrationController extends AbstractController
{
    #[Route('/enregistrement', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher,MailerInterface $mailer, UserAuthenticatorInterface $userAuthenticator, UsersAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new Users();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword($user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email
            $email = (new TemplatedEmail())
                ->from('marine.henry718@orange.fr')
                ->to($form->get('email')->getData())
                ->subject('Bienvenue sur le site de Marine Henry')
                ->htmlTemplate('email/email.html.twig')
                ->context([
                    'nom'=> $form->get('nom')->getData(),
                    'enfant1'=> $form->get('enfant_1')->getData(),
                    'emailing'=> $form->get('email')->getData(),
                    'plainPassword'=> $form->get('plainPassword')->getData()
                    
                ])
                ;
                $mailer->send($email);

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
