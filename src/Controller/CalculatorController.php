<?php

namespace App\Controller;

use App\Calculator\CalculatorHandler;
use App\Form\CalculatorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    /**
     * @Route("/", name="calculator")
     */
    public function index(Request $request, CalculatorHandler $calculatorHandler)
    {
        $form = $this->createForm(CalculatorType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $total = $calculatorHandler->process($form->getData());
        }

        return $this->render('calculator/index.html.twig', [
            'calculatorForm' => $form->createView(),
            'total' => $total ?? 0,
        ]);
    }
}
