<?php

namespace App\Form;

use App\Entity\RepasHebdo;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RepasHebdoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lundi', DateType::class, [
                'widget' => 'single_text',
                'label' => ' ',
                ]
                ,
                )
            ->add('lentree', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Entrée',
                'class' => 'text-center'  
                ],
            ])
            ->add('lplat', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Plat',
                'class' => 'text-center'  
                ],
            ])
            ->add('ldessert', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Dessert',
                'class' => 'text-center'  
                ],
            ])
            ->add('mardi', DateType::class, [
                'widget' => 'single_text',
                'label' => ' ',
                ]
                ,
                )
            ->add('mentree', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Entrée',
                'class' => 'text-center'  
                ],
            ])
            ->add('mplat', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Plat',
                'class' => 'text-center'  
                ],
            ])
            ->add('mdessert', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Dessert',
                'class' => 'text-center'  
                ],
            ])
            ->add('mercredi', DateType::class, [
                'widget' => 'single_text',
                'label' => ' ',
                ]
                ,
                )
            ->add('merentree', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Entrée',
                'class' => 'text-center'  
                ],
            ])
            ->add('merplat', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Plat',
                'class' => 'text-center'  
                ],
            ])
            ->add('merdessert', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Dessert',
                'class' => 'text-center'  
                ],
            ])
            ->add('jeudi', DateType::class, [
                'widget' => 'single_text',
                'label' => ' ',
                ]
                ,
                )
            ->add('jentree', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Entrée',
                'class' => 'text-center'  
                ],
            ])
            ->add('jplat', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Plat',
                'class' => 'text-center'  
                ],
            ])
            ->add('jdessert', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Dessert',
                'class' => 'text-center'  
                ],
            ])
            ->add('vendredi', DateType::class, [
                'widget' => 'single_text',
                'label' => ' ',
                ]
                ,
                )
            ->add('ventree', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Entrée',
                'class' => 'text-center'  
                ],
            ])
            ->add('vplat', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Plat',
                'class' => 'text-center'  
                ],
            ])
            ->add('vdessert', TextType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Dessert',
                'class' => 'text-center'  
                ],
            ])
            ->add('debut_sem' , DateType::class, [
                'widget' => 'single_text',
                'label' => ' ',
                
            ])
            ->add('fin_sem' , DateType::class, [
                'widget' => 'single_text',
                'label' => ' ',
                
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RepasHebdo::class,
        ]);
    }
}
