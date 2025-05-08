<?php

namespace App\Entity;

use App\Repository\TemaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TemaRepository::class)]
class Tema
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tema = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $CreatedAt = null;

    /**
     * @var Collection<int, Recuerdo>
     */
    #[ORM\OneToMany(targetEntity: Recuerdo::class, mappedBy: 'tema')]
    private Collection $recuerdos;

    public function __construct()
    {
        $this->recuerdos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTema(): ?string
    {
        return $this->tema;
    }

    public function setTema(string $tema): static
    {
        $this->tema = $tema;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeImmutable $CreatedAt): static
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Recuerdo>
     */
    public function getRecuerdos(): Collection
    {
        return $this->recuerdos;
    }

    public function addRecuerdo(Recuerdo $recuerdo): static
    {
        if (!$this->recuerdos->contains($recuerdo)) {
            $this->recuerdos->add($recuerdo);
            $recuerdo->setTema($this);
        }

        return $this;
    }

    public function removeRecuerdo(Recuerdo $recuerdo): static
    {
        if ($this->recuerdos->removeElement($recuerdo)) {
            // set the owning side to null (unless already changed)
            if ($recuerdo->getTema() === $this) {
                $recuerdo->setTema(null);
            }
        }

        return $this;
    }
}
