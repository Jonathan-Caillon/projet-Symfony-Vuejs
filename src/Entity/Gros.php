<?php

namespace App\Entity;

use App\Repository\GrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GrosRepository::class)]
class Gros
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Poids;

    #[ORM\Column(type: 'string', length: 255)]
    private $taille;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoids(): ?string
    {
        return $this->Poids;
    }

    public function setPoids(string $Poids): self
    {
        $this->Poids = $Poids;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }
}
