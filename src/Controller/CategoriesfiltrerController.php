<?php

namespace App\Controller;

use App\Repository\SanteRepository;
use App\Repository\SportRepository;
use App\Repository\CultureRepository;
use App\Repository\VacanceRepository;
use App\Repository\BricolageRepository;
use App\Repository\ViePratiqueRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoriesfiltrerController extends AbstractController
{
    /**
     * @Route("/categoriesante/{categorie}", name="categoriesante")
     */
    public function index($categorie, SanteRepository $santerepository): Response
    {
       $sante = $santerepository->findBy(['categorie' => $categorie]);
       // dd($sante);
      /* for($i=0 ; $i<3 ; $i++)
       {
           echo $sante[$i]->getNom()."br";
       }
      */
       return $this->render('categoriefiltrer/index.html.twig', [
        'santes' => $sante,
       
       
    ]);
    }

    /**
     * @Route("/categoriesport/{categorie}", name="categoriesport")
     */
    public function sport($categorie, SportRepository $sportrepository): Response
    {
       $sport = $sportrepository->findBy(['categorie' => $categorie]);
      
       return $this->render('categoriefiltrer/sport.html.twig', [
        'sports' => $sport,
       
       
    ]);
    }

    /**
     * @Route("/categorievie_pratique/{categorie}", name="categorievie_pratique")
     */
    public function vie_pratique($categorie, ViePratiqueRepository $vie_pratiquerepository): Response
    {
       $vie_pratique = $vie_pratiquerepository->findBy(['categorie' => $categorie]);
      
       return $this->render('categoriefiltrer/vie_pratique.html.twig', [
        'vie_pratiques' => $vie_pratique,
       
       
    ]);
    }

    /**
     * @Route("/categorievacance/{categorie}", name="categorievacance")
     */
    public function vacance($categorie, VacanceRepository $vacancerepository): Response
    {
       $vacance = $vacancerepository->findBy(['categorie' => $categorie]);
      
       return $this->render('categoriefiltrer/vacance.html.twig', [
        'vacances' => $vacance,
       
       
    ]);
    }

     /**
     * @Route("/categorieculture/{categorie}", name="categorieculture")
     */
    public function culture($categorie, CultureRepository $culturerepository): Response
    {
       $culture = $culturerepository->findBy(['categorie' => $categorie]);
      
       return $this->render('categoriefiltrer/culture.html.twig', [
        'cultures' => $culture,
       
       
    ]);
    }

     /**
     * @Route("/categoriebricolage/{categorie}", name="categoriebricolage")
     */
    public function bricolage($categorie, BricolageRepository $bricolagerepository): Response
    {
       $bricolage = $bricolagerepository->findBy(['categorie' => $categorie]);
      
       return $this->render('categoriefiltrer/bricolage.html.twig', [
        'bricolages' => $bricolage,
       
       
    ]);
    }
}
