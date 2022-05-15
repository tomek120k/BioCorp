<?php

namespace BioCorp\Genetics;

class DNAStrand
{
    private array $histogramTpl = ['A' => 0, 'T' => 0, 'C' => 0, 'G' => 0];

    public function __construct(private readonly string $dnaStrand)
    {
        $allowedCharacters = array_keys($this->histogramTpl);
        if (count(array_filter(array_unique(array_merge($allowedCharacters, str_split($dnaStrand))))) > 4)
            throw new \InvalidArgumentException();
    }

    public function __toString(): string
    {
        return $this->dnaStrand;
    }
}