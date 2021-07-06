<?php

namespace App\Controller;

use App\Entity\Cafe;
use App\Form\CafeType;
use App\Repository\CafeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cafe")
 */
class CafeController extends AbstractController
{
    /**
     * @Route("/", name="cafe_index", methods={"GET"})
     */
    public function index(CafeRepository $cafeRepository): Response
    {
        return $this->render('cafe/index.html.twig', [
            'cafes' => $cafeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cafe_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cafe = new Cafe();
        $form = $this->createForm(CafeType::class, $cafe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cafe);
            $entityManager->flush();

            return $this->redirectToRoute('cafe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cafe/new.html.twig', [
            'cafe' => $cafe,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="cafe_show", methods={"GET"})
     */
    public function show(Cafe $cafe): Response
    {
        return $this->render('cafe/show.html.twig', [
            'cafe' => $cafe,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cafe_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cafe $cafe): Response
    {
        $form = $this->createForm(CafeType::class, $cafe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cafe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cafe/edit.html.twig', [
            'cafe' => $cafe,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="cafe_delete", methods={"POST"})
     */
    public function delete(Request $request, Cafe $cafe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cafe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cafe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cafe_index', [], Response::HTTP_SEE_OTHER);
    }
}
