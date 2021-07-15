<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('email', EmailType::class,[
            'constraints' => [
                new NotBlank([
                    'message' => 'Merci d\'entrer un e-mail',
                ]),
            ],
            'required' => true,
            'attr' => ['class' =>'form-control'],
            ])
            ->add('nom' , TextType::class , [ 'attr' => ['class' =>'form-control']])
            ->add('prenom',TextType::class ,[ 'attr' => ['class' =>'form-control']])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN'
                ], 
                'expanded' => true,
                'multiple' => true,
                'label' => 'Rôles' 
            ])
            ->add('valider', SubmitType::class , [ 'attr' => ['class' =>'btn btn-primary']])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
