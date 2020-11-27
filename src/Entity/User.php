<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone_numer_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address_user;

    /**
     * @ORM\OneToMany(targetEntity=Housing::class, mappedBy="housing_user")
     */
    private $housings;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="reservation_user", orphanRemoval=true)
     */
    private $reservations;

    public function __construct()
    {
        $this->housings = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstnameUser(): ?string
    {
        return $this->firstname_user;
    }

    public function setFirstnameUser(string $firstname_user): self
    {
        $this->firstname_user = $firstname_user;

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

    public function getPhoneNumerUser(): ?string
    {
        return $this->phone_numer_user;
    }

    public function setPhoneNumerUser(string $phone_numer_user): self
    {
        $this->phone_numer_user = $phone_numer_user;

        return $this;
    }

    public function getEmailUser(): ?string
    {
        return $this->email_user;
    }

    public function setEmailUser(string $email_user): self
    {
        $this->email_user = $email_user;

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

    public function getAddressUser(): ?string
    {
        return $this->address_user;
    }

    public function setAddressUser(string $address_user): self
    {
        $this->address_user = $address_user;

        return $this;
    }

    /**
     * @return Collection|Housing[]
     */
    public function getHousings(): Collection
    {
        return $this->housings;
    }

    public function addHousing(Housing $housing): self
    {
        if (!$this->housings->contains($housing)) {
            $this->housings[] = $housing;
            $housing->setHousingUser($this);
        }

        return $this;
    }

    public function removeHousing(Housing $housing): self
    {
        if ($this->housings->removeElement($housing)) {
            // set the owning side to null (unless already changed)
            if ($housing->getHousingUser() === $this) {
                $housing->setHousingUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setReservationUser($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getReservationUser() === $this) {
                $reservation->setReservationUser(null);
            }
        }

        return $this;
    }
}
