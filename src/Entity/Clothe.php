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

    #[ORM\ManyToOne(inversedBy: 'clothes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Color $color = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'clothe')]
    private Collection $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

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

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): static
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addClothe($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            $user->removeClothe($this);
        }

        return $this;
    }
}
