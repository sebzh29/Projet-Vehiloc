<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Voiture;
use App\Form\VoitureType;
use Symfony\Component\HttpFoundation\Request;

class VoituresController extends AbstractController
{
    #[Route('/', name: 'app_accueil', methods: ['GET'])]
    public function index(
        VoitureRepository $voitureRepository
    ): Response {
        $voitures = $voitureRepository->findAll();

        return $this->render('voitures/accueil.html.twig', [
            'voitures' => $voitures,
        ]);
    }

    #[Route(
    '/voiture/{id}',
    name: 'app_voiture_show',
    requirements: ['id' => '\d+'],
    methods: ['GET']
    )]
    public function show(
        int $id,
        VoitureRepository $voitureRepository
    ): Response {
        $voiture = $voitureRepository->find($id);

        if ($voiture === null) {
            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('voitures/voiture.html.twig', [
            'voiture' => $voiture,
        ]);
    }

    #[Route(
    '/voiture/{id}/supprimer',
    name: 'app_voiture_delete',
    requirements: ['id' => '\d+'],
    methods: ['GET']
    )]
    public function delete(
        int $id,
        VoitureRepository $voitureRepository,
        EntityManagerInterface $entityManager
    ): Response {
        $voiture = $voitureRepository->find($id);

        if ($voiture === null) {
            return $this->redirectToRoute('app_accueil');
        }

        $entityManager->remove($voiture);
        $entityManager->flush();

        return $this->redirectToRoute('app_accueil');
    }

    #[Route(
    '/voiture/ajouter',
    name: 'app_voiture_add',
    methods: ['GET', 'POST']
)]
public function add(
    Request $request,
    EntityManagerInterface $entityManager
): Response {
    $voiture = new Voiture();

    $form = $this->createForm(
        VoitureType::class,
        $voiture
    );

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($voiture);
        $entityManager->flush();

        return $this->redirectToRoute('app_voiture_show', [
            'id' => $voiture->getId(),
        ]);
    }

    return $this->render(
        'voitures/nouvelle-voiture.html.twig',
        [
            'form' => $form,
        ]
    );
}
}