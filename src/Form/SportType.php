<?php

namespace App\Form;

use App\Entity\Sport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class SportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie',ChoiceType::class,[
                'choices'=>[
                "CLUBS SPORTIFS"=>"CLUB SPORTIF",
                "TERRAINS FOOTBALL"=>"TERRAIN FOOTBALL",
                "TERRAINS TENNIS"=>"TERRAIN TENNIS",
                "PARCOURS SPORTIFS"=>"PARCOURS SPORTIFS",
                "PISCINES"=>"PISCINES",
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
            ->add('telephone',IntegerType::class , array(
                'attr' => [
                    'class' => 'form-control datetimepicker-input',
                    
                ])
            )
            ->add('email', EmailType::class, array(
            'attr' => [
                'class' => 'form-control datetimepicker-input'
            ] , 'required' => false)
        )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sport::class,
        ]);
    }
}
