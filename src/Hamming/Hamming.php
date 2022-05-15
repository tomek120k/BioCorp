<?php
namespace App\Hamming;

use App\Genetics\Strand;
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
        if (self::differentLength($dnaStrand1, $dnaStrand2))
            throw new InvalidArgumentException();
        return count(array_diff_assoc($dnaStrand1->nucleotidesChars(), $dnaStrand2->nucleotidesChars()));
    }

    /**
     * @param Strand $strand1
     * @param Strand $strand2
     * @return bool
     */
    private static function differentLength(Strand $strand1, Strand $strand2): bool
    {
        return !$strand1->lengthEqual($strand2);
    }
}