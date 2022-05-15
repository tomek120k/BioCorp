<?php

namespace BioCorp\InformationTheory;

use InvalidArgumentException;

class Hamming
{
    public static function hammingDistance(string $strand1, string $strand2)
    {
        if (self::differentLength($strand1, $strand2))
            throw new StringAreNotEqual();
        return count(array_diff_assoc(str_split($strand1), str_split($strand2)));
    }

    /**
     * @param string $strand1
     * @param string $strand2
     * @return bool
     */
    private static function differentLength(string $strand1, string $strand2): bool
    {
        return strlen($strand1) !== strlen($strand2);
    }
}