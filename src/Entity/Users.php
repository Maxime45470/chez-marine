<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    
    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 5)]
    private ?string $zipcode = null;

    #[ORM\Column(length: 100)]
    private ?string $ville = null;

    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $enfant_1 = '';

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $enfant_2 = '';

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $enfant_3 = '';

    #[ORM\Column]
    private ?bool $rgpd = null;

    #[ORM\Column(nullable: true)]
    private ?bool $validPhotoGroupe = null;

    #[ORM\OneToMany(mappedBy: 'info', targetEntity: Info::class)]
    private Collection $infos;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: PhotoGroupe::class)]
    private Collection $photoGroupes;


    public function __construct()
    {
        $this->roles = ['ROLE_USER'];
        $this->enfant_1 = '';
        $this->enfant_2 = '';
        $this->enfant_3 = '';
        $this->validPhotoGroupe = false;
        $this->infos = new ArrayCollection();
        $this->photoGroupes = new ArrayCollection();   
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEnfant1(): ?string
    {
        return $this->enfant_1;
    }

    public function setEnfant1(?string $enfant_1): self
    {
        $this->enfant_1 = $enfant_1;

        return $this;
    }

    public function getEnfant2(): ?string
    {
        return $this->enfant_2;
    }

    public function setEnfant2(?string $enfant_2): self
    {
        $this->enfant_2 = $enfant_2;

        return $this;
    }

    public function getEnfant3(): ?string
    {
        return $this->enfant_3;
    }

    public function setEnfant3(?string $enfant_3): self
    {
        $this->enfant_3 = $enfant_3;

        return $this;
    }

    public function getRgpd(): ?bool
    {
        return $this->rgpd;
    }

    public function setRgpd(bool $rgpd): self
    {
        $this->rgpd = $rgpd;

        return $this;
    }

    public function isValidPhotoGroupe(): ?bool
    {
        return $this->validPhotoGroupe;
    }

    public function setValidPhotoGroupe(?bool $validPhotoGroupe): self
    {
        $this->validPhotoGroupe = $validPhotoGroupe;

        return $this;
    }

    /**
     * @return Collection<int, Info>
     */
    public function getInfos(): Collection
    {
        return $this->infos;
    }

    public function addInfo(Info $info): self
    {
        if (!$this->infos->contains($info)) {
            $this->infos->add($info);
            $info->setInfo($this);
        }

        return $this;
    }

    public function removeInfo(Info $info): self
    {
        if ($this->infos->removeElement($info)) {
            // set the owning side to null (unless already changed)
            if ($info->getInfo() === $this) {
                $info->setInfo(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom;
        return $this->roles;
        
    }

    /**
     * @return Collection<int, PhotoGroupe>
     */
    public function getPhotoGroupes(): Collection
    {
        return $this->photoGroupes;
    }

    public function addPhotoGroupe(PhotoGroupe $photoGroupe): self
    {
        if (!$this->photoGroupes->contains($photoGroupe)) {
            $this->photoGroupes->add($photoGroupe);
            $photoGroupe->setParent($this);
        }

        return $this;
    }

    public function removePhotoGroupe(PhotoGroupe $photoGroupe): self
    {
        if ($this->photoGroupes->removeElement($photoGroupe)) {
            // set the owning side to null (unless already changed)
            if ($photoGroupe->getParent() === $this) {
                $photoGroupe->setParent(null);
            }
        }

        return $this;
    }  
}
