<?php

namespace App\Form;

use App\Entity\Sante;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class SanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie',ChoiceType::class, [
                'choices' => [ 
               "Medecin" => "Medecin", 
               "Hopitale" => "Hopitale",
               "Centre De Vaccin" => "Centre De Vaccin",
               "SOS" => "SOS",
                ],
               ])
            ->add('nom')
            ->add('image',FileType::class, ['data_class' => null])
            ->add('description')
            ->add('localisation' ,TextType::class, [
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
            'data_class' => Sante::class,
        ]);
    }
}
