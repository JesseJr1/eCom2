<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('admin@admin.com');
        $user->setFirstname('Halim');
        $user->setLastname('Tobias');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword('demo');
        // $user->setPassword('$2y$13$8yoezPi9FtWJb1JoOVu6nudf4yhyb44bfiVW9rTzMrCslwn2Bqwm6');




        $manager->persist($user);

        $manager->flush();
    }
}
