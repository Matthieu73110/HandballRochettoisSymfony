<?php

namespace App\Entity;

use App\Repository\RepphotosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepphotosRepository::class)]
class Repphotos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?bool $prioritaire = null;

    #[ORM\OneToMany(mappedBy: 'id_repphoto', targetEntity: Photo::class)]
    private Collection $photos;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $daterep = null;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
    }

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

    public function isPrioritaire(): ?bool
    {
        return $this->prioritaire;
    }

    public function setPrioritaire(bool $prioritaire): static
    {
        $this->prioritaire = $prioritaire;

        return $this;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): static
    {
        if (!$this->photos->contains($photo)) {
            $this->photos->add($photo);
            $photo->setIdRepphoto($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): static
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getIdRepphoto() === $this) {
                $photo->setIdRepphoto(null);
            }
        }

        return $this;
    }

    public function getDaterep(): ?\DateTimeInterface
    {
        return $this->daterep;
    }

    public function setDaterep(\DateTimeInterface $daterep): static
    {
        $this->daterep = $daterep;

        return $this;
    }
}
