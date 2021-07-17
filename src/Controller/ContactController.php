<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacty", name="contactaa")
     */
    public function index(Request $request , \Swift_Mailer $mailer): Response
    {
          $form = $this->createForm(ContactType::class);
          $form->handlerequest($request);

          if($form->isSubmitted() && $form->isValid()){
              $contact = $form->getData(); 
             $message = (new \Swift_Message('Nouveau Contact'))
             ->setFrom('nature.pet1@gmail.com')
             ->setTo($contact['email'])
             ->setBody(
                 $this->renderView(
                     'emails/contact.html.twig',compact('contact')),
                     'text/html'
                 )
             ;
             $mailer->send($message);
             return $this->redirectToRoute('home');
             

          }
        return $this->render('contact/index.html.twig', [
            'ContactForm' => $form->createView()
        ]);
    }
}
