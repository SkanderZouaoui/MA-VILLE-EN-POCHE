<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre e-mail',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Veuillez sasir votre Email',
                    'readonly' => true,

                ]
            ])
            ->add('nom', TextType::class, [
                'label' => 'Votre nom',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Veuillez sasir votre Nom',
                    'readonly' => true,
                ]
            ])
            ->add('content', TextareaType::class , [ 
                'attr' =>  [
                    'class' => 'form-control w-100',
                    'placeholder' => 'Veuillez sasir le Commentaire'
                ]
                            ])
            ->add('submit', SubmitType::class , [
                'label' => ' Envoyer le commentaire',
                'attr' => [
                    'class' => 'button button-contactForm btn_1 boxed-btn'
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
