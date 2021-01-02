<?php

namespace App\Controller;

use App\Repository\HousingRepository;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(HousingRepository $hr, ReservationRepository $rr): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'housing' => $hr->findAll(),
            'reservations' => $rr->findAll()
        ]);
    }
}
