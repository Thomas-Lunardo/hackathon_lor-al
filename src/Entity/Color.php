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

    #[ORM\ManyToMany(targetEntity: Eyeshadow::class, mappedBy: 'color')]
    private Collection $eyeshadows;

    #[ORM\ManyToMany(targetEntity: Facepowder::class, mappedBy: 'color')]
    private Collection $facepowders;

    #[ORM\ManyToMany(targetEntity: Highlighter::class, mappedBy: 'color')]
    private Collection $highlighters;

    #[ORM\ManyToMany(targetEntity: Lipstick::class, mappedBy: 'color')]
    private Collection $lipsticks;

    public function __construct()
    {
        $this->clothes = new ArrayCollection();
        $this->eyeshadows = new ArrayCollection();
        $this->facepowders = new ArrayCollection();
        $this->highlighters = new ArrayCollection();
        $this->lipsticks = new ArrayCollection();
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

    /**
     * @return Collection<int, Eyeshadow>
     */
    public function getEyeshadows(): Collection
    {
        return $this->eyeshadows;
    }

    public function addEyeshadow(Eyeshadow $eyeshadow): static
    {
        if (!$this->eyeshadows->contains($eyeshadow)) {
            $this->eyeshadows->add($eyeshadow);
            $eyeshadow->addColor($this);
        }

        return $this;
    }

    public function removeEyeshadow(Eyeshadow $eyeshadow): static
    {
        if ($this->eyeshadows->removeElement($eyeshadow)) {
            $eyeshadow->removeColor($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Facepowder>
     */
    public function getFacepowders(): Collection
    {
        return $this->facepowders;
    }

    public function addFacepowder(Facepowder $facepowder): static
    {
        if (!$this->facepowders->contains($facepowder)) {
            $this->facepowders->add($facepowder);
            $facepowder->addColor($this);
        }

        return $this;
    }

    public function removeFacepowder(Facepowder $facepowder): static
    {
        if ($this->facepowders->removeElement($facepowder)) {
            $facepowder->removeColor($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Highlighter>
     */
    public function getHighlighters(): Collection
    {
        return $this->highlighters;
    }

    public function addHighlighter(Highlighter $highlighter): static
    {
        if (!$this->highlighters->contains($highlighter)) {
            $this->highlighters->add($highlighter);
            $highlighter->addColor($this);
        }

        return $this;
    }

    public function removeHighlighter(Highlighter $highlighter): static
    {
        if ($this->highlighters->removeElement($highlighter)) {
            $highlighter->removeColor($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Lipstick>
     */
    public function getLipsticks(): Collection
    {
        return $this->lipsticks;
    }

    public function addLipstick(Lipstick $lipstick): static
    {
        if (!$this->lipsticks->contains($lipstick)) {
            $this->lipsticks->add($lipstick);
            $lipstick->addColor($this);
        }

        return $this;
    }

    public function removeLipstick(Lipstick $lipstick): static
    {
        if ($this->lipsticks->removeElement($lipstick)) {
            $lipstick->removeColor($this);
        }

        return $this;
    }
}
