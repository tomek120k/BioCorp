<?php

namespace Tests\Nucleotide;

use BioCorp\Nucleotide;
use PHPUnit\Framework\TestCase;

class NucleotideTest extends TestCase
{
    public function testEmptyDnyStrandHasNoAdenosine(): void
    {
        $this->assertEquals(0, Nucleotide::fromDna('')->count('A'));
    }

    public function testRepetetiveCytidineGetsCounted(): void
    {
        $this->assertEquals(5, Nucleotide::fromDna('CCCCC')->count('C'));
    }

    public function testCountsOnlyThymidine(): void
    {
        $this->assertEquals(1, Nucleotide::fromDna('GGGGGTAACCCGG')->count('T'));
    }

    public function testCountsANucletideOnlyOnce(): void
    {
        $dna = Nucleotide::fromDna('CGATTGGG');
        $dna->count('T');
        $dna->count('T');

        $this->assertEquals(2, $dna->count('T'));
    }

    public function testEmptyDnaStrandsHasNoNucleotides(): void
    {
        $expected = ['A' => 0, 'T' => 0, 'C' => 0, 'G' => 0];
        $this->assertEquals($expected, Nucleotide::fromDna('')->histogram());
    }

    public function testRepetitiveSequenceHasOnlyGuanosine(): void
    {
        $expected = ['A' => 0, 'T' => 0, 'C' => 0, 'G' => 8];
        $this->assertEquals($expected, Nucleotide::fromDna('GGGGGGGG')->histogram());
    }

    public function testCountsAllNucletides(): void
    {
        $s = 'AGCTTTTCATTCTGACTGACCGACATATGCTGTTAAAACTG';
        $expected =   ['A' => 11, 'T' => 14, 'C' => 9, 'G' => 7];
        $this->assertEquals($expected, Nucleotide::fromDna($s)->histogram());
    }

//    public function testValidatesDna(): void
//    {
//        $this->expectException(\InvalidArgumentException::class);
//        Nucleotide::fromDna('JOHNYAPPLESEED');
//    }
}
