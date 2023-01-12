<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{

    public const PRODUCT_LAPTOP = 'PRODUCT_LAPTOP';

    public const PRODUCT_HEADPHONE = 'PRODUCT_HEADPHONE';

    public const PRODUCT_CONSOLE = 'PRODUCT_CONSOLE';

    public function load(ObjectManager $manager): void
    {
        $tabletLaptop = new Product();
        $tabletLaptop->setName('Tablet as a laptop');
        $tabletLaptop->setCategory($this->getReference(CategoryFixtures::CATEGORY_LAPTOP));
        $tabletLaptop->setPrice(299.99);
        $manager->persist($tabletLaptop);
        $this->addReference(self::PRODUCT_LAPTOP, $tabletLaptop);

        $headphone = new Product();
        $headphone->setName('Wireless headphone');
        $headphone->setCategory($this->getReference(CategoryFixtures::CATEGORY_HEADPHONE));
        $headphone->setPrice(76.99);
        $manager->persist($headphone);
        $this->addReference(self::PRODUCT_HEADPHONE, $headphone);
        

        $consoleController = new Product();
        $consoleController->setName('Play game');
        $consoleController->setCategory($this->getReference(CategoryFixtures::CATEGORY_CONSOLE));
        $consoleController->setPrice(70);
        $manager->persist($consoleController);
        $this->addReference(self::PRODUCT_CONSOLE, $consoleController);
        

        $manager->flush();
    }
}
