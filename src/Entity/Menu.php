<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 */
class Menu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Restaurant::class, cascade={"persist", "remove"})
     */
    private $idrestaurant;

    /**
     * @ORM\OneToMany(targetEntity=Plat::class, mappedBy="idmenu")
     */
    private $plats;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nommenu;

    public function __construct()
    {
        $this->plats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdrestaurant(): ?Restaurant
    {
        return $this->idrestaurant;
    }

    public function setIdrestaurant(?Restaurant $idrestaurant): self
    {
        $this->idrestaurant = $idrestaurant;

        return $this;
    }

    /**
     * @return Collection|Plat[]
     */
    public function getPlats(): Collection
    {
        return $this->plats;
    }

    public function addPlat(Plat $plat): self
    {
        if (!$this->plats->contains($plat)) {
            $this->plats[] = $plat;
            $plat->setIdmenu($this);
        }

        return $this;
    }

    public function removePlat(Plat $plat): self
    {
        if ($this->plats->removeElement($plat)) {
            // set the owning side to null (unless already changed)
            if ($plat->getIdmenu() === $this) {
                $plat->setIdmenu(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return "".($this->nommenu) ; 
    }

    public function getNommenu(): ?string
    {
        return $this->nommenu;
    }

    public function setNommenu(string $nommenu): self
    {
        $this->nommenu = $nommenu;

        return $this;
    }

    
}
