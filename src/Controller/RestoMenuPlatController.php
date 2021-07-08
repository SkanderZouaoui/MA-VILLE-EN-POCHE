<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Entity\Plat;
use App\Entity\Restaurant;
use App\Form\RestaurantType;
use App\Repository\MenuRepository;
use App\Repository\RestaurantRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/affichage")
 */
class RestoMenuPlatController extends AbstractController
{
    /**
     * @Route("/", name="affichage_index", methods={"GET"})
     */
    public function index(RestaurantRepository $restaurantRepository,MenuRepository $menuRepository): Response
    {
        return $this->render('restomenuplat/index.html.twig', [
            'restaurants' => $restaurantRepository->findAll(),
            'menus' => $menuRepository->findAll(),
        ]);
    }
}