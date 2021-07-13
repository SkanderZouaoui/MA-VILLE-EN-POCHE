<?php

namespace App\Controller;

use App\Repository\CafeRepository;
use App\Repository\PlatRepository;
use App\Repository\SanteRepository;
use App\Repository\SportRepository;
use App\Repository\CultureRepository;
use App\Repository\VacanceRepository;
use App\Repository\BricolageRepository;
use App\Repository\VetementRepository;
use App\Repository\RestaurantRepository;
use App\Repository\ViePratiqueRepository;
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
     public function affcafe(VafeRepository $cafeRepository): Response
    {
        return $this->render('front/cafe.html.twig', [
            'controller_name' => 'FrontController',
            'cafes' => $cafeRepository->findAll(),
        ]);
    }
    /**
     * @Route("/affvacance", name="affvacance")
     */
    public function affvacance(VacanceRepository $vacanceRepository): Response
    {
        return $this->render('front/vacance.html.twig', [
            'controller_name' => 'FrontController',
            'vacances' => $vacanceRepository->findAll(),
        ]);
    }
     /**
     * @Route("/affculture", name="affculture")
     */
    public function affculture(CultureRepository $cultureRepository): Response
    {
        return $this->render('front/culture.html.twig', [
            'controller_name' => 'FrontController',
            'cultures' => $cultureRepository->findAll(),
        ]);
    }
     /**
     * @Route("/affsante", name="affsante")
     */
    public function affsante(SanteRepository $santeRepository): Response
    {
        return $this->render('front/sante.html.twig', [
            'controller_name' => 'FrontController',
            'santes' => $santeRepository->findAll(),
        ]);
    }
    /**
     * @Route("/affbricolage", name="affbricolage")
     */
    public function affbricolage(BricolageRepository $bricolageRepository): Response
    {
        return $this->render('front/bricolage.html.twig', [
            'controller_name' => 'FrontController',
            'bricolages' => $bricolageRepository->findAll(),
        ]);
    }
    
     * @Route("/affsport", name="affsport")
     */
      public function affsport(SportRepository $sportRepository): Response
    {
        return $this->render('front/sport.html.twig', [
            'controller_name' => 'FrontController',
            'sports' => $sportRepository->findAll(),
        ]);
    }

    /**
     * @Route("/affvetement", name="affvetement")
     */
    public function affvetement(VetementRepository $vetementRepository): Response
    {
        return $this->render('front/vetement.html.twig', [
            'controller_name' => 'FrontController',
            'vetements' => $vetementRepository->findAll(),
        ]);
    }
     /**
     * @Route("/affvie_pratique", name="affvie_pratique")
     */
    public function affvie_pratique(ViePratiqueRepository $viePratiqueRepository): Response
    {
        return $this->render('front/vie_pratique.html.twig', [
            'controller_name' => 'FrontController',
            'vie_pratiques' => $viePratiqueRepository->findAll(),
        ]);
    }

}
