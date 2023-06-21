<?php

namespace App\DataFixtures;

use App\Entity\Attack;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AttackFixtures extends Fixture implements DependentFixtureInterface
{
    public const ATTACK_ULTRASON = 'ATTACK_ULTRASON';
    public const ATTACK_CHARGE = 'ATTACK_CHARGE';
    public const ATTACK_COMBO_GRIFFE = 'ATTACK_COMBO_GRIFFE';
    public const ATTACK_ULTIMAPOING = 'ATTACK_ULTIMAPOING';
    public const ATTACK_DANSE_DE_FEU = 'ATTACK_DANSE_DE_FEU';
    public const ATTACK_ERUPTION = 'ATTACK_ERUPTION';
    public const ATTACK_ECLAIR = 'ATTACK_ECLAIR';
    public const ATTACK_SURF = 'ATTACK_SURF';
    public const ATTACK_VIBRAQUA = 'ATTACK_VIBRAQUA';
    public const ATTACK_TUNNEL = 'ATTACK_TUNNEL';
    public const ATTACK_SEISME = 'ATTACK_SEISME';


    public function load(ObjectManager $manager): void
    {
        $attack = new Attack();
        $attack->setName('Ultrason') ;
        $attack->setCategory($this->getReference(CategoryFixtures::CAT_PSYCHO));
        $attack->setPoints(10) ;
        $manager->persist($attack);
        $this->addReference(self::ATTACK_ULTRASON, $attack);
        
        $attack = new Attack();
        $attack->setName('Charge') ;
        $attack->setCategory($this->getReference(CategoryFixtures::CAT_NORMAL));
        $attack->setPoints(20) ;
        $manager->persist($attack);
        $this->addReference(self::ATTACK_CHARGE, $attack);
        
        $attack = new Attack();
        $attack->setName('Combo-griffe') ;
        $attack->setCategory($this->getReference(CategoryFixtures::CAT_NORMAL));
        $attack->setPoints(30) ;
        $manager->persist($attack);
        $this->addReference(self::ATTACK_COMBO_GRIFFE, $attack);

        $attack = new Attack();
        $attack->setName('Ultimapoing') ;
        $attack->setCategory($this->getReference(CategoryFixtures::CAT_NORMAL));
        $attack->setPoints(40) ;
        $manager->persist($attack);
        $this->addReference(self::ATTACK_ULTIMAPOING, $attack);

        $attack = new Attack();
        $attack->setName('Danse de feu') ;
        $attack->setCategory($this->getReference(CategoryFixtures::CAT_FEU));
        $attack->setPoints(30) ;
        $manager->persist($attack);
        $this->addReference(self::ATTACK_DANSE_DE_FEU, $attack);

        $attack = new Attack();
        $attack->setName('Eruption') ;
        $attack->setCategory($this->getReference(CategoryFixtures::CAT_INSECTE));
        $attack->setPoints(10) ;
        $manager->persist($attack);
        $this->addReference(self::ATTACK_ERUPTION, $attack);

        $attack = new Attack();
        $attack->setName('Eclair') ;
        $attack->setCategory($this->getReference(CategoryFixtures::CAT_ELEC));
        $attack->setPoints(20) ;
        $manager->persist($attack);
        $this->addReference(self::ATTACK_ECLAIR, $attack);

        $attack = new Attack();
        $attack->setName('Surf') ;
        $attack->setCategory($this->getReference(CategoryFixtures::CAT_EAU));
        $attack->setPoints(10) ;
        $manager->persist($attack);
        $this->addReference(self::ATTACK_SURF, $attack);

        $attack = new Attack();
        $attack->setName('Vibraqua') ;
        $attack->setCategory($this->getReference(CategoryFixtures::CAT_EAU));
        $attack->setPoints(20) ;
        $manager->persist($attack);
        $this->addReference(self::ATTACK_VIBRAQUA, $attack);
        
        $attack = new Attack();
        $attack->setName('Tunnel') ;
        $attack->setCategory($this->getReference(CategoryFixtures::CAT_TERRE));
        $attack->setPoints(30) ;
        $manager->persist($attack);
        $this->addReference(self::ATTACK_TUNNEL, $attack);

        $attack = new Attack();
        $attack->setName('Seisme') ;
        $attack->setCategory($this->getReference(CategoryFixtures::CAT_TERRE));
        $attack->setPoints(40) ;
        $manager->persist($attack);
        $this->addReference(self::ATTACK_SEISME, $attack);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
