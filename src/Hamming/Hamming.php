<?php
namespace BioCorp\Hamming;

use BioCorp\Genetics\Strand;
use BioCorp\InformationTheory\Hamming as InformationTheory;
use InvalidArgumentException;

class Hamming
{
    /**
     * @param string $strand1
     * @param string $strand2
     * @return int
     */
    public static function compute(string $strand1, string $strand2): int
    {
        $dnaStrand1 = new Strand($strand1);
        $dnaStrand2 = new Strand($strand2);
        return InformationTheory::hammingDistance($dnaStrand1, $dnaStrand2);
    }
}