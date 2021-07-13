<?php

namespace App\Controller;

use App\Repository\CafeRepository;
use App\Repository\PlatRepository;
use App\Repository\SportRepository;
use App\Repository\RestaurantRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    public function listing( RestaurantRepository $restaurantRepository , PlatRepository $platRepository , CafeRepository $cafeRepository ,
    SportRepository $sportRepository): Response
    {
        return $this->render('front/listing.html.twig', [
            'controller_name' => 'FrontController',
            'restaurants' => $restaurantRepository->findAll(),
            'plats' => $platRepository->findAll(),
            'cafes' => $cafeRepository->findAll(),
            'sports' => $sportRepository->findAll(),
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
    /**
     * @Route("/affrestaurant", name="affrestaurant")
     */
    public function affrestaurant(RestaurantRepository $restaurantRepository): Response
    {
        return $this->render('front/restaurant.html.twig', [
            'controller_name' => 'FrontController',
            'restaurants' => $restaurantRepository->findAll(),
        ]);
    }
    /**
     * @Route("/affcafe", name="affcafe")
     */
     public function affcafe(cafeRepository $cafeRepository): Response
    {
        return $this->render('front/cafe.html.twig', [
            'controller_name' => 'FrontController',
            'cafes' => $cafeRepository->findAll(),
        ]);
    }
    

}
