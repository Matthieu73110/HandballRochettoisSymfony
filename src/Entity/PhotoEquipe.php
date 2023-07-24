<?php

namespace App\Entity;

use App\Repository\PhotoEquipeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoEquipeRepository::class)]
class PhotoEquipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lien_calendrier = null;

    #[ORM\Column(length: 255)]
    private ?string $entraineurs = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getLienCalendrier(): ?string
    {
        return $this->lien_calendrier;
    }

    public function setLienCalendrier(?string $lien_calendrier): static
    {
        $this->lien_calendrier = $lien_calendrier;

        return $this;
    }

    public function getEntraineurs(): ?string
    {
        return $this->entraineurs;
    }

    public function setEntraineurs(string $entraineurs): static
    {
        $this->entraineurs = $entraineurs;

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

    public function getLienCalendrierFormat() : array
    {
        $liens = explode(',', $this->getLienCalendrier());
        if ($liens != null){
            $return_lien = [];
            for($i = 0; $i < count($liens); $i++) {
                array_push($return_lien, $liens[$i]);
            }
            return $return_lien;
        }
        
    }
}
