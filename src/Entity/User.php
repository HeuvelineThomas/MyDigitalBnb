<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstnam_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_user;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $phone_number_user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $street_user;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $post_code_user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city_user;

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
    public function getUsername(): string
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
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstnamUser(): ?string
    {
        return $this->firstnam_user;
    }

    public function setFirstnamUser(string $firstnam_user): self
    {
        $this->firstnam_user = $firstnam_user;

        return $this;
    }

    public function getNameUser(): ?string
    {
        return $this->name_user;
    }

    public function setNameUser(string $name_user): self
    {
        $this->name_user = $name_user;

        return $this;
    }

    public function getPhoneNumberUser(): ?string
    {
        return $this->phone_number_user;
    }

    public function setPhoneNumberUser(?string $phone_number_user): self
    {
        $this->phone_number_user = $phone_number_user;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getStreetUser(): ?string
    {
        return $this->street_user;
    }

    public function setStreetUser(?string $street_user): self
    {
        $this->street_user = $street_user;

        return $this;
    }

    public function getPostCodeUser(): ?string
    {
        return $this->post_code_user;
    }

    public function setPostCodeUser(?string $post_code_user): self
    {
        $this->post_code_user = $post_code_user;

        return $this;
    }

    public function getCityUser(): ?string
    {
        return $this->city_user;
    }

    public function setCityUser(?string $city_user): self
    {
        $this->city_user = $city_user;

        return $this;
    }
}