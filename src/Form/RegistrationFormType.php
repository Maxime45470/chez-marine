<?php

namespace App\Form;

use App\Entity\Users;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', EmailType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Confirmation Email'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Prénom',
                    'hidden' => true
                ]
            ])
            ->add('adresse' , TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Nom'
                ]
            ])
            ->add('zipcode', TextType::class, [
                'label' => ' ',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Code postal',
                    'hidden' => true
                ]
            ])
            ->add('ville', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Prénom'
                ]
            ])
            ->add('telephone', TextType::class, [
                'label' => ' ',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Téléphone',
                    'hidden' => true
                ]
            ])
            ->add('enfant_1' , TextType::class, [
                'label' => ' ',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Enfant 1'
                ]
            ])
            ->add('enfant_2', TextType::class, [
                'label' => ' ',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Enfant 2',
                    'hidden' => true
                ]
            ])
            ->add('enfant_3' , TextType::class, [
                'label' => ' ',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Enfant 3',
                    'hidden' => true
                ]
            ])
            ->add('email' , TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Email'
                ]
            ])
            ->add('valid_photo_groupe', RadioType::class, [
                'label' => 'Autorisez-vous la publication des photos de groupe sur le site ?',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input'
                ]   

            ])


        
            ->add('rgpd')
            
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                "label" => " ",
               
                'attr' => ['autocomplete' => 'new-password', 'placeholder' => 'Mot de passe'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
