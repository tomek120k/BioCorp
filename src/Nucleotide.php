<?php

namespace BioCorp;

class Nucleotide
{
    public static function fromDna(string $dnaString): DNAStrand
    {
        return new DNAStrand($dnaString);
    }
}