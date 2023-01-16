<?php

namespace App\DataFixtures;

use App\Entity\ProductPictures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductPicturesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $productPictures = new ProductPictures();
        $productPictures->setPath('laptop.jpg');
        $productPictures->setPosition(1);
        $productPictures->setProduct($this->getReference(ProductFixtures::PRODUCT_CONSOLE));
        $manager->persist($productPictures);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProductFixtures::class,
        ];
    }
}
