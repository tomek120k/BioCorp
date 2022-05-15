<?php

namespace BioCorp;

class Nucleotide
{
    public static function fromDna(string $dnaString)
    {
        return new DNAStrand($dnaString);
    }
}