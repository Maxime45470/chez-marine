<?php

namespace App\Entity;

use App\Repository\RepasHebdoRepository;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity(repositoryClass: RepasHebdoRepository::class)]
class RepasHebdo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?\DateTime $lundi = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?\DateTime $mardi = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?\DateTime $mercredi = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?\DateTime $jeudi = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?\DateTime $vendredi = null;

   

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $lentree = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $lplat = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $ldessert = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $mentree = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $mplat = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $mdessert = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $merentree = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $merplat = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $merdessert = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $jentree = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $jplat = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $jdessert = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $ventree = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $vplat = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $vdessert = null;

    #[ORM\Column]
    private ?\DateTime $debutSem = null;

    #[ORM\Column]
    private ?\DateTime $finSem = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLundi(): ?\DateTime
    {
        return $this->lundi;
    }

    public function setLundi(\DateTime $lundi): self
    {
        $this->lundi = $lundi;

        return $this;
    }

    public function getMardi(): ?\DateTime
    {
        return $this->mardi;
    }

    public function setMardi(\DateTime $mardi): self
    {
        $this->mardi = $mardi;

        return $this;
    }

    public function getMercredi(): ?\DateTime
    {
        return $this->mercredi;
    }

    public function setMercredi(\DateTime $mercredi): self
    {
        $this->mercredi = $mercredi;

        return $this;
    }

    public function getJeudi(): ?\DateTime
    {
        return $this->jeudi;
    }

    public function setJeudi(\DateTime $jeudi): self
    {
        $this->jeudi = $jeudi;

        return $this;
    }

    public function getVendredi(): ?\DateTime
    {
        return $this->vendredi;
    }

    public function setVendredi(\DateTime $vendredi): self
    {
        $this->vendredi = $vendredi;

        return $this;
    }

    

   

    public function getLentree(): ?string
    {
        return $this->lentree;
    }

    public function setLentree(?string $lentree): self
    {
        $this->lentree = $lentree;

        return $this;
    }

    public function getLplat(): ?string
    {
        return $this->lplat;
    }

    public function setLplat(?string $lplat): self
    {
        $this->lplat = $lplat;

        return $this;
    }

    public function getLdessert(): ?string
    {
        return $this->ldessert;
    }

    public function setLdessert(?string $ldessert): self
    {
        $this->ldessert = $ldessert;

        return $this;
    }

    public function getMentree(): ?string
    {
        return $this->mentree;
    }

    public function setMentree(?string $mentree): self
    {
        $this->mentree = $mentree;

        return $this;
    }

    public function getMplat(): ?string
    {
        return $this->mplat;
    }

    public function setMplat(?string $mplat): self
    {
        $this->mplat = $mplat;

        return $this;
    }

    public function getMdessert(): ?string
    {
        return $this->mdessert;
    }

    public function setMdessert(?string $mdessert): self
    {
        $this->mdessert = $mdessert;

        return $this;
    }

    public function getMerentree(): ?string
    {
        return $this->merentree;
    }

    public function setMerentree(?string $merentree): self
    {
        $this->merentree = $merentree;

        return $this;
    }

    public function getMerplat(): ?string
    {
        return $this->merplat;
    }

    public function setMerplat(?string $merplat): self
    {
        $this->merplat = $merplat;

        return $this;
    }

    public function getMerdessert(): ?string
    {
        return $this->merdessert;
    }

    public function setMerdessert(?string $merdessert): self
    {
        $this->merdessert = $merdessert;

        return $this;
    }

    public function getJentree(): ?string
    {
        return $this->jentree;
    }

    public function setJentree(?string $jentree): self
    {
        $this->jentree = $jentree;

        return $this;
    }

    public function getJplat(): ?string
    {
        return $this->jplat;
    }

    public function setJplat(?string $jplat): self
    {
        $this->jplat = $jplat;

        return $this;
    }

    public function getJdessert(): ?string
    {
        return $this->jdessert;
    }

    public function setJdessert(?string $jdessert): self
    {
        $this->jdessert = $jdessert;

        return $this;
    }

    public function getVentree(): ?string
    {
        return $this->ventree;
    }

    public function setVentree(?string $ventree): self
    {
        $this->ventree = $ventree;

        return $this;
    }

    public function getVplat(): ?string
    {
        return $this->vplat;
    }

    public function setVplat(?string $vplat): self
    {
        $this->vplat = $vplat;

        return $this;
    }

    public function getVdessert(): ?string
    {
        return $this->vdessert;
    }

    public function setVdessert(?string $vdessert): self
    {
        $this->vdessert = $vdessert;

        return $this;
    }

    public function getDebutSem(): ?\DateTime
    {
        return $this->debutSem;
    }

    public function setDebutSem(\DateTime $debutSem): self
    {
        $this->debutSem = $debutSem;

        return $this;
    }

    public function getFinSem(): ?\DateTime
    {
        return $this->finSem;
    }

    public function setFinSem(\DateTime $finSem): self
    {
        $this->finSem = $finSem;

        return $this;
    }

    
}
