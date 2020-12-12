<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Housing;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Laminas\Code\Generator\DocBlock\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Création d'un nouvel objet Faker
        $faker = Factory::create('fr_FR');
        // création de nos 5 catégories
        for ($c = 0; $c < 5; $c++) {
            // création d'un nouvel objet Tag
            $housing = new Housing;
            // On ajoute un nom à notre catégorie
            $housing->setTitleHousing($faker->word());
            $housing->setDescriptionHousing($faker->text(100));
            $housing->setDisponibilityHousing(new \DateTime());
            $housing->setPricePerNightHousing($faker->numberBetween($min = 50, $max = 200));
            $housing->setTypeHousing($faker->word());
            $housing->setStreetHousing($faker->streetName());
            $housing->setPostCodeHousing($faker->postcode());
            $housing->setCityHousing($faker->city());

            // On fait persister les données
            $manager->persist($housing);
        }
        // On push les catégories en BDD
        $manager->flush();
    }
}
