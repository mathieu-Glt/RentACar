<?php

namespace App\Entity;

use App\Repository\OptionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OptionsRepository::class)
 */
class Options
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $optionNum;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $designationOption;

    /**
     * @ORM\ManyToMany(targetEntity=Voiture::class, mappedBy="options")
     */
    private $voitures;

    public function __construct()
    {
        $this->voitures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOptionNum(): ?int
    {
        return $this->optionNum;
    }

    public function setOptionNum(?int $optionNum): self
    {
        $this->optionNum = $optionNum;

        return $this;
    }

    public function getDesignationOption(): ?string
    {
        return $this->designationOption;
    }

    public function setDesignationOption(?string $designationOption): self
    {
        $this->designationOption = $designationOption;

        return $this;
    }

    /**
     * @return Collection|Voiture[]
     */
    public function getVoitures(): Collection
    {
        return $this->voitures;
    }

    public function addVoiture(Voiture $voiture): self
    {
        if (!$this->voitures->contains($voiture)) {
            $this->voitures[] = $voiture;
            $voiture->addOption($this);
        }

        return $this;
    }

    public function removeVoiture(Voiture $voiture): self
    {
        if ($this->voitures->removeElement($voiture)) {
            $voiture->removeOption($this);
        }

        return $this;
    }
}
