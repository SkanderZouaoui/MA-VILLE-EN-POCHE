<?php

namespace App\Controller;

use App\Entity\Vacance;
use App\Form\VacanceType;
use App\Repository\VacanceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/vacance")
 */
class VacanceController extends AbstractController
{
    /**
     * @Route("/", name="vacance_index", methods={"GET"})
     */
    public function index(VacanceRepository $vacanceRepository): Response
    {
        return $this->render('vacance/index.html.twig', [
            'vacances' => $vacanceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="vacance_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $vacance = new Vacance();
        $form = $this->createForm(VacanceType::class, $vacance);
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
                $vacance ->setImage($newFilename);

            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vacance);
            $entityManager->flush();

            return $this->redirectToRoute('vacance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vacance/new.html.twig', [
            'vacance' => $vacance,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="vacance_show", methods={"GET"})
     */
    public function show(Vacance $vacance): Response
    {
        return $this->render('vacance/show.html.twig', [
            'vacance' => $vacance,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="vacance_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vacance $vacance , SluggerInterface $slugger): Response
    {
        $form = $this->createForm(VacanceType::class, $vacance);
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
                $vacance ->setImage($newFilename);

            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vacance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vacance/edit.html.twig', [
            'vacance' => $vacance,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="vacance_delete", methods={"POST"})
     */
    public function delete(Request $request, Vacance $vacance): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vacance->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vacance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vacance_index', [], Response::HTTP_SEE_OTHER);
    }
}
