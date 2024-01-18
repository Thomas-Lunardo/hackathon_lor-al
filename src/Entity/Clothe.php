<?php

namespace App\Entity;

use App\Repository\ClotheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClotheRepository::class)]
class Clothe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $clothe = null;

    #[ORM\ManyToOne(inversedBy :'clothes')]
    private ?User $user;

    #[ORM\Column(length: 20)]
    private ?string $color = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClothe(): ?string
    {
        return $this->clothe;
    }

    public function setClothe(string $clothe): static
    {
        $this->clothe = $clothe;

        return $this;
    }

    
    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }
}
