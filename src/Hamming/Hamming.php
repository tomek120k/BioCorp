<?php
namespace BioCorp\Hamming;

use BioCorp\Genetics\Strand;
use BioCorp\InformationTheory\Hamming as InformationTheory;
use BioCorp\InformationTheory\StringAreNotEqual;
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
        $dna1 = new Strand($strand1);
        $dna2 = new Strand($strand2);
        try {
            return InformationTheory::hammingDistance($dna1, $dna2);
        }
        catch (StringAreNotEqual $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }

    }
}