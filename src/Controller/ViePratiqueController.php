<?php

namespace App\Controller;

use App\Entity\ViePratique;
use App\Form\ViePratiqueType;
use App\Repository\ViePratiqueRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/vie/pratique")
 */
class ViePratiqueController extends AbstractController
{
    /**
     * @Route("/", name="vie_pratique_index", methods={"GET"})
     */
    public function index(ViePratiqueRepository $ViePratiqueRepository): Response
    {
        return $this->render('vie_pratique/index.html.twig', [
            'vie_pratiques' => $ViePratiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="vie_pratique_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $vie_pratique = new ViePratique();
        $form = $this->createForm(ViePratiqueType::class, $vie_pratique);
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
                 $vie_pratique ->setImage($newFilename);
 
             }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vie_pratique);
            $entityManager->flush();

            return $this->redirectToRoute('vie_pratique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vie_pratique/new.html.twig', [
            'vie_pratique' => $vie_pratique,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="vie_pratique_show", methods={"GET"})
     */
    public function show(ViePratique $vie_pratique ,SluggerInterface $slugger ): Response
    {
        return $this->render('vie_pratique/show.html.twig', [
            'vie_pratique' => $vie_pratique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="vie_pratique_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ViePratique $vie_pratique): Response
    {
        $form = $this->createForm(ViePratiqueType::class, $vie_pratique);
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
                 $vie_pratique ->setImage($newFilename);
 
             }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vie_pratique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vie_pratique/edit.html.twig', [
            'vie_pratique' => $vie_pratique,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="vie_pratique_delete", methods={"POST"})
     */
    public function delete(Request $request, ViePratique $vie_pratique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vie_pratique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vie_pratique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vie_pratique_index', [], Response::HTTP_SEE_OTHER);
    }
}
