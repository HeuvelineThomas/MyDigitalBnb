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
        // $manager->flush();
    }
}
