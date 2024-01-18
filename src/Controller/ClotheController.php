<?php

namespace App\Controller;

use App\Entity\Clothe;
use App\Form\ClotheType;
use App\Repository\ClotheRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/clothe')]
class ClotheController extends AbstractController
{
    #[Route('/', name: 'app_clothe_index', methods: ['GET'])]
    public function index(ClotheRepository $clotheRepository): Response
    {
        return $this->render('clothe/index.html.twig', [
            'clothes' => $clotheRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_clothe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $clothe = new Clothe();
        $form = $this->createForm(ClotheType::class, $clothe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($clothe);
            $entityManager->flush();

            return $this->redirectToRoute('app_clothe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('clothe/new.html.twig', [
            'clothe' => $clothe,
            'form' => $form,
        ]);
    }

}
