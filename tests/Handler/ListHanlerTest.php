<?php

namespace App\Tests\Handler;

use App\DTO\Mandat;
use App\Handler\ListHandler;
use App\Repository\MandatRepositoryInterface;
use PHPUnit\Framework\TestCase;

class ListHanlerTest extends TestCase
{
    private function createRepository(array $mandats = []): MandatRepositoryInterface
    {
        $repository = new Repository();
        $repository->setList($mandats);
        return $repository;
    }

    public function testEmtpyList()
    {
        $listing = new ListHandler($this->createRepository());
        $this->assertEmpty($listing->list());
    }

    public function testNormalList()
    {
        $listing = new ListHandler($this->createRepository([
            new Mandat('first', 'Agen')
        ]));
        $this->assertCount(1, $listing->list());
    }

    public function testIncrementalNum()
    {
        $listing = new ListHandler($this->createRepository([
            new Mandat('first', 'Agen'),
            new Mandat('second', 'Dijon'),
        ]));

        $elements = $listing->list();
        $this->assertCount(2, $elements);

        $this->assertSame(
            $elements[1]['num'],
            $elements[0]['num'] +1
        );
    }

    public function testNameOfMandat()
    {
        $listing = new ListHandler($this->createRepository([
            new Mandat('first', 'Agen')
        ]));
        $this->assertCount(1, $listing->list());

        $mandat = $listing->list()[0];
        $this->assertSame('first', $mandat['name']);
    }
}
