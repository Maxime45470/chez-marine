<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Evenement1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom' , TextType::class 
            , [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Nom de l\'événement'
                ]
            ])
            ->add('description' , TextType::class
            , [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Description de l\'événement'
                ]
            ])
            ->add('date' , DateType::class 
            , [
                 'widget' => 'single_text',
                'label' => ' ',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
