<?php

namespace App\Entity;

use App\Repository\ColorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ColorRepository::class)]
class Color
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $color = null;

    #[ORM\OneToMany(mappedBy: 'color', targetEntity: Clothe::class, orphanRemoval: true)]
    private Collection $clothes;

    public function __construct()
    {
        $this->clothes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Clothe>
     */
    public function getClothes(): Collection
    {
        return $this->clothes;
    }

    public function addClothes(Clothe $clothes): static
    {
        if (!$this->clothes->contains($clothes)) {
            $this->clothes->add($clothes);
            $clothes->setColor($this);
        }

        return $this;
    }

    public function removeClothes(Clothe $clothes): static
    {
        if ($this->clothes->removeElement($clothes)) {
            // set the owning side to null (unless already changed)
            if ($clothes->getColor() === $this) {
                $clothes->setColor(null);
            }
        }

        return $this;
    }
}
