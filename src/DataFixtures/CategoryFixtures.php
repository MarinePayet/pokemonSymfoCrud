<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CAT_ACIER = 'CAT_ACIER';
    public const CAT_EAU = 'CAT_EAU';
    public const CAT_ELEC = 'CAT_ELEC';
    public const CAT_FEE = 'CAT_FEE';
    public const CAT_FEU = 'CAT_FEU';
    public const CAT_GLACE = 'CAT_GLACE';
    public const CAT_INSECTE = 'CAT_INSECTE';
    public const CAT_NORMAL = 'CAT_NORMAL';
    public const CAT_PLANT = 'CAT_PLANT';
    public const CAT_PSYCHO = 'CAT_PSYCHO';
    public const CAT_TERRE = 'CAT_TERRE';
    public const CAT_VOL = 'CAT_VOL';
    
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Acier');
        $manager->persist($category);
        $this->addReference(self::CAT_ACIER, $category);

        $category = new Category();
        $category->setName('Eau');
        $manager->persist($category);
        $this->addReference(self::CAT_EAU, $category);

        $category = new Category();
        $category->setName('Electrique');
        $manager->persist($category);
        $this->addReference(self::CAT_ELEC, $category);
        
        $category = new Category();
        $category->setName('Fée');
        $manager->persist($category);
        $this->addReference(self::CAT_FEE, $category);

        $category = new Category();
        $category->setName('Feu');
        $manager->persist($category);
        $this->addReference(self::CAT_FEU, $category);

        $category = new Category();
        $category->setName('Glace');
        $manager->persist($category);
        $this->addReference(self::CAT_GLACE, $category);

        $category = new Category();
        $category->setName('Insecte');
        $manager->persist($category);
        $this->addReference(self::CAT_INSECTE, $category);

        $category = new Category();
        $category->setName('Normal');
        $manager->persist($category);
        $this->addReference(self::CAT_NORMAL, $category);

        $category = new Category();
        $category->setName('Plante');
        $manager->persist($category);
        $this->addReference(self::CAT_PLANT, $category);

        $category = new Category();
        $category->setName('Psycho');
        $manager->persist($category);
        $this->addReference(self::CAT_PSYCHO, $category);

        $category = new Category();
        $category->setName('Terre');
        $manager->persist($category);
        $this->addReference(self::CAT_TERRE, $category);

        $category = new Category();
        $category->setName('Vol');
        $manager->persist($category);
        $this->addReference(self::CAT_VOL, $category);
    

        $manager->flush();
    }
}
