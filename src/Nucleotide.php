<?php

namespace BioCorp;

class Nucleotide
{
    public static function fromDna(string $dnaString): DNAStrand
    {
        $allowedCharacters = ['A', 'T', 'C', 'G'];
        if (count(array_filter(array_unique(array_merge($allowedCharacters, str_split($dnaString))))) > 4)
            throw new \InvalidArgumentException();
        return new DNAStrand($dnaString);
    }
}