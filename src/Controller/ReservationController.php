<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\HousingType;
use App\Form\ReservationType;
use App\Repository\HousingRepository;
use App\Repository\ReservationRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @author Thomas Heuveline
 * @Route("/reservation")
 */
class ReservationController extends AbstractController
{
    /**
     * @Route("/", name="reservation_index", methods={"GET"})
     * Liste des réservations
     */
    public function index(ReservationRepository $reservationRepository): Response
    {
        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="reservation_new", methods={"GET","POST"})
     * Création d'une nouvelle réservation
     */
    public function new(Request $request, HousingRepository $hr, UserRepository $ur): Response
    {
        //Création d'une nouvelle instance de Reservation()
        $reservation = new Reservation();
        //Récupération du paramètre <id_housing> présent dans l'url
        $id_housing = $request->query->get('id_housing');
        //Récupération de l'id de l'utilisateur
        $id_user = $this->getUser()->getId();
        //Sauvegarde de l'instance Housing correspondant à l'id récupéré
        $housing = $hr->findOneById($id_housing);
        //Ajout de l'objet Housing dans la base de données
        $reservation->setReservationHousing($housing);
        //Sauvegarde de l'objet User correspondant à l'id récupéré
        $user = $ur->findOneById($id_user);
        //Sauvegarde de l'instance User correspondant à l'id récupéré
        $reservation->setReservationUserId($user);
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('reservation_index');
        }

        return $this->render('reservation/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reservation_show", methods={"GET"})
     * Affichage de la réservation
     */
    public function show(Reservation $reservation): Response
    {
        return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reservation_edit", methods={"GET","POST"})
     * Modification de la réservation
     */
    public function edit(Request $request, Reservation $reservation): Response
    {
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservation_index');
        }

        return $this->render('reservation/edit.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reservation_delete", methods={"DELETE"})
     * Suppression de la réservation
     */
    public function delete(Request $request, Reservation $reservation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reservation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reservation_index');
    }
}
