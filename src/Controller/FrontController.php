<?php

namespace App\Controller;

use App\Entity\Cafe;
use App\Entity\Sante;
use App\Entity\Sport;
use App\Entity\Comment;
use App\Entity\Culture;
use App\Entity\Vacance;
use App\Entity\Vetement;
use App\Entity\Bricolage;
use App\Entity\Restaurant;
use App\Entity\ViePratique;
use App\Form\CommentFormType;
use App\Repository\CafeRepository;
use App\Repository\PlatRepository;
use App\Repository\SanteRepository;
use App\Repository\SportRepository;
use App\Repository\CommentRepository;
use App\Repository\CultureRepository;
use App\Repository\VacanceRepository;
use App\Repository\VetementRepository;
use App\Repository\BricolageRepository;
use App\Repository\RestaurantRepository;
use App\Repository\ViePratiqueRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;




class FrontController extends AbstractController
{
       private $entityManager;
   public function __construct( EntityManagerInterface $entityManager)
       {
         $this->entityManager = $entityManager;
       }

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
     public function affcafe(CafeRepository $cafeRepository): Response
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
     /**
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
/**
     * @Route("affvacance/{id}", name="vacance_blog")
     */
    public function blogvacance(Request $request,vacance $vacance , CommentRepository $commentRepository): Response
    {  
         $comment = new Comment();      
        $form = $this->createForm(CommentFormType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTime());
            $comment->setvacance($vacance);

            $this->entityManager->persist($comment);
            $this->entityManager->flush();



             return $this->redirectToRoute('vacance_blog', ['id' => $vacance->getId()]);


        }

        return $this->render('front/blogvacance.html.twig', [
            'vacance' => $vacance,
            'comment_form' => $form->createView(),
        ]);
    }
      /**
     * @Route("affsport/{id}", name="sport_blog")
     */
    public function blogsport(Request $request,Sport $sport , CommentRepository $commentRepository): Response
    {  
         $comment = new Comment();      
        $form = $this->createForm(CommentFormType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTime());
            $comment->setsport($sport);

            $this->entityManager->persist($comment);
            $this->entityManager->flush();



             return $this->redirectToRoute('sport_blog', ['id' => $sport->getId()]);


        }

        return $this->render('front/blogsport.html.twig', [
            'sport' => $sport,
            'comment_form' => $form->createView(),
        ]);
    }

    /**
     * @Route("affculture/{id}", name="culture_blog")
     */
    public function blogculture(Request $request,culture $culture , CommentRepository $commentRepository): Response
    {  
         $comment = new Comment();      
        $form = $this->createForm(CommentFormType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTime());
            $comment->setculture($culture);

            $this->entityManager->persist($comment);
            $this->entityManager->flush();



             return $this->redirectToRoute('culture_blog', ['id' => $culture->getId()]);


        }

        return $this->render('front/blogculture.html.twig', [
            'culture' => $culture,
            'comment_form' => $form->createView(),
        ]);
    }
/**
     * @Route("affvetement/{id}", name="vetement_blog")
     */
    public function blogvetement(Request $request,vetement $vetement , CommentRepository $commentRepository): Response
    {  
         $comment = new Comment();      
        $form = $this->createForm(CommentFormType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTime());
            $comment->setvetement($vetement);

            $this->entityManager->persist($comment);
            $this->entityManager->flush();



             return $this->redirectToRoute('vetement_blog', ['id' => $vetement->getId()]);


        }

        return $this->render('front/blogvetement.html.twig', [
            'vetement' => $vetement,
            'comment_form' => $form->createView(),
        ]);
    }
    /**
     * @Route("affsante/{id}", name="sante_blog")
     */
    public function blogsante(Request $request,sante $sante , CommentRepository $commentRepository): Response
    {  
         $comment = new Comment();      
        $form = $this->createForm(CommentFormType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTime());
            $comment->setsante($sante);

            $this->entityManager->persist($comment);
            $this->entityManager->flush();



             return $this->redirectToRoute('sante_blog', ['id' => $sante->getId()]);


        }

        return $this->render('front/blogsante.html.twig', [
            'sante' => $sante,
            'comment_form' => $form->createView(),
        ]);
    }


    
     /**
     * @Route("affbricolage/{id}", name="bricolage_blog")
     */
    public function blogbricolage(Request $request,bricolage $bricolage , CommentRepository $commentRepository): Response
    {  
         $comment = new Comment();      
        $form = $this->createForm(CommentFormType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTime());
            $comment->setbricolage($bricolage);

            $this->entityManager->persist($comment);
            $this->entityManager->flush();



             return $this->redirectToRoute('bricolage_blog', ['id' => $bricolage->getId()]);


        }

        return $this->render('front/blogbricolage.html.twig', [
            'bricolage' => $bricolage,
            'comment_form' => $form->createView(),
        ]);
    }


     /**
     * @Route("affcafe/{id}", name="cafe_blog")
     */
    public function blogcafe(Request $request,Cafe $cafe , CommentRepository $commentRepository): Response
    {  
         $comment = new Comment();      
        $form = $this->createForm(CommentFormType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTime());
            $comment->setCafe($cafe);

            $this->entityManager->persist($comment);
            $this->entityManager->flush();



             return $this->redirectToRoute('cafe_blog', ['id' => $cafe->getId()]);


        }

        return $this->render('front/blogcafe.html.twig', [
            'cafe' => $cafe,
            'comment_form' => $form->createView(),
        ]);
    }

   
    /**
     * @Route("affvie_pratique/{id}", name="vie_pratique_blog")
     */
    public function blogvie_pratique(Request $request,ViePratique $viePratique , CommentRepository $commentRepository): Response
    {  
         $comment = new Comment();      
        $form = $this->createForm(CommentFormType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTime());
            $comment->setvie_pratique($vie_pratique);

            $this->entityManager->persist($comment);
            $this->entityManager->flush();



             return $this->redirectToRoute('vie_pratique_blog', ['id' => $vie_pratique->getId()]);


        }

        return $this->render('front/blogvie_pratique.html.twig', [
            'vie_pratique' => $viePratique,
            'comment_form' => $form->createView(),
        ]);
    }

    
      /**
     * @Route("affrestaurant/{id}", name="restaurant_blog")
     */
    public function blogrestaurant(Request $request,restaurant $restaurant ,  RestaurantRepository $restaurantRepository , PlatRepository $platRepository ,CommentRepository $commentRepository): Response
    {  
         $comment = new Comment();      
        $form = $this->createForm(CommentFormType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTime());
            $comment->setrestaurant($restaurant);

            $this->entityManager->persist($comment);
            $this->entityManager->flush();



             return $this->redirectToRoute('restaurant_blog', ['id' => $restaurant->getId()]);


        }

        return $this->render('front/blogrestaurant.html.twig', [
            'restaurant' => $restaurant,
            'restaurants' => $restaurantRepository->findAll(),
            'plats' => $platRepository->findAll(),
            'comment_form' => $form->createView(),
        ]);
    }
    

}
