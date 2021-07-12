<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        return $this->render('front/home.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function blog(): Response
    {
        return $this->render('front/blog.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
    /**
     * @Route("/listing", name="listing")
     */
    public function listing(): Response
    {
        return $this->render('front/listing.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
    /**
     * @Route("/categorie", name="categorie")
     */
    public function categorie(): Response
    {
        return $this->render('front/categorie.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
     /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('front/contact.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        return $this->render('front/about.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

}
