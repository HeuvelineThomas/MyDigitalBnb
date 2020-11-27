<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $arrival_date_reservation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $departude_date_reservation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_reservation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrivalDateReservation(): ?\DateTimeInterface
    {
        return $this->arrival_date_reservation;
    }

    public function setArrivalDateReservation(\DateTimeInterface $arrival_date_reservation): self
    {
        $this->arrival_date_reservation = $arrival_date_reservation;

        return $this;
    }

    public function getDepartudeDateReservation(): ?\DateTimeInterface
    {
        return $this->departude_date_reservation;
    }

    public function setDepartudeDateReservation(\DateTimeInterface $departude_date_reservation): self
    {
        $this->departude_date_reservation = $departude_date_reservation;

        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->date_reservation;
    }

    public function setDateReservation(\DateTimeInterface $date_reservation): self
    {
        $this->date_reservation = $date_reservation;

        return $this;
    }
}
