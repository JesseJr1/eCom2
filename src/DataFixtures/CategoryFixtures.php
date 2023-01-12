<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setTitle('All catégories');
        $manager->persist($category);


        $laptop = new Category();
        $laptop->setTitle('Laptop');
        $manager->persist($laptop);

        $console = new Category();
        $console->setTitle('Console');
        $manager->persist($console);

        $headphone = new Category();
        $headphone->setTitle('Headphone');
        $manager->persist($headphone);


        $manager->flush();
    }
}
