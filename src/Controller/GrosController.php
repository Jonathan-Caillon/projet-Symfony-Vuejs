<?php

namespace App\Controller;

use App\Entity\Gros;
use App\Form\GrosType;
use App\Repository\GrosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gros')]
class GrosController extends AbstractController
{
    #[Route('/', name: 'gros_index', methods: ['GET'])]
    public function index(GrosRepository $grosRepository): Response
    {
        return $this->render('gros/index.html.twig', [
            'gros' => $grosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'gros_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $gro = new Gros();
        $form = $this->createForm(GrosType::class, $gro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($gro);
            $entityManager->flush();

            return $this->redirectToRoute('gros_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('gros/new.html.twig', [
            'gro' => $gro,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'gros_show', methods: ['GET'])]
    public function show(Gros $gro): Response
    {
        return $this->render('gros/show.html.twig', [
            'gro' => $gro,
        ]);
    }

    #[Route('/{id}/edit', name: 'gros_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Gros $gro, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(GrosType::class, $gro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('gros_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('gros/edit.html.twig', [
            'gro' => $gro,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'gros_delete', methods: ['POST'])]
    public function delete(Request $request, Gros $gro, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gro->getId(), $request->request->get('_token'))) {
            $entityManager->remove($gro);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gros_index', [], Response::HTTP_SEE_OTHER);
    }
}
