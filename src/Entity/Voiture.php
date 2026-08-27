<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message: 'Le nom de la voiture est obligatoire.')]
#[Assert\Length(
    max: 255,
    maxMessage: 'Le nom ne peut pas dépasser {{ limit }} caractères.'
)]
#[ORM\Column(length: 255)]
private ?string $name = null;
    

    #[Assert\NotBlank(message: 'La description est obligatoire.')]
#[Assert\Length(
    min: 10,
    max: 2000,
    minMessage: 'La description doit contenir au moins {{ limit }} caractères.',
    maxMessage: 'La description ne peut pas dépasser {{ limit }} caractères.'
)]
#[ORM\Column(type: Types::TEXT)]
private ?string $description = null;
   

    #[Assert\NotNull(message: 'Le prix mensuel est obligatoire.')]
#[Assert\Positive(message: 'Le prix mensuel doit être supérieur à zéro.')]
#[ORM\Column]
private ?int $monthlyPrice = null;
   

    #[Assert\NotNull(message: 'Le prix journalier est obligatoire.')]
#[Assert\Positive(message: 'Le prix journalier doit être supérieur à zéro.')]
#[ORM\Column]
private ?int $dailyPrice = null;

    #[Assert\NotNull(message: 'Le nombre de places est obligatoire.')]
#[Assert\Range(
    min: 1,
    max: 9,
    notInRangeMessage: 'Le nombre de places doit être compris entre {{ min }} et {{ max }}.'
)]
#[ORM\Column]
private ?int $places = null;

    #[Assert\NotBlank(message: 'Le type de boîte de vitesses est obligatoire.')]
#[Assert\Choice(
    choices: ['Manuelle', 'Automatique'],
    message: 'Le type de boîte de vitesses sélectionné est invalide.'
)]
#[ORM\Column(length: 50)]
private ?string $motor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMonthlyPrice(): ?int
    {
        return $this->monthlyPrice;
    }

    public function setMonthlyPrice(int $monthlyPrice): static
    {
        $this->monthlyPrice = $monthlyPrice;

        return $this;
    }

    public function getDailyPrice(): ?int
    {
        return $this->dailyPrice;
    }

    public function setDailyPrice(int $dailyPrice): static
    {
        $this->dailyPrice = $dailyPrice;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->places;
    }

    public function setPlaces(int $places): static
    {
        $this->places = $places;

        return $this;
    }

    public function getMotor(): ?string
    {
        return $this->motor;
    }

    public function setMotor(string $motor): static
    {
        $this->motor = $motor;

        return $this;
    }
}
