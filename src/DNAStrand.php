<?php

namespace BioCorp;

class DNAStrand
{
    public function __construct(private readonly string $dnaString)
    {
    }

    public function count(string $nucleotideChar): int
    {
        $histogram = $this->histogram();
        return $histogram[$nucleotideChar] ?? 0;
    }

    /**
     * @return array
     */
    public function histogram(): array
    {
        $histogram_tpl = ['A' => 0, 'T' => 0, 'C' => 0, 'G' => 0];
        if (strlen($this->dnaString) === 0)
            return $histogram_tpl;

        return array_merge($histogram_tpl, array_count_values(str_split($this->dnaString)));
    }
}