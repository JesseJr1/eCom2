<?php

namespace App\DataFixtures;

use App\Entity\Mark;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{

    public const PRODUCT_LAPTOP = 'PRODUCT_LAPTOP';

    // public const PRODUCT_HEADPHONE = 'PRODUCT_HEADPHONE';

    //public const PRODUCT_CONSOLE = 'PRODUCT_CONSOLE';

    public function load(ObjectManager $manager): void
    {
        $products = [];

        for ($i = 1; $i <= 50; $i++) {
            $product = new Product();
            $product->setName('Tablet as a laptop' . $i);
            $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_LAPTOP));
            $product->setPrice(mt_rand(200, 2000));
            // $mark = new Mark();
            // $mark->setMark(mt_rand(1, 5));
            $manager->persist($product);
            // $manager->persist($mark);
        }

        $products[] = $product;

        $this->addReference(self::PRODUCT_LAPTOP, $product);




        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}


// add en $ product (laptop etc)

  // $headphone = new Product();
            // $headphone->setName('Wireless headphone');
            // $headphone->setCategory($this->getReference(CategoryFixtures::CATEGORY_HEADPHONE));
            // $headphone->setPrice(mt_rand(60, 250));
            // $manager->persist($headphone);

            // $consoleController = new Product();
            // $consoleController->setName('Play game');
            // $consoleController->setCategory($this->getReference(CategoryFixtures::CATEGORY_CONSOLE));
            // $consoleController->setPrice(70);
            // $manager->persist($consoleController);

            // $this->addReference(self::PRODUCT_HEADPHONE, $headphone);

        // $this->addReference(self::PRODUCT_CONSOLE, $consoleController);