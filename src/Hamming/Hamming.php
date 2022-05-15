<?php
namespace BioCorp\Hamming;

use BioCorp\Genetics\DNAStrand;
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
        $dna1 = new DNAStrand($strand1);
        $dna2 = new DNAStrand($strand2);
        try {
            return InformationTheory::hammingDistance($dna1->__toString(), $dna2->__toString());
        }
        catch (StringAreNotEqual $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }

    }
}