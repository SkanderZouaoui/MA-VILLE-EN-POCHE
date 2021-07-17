<?php
namespace App\Controller;

use App\Entity\Cafe;
use App\Form\CafeType;
use App\Repository\CafeRepository;
use App\Repository\ImageRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
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
            'images' => $imageRepository->findAll(),
        ]);
    }

   

    /**
     * @Route("/new", name="cafe_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $cafe = new Cafe();
        $form = $this->createForm(CafeType::class, $cafe);
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
                 $cafe ->setImage($newFilename);
 
             }
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
    public function show(Cafe $cafe ): Response
    {
        return $this->render('cafe/show.html.twig', [
            'cafe' => $cafe,
            'images' => $imageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cafe_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cafe $cafe, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(CafeType::class, $cafe);
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
                 $cafe ->setImage($newFilename);
 
             }
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
