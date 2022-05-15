<?php

namespace BioCorp;

use BioCorp\Genetics\DNAStrand as GeneticsDNAStrand;
use BioCorp\Genetics\WrongNucleotide;

class DNAStrand
{
    private array $histogramTpl = ['A' => 0, 'T' => 0, 'C' => 0, 'G' => 0];
    private GeneticsDNAStrand $dnaStrand;

    public function __construct(private readonly string $dnaString)
    {
        try {
            $this->dnaStrand = new GeneticsDNAStrand($this->dnaString);
        }
        catch (WrongNucleotide $e) {
            throw new \InvalidArgumentException();
        }
    }

    public function count(string $nucleotideChar): int
    {
       return $this->dnaStrand->count($nucleotideChar);
    }

    /**
     * @return array<int>
     */
    public function histogram(): array
    {
        return $this->dnaStrand->histogram();
    }


}