<?php

namespace App\Tests\Handler;

use App\Repository\MandatRepositoryInterface;

class Repository implements MandatRepositoryInterface
{
    private array $liste = array();

    public function setList(array $liste)
    {
        $this->liste = $liste;
    }

    public function getAll(): array
    {
        return $this->liste;
    }
}
