<?php

namespace App\Entity;

use App\Repository\HousingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HousingRepository::class)
 */
class Housing
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
    private $title_housing;

    /**
     * @ORM\Column(type="text")
     */
    private $description_housing;

    /**
     * @ORM\Column(type="datetime")
     */
    private $disponibility_housing;

    /**
     * @ORM\Column(type="integer")
     */
    private $price_per_night_housing;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address_housing;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_housing;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="housings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $housing_user;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="reservation_housing", orphanRemoval=true)
     */
    private $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleHousing(): ?string
    {
        return $this->title_housing;
    }

    public function setTitleHousing(string $title_housing): self
    {
        $this->title_housing = $title_housing;

        return $this;
    }

    public function getDescriptionHousing(): ?string
    {
        return $this->description_housing;
    }

    public function setDescriptionHousing(string $description_housing): self
    {
        $this->description_housing = $description_housing;

        return $this;
    }

    public function getDisponibilityHousing(): ?\DateTimeInterface
    {
        return $this->disponibility_housing;
    }

    public function setDisponibilityHousing(\DateTimeInterface $disponibility_housing): self
    {
        $this->disponibility_housing = $disponibility_housing;

        return $this;
    }

    public function getPricePerNightHousing(): ?int
    {
        return $this->price_per_night_housing;
    }

    public function setPricePerNightHousing(int $price_per_night_housing): self
    {
        $this->price_per_night_housing = $price_per_night_housing;

        return $this;
    }

    public function getAddressHousing(): ?string
    {
        return $this->address_housing;
    }

    public function setAddressHousing(string $address_housing): self
    {
        $this->address_housing = $address_housing;

        return $this;
    }

    public function getTypeHousing(): ?string
    {
        return $this->type_housing;
    }

    public function setTypeHousing(string $type_housing): self
    {
        $this->type_housing = $type_housing;

        return $this;
    }

    public function getHousingUser(): ?User
    {
        return $this->housing_user;
    }

    public function setHousingUser(?User $housing_user): self
    {
        $this->housing_user = $housing_user;

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
            $reservation->setReservationHousing($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getReservationHousing() === $this) {
                $reservation->setReservationHousing(null);
            }
        }

        return $this;
    }
}
