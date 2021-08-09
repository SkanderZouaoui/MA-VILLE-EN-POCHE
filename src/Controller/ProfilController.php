<?php

namespace App\Controller;

use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(UserType::class);
          $form->handlerequest($request);


        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'userform' => $form->createView()
        ]);
    }
}
