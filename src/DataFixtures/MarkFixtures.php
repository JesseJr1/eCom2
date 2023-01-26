<?php

namespace App\DataFixtures;

use App\Entity\Mark;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MarkFixtures extends Fixture
{
    public const MARK_LAPTOP = 'MARK_LAPTOP';

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 50; $i++) { 
            # code...
            $mark = new Mark();
            $mark->setMark(mt_rand(1, 5));
            // $mark->setProduct($this->getReference(ProductFixtures::PRODUCT_LAPTOP));
            $manager->persist($mark);
        }

        $this->addReference(self::MARK_LAPTOP, $mark);
        
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProductFixtures::class,
        ];
    }
}
