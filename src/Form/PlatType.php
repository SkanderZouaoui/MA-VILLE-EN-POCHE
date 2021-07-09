<?php

namespace App\Form;

use App\Entity\Plat;
use App\Entity\Restaurant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PlatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('categorie',ChoiceType::class,[
            'choices'=>[
            "Entrées"=>"Entrées",
            "FastFood"=>"FastFood",
            "Plat"=>"Plat",  
            "Dessert"=>"Dessert",
           
            ],
        ])
            ->add('nom')
            ->add('image',FileType::class, ['data_class' => null])
            ->add('description')
            ->add('prix')
            ->add('idresto',EntityType::class, [
                'class' => Restaurant::class 
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Plat::class,
        ]);
    }
}
