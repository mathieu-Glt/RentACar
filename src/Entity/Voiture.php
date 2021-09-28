<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 */
class Voiture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Immatriculation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $modele;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $anneeProduction;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $carburant;

    /**
     * @ORM\ManyToMany(targetEntity=Options::class, inversedBy="voitures")
     */
    private $options;

    /**
     * @ORM\OneToOne(targetEntity=Annonce::class, inversedBy="voiture", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $annonce;

    public function __construct()
    {
        $this->options = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculation(): ?string
    {
        return $this->Immatriculation;
    }

    public function setImmatriculation(string $Immatriculation): self
    {
        $this->Immatriculation = $Immatriculation;

        return $this;
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

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(?string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getAnneeProduction(): ?\DateTimeInterface
    {
        return $this->anneeProduction;
    }

    public function setAnneeProduction(?\DateTimeInterface $anneeProduction): self
    {
        $this->anneeProduction = $anneeProduction;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(?string $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    /**
     * @return Collection|Options[]
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Options $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
        }

        return $this;
    }

    public function removeOption(Options $option): self
    {
        $this->options->removeElement($option);

        return $this;
    }

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(Annonce $annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }
}
