<?php

namespace App\Controller;

use App\Entity\Bricolage;
use App\Form\BricolageType;
use App\Repository\BricolageRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/bricolage")
 */
class BricolageController extends AbstractController
{
    /**
     * @Route("/", name="bricolage_index", methods={"GET"})
     */
    public function index(BricolageRepository $bricolageRepository): Response
    {
        return $this->render('bricolage/index.html.twig', [
            'bricolages' => $bricolageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bricolage_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $bricolage = new Bricolage();
        $form = $this->createForm(BricolageType::class, $bricolage);
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
                 $bricolage ->setImage($newFilename);
 
             }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bricolage);
            $entityManager->flush();

            return $this->redirectToRoute('bricolage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bricolage/new.html.twig', [
            'bricolage' => $bricolage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="bricolage_show", methods={"GET"})
     */
    public function show(Bricolage $bricolage): Response
    {
        return $this->render('bricolage/show.html.twig', [
            'bricolage' => $bricolage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bricolage_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Bricolage $bricolage, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(BricolageType::class, $bricolage);
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
                 $bricolage ->setImage($newFilename);
 
             }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bricolage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bricolage/edit.html.twig', [
            'bricolage' => $bricolage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="bricolage_delete", methods={"POST"})
     */
    public function delete(Request $request, Bricolage $bricolage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bricolage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bricolage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bricolage_index', [], Response::HTTP_SEE_OTHER);
    }
}
