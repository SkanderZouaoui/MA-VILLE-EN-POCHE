<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity=Cafe::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=true)
     */
    private $cafe;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=Sport::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=true)
     */
    private $sport;

    /**
     * @ORM\ManyToOne(targetEntity=Sante::class, inversedBy="comments")
     */
    private $sante;

    /**
     * @ORM\ManyToOne(targetEntity=Bricolage::class, inversedBy="comments")
     */
    private $bricolage;

    /**
     * @ORM\ManyToOne(targetEntity=ViePratique::class, inversedBy="comments")
     */
    private $viepratique;

    /**
     * @ORM\ManyToOne(targetEntity=Vetement::class, inversedBy="comments")
     */
    private $vetement;

    /**
     * @ORM\ManyToOne(targetEntity=Vacance::class, inversedBy="comments")
     */
    private $vacance;

    /**
     * @ORM\ManyToOne(targetEntity=Culture::class, inversedBy="comments")
     */
    private $culture;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="comments")
     */
    private $restaurant;

  

    
    public function getId(): ?int
    {
        return $this->id;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

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

    public function getSante(): ?Sante
    {
        return $this->sante;
    }

    public function setSante(?Sante $sante): self
    {
        $this->sante = $sante;

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

    public function getViepratique(): ?ViePratique
    {
        return $this->viepratique;
    }

    public function setViepratique(?ViePratique $viepratique): self
    {
        $this->viepratique = $viepratique;

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

    

    

    
}
