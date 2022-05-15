<?php

namespace BioCorp;

class DNAStrand
{
    private array $histogramTpl = ['A' => 0, 'T' => 0, 'C' => 0, 'G' => 0];

    public function __construct(private readonly string $dnaString)
    {
        $allowedCharacters = array_keys($this->histogramTpl);
        if (count(array_filter(array_unique(array_merge($allowedCharacters, str_split($dnaString))))) > 4)
            throw new \InvalidArgumentException();
    }

    public function count(string $nucleotideChar): int
    {
        $histogram = $this->histogram();
        return $histogram[$nucleotideChar];
    }

    /**
     * @return array<int>
     */
    public function histogram(): array
    {

        if (strlen($this->dnaString) === 0)
            return $this->histogramTpl;

        return array_merge($this->histogramTpl, array_count_values(str_split($this->dnaString)));
    }
}