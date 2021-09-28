<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\OneToOne(targetEntity=Voiture::class, mappedBy="annonce", cascade={"persist", "remove"})
     */
    private $voiture;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getVoiture(): ?Voiture
    {
        return $this->voiture;
    }

    public function setVoiture(Voiture $voiture): self
    {
        // set the owning side of the relation if necessary
        if ($voiture->getAnnonce() !== $this) {
            $voiture->setAnnonce($this);
        }

        $this->voiture = $voiture;

        return $this;
    }
}
