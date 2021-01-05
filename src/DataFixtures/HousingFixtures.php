<?php

namespace App\DataFixtures;

use App\Entity\Housing;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class HousingFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $housing = new Housing();
        $housing->setTitleHousing('Studio proche du centre');
        $housing->setDescriptionHousing('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non dui molestie, egestas purus eget, sagittis erat. Nullam commodo laoreet felis, vitae finibus neque egestas sit amet. Donec semper id tellus sit amet finibus. Vivamus non tempor felis. Sed hendrerit.');
        $housing->setDisponibilityHousing(new \DateTime());
        $housing->setPricePerNightHousing(40);
        $housing->setTypeHousing('Studio');
        $housing->setStreetHousing('76, rue Victor Hugo');
        $housing->setPostCodeHousing('59210');
        $housing->setCityHousing('COUDEKERQUE-BRANCHE');
        $housing->setImgHousing('80c8e48216425edf0f26450c048036ef.jpeg');

        $manager->persist($housing);

        $housing = new Housing();
        $housing->setTitleHousing('Appartement 3 chambres');
        $housing->setDescriptionHousing('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non dui molestie, egestas purus eget, sagittis erat. Nullam commodo laoreet felis, vitae finibus neque egestas sit amet. Donec semper id tellus sit amet finibus. Vivamus non tempor felis. Sed hendrerit.');
        $housing->setDisponibilityHousing(new \DateTime());
        $housing->setPricePerNightHousing(89);
        $housing->setTypeHousing('Appartement');
        $housing->setStreetHousing('57, rue Nationale');
        $housing->setPostCodeHousing('75006');
        $housing->setCityHousing('PARIS');
        $housing->setImgHousing('a64adf71bfd24e69b71027b34de4d785.jpeg');

        $manager->persist($housing);

        $housing = new Housing();
        $housing->setTitleHousing('Sublime maison avec piscine');
        $housing->setDescriptionHousing('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non dui molestie, egestas purus eget, sagittis erat. Nullam commodo laoreet felis, vitae finibus neque egestas sit amet. Donec semper id tellus sit amet finibus. Vivamus non tempor felis. Sed hendrerit.');
        $housing->setDisponibilityHousing(new \DateTime());
        $housing->setPricePerNightHousing(114);
        $housing->setTypeHousing('Maison');
        $housing->setStreetHousing('49, rue du Château');
        $housing->setPostCodeHousing('44800');
        $housing->setCityHousing('SAINT-HERBLAIN');
        $housing->setImgHousing('d6e63a93d373aade38d4734f7a06e8c7.jpeg');

        $manager->persist($housing);

        $manager->flush();
    }
}
