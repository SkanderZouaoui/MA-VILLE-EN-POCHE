<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Form\RestaurantType;
use App\Repository\PlatRepository;
use App\Repository\RestaurantRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/restaurant")
 */
class RestaurantController extends AbstractController
{
    /**
     * @Route("/", name="restaurant_index", methods={"GET"})
     */
    public function index(RestaurantRepository $restaurantRepository , PlatRepository $platRepository): Response
    {
        return $this->render('restaurant/index.html.twig', [
            'restaurants' => $restaurantRepository->findAll(),
            'plats' => $platRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="restaurant_new", methods={"GET","POST"})
     */
    public function new(Request $request , SluggerInterface $slugger): Response
    {
        $restaurant = new Restaurant();
        $form = $this->createForm(RestaurantType::class, $restaurant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             /**  @var uploadedFile $photoFile */
             $photoFile=$form->get('image')->getData();
             if($photoFile){
                 $filename = pathinfo($photoFile -> getClientOriginalNAme(),PATHINFO_FILENAME);
                 $originalname = $slugger -> slug($filename);
                 $newFilename=$originalname.'-'.uniqid().'.'.$photoFile->guessExtension();
                 try{
                     $photoFile->move(
                         $this->getParameter('photo_directory'),
                         $newFilename
                     );}
                 catch(FileException $e){
 
                 }
                 $restaurant ->setImage($newFilename);
 
             }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($restaurant);
            $entityManager->flush();

            return $this->redirectToRoute('restaurant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('restaurant/new.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="restaurant_show", methods={"GET"})
     */
    public function show(Restaurant $restaurant , RestaurantRepository $restaurantRepository , PlatRepository $platRepository): Response
    {
        return $this->render('restaurant/show.html.twig', [
            'restaurant' => $restaurant,
            'restaurants' => $restaurantRepository->findAll(),
            'plats' => $platRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="restaurant_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Restaurant $restaurant , SluggerInterface $slugger): Response
    {
        $form = $this->createForm(RestaurantType::class, $restaurant);
        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                /**  @var uploadedFile $photoFile */
                $photoFile=$form->get('image')->getData();
                if($photoFile){
                    $filename = pathinfo($photoFile -> getClientOriginalNAme(),PATHINFO_FILENAME);
                    $originalname = $slugger -> slug($filename);
                    $newFilename=$originalname.'-'.uniqid().'.'.$photoFile->guessExtension();
                    try{
                        $photoFile->move(
                            $this->getParameter('photo_directory'),
                            $newFilename
                        );}
                    catch(FileException $e){
    
                    }
                    $restaurant ->setImage($newFilename);
    
                }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('restaurant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('restaurant/edit.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="restaurant_delete", methods={"POST"})
     */
    public function delete(Request $request, Restaurant $restaurant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$restaurant->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($restaurant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('restaurant_index', [], Response::HTTP_SEE_OTHER);
    }
}
