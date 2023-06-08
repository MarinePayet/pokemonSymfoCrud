<?php

namespace App\DataFixtures;

use App\Entity\Pokemon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PokemonFixtures extends Fixture implements DependentFixtureInterface
{
        // public const POKEMON_PIKACHU = 'POKEMON_PIKACHU';
        // public const POKEMON_SALAMECHE = 'POKEMON_SALAMECHE';
        // public const POKEMON_CARAPUCE = 'POKEMON_CARAPUCE';
        // public const POKEMON_TOPIQUEUR = 'POKEMON_TOPIQUEUR';
        // public const POKEMON_MELOFEE = 'POKEMON_MELOFEE';
        // public const POKEMON_OTARIA = 'POKEMON_OTARIA';

        public function load(ObjectManager $manager): void
        {
            $pokemon = new Pokemon();
            $pokemon->setName('Pikachu');
            $pokemon->setPv('100');
            $pokemon->setImage('https://assets.pokemon.com/assets/cms2/img/pokedex/full/025.png');
            $pokemon->setCategory($this->getReference(CategoryFixtures::CAT_ELEC));
            $pokemon->addAttack($this->getReference(AttackFixtures::ATTACK_ECLAIR));
            $pokemon->addAttack($this->getReference(AttackFixtures::ATTACK_SEISME));
            $pokemon->addAttack($this->getReference(AttackFixtures::ATTACK_CHARGE));
            $manager->persist($pokemon);
            
            $pokemon = new Pokemon();
            $pokemon->setName('Salameche');
            $pokemon->setPv('100');
            $pokemon->setImage('https://assets.pokemon.com/assets/cms2/img/pokedex/full/004.png');
            $pokemon->setCategory($this->getReference(CategoryFixtures::CAT_FEU));
            $pokemon->addAttack($this->getReference(AttackFixtures::ATTACK_DANSE_DE_FEU));
            $manager->persist($pokemon);

            
            $pokemon = new Pokemon();
            $pokemon->setName('Carapuce');
            $pokemon->setPv('100');
            $pokemon->setImage('https://assets.pokemon.com/assets/cms2/img/pokedex/full/007.png');
            $pokemon->setCategory($this->getReference(CategoryFixtures::CAT_EAU));
            $pokemon->addAttack($this->getReference(AttackFixtures::ATTACK_SURF));
            $pokemon->addAttack($this->getReference(AttackFixtures::ATTACK_VIBRAQUA));
            $manager->persist($pokemon);
            
            $pokemon = new Pokemon();
            $pokemon->setName('Topiqueur');
            $pokemon->setPv('90');
            $pokemon->setImage('https://assets.pokemon.com/assets/cms2/img/pokedex/full/050.png');
            $pokemon->setCategory($this->getReference(CategoryFixtures::CAT_TERRE));
            $pokemon->addAttack($this->getReference(AttackFixtures::ATTACK_TUNNEL));
            $manager->persist($pokemon);

            
            $pokemon = new Pokemon();
            $pokemon->setName('Mélofée');
            $pokemon->setPv('123');
            $pokemon->setImage('https://assets.pokemon.com/assets/cms2/img/pokedex/full/035.png');
            $pokemon->setCategory($this->getReference(CategoryFixtures::CAT_FEE));
            $pokemon->addAttack($this->getReference(AttackFixtures::ATTACK_COMBO_GRIFFE));
            $pokemon->addAttack($this->getReference(AttackFixtures::ATTACK_ULTRASON));
            $manager->persist($pokemon);

            
            $pokemon = new Pokemon();
            $pokemon->setName('Otaria');
            $pokemon->setPv('100');
            $pokemon->setImage('https://assets.pokemon.com/assets/cms2/img/pokedex/full/086.png');
            $pokemon->setCategory($this->getReference(CategoryFixtures::CAT_EAU));
            $pokemon->addAttack($this->getReference(AttackFixtures::ATTACK_SURF));
            $pokemon->addAttack($this->getReference(AttackFixtures::ATTACK_VIBRAQUA));
            $pokemon->addAttack($this->getReference(AttackFixtures::ATTACK_ULTRASON));
            $manager->persist($pokemon);


            $manager->flush();
        }

        public function getDependencies()
        {
            return [
                CategoryFixtures::class,
                AttackFixtures::class,
            ];
        }
}
