<?php

namespace App\Controller;

use App\Entity\Housing;
use App\Form\HousingType;
use App\Repository\HousingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Thomas Heuveline
 * @Route("/housing")
 */
class HousingController extends AbstractController
{
    /**
     * @Route("/", name="housing_index", methods={"GET"})
     * Liste des logements
     */
    public function index(HousingRepository $housingRepository): Response
    {
        return $this->render('housing/index.html.twig', [
            'housings' => $housingRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="housing_new", methods={"GET","POST"})
     * Création d'un logement
     */
    public function new(Request $request): Response
    {
        //création d'une nouvelle instance Housing()
        $housing = new Housing();
        $form = $this->createForm(HousingType::class, $housing);
        $form->handleRequest($request);

        //Si le formulaire est envoyé et valide
        if ($form->isSubmitted() && $form->isValid()) {
            //Récupération de l'image transmise
            $image = $form->get('img_housing')->getData();
            //Génération du nom de fichier de l'image
            $fichier = md5(uniqid()). '.' . $image->guessExtension();
            //Copie du fichier dans public/images
            $image->move(
                $this->getParameter('image_directory'),
                $fichier
            );
            //Ajoute le chemin de l'image dans la base de données
            $housing->setImgHousing($fichier);

            //Récupère les modifications/ajouts
            $entityManager = $this->getDoctrine()->getManager();
            //Sauvegarde les modifications/ajouts
            $entityManager->persist($housing);
            //Ajout à la base de données les modifications/ajouts
            $entityManager->flush();

            return $this->redirectToRoute('housing_index');
        }

        return $this->render('housing/new.html.twig', [
            'housing' => $housing,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="housing_show", methods={"GET"})
     * Affichage du logement
     */
    public function show(Housing $housing): Response
    {
        return $this->render('housing/show.html.twig', [
            'housing' => $housing,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="housing_edit", methods={"GET","POST"})
     * Edition du logement
     */
    public function edit(Request $request, Housing $housing): Response
    {
        $form = $this->createForm(HousingType::class, $housing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $image = $form->get('img_housing')->getData();
            $fichier = md5(uniqid()). '.' . $image->guessExtension();
            $image->move(
                $this->getParameter('image_directory'),
                $fichier
            );
            $housing->setImgHousing($fichier);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('housing_index');
        }

        return $this->render('housing/edit.html.twig', [
            'housing' => $housing,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="housing_delete", methods={"DELETE"})
     * Suppression du logement
     */
    public function delete(Request $request, Housing $housing): Response
    {
        if ($this->isCsrfTokenValid('delete'.$housing->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            //Doctrine est prévenu qu'on souhaite supprimer un objet
            $entityManager->remove($housing);
            $entityManager->flush();
        }

        return $this->redirectToRoute('housing_index');
    }

  
}
