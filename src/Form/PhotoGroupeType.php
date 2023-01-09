<?php

namespace App\Form;

use App\Entity\PhotoGroupe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotoGroupeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre' , TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Titre de la photo'
                ]
            ])
            ->add('description' , TextType::class, [
                'label' => ' ',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Description de la photo',
                    'hidden' => true
                ]
            ])
            ->add('created_at' , DateType::class, [
                'widget' => 'single_text',
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Date de la photo'
                ]
            ])
            ->add('photo' , FileType::class, [
                'label' => ' ',
                'mapped' => false
            ])
            ->add('categories')
            ->add('parent')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PhotoGroupe::class,
        ]);
    }
}
