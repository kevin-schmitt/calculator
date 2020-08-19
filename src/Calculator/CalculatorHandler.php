<?php

namespace App\Calculator;

use App\Model\CalculatorDTO;
use Exception;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CalculatorHandler
{
    private $calculatorService;
    private $session;

    public function __construct(CalculatorService $calculatorService, SessionInterface $session)
    {
        $this->calculatorService = $calculatorService;
        $this->session = $session;
    }

    public function process(CalculatorDTO $calculatorDto)
    {
        if (!$calculatorDto || !$this->calculatorService) {
            throw new Exception('For process calculation need of calculator Dto and calculator service', 500);
        }

        return $this->calculatorService->evaluate($calculatorDto);
    }
}
