<?php

namespace App\Controller;

use App\Entity\Culture;
use App\Form\CultureType;
use App\Repository\CultureRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/culture")
 */
class CultureController extends AbstractController
{
    /**
     * @Route("/", name="culture_index", methods={"GET"})
     */
    public function index(CultureRepository $cultureRepository): Response
    {
        return $this->render('culture/index.html.twig', [
            'cultures' => $cultureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="culture_new", methods={"GET","POST"})
     */
    public function new(Request $request , SluggerInterface $slugger): Response
    {
        $culture = new Culture();
        $form = $this->createForm(CultureType::class, $culture);
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
                $culture ->setImage($newFilename);

            }
            
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($culture);
            $entityManager->flush();

            return $this->redirectToRoute('culture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('culture/new.html.twig', [
            'culture' => $culture,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="culture_show", methods={"GET"})
     */
    public function show(Culture $culture): Response
    {
        return $this->render('culture/show.html.twig', [
            'culture' => $culture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="culture_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Culture $culture ,  SluggerInterface $slugger): Response
    {
        $form = $this->createForm(CultureType::class, $culture);
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
                $culture ->setImage($newFilename);

            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('culture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('culture/edit.html.twig', [
            'culture' => $culture,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="culture_delete", methods={"POST"})
     */
    public function delete(Request $request, Culture $culture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$culture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($culture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('culture_index', [], Response::HTTP_SEE_OTHER);
    }
}
