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
        $productPicture1 = new ProductPictures();
        $productPicture1->setPath('laptop.jpeg');
        $productPicture1->setPosition(1);
        $productPicture1->setProduct($this->getReference(ProductFixtures::PRODUCT_LAPTOP));
        $manager->persist($productPicture1);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProductFixtures::class,
        ];
    }
}
