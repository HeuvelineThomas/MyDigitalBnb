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
    private $type_housing;

        /**
     * @ORM\Column(type="string", length=255)
     */
    private $street_housing;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $post_code_housing;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city_housing;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="reservation_housing", orphanRemoval=true)
     */
    private $reservations;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $img_housing;


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

    public function getTypeHousing(): ?string
    {
        return $this->type_housing;
    }

    public function setTypeHousing(string $type_housing): self
    {
        $this->type_housing = $type_housing;

        return $this;
    }

    public function getStreetHousing(): ?string
    {
        return $this->street_housing;
    }

    public function setStreetHousing(string $street_housing): self
    {
        $this->street_housing = $street_housing;

        return $this;
    }

    public function getPostCodeHousing(): ?string
    {
        return $this->post_code_housing;
    }

    public function setPostCodeHousing(string $post_code_housing): self
    {
        $this->post_code_housing = $post_code_housing;

        return $this;
    }

    public function getCityHousing(): ?string
    {
        return $this->city_housing;
    }

    public function setCityHousing(string $city_housing): self
    {
        $this->city_housing = $city_housing;

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

    public function getImgHousing(): ?string
    {
        return $this->img_housing;
    }

    public function setImgHousing(string $img_housing): self
    {
        $this->img_housing = $img_housing;

        return $this;
    }

}
