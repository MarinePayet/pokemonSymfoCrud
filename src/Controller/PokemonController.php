<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Form\PokemonType;
use App\Repository\AttackRepository;
use App\Repository\PokemonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{
    #[Route('/pokemons', name: 'app_pokemons')]
    public function index(PokemonRepository $pokemonRepository, AttackRepository $attackRepository): Response
    {

        return $this->render('pokemon/index.html.twig', [
            'pokemons' => $pokemonRepository->findAll(),
            'attacks' => $attackRepository->findAll(),
        ]);
    }

    #[Route('/pokemon/{id<\d+>}', name: 'app_pokemon_show')]
    public function show(Pokemon $pokemon): Response
    {

        return $this->render('pokemon/show.html.twig', [
            'pokemon' => $pokemon,
        ]);
    }

    #[Route('/pokemon/new', name: 'app_pokemon_new')]
    public function new(Request $request, PokemonRepository $pokemonRepository): Response
    {
        $form = $this->createForm(PokemonType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $pokemon = $form->getData();
            $pokemonRepository->save($pokemon, true);

            return $this->redirectToRoute('app_pokemons');
        }
        
        return $this->render('pokemon/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/pokemon/edit/{id<\d+>}', name: 'app_pokemon_edit')]
    public function edit(Request $request, PokemonRepository $pokemonRepository, Pokemon $pokemon): Response
    {
        $form = $this->createForm(PokemonType::class, $pokemon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $pokemon = $form->getData();
            $pokemonRepository->save($pokemon, true);

            return $this->redirectToRoute('app_pokemons');
        }
        
        return $this->render('pokemon/edit.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/pokemon/delete/{id<\d+>}', name: 'app_pokemon_delete')]        
    public function delete( PokemonRepository $pokemonRepository, Pokemon $pokemon): Response
        {

            $pokemonRepository->remove($pokemon, true);
    
            return $this->redirectToRoute('app_pokemons');
        }


}
