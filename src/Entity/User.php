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

    #[ORM\OneToMany(mappedBy: 'user',targetEntity: Clothe::class, orphanRemoval: true)]
    private Collection $clothes;

    #[ORM\Column(length: 100)]
    private ?string $firstname = null;

    #[ORM\Column]
    private ?int $age = null;

    public function __construct()
    {
        $this->clothes = new ArrayCollection();
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
    public function getClothes(): Collection
    {
        return $this->clothes;
    }

    public function addClothe(Clothe $clothe): static
    {
        if (!$this->clothes->contains($clothe)) {
            $this->clothes->add($clothe);
            $clothe->setUser($this);
        }

        return $this;
    }

    public function removeClothe(Clothe $clothe): static
    {
        if ($this->clothes->removeElement($clothe)) {
            if ($clothe->getUser()== $this){
                $clothe->setUser(null);
            }
        };

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }
}
