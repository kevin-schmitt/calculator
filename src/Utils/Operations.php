<?php

namespace App\Utils;

trait Operations
{
    public function getOperations(): array
    {
        return [
            'add' => '+',
            'sub' => '-',
            'div' => '/',
            'mult' => '*',
        ];
    }
}
