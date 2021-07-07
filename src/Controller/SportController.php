<?php

namespace App\Controller;

use App\Entity\Sport;
use App\Form\SportType;
use App\Repository\SportRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/sport")
 */
class SportController extends AbstractController
{
    /**
     * @Route("/", name="sport_index", methods={"GET"})
     */
    public function index(SportRepository $sportRepository): Response
    {
        return $this->render('sport/index.html.twig', [
            'sports' => $sportRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sport_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $sport = new Sport();
        $form = $this->createForm(SportType::class, $sport);
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
                $sport ->setImage($newFilename);

            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sport);
            $entityManager->flush();

            return $this->redirectToRoute('sport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sport/new.html.twig', [
            'sport' => $sport,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="sport_show", methods={"GET"})
     */
    public function show(Sport $sport): Response
    {
        return $this->render('sport/show.html.twig', [
            'sport' => $sport,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sport_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sport $sport, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(SportType::class, $sport);
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
                $sport ->setImage($newFilename);

            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sport/edit.html.twig', [
            'sport' => $sport,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="sport_delete", methods={"POST"})
     */
    public function delete(Request $request, Sport $sport): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sport->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sport);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sport_index', [], Response::HTTP_SEE_OTHER);
    }
}
