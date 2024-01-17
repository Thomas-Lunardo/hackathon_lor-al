<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $occasion = null;

    #[ORM\Column(length: 255)]
    private ?string $eyesColors = null;

    #[ORM\Column(length: 255)]
    private ?string $skinColor = null;

    #[ORM\Column]
    private ?bool $facepowder = null;

    #[ORM\Column]
    private ?bool $lipStick = null;

    #[ORM\Column]
    private ?bool $eyeShadow = null;

    #[ORM\Column]
    private ?bool $highLighter = null;

    #[ORM\Column(length: 50)]
    private ?string $makeupHabit = null;

    #[ORM\ManyToMany(targetEntity: Clothe::class, inversedBy: 'users')]
    private Collection $clothe;

    public function __construct()
    {
        $this->clothe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOccasion(): ?string
    {
        return $this->occasion;
    }

    public function setOccasion(string $occasion): static
    {
        $this->occasion = $occasion;

        return $this;
    }

    public function getEyesColors(): ?string
    {
        return $this->eyesColors;
    }

    public function setEyesColors(string $eyesColors): static
    {
        $this->eyesColors = $eyesColors;

        return $this;
    }

    public function getSkinColor(): ?string
    {
        return $this->skinColor;
    }

    public function setSkinColor(string $skinColor): static
    {
        $this->skinColor = $skinColor;

        return $this;
    }

    public function isFacepowder(): ?bool
    {
        return $this->facepowder;
    }

    public function setFacepowder(bool $facepowder): static
    {
        $this->facepowder = $facepowder;

        return $this;
    }

    public function isLipStick(): ?bool
    {
        return $this->lipStick;
    }

    public function setLipStick(bool $lipStick): static
    {
        $this->lipStick = $lipStick;

        return $this;
    }

    public function isEyeShadow(): ?bool
    {
        return $this->eyeShadow;
    }

    public function setEyeShadow(bool $eyeShadow): static
    {
        $this->eyeShadow = $eyeShadow;

        return $this;
    }

    public function isHighLighter(): ?bool
    {
        return $this->highLighter;
    }

    public function setHighLighter(bool $highLighter): static
    {
        $this->highLighter = $highLighter;

        return $this;
    }

    public function getMakeupHabit(): ?string
    {
        return $this->makeupHabit;
    }

    public function setMakeupHabit(string $makeupHabit): static
    {
        $this->makeupHabit = $makeupHabit;

        return $this;
    }

    /**
     * @return Collection<int, Clothe>
     */
    public function getClothe(): Collection
    {
        return $this->clothe;
    }

    public function addClothe(Clothe $clothe): static
    {
        if (!$this->clothe->contains($clothe)) {
            $this->clothe->add($clothe);
        }

        return $this;
    }

    public function removeClothe(Clothe $clothe): static
    {
        $this->clothe->removeElement($clothe);

        return $this;
    }
}
