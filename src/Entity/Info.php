<?php

namespace App\Entity;

use App\Repository\InfoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InfoRepository::class)]
class Info
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $annonces = null;

    #[ORM\ManyToOne(inversedBy: 'infos')]
    private ?Users $info = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnonces(): ?string
    {
        return $this->annonces;
    }

    public function setAnnonces(?string $annonces): self
    {
        $this->annonces = $annonces;

        return $this;
    }

    public function getInfo(): ?Users
    {
        return $this->info;
    }

    public function setInfo(?Users $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function __toString()
    {
        return $this->annonces;
        return $this->info;
        
        
    }
}
