<?php

namespace App\Repository;

use App\DTO\Mandat;

class MandatRepository implements MandatRepositoryInterface
{
    public function getAll(): array
    {
        return [
            new Mandat('premier', 'Toulouse'),
            new Mandat('second', 'Bordeaux'),
            new Mandat('troisieme', 'Paris'),
        ];
    }
}
