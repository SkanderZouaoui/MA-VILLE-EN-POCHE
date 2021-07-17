<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom' ,TextType::class , [
                'attr' => [
                    'class' => 'form-control valid',
                ]
            ])
            ->add('sujet', TextType::class , [
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control valid',

                ]
            ])
            ->add('message',TextareaType::class ,[
                'attr' => [
                    'class' => 'form-control w-100',

                ]
            ])
            ->add('Envoyer',SubmitType::class ,[
                'attr' => [
                    'class' => 'button button-contactForm boxed-btn',
                    

                ]
            ])



        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
