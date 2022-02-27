<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 */
class Voiture
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marque;

    /**
     * @ORM\Column(type="date")
     */
    private $DateDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $DateFin;

    /**
     * @ORM\ManyToOne(targetEntity=Chauffeur::class, inversedBy="voitures")
     */
    private $voitureRelation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->DateDebut;
    }

    /**
     * @param mixed $DateDebut
     */
    public function setDateDebut($DateDebut): void
    {
        $this->DateDebut = $DateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->DateFin;
    }

    /**
     * @param mixed $DateFin
     */
    public function setDateFin($DateFin): void
    {
        $this->DateFin = $DateFin;
    }









    public function getVoitureRelation(): ?Chauffeur
    {
        return $this->voitureRelation;
    }

    public function setVoitureRelation(?Chauffeur $voitureRelation): self
    {
        $this->voitureRelation = $voitureRelation;

        return $this;
    }
    public function __toString(){
        return (string)$this->getDateDebut();

    }

}
