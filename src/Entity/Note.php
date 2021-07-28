<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Cafe::class, inversedBy="notes")
     */
    private $cafe;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Sport::class, inversedBy="notes")
     */
    private $sport;

    /**
     * @ORM\ManyToOne(targetEntity=Vacance::class, inversedBy="notes")
     */
    private $vacance;

    /**
     * @ORM\ManyToOne(targetEntity=Culture::class, inversedBy="notes")
     */
    private $culture;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="notes")
     */
    private $restaurant;

    /**
     * @ORM\ManyToOne(targetEntity=Sante::class, inversedBy="notes")
     */
    private $sante;

    /**
     * @ORM\ManyToOne(targetEntity=Vetement::class, inversedBy="notes")
     */
    private $vetement;

    /**
     * @ORM\ManyToOne(targetEntity=ViePratique::class, inversedBy="notes")
     */
    private $viepratique;

    /**
     * @ORM\ManyToOne(targetEntity=Bricolage::class, inversedBy="notes")
     */
    private $bricolage;

    /**
     * @ORM\Column(type="integer")
     */
    private $iduser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCafe(): ?Cafe
    {
        return $this->cafe;
    }

    public function setCafe(?Cafe $cafe): self
    {
        $this->cafe = $cafe;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(?float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function setSport(?Sport $sport): self
    {
        $this->sport = $sport;

        return $this;
    }

    public function getVacance(): ?Vacance
    {
        return $this->vacance;
    }

    public function setVacance(?Vacance $vacance): self
    {
        $this->vacance = $vacance;

        return $this;
    }

    public function getCulture(): ?Culture
    {
        return $this->culture;
    }

    public function setCulture(?Culture $culture): self
    {
        $this->culture = $culture;

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    public function getSante(): ?Sante
    {
        return $this->sante;
    }

    public function setSante(?Sante $sante): self
    {
        $this->sante = $sante;

        return $this;
    }

    public function getVetement(): ?Vetement
    {
        return $this->vetement;
    }

    public function setVetement(?Vetement $vetement): self
    {
        $this->vetement = $vetement;

        return $this;
    }

    public function getViepratique(): ?ViePratique
    {
        return $this->viepratique;
    }

    public function setViepratique(?ViePratique $viepratique): self
    {
        $this->viepratique = $viepratique;

        return $this;
    }

    public function getBricolage(): ?Bricolage
    {
        return $this->bricolage;
    }

    public function setBricolage(?Bricolage $bricolage): self
    {
        $this->bricolage = $bricolage;

        return $this;
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function setIduser(int $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }
}
