<?php

namespace BioCorp;

use BioCorp\Genetics\DNAStrand as GeneticsDNAStrand;
use BioCorp\Genetics\WrongNucleotide;
use InvalidArgumentException;

/**
 * Class represents DNA Strands
 */
class DNAStrand
{
    private GeneticsDNAStrand $dnaStrand;

    /**
     * @param string $dnaString
     */
    public function __construct(private readonly string $dnaString)
    {
        try {
            $this->dnaStrand = new GeneticsDNAStrand($this->dnaString);
        } catch (WrongNucleotide $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * @param string $nucleotideChar
     * @return int
     */
    public function count(string $nucleotideChar): int
    {
        return $this->dnaStrand->count($nucleotideChar);
    }

    /**
     * @return array<string, int>
     */
    public function histogram(): array
    {
        return $this->dnaStrand->histogram();
    }
}
