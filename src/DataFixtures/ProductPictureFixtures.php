<?php

namespace App\DataFixtures;

use App\Entity\ProductPicture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductPictureFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $productPicture1 = new ProductPicture();
        $productPicture1->setPath('laptop.jpeg');
        $productPicture1->setPosition(1);
        $productPicture1->setProduct($this->getReference(ProductFixtures::PRODUCT_LAPTOP));
        $manager->persist($productPicture1);

        $manager->flush();
    }
}
