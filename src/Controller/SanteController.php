<?php

namespace App\Controller;

use App\Entity\Sante;
use App\Form\SanteType;
use App\Repository\SanteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/sante")
 */
class SanteController extends AbstractController
{
    /**
     * @Route("/", name="sante_index", methods={"GET"})
     */
    public function index(SanteRepository $santeRepository): Response
    {
        return $this->render('sante/index.html.twig', [
            'santes' => $santeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sante_new", methods={"GET","POST"})
     */
    public function new(Request $request , SluggerInterface $slugger): Response
    {
        $sante = new Sante();
        $form = $this->createForm(SanteType::class, $sante);
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
                $sante ->setImage($newFilename);

            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sante);
            $entityManager->flush();

            return $this->redirectToRoute('sante_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sante/new.html.twig', [
            'sante' => $sante,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="sante_show", methods={"GET"})
     */
    public function show(Sante $sante): Response
    {
        return $this->render('sante/show.html.twig', [
            'sante' => $sante,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sante_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sante $sante , SluggerInterface $slugger): Response
    {
        $form = $this->createForm(SanteType::class, $sante);
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
                  $sante ->setImage($newFilename);
  
              }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sante_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sante/edit.html.twig', [
            'sante' => $sante,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="sante_delete", methods={"POST"})
     */
    public function delete(Request $request, Sante $sante): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sante->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sante);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sante_index', [], Response::HTTP_SEE_OTHER);
    }
}
