<?php

namespace App\DataFixtures;

use App\Entity\Card;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function __construct( private readonly EntityManagerInterface $em){}


    public function load(ObjectManager $manager): void
    {
        $category = $this->em->getRepository(Category::class)->findOneBy(['id' => 1]);
        for ($i = 0; $i < 50; $i++) {
            $card = new Card();
            $card->setTitle('title '.$i);
            $card->setDefinition('definition '.$i);
            $card->setCategory($category);
            $manager->persist($card);
        }

        $manager->flush();
    }
}
