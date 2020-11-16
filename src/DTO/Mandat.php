<?php

namespace App\DTO;

class Mandat
{
    public int $id;
    public string $label;
    public string $ville;

    public function __construct(string $label, string $ville)
    {
        $this->id = mt_rand(0, 120000);
        $this->label = $label;
        $this->ville = $ville;
    }
}
