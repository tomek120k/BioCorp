<?php

namespace BioCorp;

/**
 *
 */
class Nucleotide
{
    /**
     * @param string $dnaString
     * @return DNAStrand
     */
    public static function fromDna(string $dnaString): DNAStrand
    {
        return new DNAStrand($dnaString);
    }
}