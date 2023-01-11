<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $tabletLaptop = new Product();
        $tabletLaptop->setName('Tablet as a laptop');
        $tabletLaptop->setPrice(299.99);
        $manager->persist($tabletLaptop);

        $manager->flush();
    }
}
