<?php

namespace App\Controller;

use App\Entity\Attack;
use App\Form\AttackType;
use App\Repository\AttackRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttackController extends AbstractController
{
    #[Route('/attacks', name: 'app_attacks')]
    public function index(AttackRepository $attackRepository): Response
    {
        $attacks = $attackRepository->findAll();

        return $this->render('attack/index.html.twig', [
            'attacks' => $attacks,
        ]);
    }

    #[Route('/attack/new', name: 'app_attack_new')]
    public function new(Request $request, AttackRepository $attackRepository): Response
    {
        $form = $this->createForm(AttackType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $attack = $form->getData();
            $attackRepository->save($attack, true);

            return $this->redirectToRoute('app_attacks');
        }
        
        return $this->render('attack/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/attack/edit/{id<\d+>}', name: 'app_attack_edit')]
    public function edit(Request $request, AttackRepository $attackRepository, Attack $attack): Response
    {
        $form = $this->createForm(AttackType::class, $attack);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $attack = $form->getData();
            $attackRepository->save($attack, true);

            return $this->redirectToRoute('app_attacks');
        }
        
        return $this->render('attack/edit.html.twig', [
            'form' => $form,
        ]);
    }
}
