<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('user@gmail.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            '123456'
        ));
        $manager->flush();
    }
}
