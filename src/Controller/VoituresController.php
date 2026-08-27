<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

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
}