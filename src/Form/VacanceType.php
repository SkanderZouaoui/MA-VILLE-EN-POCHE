<?php

namespace App\Form;

use App\Entity\Vacance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class VacanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie',ChoiceType::class, [
                'choices' => [ 
            "Hotel" => "Hotel", 
            "Maisons d'hote" => "Maisons d'hote",
            "Plages" => "Plages",
            "Espaces Vert" => "Espaces Vert",
            

                ],
            ])
            ->add('nom')
            ->add('telephone',IntegerType::class , array(
                'attr' => [
                    'class' => 'form-control datetimepicker-input',
                    
                ])
            )
            ->add('email', EmailType::class, array(
            'attr' => [
                'class' => 'form-control datetimepicker-input'
            ], 'required' => false)
        )
            ->add('image',FileType::class, ['data_class' => null])
            ->add('description')
            ->add('location' ,TextType::class, [
                'attr' => [
                    'class' => 'form-control datetimepicker-input'
                ]
            ])
            ->add('latitude' ,TextType::class, [
                'attr' => [
                    'class' => 'form-control datetimepicker-input'
                ]
            ])
            ->add('longitude' ,TextType::class, [
                'attr' => [
                    'class' => 'form-control datetimepicker-input'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vacance::class,
        ]);
    }
}
