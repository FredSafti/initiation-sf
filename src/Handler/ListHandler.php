<?php

namespace App\Handler;

use App\Repository\MandatRepositoryInterface;

class ListHandler
{
    private MandatRepositoryInterface $repository;

    public function __construct(MandatRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function list(): array
    {
        $listing = array();
        $index = 0;
        foreach($this->repository->getAll() as $mandat) {
            $listing[] = [
                'id' => $mandat->id,
                'name' => $mandat->label,
                'num' => ++$index,
            ];
        }
        return $listing;
    }
}
