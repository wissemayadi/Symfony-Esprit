<?php

namespace App\Entity;

use App\Repository\BienImmobilierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BienImmobilierRepository::class)
 */
class BienImmobilier
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $numimmo;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $status;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Proprietaire::class, inversedBy="bienImmos")
     * @ORM\JoinColumn( name="numprop",referencedColumnName="numprop")
     */
    private $proprietaire;

    /**
     * @return mixed
     */
    public function getNumimmo()
    {
        return $this->numimmo;
    }

    /**
     * @param mixed $numimmo
     */
    public function setNumimmo($numimmo): void
    {
        $this->numimmo = $numimmo;
    }



    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getProprietaire(): ?Proprietaire
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?Proprietaire $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }
}
