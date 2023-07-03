<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Repository\PokemonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;




class FightController extends AbstractController
{
    #[Route('/fight', name: 'app_fight')]
    public function index(PokemonRepository $pokemonRepository): Response
    {

        $pokemons = $pokemonRepository->findAll();

        // Récupérer un tableau d'IDs à partir des entités Pokémon
        $pokemonIds = array_map(function (Pokemon $pokemon) {
            return $pokemon->getId();
        }, $pokemons);

        // Sélectionner un ID au hasard à partir du tableau d'IDs
        $randomId1 = $pokemonIds[array_rand($pokemonIds)];
        $randomId2 = $pokemonIds[array_rand($pokemonIds)];

        // Récupérer l'entité Pokemon correspondante à l'ID sélectionné au hasard
        $randomPokemon1 = $pokemonRepository->find($randomId1);
        $randomPokemon2 = $pokemonRepository->find($randomId2);

        $firstAttack1 = null;
        if ($randomPokemon1->getAttack()->count() > 0) {
            $firstAttack1 = $randomPokemon1->getAttack()->first();
        }

        $firstAttack2 = null;
        if ($randomPokemon2->getAttack()->count() > 0) {
            $firstAttack2 = $randomPokemon2->getAttack()->first();
        }

        return $this->render('fight/index.html.twig', [
            'randomPokemon1' => $randomPokemon1,
            'randomPokemon2' => $randomPokemon2,
            'pokemons' => $pokemons,
            'pokemonIds' => $pokemonIds,
            'firstAttack1'=> $firstAttack1,
            'firstAttack2' =>  $firstAttack2,
        ]);
    }
    
}
