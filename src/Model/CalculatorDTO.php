<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class CalculatorDTO
{
    /**
     * @Assert\NotBlank(message="choice operator")
     * @Assert\Choice(
     *     choices = { "+", "-", "*", "/" },
     *     message = "Choose a valid operation."
     * )
     */
    public $operator;
    /**
     * @Assert\NotBlank(message="Enter a first value")
     * @Assert\Type("int")
     */
    public $firstValue;

    /**
     * @Assert\NotBlank(message="Enter a secund value")
     * @Assert\Type("int")
     */
    public $secundValue;
}
