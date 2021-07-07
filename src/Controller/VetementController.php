<?php

namespace App\Controller;

use App\Entity\Vetement;
use App\Form\VetementType;
use App\Repository\VetementRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/vetement")
 */
class VetementController extends AbstractController
{
    /**
     * @Route("/", name="vetement_index", methods={"GET"})
     */
    public function index(VetementRepository $vetementRepository): Response
    {
        return $this->render('vetement/index.html.twig', [
            'vetements' => $vetementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="vetement_new", methods={"GET","POST"})
     */
    public function new(Request $request , SluggerInterface $slugger): Response
    {
        $vetement = new Vetement();
        $form = $this->createForm(VetementType::class, $vetement);
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
                $vetement ->setImage($newFilename);

            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vetement);
            $entityManager->flush();

            return $this->redirectToRoute('vetement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vetement/new.html.twig', [
            'vetement' => $vetement,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="vetement_show", methods={"GET"})
     */
    public function show(Vetement $vetement): Response
    {
        return $this->render('vetement/show.html.twig', [
            'vetement' => $vetement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="vetement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vetement $vetement,  SluggerInterface $slugger): Response
    {
        $form = $this->createForm(VetementType::class, $vetement);
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
                $vetement ->setImage($newFilename);

            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vetement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vetement/edit.html.twig', [
            'vetement' => $vetement,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="vetement_delete", methods={"POST"})
     */
    public function delete(Request $request, Vetement $vetement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vetement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vetement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vetement_index', [], Response::HTTP_SEE_OTHER);
    }
}
