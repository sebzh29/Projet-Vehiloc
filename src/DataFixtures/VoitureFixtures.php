<?php

namespace App\DataFixtures;

use App\Entity\Voiture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VoitureFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $voitures = [
            [
                'name' => 'Renault Twingo',
                'description' => 'Une citadine compacte, pratique et idéale pour circuler facilement en ville.',
                'monthlyPrice' => 900,
                'dailyPrice' => 39,
                'places' => 4,
                'motor' => 'Manuelle',
            ],
            [
                'name' => 'Renault Clio',
                'description' => 'Une voiture polyvalente et confortable, adaptée aux trajets urbains comme aux longs parcours.',
                'monthlyPrice' => 850,
                'dailyPrice' => 38,
                'places' => 5,
                'motor' => 'Manuelle',
            ],
            [
                'name' => 'BMW iX électrique',
                'description' => 'Un SUV électrique spacieux associant confort, technologie et conduite silencieuse.',
                'monthlyPrice' => 950,
                'dailyPrice' => 42,
                'places' => 5,
                'motor' => 'Automatique',
            ],
            [
                'name' => 'Renault Zoé',
                'description' => 'Une citadine électrique agréable à conduire et parfaitement adaptée aux déplacements quotidiens.',
                'monthlyPrice' => 900,
                'dailyPrice' => 39,
                'places' => 5,
                'motor' => 'Automatique',
            ],
            [
                'name' => 'Citroën Ami',
                'description' => 'Une solution électrique compacte et économique pour les petits déplacements en ville.',
                'monthlyPrice' => 799,
                'dailyPrice' => 28,
                'places' => 2,
                'motor' => 'Automatique',
            ],
            [
                'name' => 'Opel Corsa',
                'description' => 'Une citadine moderne, confortable et maniable pour tous vos déplacements.',
                'monthlyPrice' => 820,
                'dailyPrice' => 36,
                'places' => 5,
                'motor' => 'Manuelle',
            ],
        ];

        foreach ($voitures as $data) {
            $voiture = new Voiture();

            $voiture
                ->setName($data['name'])
                ->setDescription($data['description'])
                ->setMonthlyPrice($data['monthlyPrice'])
                ->setDailyPrice($data['dailyPrice'])
                ->setPlaces($data['places'])
                ->setMotor($data['motor']);

            $manager->persist($voiture);
        }

        $manager->flush();
    }
}