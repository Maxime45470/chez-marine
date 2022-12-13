<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'categories', targetEntity: PhotoGroupe::class)]
    private Collection $photo;

    public function __construct()
    {
        $this->photo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, PhotoGroupe>
     */
    public function getPhoto(): Collection
    {
        return $this->photo;
    }
    public function setPhoto(PhotoGroupe $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function addPhoto(PhotoGroupe $photo): self
    {
        if (!$this->photo->contains($photo)) {
            $this->photo->add($photo);
            $photo->setCategories($this);
        }

        return $this;
    }

    public function removePhoto(PhotoGroupe $photo): self
    {
        if ($this->photo->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getCategories() === $this) {
                $photo->setCategories;
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom;
    }
}
